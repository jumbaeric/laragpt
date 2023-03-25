<?php

namespace Jumbaeric\Laragpt;

use Jumbaeric\Laragpt\OpenAI\Audio;
use Jumbaeric\Laragpt\OpenAI\Images;
use Jumbaeric\Laragpt\OpenAI\Chat;
use Jumbaeric\Laragpt\OpenAI\Completion;
use Jumbaeric\Laragpt\OpenAI\Edits;
use Jumbaeric\Laragpt\OpenAI\Models;

class Laragpt
{
    public static function complete($prompt)
    {
        $completion = new Completion();
        return $completion->complete($prompt);
    }

    // @param string $type : transcript, translation
    public static function audio($audioFilePath, $prompt, $type = 'transcript')
    {
        $audio = new Audio();
        if ($type == 'transcript') {
            return $audio->createTranscript($audioFilePath, $prompt);
        }

        return $audio->createTranslation($audioFilePath, $prompt);
    }

    public static function chat($role, $message)
    {
        $chat = new Chat();
        $chat->setMessage($role, $message);
        return $chat->create();
    }

    public static function edits($instructions, $input = null)
    {
        $edits = new Edits();
        if (null !== $input) {
            $edits->input = $input;
        }
        return $edits->create($instructions);
    }

    // @param string $type : create, edit, variations
    public static function images($prompt, $size = '1024x1024', $type = 'create', $n = 1, $mask)
    {
        $images = new Images();
        if ($type == 'create'){
            return $images->create($prompt, $size);
        }

        if ($type == 'edit'){
            return $images->createEdit($prompt, $size, $mask);
        }

        return $images->createVariations($prompt, $size, $n);
    }

    public static function models($model = null)
    {
        $models = new Models();
        if (null == $model) {
            return $models->list();
        }
        return $models->retrieve($model);
    }
}
