<?php

$apikey = getenv('NARAKEET_API_KEY');
$text = 'Hi there from PHP';
$voice = 'brian';

$url = "https://api.narakeet.com/text-to-speech/mp3?voice=$voice";

// optionally extract duration from a header
function process_header($curl, $header) {
    list($key, $value) = explode(': ', $header);
    if ($key == 'x-duration-seconds') {
      echo "Audio Duration is $value";
    }
    return strlen($header);
}

$options = [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $text,
    CURLOPT_HTTPHEADER => [
        'Accept: application/octet-stream',
        'Content-Type: text/plain',
        "x-api-key: $apikey",
    ],
    CURLOPT_HEADERFUNCTION => 'process_header',
    CURLOPT_FILE => fopen('output.mp3', 'w'),
];

$curl = curl_init();
curl_setopt_array($curl, $options);
curl_exec($curl);
curl_close($curl);

?>
