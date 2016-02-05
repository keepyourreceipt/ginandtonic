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

$social_cache_uri = 'wp-content/themes/ginandtonic/inc/social-api.cache';
$cache_file = fopen($social_cache_uri, 'w');
fwrite( $cache_file, print_r($facebook_posts_array, true) );
fclose( $cache_file );


?>
