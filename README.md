# Narakeet Text to Speech Streaming API example in `PHP`

This repository provides a quick example demonstrating how to access the Narakeet [streaming Text to Speech API](https://www.narakeet.com/docs/automating/text-to-speech-api/) from PHP.

The example sends a request to generate audio from text and saves it to output.mp3 in the local directory.

## Prerequisites

This example works with PHP 7.4 and later. You can run it inside Docker (then it does not require a local PHP installation), or on a system with a PHP 7.4 or later.

## Running the example

1. set and export a local environment variable called `NARAKEET_API_KEY`, containing your API key, or alternatively edit [tts.php](tts.php) and add your API key on line 3. 
2. Optionally modify the voice and text parameters on lines 4 and 5, which control the text to speech synthesis voice and the text sent to the API for synthesis.
2. To run inside docker, execute `make run`
3. Or to run outside docker, on a system with `php` command line, execute `php tts.php`

## Getting the audio duration from response headers

The streaming API provides a response header `x-duration-seconds` with the generated audio duration, **rounded up to the nearest second**. An example how to read this header is in [tts-extract-duration.php](tts-extract-duration.php). You can run this example with docker using `make run-with-duration`, or with `php` using `php tts-extract-duration.php`.

## More information

Check out <https://www.narakeet.com/docs/automating/text-to-speech-api/> for more information on the Narakeet Text to Speech API
