<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Files extends OpenAI
{
    public string $service = 'files';
    public string $file;
    public string $purpose;

    public function __construct(array $args)
    {
        parent::__construct($args);
        $this->end_point = $this->end_point_url . $this->service;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function list()
    {
        $endpoint = $this->end_point . $this->service;

        $response = $this->getRequest($endpoint);

        return collect($response['data']);
    }

    public function retrieveFile($file_id)
    {

        $endpoint = $this->end_point . $this->service. '/' . $file_id;

        $response = $this->getRequest($endpoint);

        return $response;

    }

    public function retrieveFileContent($file_id)
    {

        $endpoint = $this->end_point . $this->service. '/' . $file_id . '/content';

        $response = $this->getRequest($endpoint);

        return $response;

    }

    public function uploadFile()
    {
        $data = $this->getArgs();

        $response = $this->postRequest($data);

        return $response;
    }

    public function deleteFile($file_id)
    {
        $endpoint = $this->end_point . $this->service . '/' . $file_id;
        $response = $this->deleteRequest($endpoint);

        return $response;
    }
}
