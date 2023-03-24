<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Audio extends OpenAI
{
    public string $service = 'audio/transcriptions';
    public $model = "whisper-1";
    public string $audioFilePath;
    public string $language;
    public string $response_format;

    public function setAudioFilePath($audioFilePath)
    {
        $this->audioFilePath = $audioFilePath;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setResponseFormat($response_format)
    {
        $this->response_format = $response_format;
    }

    // reference: https://platform.openai.com/docs/api-reference/audio/create
    public function createTranscript(string $audioFilePath, string $model, string $prompt)
    {
        if (!isset($audioFilePath) && !isset($this->audioFilePath)) {
            return array([
                'error' => 'audioFilePath is required,'
            ]);
        }

        if (!isset($model) && !isset($this->model)) {
            return array([
                'error' => 'Model is required,'
            ]);
        }

        $endpoint = $this->end_point . $this->service;

        $data = array(
            [
                'model' => $model ??= $this->model,
                'audioFilePath' => $audioFilePath ??= $this->audioFilePath,
                'prompt' => $prompt ??= $this->prompt,
                'model' => $this->model,
                'temperature' => $this->temperature,
                'language' => $this->language,
            ]
        );

        $response = $this->postRequest($endpoint, $data);

        return $response;

    }

    // reference: https://platform.openai.com/docs/api-reference/audio/create
    public function createTranslation(string $audioFilePath, string $model, string $prompt)
    {
        $this->service = 'audio/translations';

        if (!isset($audioFilePath) && !isset($this->audioFilePath)) {
            return array([
                'error' => 'audioFilePath is required,'
            ]);
        }

        if (!isset($model) && !isset($this->model)) {
            return array([
                'error' => 'Model is required,'
            ]);
        }

        $endpoint = $this->end_point . $this->service;

        $data = array(
            [
                'model' => $model ??= $this->model,
            'audioFilePath' => $audioFilePath ??= $this->audioFilePath,
            'prompt' => $prompt ??= $this->prompt,
            'model' => $this->model,
            'temperature' => $this->temperature,
            'response_format' => $this->response_format,
            ]
        );

        $response = $this->postRequest($endpoint, $data);

        return $response;

    }
}
