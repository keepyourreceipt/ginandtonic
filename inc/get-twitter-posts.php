<?php
$settings = array(
    'oauth_access_token' => TWITTER_OAUTH_ACCESS_TOKEN,
    'oauth_access_token_secret' => TWITTER_APP_SECRET,
    'consumer_key' => TWITTER_CONSUMER_KEY,
    'consumer_secret' => TWITTER_CONSUMER_SECRET
);

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=keepyourreceipt';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$twitter_feed = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

$twitter_posts_array = json_decode( $twitter_feed, true );

$social_cache_uri = 'wp-content/themes/ginandtonic/inc/social-api.cache';
$cache_file = fopen($social_cache_uri, 'w');
fwrite( $cache_file, print_r($twitter_posts_array, true) );
fclose( $cache_file );

?>
