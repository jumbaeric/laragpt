Laravel implementation of chatgpt, includes models listing and retrieving, completions prediction, chat completion from conversation, edits, images creation, image edit, image variations, audio translation and transcription.


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
$prompt = "Say this is a test"; //
Laragpt::complete($prompt);

// Chat
// Given a chat conversation, the model will return a chat completion response.

$role = "user";
$message = "How does chatgpt work";
Laragpt::chat($role, $message);

// Audio
// trascribe: Transcribes audio into the input language.
// translate: Translates audio into into English.

$audioFilePath = "audio.mp3";
$type = "transcript"; // string: Required : value can be transcript or translation
$prompt = ""; // An optional text to guide the model's style or continue a previous audio segment. The prompt should match the audio language.
Laragpt::audio($audioFilePath, $prompt, $type);

// Edits
// Given a prompt and an instruction, the model will return an edited version of the prompt.
$instructions = "Fix the spelling mistakes"; // string : Required : The instruction that tells the model how to edit the prompt.
$input = "What day of the wek is it?"; // string : Optional : Defaults to '' The input text to use as a starting point for the edit.
Laragpt::edits($instructions, $input);

// Images
$prompt = "A cute baby sea otter"; // string : Required : A text description of the desired image(s). The maximum length is 1000 characters.
$size = "1024x1024"; // string : Optional : Defaults to 1024x1024 : The size of the generated images. Must be one of 256x256, 512x512, or 1024x1024.
$type = "create"; // string : Required : value can be create, edit, variations
$n = 1; // int : Optional: The number of images to generate. Must be between 1 and 10.
$mask = ""; // string : Optional : An additional image whose fully transparent areas (e.g. where alpha is zero) indicate where image should be edited. Must be a valid PNG file, less than 4MB, and have the same dimensions as image.
Laragpt::images($prompt, $size, $type, $n, $mask);

// Models
$model = null; // String : Optional : Lists all models when value is null, model set returns the model details
Laragpt::models($model);


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

