<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Completion extends OpenAI
{
    public string $model = 'text-davinci-003';
    public $service = '/completions';
    public $stop = "\n";

    // reference: https://platform.openai.com/docs/api-reference/completions/create
    public function complete(string $prompt)
    {

        if (!isset($prompt) && !isset($this->prompt)) {
            return array([
                'error' => 'Prompt is required,'
            ]);
        }

        $endpoint = $this->end_point . $this->service;

        $data = array(
            [
                'model' => $this->model,
                'prompt' => $prompt ??= $this->prompt,
                'max_tokens' => $this->max_tokens,
                'temperature' => $this->temperature,
            ]
        );

        $response = $this->postRequest($endpoint, $data);

        return $response;

    }
}
