<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;

$baseUrl = 'http://localhost:8000';

function getOrder(string $baseUrl): string
{
    $apiKey = readline('provide your API key: ');
    $params = [
        'key' => $apiKey
    ];
    $client = new Client(['base_uri' => $baseUrl]);
    $jar = new CookieJar();
    $jar->setCookie(new SetCookie([
        'Name' => 'PHPSESSID',
        'Value' => session_id(),
        'Domain' => 'localhost',
        'Path' => '/',
        'Expires' => time() + 3600,
    ]));
    $tokenResponse = $client->post("/index.php?route=api/login", [
        'form_params' => $params,
        'cookies' => $jar,
    ]);

    $tokenResponseBody = json_decode($tokenResponse->getBody()->getContents());

    if (isset($tokenResponseBody->token)) {
        $token = $tokenResponseBody->token;
    } else {
        return "Login error\n";
    }

    $orderId = readline("provide order id: ");

    $response = $client->get("/index.php?route=api/order/info&token=$token&order_id=$orderId", [
        'cookies' => $jar,
    ]);

    $responseBody = json_decode($response->getBody()->getContents());

    if (isset($responseBody->order)) {
        return json_encode($responseBody->order, JSON_PRETTY_PRINT) . "\n";
    } else {
        return "Not available.";
    }
}

session_start();
session_write_close();

echo getOrder($baseUrl);








