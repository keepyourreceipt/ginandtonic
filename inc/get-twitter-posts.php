<?php
$settings = array(
    'oauth_access_token' => "933645745-Bok2iZIAmFK85CPYjSHNPZFwRiWk8SKrqPVh3wFj",
    'oauth_access_token_secret' => TWITTER_SECRET,
    'consumer_key' => "pPdwfpxSMZ2URjZ7iNbKwrqPs",
    'consumer_secret' => "gk87CZhYJoMXT3Pb1cH1prDWxWBNVza9cVmKSBrGcJv6VLK69g"
);

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=keepyourreceipt';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$twitter_feed = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
$twitter_feed = json_decode( $twitter_feed );

?>
