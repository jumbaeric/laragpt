Get the power of OpenAI's APIs with laragpt.

Laragpt is the perfect package for developers wanting to access the powerful Artificial Intelligence capabilities of OpenAI through an easy to use Laravel interface. With laragpt you can quickly get up and running with OpenAI’s powerful deep learning algorithms, natural language processing, and machine learning capabilities, allowing for the development of innovative and complex applications. By taking advantage of the OpenAI API and Laravel’s simple interfaces, laragpt makes it easy to integrate AI into your projects. Give your apps the intelligence of OpenAI with laragpt.


## Installation

You can install the package via composer:

```bash
composer require jumbaeric/laragpt
```
publish config file
```bash
php artisan vendor:publish
```
and select laragpt package to publish.

Add openai api key to your env variable 
```bash
OPENAI_API_KEY=
```

## Usage
All methods return Array

```php

use Jumbaeric\Laragpt\Laragpt;

// Complete
// Given a prompt, the model will return one or more predicted completions, and can also return the probabilities of alternative tokens at each position.
    $args = [
        'prompt' => 'Brainstorm some ideas combining VR and fitness', //required
        'model' => 'text-davinci-003',  //  required
    ];

    Laragpt::complete($args);

// Chat
// Given a chat conversation, the model will return a chat completion response.

Laragpt::chat([
        'model' => 'gpt-3.5-turbo', // required
        'messages' => [             // required
            [
                "role" => "system",
                "content" => "You are a helpful assistant."
            ],
            [
                "role" => "user",
                "content" => "Who won the world series in 2020?"
            ],
            [
                "role" => "assistant",
                "content" => "The Los Angeles Dodgers won the World Series in 2020."
            ],
            [
                "role" => "user",
                "content" => "Where was it played?"
            ],
        ],
        'temperature' => 1.0,   //  optional
        'max_tokens' => 4000,   //  optional
        'frequency_penalty' => 0,   //  optional
        'presence_penalty' => 0,    //  optional
    ]);

// Audio
// trascribe: Transcribes audio into the input language.
// translate: Translates audio into into English.

$type = "transcript"; // string: Required : value can be transcript or translation
Laragpt::audio([
            'model' => 'whisper-1',     //  required
            'file' => "audio.mp3",      //  required
            'prompt' => "",             //  optional
            'response_format' => '',    //  optional
            'temperature' => '',        //  optional
        ], $type);

// Edits
// Given a prompt and an instruction, the model will return an edited version of the prompt.
Laragpt::edits([
        'model' => 'text-davinci-edit-001', // required
        'input' => 'What day of the wek is it?',
        'instruction' => 'Fix the spelling mistakes',   //  required
        'n' => 1,   //  optional
        'temperature' => 1,   //  optional
        'top_p' => 1,    //  optional
    ]);

// Images
    $createArr = [ // $type = create
        'prompt' => 'A cute baby sea otter',
        'size' => '1024x1024',   //  required
        'n' => 1,   //  optional
    ] ;

    $ceateEditArr = [ // $type = createEdit
        'prompt' => 'A cute baby sea otter wearing a beret',    // required
        'image' => '@otter.png',                                //required
        'mask' => '@mask.png',
        'n' => 1,
        'size' => '1024x1024',
    ];

    $createVariationArr = [ // $type = variations
        'image' => '@otter.png',
        'n' => 2,
        'size' => '1024x1024',
    ];
    
    Laragpt::images($createArr, $type = 'create');

// Models
$model_id = null; // String : Optional : Lists all models when value is null, model set returns the model details
Laragpt::models($model_id);


```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jumbaeric@gmail.com instead of using the issue tracker.

## Credits

-   [Eric Jumba](https://github.com/jumbaeric)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

