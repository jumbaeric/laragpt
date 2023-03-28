<?php

namespace Jumbaeric\Laragpt\OpenAI;

final class Audio extends OpenAI
{
    public string $service = 'audio/transcriptions';
    public $model = "whisper-1";

    public function __construct($args){
        parent::__construct($args);
        $this->end_point = $this->end_point_url . $this->service;
    }

    public function createTranscript()
    {

        $data = $this->getArgs();

        return $this->postRequest($data);
    }

    public function createTranslation()
    {
        $this->service = 'audio/translations';
        $this->end_point = $this->end_point_url . $this->service;

        $data = $this->getArgs();

        return $this->postRequest($data);
    }
}
