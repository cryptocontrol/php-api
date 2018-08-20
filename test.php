<?php

include './src/CryptoNewsApi.php';

$api = new CryptoControl\CryptoNewsApi(getenv("CC_NEWS_API_KEY"));

$api->enableSentiment();
// print_r($api->getTopNews());
// print_r($api->getLatestNews("ru"));
// print_r($api->getTopNewsByCoin("bitcoin"));
// print_r($api->getTopTweetsByCoin("eos"));
// print_r($api->getCoinDetails("ethereum"));
// print_r($api->getLatestRedditPostsByCoin("ripple"));
print_r($api->getLatestItemsByCoin("ripple"));
