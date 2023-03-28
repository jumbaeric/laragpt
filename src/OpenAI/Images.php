<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Images extends OpenAI
{
    public string $service = 'images/generations';
    public string $size = "1024x1024";
    public string $response_format;
    public string $image;
    public ?string $mask;

    public function __construct(array $args){
        parent::__construct($args);
        $this->end_point = $this->end_point_url . $this->service;

    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setResponseFormat($response_format)
    {
        $this->response_format = $response_format;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setMask($mask)
    {
        $this->mask = $mask;
    }

    // reference: https://platform.openai.com/docs/api-reference/images/create
    public function create()
    {

        $data = $this->getArgs();

        $response = $this->postRequest($data);

        return $response;
    }

    // reference: https://platform.openai.com/docs/api-reference/images/create-edit
    public function createEdit()
    {
        $this->service = 'images/edits';

        $data = $this->getArgs();

        return $this->postRequest($data);

    }

    // reference: https://platform.openai.com/docs/api-reference/images/create-variation
    public function createVariations()
    {
        $this->service = 'images/variations';

        $data = $this->getArgs();

        $response = $this->postRequest($data);

        return $response;
    }
}
