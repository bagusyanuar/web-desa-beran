<?php

namespace App\Commons\FileUpload;

class MultipleFileUploadResponse
{
    /** @var $success boolean */
    private $success;

    /** @var $message string */
    private $message;

    /** @var $data array */
    private $data;

    /**
     * MultipleFileUploadResponse constructor.
     * @param bool $success
     * @param string $message
     * @param array $data
     */
    public function __construct($success = false, $message = '', array $data = [])
    {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     * @return MultipleFileUploadResponse
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return MultipleFileUploadResponse
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return MultipleFileUploadResponse
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
