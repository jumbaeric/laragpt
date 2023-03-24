<?php

namespace Jumbaeric\Laragpt;

use Jumbaeric\Laragpt\OpenAI\Audio;
use Jumbaeric\Laragpt\OpenAI\Images;
use Jumbaeric\Laragpt\OpenAI\Chat;
use Jumbaeric\Laragpt\OpenAI\Completion;
use Jumbaeric\Laragpt\OpenAI\Edits;
use Jumbaeric\Laragpt\OpenAI\Models;
use Symfony\Component\Console\Command\CompleteCommand;

class Laragpt
{
    // Build your next great package.
    public function complete($prompt){
        $completion = new Completion();

        return $completion->complete($prompt);
    }
}
