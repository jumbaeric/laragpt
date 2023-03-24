<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Chat extends OpenAI
{
    public string $service = 'chat/completions';
    public $model = 'gpt-3.5-turbo';
    public $stop = "\n";
    public array $messages;

    public function setMessage(string $role, string $message): void
    {
        $this->messages = [
            'role' => $role,
            'content' => $message
        ];
    }

    // reference: https://platform.openai.com/docs/api-reference/chat/create
    public function create()
    {

        $endpoint = $this->end_point . $this->service;

        $data = array(
            [
                'model' => $this->model,
                'messages' => $this->messages,
                'max_tokens' => $this->max_tokens,
                'temperature' => $this->temperature,
            ]
        );

        $response = $this->postRequest($endpoint, $data);

        return $response;
    }
}
