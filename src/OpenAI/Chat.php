<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Chat extends OpenAI
{
    public string $service = 'chat/completions';
    public string $model = 'gpt-3.5-turbo';
    public $stop = "\n";
    public array $messages;

    public function __construct($args){
        parent::__construct($args);

        $this->end_point = $this->end_point_url . $this->service;

    }

    public function setMessage(string $role, string $message): void
    {
        $this->messages = [
            'role' => $role,
            'content' => $message
        ];
    }

    public function create()
    {
        $data = $this->getArgs();

        return $this->postRequest($data);

    }
}
