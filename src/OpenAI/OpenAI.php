<?php

namespace Jumbaeric\Laragpt\OpenAI;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class OpenAI
{
    private string $OPENAI_API_KEY;
    public ?string $organization;
    public string $end_point;
    public string $end_point_url;
    public string $service;

    public string $model;
    public string $prompt;
    public int $max_tokens;
    public float $temperature;
    public float $top_p;
    public bool $echo = false;
    public int $n;
    public bool $stream = false;
    public $logit_bias = null;
    public $logprobs = null;
    public $stop = null;
    public float $presence_penalty;
    public float $frequency_penalty;
    public ?string $user;
    public ?string $suffix;
    public string $file;
    public string $language;
    public string $response_format;

    public function __construct(array $args = [])
    {
        $this->OPENAI_API_KEY = config('laragpt.OPENAI_API_KEY');
        $this->end_point_url = config('laragpt.END_POINT') . '/' . config('laragpt.API_VERSION') . '/';

        if (count($args)) {
            foreach ($args as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function getApiKey()
    {
        return $this->OPENAI_API_KEY;
    }

    public function setApiKey($apikey)
    {
        $this->OPENAI_API_KEY = $apikey;
    }

    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function setPrompt($prompt)
    {
        $this->prompt = $prompt;
    }

    public function setMaxTokens($max_tokens)
    {
        $this->max_tokens = $max_tokens;
    }

    public function setN($n)
    {
        $this->n = $n;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setResponseFormat($response_format)
    {
        $this->response_format = $response_format;
    }

    public function getArgs()
    {
        $data = get_object_vars($this);

        $data = array_filter($data, fn ($var) => ($var !== NULL && $var !== FALSE && $var !== ""));

        Arr::forget($data, ['end_point', 'service', 'OPENAI_API_KEY', 'end_point_url']);

        return $data;
    }

    public function getRequest(string $endpoint)
    {
        $response = Http::withToken($this->getApiKey())->get($endpoint);

        if ($response->ok()) {
            return $response->json();
        }
        return (array) $response->throw();
    }

    public function postRequest(array $data)
    {
        $response = Http::withToken($this->getApiKey())->post($this->end_point, $data);

        if ($response->ok()) {
            return $response->json();
        }

        return (array) $response->throw();
    }

    public function deleteRequest(string $endpoint)
    {
        $response = Http::withToken($this->getApiKey())->delete($endpoint);

        if ($response->ok()) {
            return $response->json();
        }
        return (array) $response->throw();
    }
}
