CryptoControl - PHP Crypto News API
=========================

Official PHP client for the [CryptoControl.io](https://cryptocontrol.io) API. The CryptoControl PHP client lets developers access rich formatted articles from cryptonews sources from all around the world.

## Installation
```sh
composer require cryptocontrol/crypto-news-api
```

## Usage
First make sure that you've recieved an API key by visiting [https://cryptocontrol.io/apis](https://cryptocontrol.io/apis). With the API key you can write the following code.


```php

$api = new CryptoControl\CryptoNewsApi("API_KEY_HERE");

# get top news
print_r($api->getTopNews());

# get latest russian news
print_r($api->getLatestNews("ru"));

# get top bitcoin news
print_r($api->getTopNewsByCoin("bitcoin"));

# get top EOS tweets
print_r($api->getTopTweetsByCoin("eos"));

# get top Ripple reddit posts
print_r($api->getLatestRedditPostsByCoin("ripple"));

# get reddit/tweets/articles in a single combined feed for NEO
print_r($api->getTopFeedByCoin("neo"));

# get latest reddit/tweets/articles (seperated) for Litecoin
print_r($api->getLatestItemsByCoin("litecoin"));

# get details (subreddits, twitter handles, description, links) for ethereum
print_r($api->getCoinDetails("ethereum"));

```

## Available Functions

- **getTopNews(lang?: enum)** Get the top news articles.
- **getLatestNews(lang?: enum)** Get the latest news articles.
- **getTopNewsByCategory(lang?: enum)** Get news articles grouped by category.
- **getTopNewsByCoin(coin: String, lang?: enum)** Get the top news articles for a specific coin from the CryptoControl API.
- **getLatestNewsByCoin(coin: String, lang?: enum)** Get the latest news articles for a specific coin.
- **getTopNewsByCoinCategory(coin: String, lang?: enum)** Get news articles grouped by category for a specific coin.
- **getTopRedditPostsByCoin(coin: String, lang?: enum)** Get top reddit posts for a particular coin
- **getLatestRedditPostsByCoin(coin: String, lang?: enum)** Get latest reddit posts for a particular coin
- **getTopTweetsByCoin(coin: String, lang?: enum)** Get top tweets for a particular coin
- **getLatestTweetsByCoin(coin: String, lang?: enum)** Get latest tweets for a particular coin
- **getTopFeedByCoin(coin: String, lang?: enum)** Get a combined feed (reddit/tweets/articles) for a particular coin (sorted by time)
- **getLatestFeedByCoin(coin: String, lang?: enum)** Get a combined feed (reddit/tweets/articles) for a particular coin (sorted by relevance)
- **getCoinDetails(coin: String)** Get all details about a particular coin (links, description, subreddits, twitter etc..)

`lang` allows developers to choose which language they'd like to get the feed. Currently CryptoControl supports English ('en') and Russian ('ru') article feeds.

The coin slugs are the coin id's used from the CoinMarketCap api. You can see the full list of coins here: [https://api.coinmarketcap.com/v1/ticker/?limit=2000](https://api.coinmarketcap.com/v1/ticker/?limit=2000)

## Sample Response from the API
```javascript
[
    {
        "publishedAt": "2018-05-23T06:30:51.000Z",
        "hotness": 70698.68569444444,
        "activityHotness": 1.6,
        "primaryCategory": "General",
        "words": 302,
        "similarArticles": [
            {
                "publishedAt": "2018-05-23T03:00:05.000Z",
                "_id": "5b04de8d18f173000f9a6d72",
                "title": "PayPal: We’ll ‘Definitely Support’ Bitcoin If It Becomes ‘Better Currency’",
                "url": "https://cryptocontrol.io/r/api/article/5b04de8d18f173000f9a6d72?ref=5ac11440ec0af7be35528459"
            }
        ],
        "coins": [
            {
                "_id": "59cb59e81c073f09e76f614b",
                "name": "Bitcoin",
                "slug": "bitcoin",
                "tradingSymbol": "btc"
            }
        ],
        "_id": "5b07ea76214428000f55a513",
        "description": "Welcome to Crypto Daily™ News, this news piece \"Ripple XRP And Bitcoin Cash Now Live On Revolut\" is breaking news from the Crypto sector.",
        "title": "Ripple XRP And Bitcoin Cash Now Live On Revolut - Crypto Daily™",
        "url": "https://cryptocontrol.io/r/api/article/5b07ea76214428000f55a513?ref=5ac11440ec0af7be35528459",
        "thumbnail": "https://cryptocontrol.io/r/thumbnail/5b07ea76214428000f55a513?ref=5ac11440ec0af7be35528459",
        "originalImageUrl": "https://cryptodaily.co.uk/wp-content/uploads/2018/05/ripple-bitcoincash-credit.jpg"
    }
]
```