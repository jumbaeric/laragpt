<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Embeddings extends OpenAI
{
    public string $service = 'embeddings';
    public string $model = "text-embedding-ada-002";
    public string $input;

    public function __construct(array $args){
        parent::__construct($args);
        $this->end_point = $this->end_point_url . $this->service;

    }

    public function setInput($input)
    {
        $this->input = $input;
    }

    // reference: https://platform.openai.com/docs/api-reference/edits/create
    public function create()
    {

        $data = $this->getArgs();

        $response = $this->postRequest($data);

        return $response;
    }
}
