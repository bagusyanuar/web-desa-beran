<?php

namespace App\Services\WebPanel;

use App\Commons\FileUpload\FileUpload;
use App\Commons\Libs\Http\MetaPagination;
use App\Commons\Libs\Http\ServiceResponse;
use App\Interface\WebPanel\NewsServiceInterface;
use App\Models\News;
use App\Models\NewsImage;
use App\Schemas\WebPanel\News\NewsQuery;
use App\Schemas\WebPanel\News\NewsSchema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsService implements NewsServiceInterface
{
    public function findAll(NewsQuery $queryParams): ServiceResponse
    {
        try {
            $queryParams->hydrateQuery();
            $query = News::with(['images'])
                ->when($queryParams->getParam(), function ($q) use ($queryParams) {
                    /** @var Builder $q */
                    return $q->where('title', 'LIKE', "%{$queryParams->getParam()}%");
                })
                ->orderBy('title', 'ASC');
            $pagination = $query->paginate($queryParams->getPageSize(), '*', 'page', $queryParams->getPage());
            $data = $pagination->items();
            $meta = MetaPagination::generate($pagination);
            return ServiceResponse::statusOK("successfully get news", $data, $meta);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function create(NewsSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $userId = Auth::user()->id;
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $dataNews = [
                'title' => $schema->getTitle(),
                'slug' => Str::slug($schema->getTitle()),
                'description' => $schema->getDescription(),
                'author_id' => $userId
            ];
            $news = News::create($dataNews);

            # create images

            # create thumbnail
            $thumbnailImageName = null;
            if ($schema->getThumbnail()) {
                $fileUploadService = new FileUpload($schema->getThumbnail(), "assets/images/news");
                $fileUploadResponse = $fileUploadService->upload();
                if (!$fileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($fileUploadResponse->getMessage());
                }
                $thumbnailImageName = $fileUploadResponse->getFileName();
            }
            $dataThumbnail = [
                'news_id' => $news->id,
                'image' => $thumbnailImageName,
                'is_thumbnail' => true,
            ];

            NewsImage::create($dataThumbnail);

            DB::commit();
            return ServiceResponse::statusCreated("successfully create news");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse {}

    public function update($id, NewsSchema $schema): ServiceResponse {}

    public function delete($id): ServiceResponse {}
}
