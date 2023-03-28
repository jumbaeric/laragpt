<?php

namespace Jumbaeric\Laragpt\OpenAI;


final class Completion extends OpenAI
{
    public string $model = 'text-davinci-003';
    public string $service = 'completions';

    public function __construct(array $args = null)
    {
        parent::__construct($args);
        $this->end_point = $this->end_point_url . $this->service;
    }

    public function complete()
    {

        $data = $this->getArgs();
        return $this->postRequest($data);
    }
    // reference: https://platform.openai.com/docs/api-reference/completions/create

}
