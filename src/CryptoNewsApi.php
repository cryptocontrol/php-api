<?php

namespace CryptoControl;


class CryptoNewsApi {
    function __construct($apikey) {
        $this->apikey = $apikey;
        $this->enableSentiment = false;
    }


    private function _fetch ($url) {
        // Get cURL resource
        $curl = curl_init();
        $enableSentiment = $this->enableSentiment ? 'true' : 'false';

        // Set some options - we are passing in a useragent too here
        $headers = array("x-api-key: " . $this->apikey);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_URL => "https://cryptocontrol.io/api/v1/public$url&sentiment=$enableSentiment",
            CURLOPT_USERAGENT => "CryptoControl PHP client v2.3.0",
          ));

        // Send the request & save response to $resp
        $response = json_decode(curl_exec($curl));

        // Close request to clear up some resources
        curl_close($curl);

        return $response;

    }


    /**
     * Enable the sentiment datapoints
     */
    public function enableSentiment(){
       $this->enableSentiment = true;
    }


    /**
     * Get the top news from the CryptoControl API. Returns a JSON array of articles
     */
    public function getTopNews($language = "en", $page = 0) {
        return $this->_fetch("/news?language=$language&page=$page");
    }


    /**
     * Get the latest news from the CryptoControl API. Returns a JSON array of articles
     */
    public function getLatestNews($language = "en", $page = 0) {
        return $this->_fetch("/news?latest=true&language=$language&page=$page");
    }


    /**
     * Get news articles grouped by category from the CryptoControl News API. Returns a JSON
     * object where each key reperesents a category and contains an array of articles.
     */
    public function getTopNewsByCategory($language = "en", $page = 0) {
        return $this->_fetch("/news/category?language=$language&page=$page");
    }


    /**
     * Get the top news articles for a specific coin from the CryptoControl API.
     * Returns a JSON array of articles
     */
    public function getTopNewsByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/news/coin/$coin?language=$language&page=$page");
    }


    /**
     * Get the latest news articles for a specific coin from the CryptoControl News API.
     * Returns a JSON array of articles
     */
    public function getLatestNewsByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/news/coin/$coin?latest=true&language=$language&page=$page");
    }


    /**
     * Get news articles grouped by category for a specific coin from the CryptoControl News API. Returns a JSON
     * object where each key reperesents a category and contains an array of articles.
     */
    public function getTopNewsByCoinCategory($coin, $language = "en", $page = 0) {
        return $this->_fetch("/news/coin/$coin/category?language=$language&page=$page");
    }


    /**
     * Get top reddit posts for a given coin
     */
    public function getTopRedditPostsByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/reddit/coin/$coin?language=$language&page=$page");
    }


    /**
     * Get latest posts for a given coin
     */
    public function getLatestRedditPostsByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/reddit/coin/$coin?latest=true&language=$language&page=$page");
    }


    /**
     * Get top tweets for a given coin
     */
    public function getTopTweetsByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/tweets/coin/$coin?language=$language&page=$page");
    }


    /**
     * Get latest tweets for a given coin
     */
    public function getLatestTweetsByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/tweets/coin/$coin?latest=true&language=$language&page=$page");
    }


    /**
     * Get top feed (combined reddit/articles/tweets) for a given coin
     */
    public function getTopFeedByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/feed/coin/$coin?language=$language&page=$page");
    }


    /**
     * Get latest feed (combined reddit/articles/tweets) for a given coin
     */
    public function getLatestFeedByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/feed/coin/$coin?latest=true&language=$language&page=$page");
    }


    /**
     * Get top reddit/articles/tweets (seperated) for a given coin
     */
    public function getTopItemsByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/all/coin/$coin?language=$language&page=$page");
    }


    /**
     * Get latest reddit/articles/tweets (seperated) for a given coin
     */
    public function getLatestItemsByCoin($coin, $language = "en", $page = 0) {
        return $this->_fetch("/all/coin/$coin?latest=true&language=$language&page=$page");
    }


    /**
     * Get all details about a single coin. (Wallets, links, blockexplorers, subreddits etc)
     */
    public function getCoinDetails($coin) {
        return $this->_fetch("/details/coin/$coin?test");
    }
}
