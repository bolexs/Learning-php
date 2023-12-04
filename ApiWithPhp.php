<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();


// kvstore api url using to learn api 
$url = 'https://kvstore.p.rapidapi.com/collections';

// Collection object

$data = [
    'collection' => 'BolexCollection'
];


// Initialize a new cURL session

$curl = curl_init($url);

// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);

// Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

// Set custom headers for RapidAPI Auth and Content-Type header

curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'X-RapidAPI-Host: kvstore.p.rapidapi.com',
    'X-RapidAPI-Key:' .$_ENV["RAPIDAPI_KEY"],
    'Content-Type: application/json'
]);

// Execute curl request with all previous settings

$response = curl_exec($curl);

// Close curl session
curl_close($curl);

echo $response . PHP_EOL;