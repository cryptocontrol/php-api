<?php

namespace CryptoControl;


class CryptoNewsApi {
    function __construct($apikey) {
        $this->apikey = $apikey;
    }


    private function _fetch ($url) {
        // Get cURL resource
        $curl = curl_init();

        // Set some options - we are passing in a useragent too here
        $headers = array("x-api-key: " . $this->apikey);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_URL => "https://cryptocontrol.io/api/v1/public$url",
            CURLOPT_USERAGENT => "CryptoControl PHP client v2.2.0",
        ));

        // Send the request & save response to $resp
        $response =  json_decode(curl_exec($curl));

        // Close request to clear up some resources
        curl_close($curl);

        return $response;
    }


    /**
     * Get the top news from the CryptoControl API. Returns a JSON array of articles
     */
    public function getTopNews($language = "en") {
        return $this->_fetch("/news?language=$language");
    }


    /**
     * Get the latest news from the CryptoControl API. Returns a JSON array of articles
     */
    public function getLatestNews($language = "en") {
        return $this->_fetch("/news?latest=true&language=$language");
    }


    /**
     * Get news articles grouped by category from the CryptoControl News API. Returns a JSON
     * object where each key reperesents a category and contains an array of articles.
     */
    public function getTopNewsByCategory($language = "en") {
        return $this->_fetch("/news/category?language=$language");
    }


    /**
     * Get the top news articles for a specific coin from the CryptoControl API.
     * Returns a JSON array of articles
     */
    public function getTopNewsByCoin($coin, $language = "en") {
        return $this->_fetch("/news/coin/$coin?language=$language");
    }


    /**
     * Get the latest news articles for a specific coin from the CryptoControl News API.
     * Returns a JSON array of articles
     */
    public function getLatestNewsByCoin($coin, $language = "en") {
        return $this->_fetch("/news/coin/$coin?latest=true&language=$language");
    }


    /**
     * Get news articles grouped by category for a specific coin from the CryptoControl News API. Returns a JSON
     * object where each key reperesents a category and contains an array of articles.
     */
    public function getTopNewsByCoinCategory($coin, $language = "en") {
        return $this->_fetch("/news/coin/$coin/category?language=$language");
    }
}