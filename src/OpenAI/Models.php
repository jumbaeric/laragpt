<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Models extends OpenAI
{
    public string $service = 'models';

    // reference: https://platform.openai.com/docs/api-reference/models/list
    public function list()
    {

        $endpoint = $this->end_point . $this->service;

        $response = $this->getRequest($endpoint);

        return $response;

    }

    // reference: https://platform.openai.com/docs/api-reference/models/retrieve
    public function retrieve($model)
    {

        $endpoint = $this->end_point . $this->service. '/' . $model;

        $response = $this->getRequest($endpoint);

        return $response;

    }
}
