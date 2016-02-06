<?php
// Get facebook posts
$fb = new Facebook\Facebook([
  'app_id' => FACEBOOK_APP_ID,
  'app_secret' => FACEBOOK_APP_SECRET,
  'default_graph_version' => 'v2.2',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('CocaColaUnitedStates?fields=id,posts', FACEBOOK_APP_ACCESS_TOKEN );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

// Get twitter posts
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

foreach( $twitter_posts_array as $tweet ) {
  // $post_date = ['created_at'];
  // $standard_date_format = ( $orig_date_format ));
  // $tweet['created_at'] = $standard_date_format;
  // echo $tweet['created_at'] . "<br>";
}

$facebook_posts_array = json_decode( $response->getBody(), true );
$blog_posts_array = get_posts();

$news_feed_array = array_merge( $twitter_posts_array, $facebook_posts_array, $blog_posts_array );
// foreach( $news_feed_array as $feed ) {
// }
// var_dump( $news_feed_array );



?>
