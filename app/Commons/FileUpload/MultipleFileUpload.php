<?php

namespace App\Commons\FileUpload;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;

class MultipleFileUpload
{
    /** @var UploadedFile[] $files  */
    private $files;

    private $targetPath;

    /**
     * MultipleFileUpload constructor.
     * @param array|UploadedFile[] $files
     * @param string $targetPath
     */
    public function __construct($files, $targetPath)
    {
        $this->files = $files;
        $this->targetPath = $targetPath;
    }

    public function upload(): MultipleFileUploadResponse
    {
        $response = new MultipleFileUploadResponse();
        try {
            $paths = [];
            $path = $this->getTargetPath();
            $storage_path = public_path($this->getTargetPath());
            foreach ($this->files as $file) {
                if (!File::exists($storage_path)) {
                    File::makeDirectory($storage_path, 0755, true);
                }

                if ($file instanceof UploadedFile) {
                    # code...
                    $extension = $file->getClientOriginalExtension();
                    $image = Uuid::uuid4()->toString() . '.' . $extension;
                    $fileName = '/' . $path . '/' . $image;
                    $targetPath = $storage_path . '/' . $image;
                    $tempPath = $file->getRealPath();
                    $uploadedPath = $targetPath;
                    File::move($tempPath, $targetPath);
                    array_push($paths, $fileName);
                }
                // $extension = $file->getClientOriginalExtension();
                // $fileName = Uuid::uuid4()->toString() . '.' . $extension;
                // $path = $file->storeAs($this->targetPath, $fileName, 'public');
                // $urlFileName = '/storage/' . $path;
                // array_push($paths, $urlFileName);
            }
            $response->setSuccess(true)
                ->setMessage('success')
                ->setData($paths);
        } catch (\Throwable $e) {
            $response->setSuccess(false)
                ->setMessage($e->getMessage())
                ->setData([]);
        }
        return $response;
    }

    /**
     * Get the value of files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Set the value of files
     *
     * @return  self
     */
    public function setFiles($files)
    {
        $this->files = $files;

        return $this;
    }

    /**
     * Get the value of targetPath
     */
    public function getTargetPath()
    {
        return $this->targetPath;
    }

    /**
     * Set the value of targetPath
     *
     * @return  self
     */
    public function setTargetPath($targetPath)
    {
        $this->targetPath = $targetPath;

        return $this;
    }
}
