<?php
$fb = new Facebook\Facebook([
  'app_id' => FACEBOOK_APP_ID,
  'app_secret' => FACEBOOK_APP_SECRET,
  'default_graph_version' => 'v2.2',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('littlefishcreative?fields=id,posts', FACEBOOK_APP_ACCESS_TOKEN );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$facebook_posts_array = json_decode( $response->getBody(), true );


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
  if( !empty($tweet['text']) && $tweet['text'] != NULL ) { ?>
    <div class="col-sm-4">
      <p><?php echo $tweet['text']; ?></p>
    </div>
  <?php }
}

foreach( $facebook_posts_array['posts']['data'] as $facebook_post ) {
  if( !empty( $facebook_post['message'] ) ) { ?>
    <div class="col-sm-4">
      <p><?php echo $facebook_post['message']; ?></p>
    </div>
  <?php }
}

// $social_cache_uri = 'wp-content/themes/ginandtonic/inc/social-api.cache';
// // $cache_file = fopen($social_cache_uri, 'w');
// // fwrite( $cache_file, print_r($facebook_posts_array, true) );
// // fclose( $cache_file );

// $social_cache_uri = 'wp-content/themes/ginandtonic/inc/social-api.cache';
// $cache_file = fopen($social_cache_uri, 'w');
// fwrite( $cache_file, print_r($twitter_posts_array, true) );
// fclose( $cache_file );


?>
