<?php

namespace Jumbaeric\Laragpt;

use Error;
use Jumbaeric\Laragpt\OpenAI\Audio;
use Jumbaeric\Laragpt\OpenAI\Images;
use Jumbaeric\Laragpt\OpenAI\Chat;
use Jumbaeric\Laragpt\OpenAI\Completion;
use Jumbaeric\Laragpt\OpenAI\Edits;
use Jumbaeric\Laragpt\OpenAI\Models;

class Laragpt
{
    public static function complete($prompt, array $args = null)
    {
        $completion = new Completion($prompt, $args);
        return $completion->complete();
    }

    // @param string $type : transcript, translation
    public static function audio(array $args, $type = 'transcript')
    {
        $audio = new Audio($args);
        if ($type == 'transcript') {
            return $audio->createTranscript();
        }

        if ($type == 'translation') {
            return $audio->createTranslation();
        }
    }

    public static function chat(array $args)
    {
        $chat = new Chat($args);
        return $chat->create();
    }

    public static function edits(array $args)
    {
        $edits = new Edits($args);
        return $edits->create();
    }

    // @param string $type : create, edit, variations
    public static function images(array $args, string $type)
    {
        $images = new Images($args);
        if ($type == 'create') {
            return $images->create();
        }

        if ($type == 'edit') {
            return $images->createEdit();
        }

        if ($type == 'variations') {
            return $images->createVariations();
        }
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
