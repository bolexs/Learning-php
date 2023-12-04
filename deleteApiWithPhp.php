<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

$url = 'https://kvstore.p.rapidapi.com/collections';

$collection_name = 'BolexCollection';

$request_url = $url . '/' . $collection_name;

$curl = curl_init($request_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-RapidAPI-Host: kvstore.p.rapidapi.com',
    'X-RapidAPI-Key:' .$_ENV["RAPIDAPI_KEY"],
    'Content-Type: application/json'
]);

$response = curl_exec($curl);

curl_close($curl);

echo $response . "\n";
