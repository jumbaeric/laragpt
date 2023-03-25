<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Edits extends OpenAI
{
    public string $service = 'edits';
    public string $model = "text-davinci-edit-001";
    public string $input;
    public string $instruction;

    public function setInput($input)
    {
        $this->input = $input;
    }

    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;
    }

    // reference: https://platform.openai.com/docs/api-reference/edits/create
    public function create(string $instruction)
    {
        if (!isset($instruction) && !isset($this->instruction)) {
            return array([
                'error' => 'Instruction is required,'
            ]);
        }

        $endpoint = $this->end_point . $this->service;

        $data =
            [
                'model' => $this->model,
                'input' => $this->input,
                'instruction' => $instruction ??= $this->instruction,
                'temperature' => $this->temperature,
                'top_p' => $this->top_p,
            ];

        $response = $this->postRequest($endpoint, $data);

        return $response;
    }
}
