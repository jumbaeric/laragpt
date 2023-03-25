<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Images extends OpenAI
{
    public string $service = 'images/generations';
    public string $size = "1024x1024";
    public string $response_format;
    public string $image;
    public ?string $mask;

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setResponseFormat($response_format)
    {
        $this->response_format = $response_format;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setMask($mask)
    {
        $this->mask = $mask;
    }

    // reference: https://platform.openai.com/docs/api-reference/images/create
    public function create(string $prompt, $size)
    {
        if (!isset($prompt) && !isset($this->prompt)) {
            return array([
                'error' => 'Prompt is required,'
            ]);
        }

        $endpoint = $this->end_point . $this->service;

        $data =
            [
                'prompt' => $promt ??= $this->prompt,
                'n' => $this->n,
                'size' => $size ??= $this->size,
                'response_format' => $this->response_format,
                'user' => $this->user,
            ];

        $response = $this->postRequest($endpoint, $data);

        return $response;
    }

    // reference: https://platform.openai.com/docs/api-reference/images/create-edit
    public function createEdit(string $image, string $prompt, $mask)
    {
        $this->service = 'images/edits';

        if (!isset($image) || !isset($this->image)) {
            return array([
                'error' => 'Image is required,'
            ]);
        }

        if (!isset($prompt) || !isset($this->prompt)) {
            return array([
                'error' => 'Prompt is required,'
            ]);
        }

        $endpoint = $this->end_point . $this->service;

        $data = array(
            [
                'prompt' => $prompt ??= $this->prompt,
                'image' => $image ??= $this->image,
                'mask' => $mask ??= $this->mask,
                'n' => $this->n,
                'size' => $this->size,
                'response_format' => $this->response_format,
                'user' => $this->user,
            ]
        );

        $response = $this->postRequest($endpoint, $data);

        return $response;
    }

    // reference: https://platform.openai.com/docs/api-reference/images/create-variation
    public function createVariations(string $image, string $size, int $n)
    {
        $this->service = 'images/variations';

        if (!isset($image) || !isset($this->image)) {
            return array([
                'error' => 'Image is required,'
            ]);
        }

        $endpoint = $this->end_point . $this->service;

        $data = array(
            [
                'prompt' => $this->prompt,
                'image' => $image ??= $this->image,
                'n' => $n ??= $this->n,
                'size' => $size ??= $this->size,
                'response_format' => $this->response_format,
                'user' => $this->user,
            ]
        );

        $response = $this->postRequest($endpoint, $data);

        return $response;
    }
}
