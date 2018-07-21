<?php

include './src/CryptoNewsApi.php';

$api = new CryptoControl\CryptoNewsApi(getenv("CC_NEWS_API_KEY"));
$response = $api->getTopNews();

var_dump($response);