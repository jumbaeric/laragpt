<?php

namespace Jumbaeric\Laragpt\OpenAI;

use Illuminate\Support\Facades\Http;

class OpenAI
{
    private string $OPENAI_API_KEY;
    public ?string $organization;
    public string $end_point;
    public string $service;

    public string $model;
    public string $prompt;
    public int $max_tokens = 7;
    public float $temperature = 0;
    public float $top_p = 1;
    public bool $echo = false;
    public int $n = 1;
    public bool $stream = false;
    public $logit_bias = null;
    public $logprobs = null;
    public $stop = null;
    public float $presence_penalty;
    public float $frequency_penalty;
    public string $user;

    public function __construct()
    {
        $this->OPENAI_API_KEY = config('laragpt.OPENAI_API_KEY');
        $this->end_point = config('laragpt.END_POINT') . '/' . config('laragpt.API_VERSION') . '/';
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

    public function getRequest(string $endpoint)
    {
        $response = Http::withToken($this->getApiKey())->get($endpoint);

        if ($response->ok()) {
            return $response->body();
        }
        return (array) $response->throw();
    }

    public function postRequest(string $endpoint, array $data)
    {
        $response = Http::withToken($this->getApiKey())->post($endpoint, $data);

        if ($response->ok()) {
            return $response->body();
        }

        return (array) $response->throw();
    }
}
