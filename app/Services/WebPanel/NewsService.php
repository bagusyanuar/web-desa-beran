<?php

namespace App\Services\WebPanel;

use App\Commons\FileUpload\FileUpload;
use App\Commons\FileUpload\MultipleFileUpload;
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

            # create images non thumbnail

            $newsImages = [];
            if (!empty($schema->getImages())) {
                $multipleFileUploadService = new MultipleFileUpload($schema->getImages(), "assets/images/news");
                $multipleFileUploadResponse = $multipleFileUploadService->upload();
                if (!$multipleFileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($multipleFileUploadResponse->getMessage());
                }

                foreach ($multipleFileUploadResponse->getData() as $image) {
                    $dataNonThumbnails = [
                        'news_id' => $news->id,
                        'image' => $image,
                        'is_thumbnail' => false,
                    ];
                    array_push($newsImages, $dataNonThumbnails);
                }
            }

            array_push($newsImages, $dataThumbnail);

            foreach ($newsImages as $newsImage) {
                NewsImage::create($newsImage);
            }

            DB::commit();
            return ServiceResponse::statusCreated("successfully create news");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function findByID($id): ServiceResponse
    {
        try {
            $data = News::with(['images'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            return ServiceResponse::statusOK("successfully get news", $data);
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function update($id, NewsSchema $schema): ServiceResponse
    {
        try {
            DB::beginTransaction();
            $userId = Auth::user()->id;
            $validator = $schema->validate();
            if ($validator->fails()) {
                return ServiceResponse::unprocessableEntity($validator->errors()->toArray());
            }
            $schema->hydrateBody();

            $data = News::with(['images'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }

            $dataNews = [
                'title' => $schema->getTitle(),
                'slug' => Str::slug($schema->getTitle()),
                'description' => $schema->getDescription(),
                'author_id' => $userId
            ];

            $data->update($dataNews);

            // $thumbnailImage = $data->images->where('is_thumbnail', '=', true)->first();

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

            $newsImages = [];

            $dataThumbnail = [
                'news_id' => $data->id,
                'image' => $thumbnailImageName,
                'is_thumbnail' => true,
            ];

            # create images non thumbnail

            if (!empty($schema->getImages())) {
                $multipleFileUploadService = new MultipleFileUpload($schema->getImages(), "assets/images/news");
                $multipleFileUploadResponse = $multipleFileUploadService->upload();
                if (!$multipleFileUploadResponse->isSuccess()) {
                    DB::rollBack();
                    return ServiceResponse::internalServerError($multipleFileUploadResponse->getMessage());
                }

                foreach ($multipleFileUploadResponse->getData() as $image) {
                    $dataNonThumbnails = [
                        'news_id' => $data->id,
                        'image' => $image,
                        'is_thumbnail' => false,
                    ];
                    array_push($newsImages, $dataNonThumbnails);
                }
            }

            array_push($newsImages, $dataThumbnail);

            $data->images()->delete();
            $data->images()->createMany($newsImages);
            DB::commit();
            return ServiceResponse::statusOK("successfully update news");
        } catch (\Throwable $e) {
            DB::rollBack();
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }

    public function delete($id): ServiceResponse
    {
        try {
            $data = News::with(['images'])
                ->where('id', '=', $id)
                ->first();
            if (!$data) {
                return ServiceResponse::notFound("data not found");
            }
            $data->delete();
            return ServiceResponse::statusOK("successfully delete news");
        } catch (\Throwable $e) {
            return ServiceResponse::internalServerError($e->getMessage());
        }
    }
}
