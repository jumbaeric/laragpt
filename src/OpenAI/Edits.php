<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Edits extends OpenAI
{
    public string $service = 'edits';
    public string $model = "text-davinci-edit-001";
    public string $input;
    public string $instruction;

    public function __construct(array $args){
        parent::__construct($args);
        $this->end_point = $this->end_point_url . $this->service;

    }

    public function setInput($input)
    {
        $this->input = $input;
    }

    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;
    }

    // reference: https://platform.openai.com/docs/api-reference/edits/create
    public function create()
    {

        $data = $this->getArgs();

        $response = $this->postRequest($data);

        return $response;
    }
}
