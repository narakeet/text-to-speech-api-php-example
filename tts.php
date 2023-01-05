<?php

$apikey = getenv('NARAKEET_API_KEY');
$text = 'Hi there from PHP';
$voice = 'brian';

$url = "https://api.narakeet.com/text-to-speech/mp3?voice=$voice";

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
    CURLOPT_FILE => fopen('output.mp3', 'w'),
];

$curl = curl_init();
curl_setopt_array($curl, $options);
curl_exec($curl);
curl_close($curl);

?>
