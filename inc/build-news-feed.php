<?php

$news_feed = array();

// Get facebook posts
$fb = new Facebook\Facebook([
  'app_id' => FACEBOOK_APP_ID,
  'app_secret' => FACEBOOK_APP_SECRET,
  'default_graph_version' => 'v2.2',
  ]);

try {
  $response = $fb->get('CocaColaUnitedStates?fields=id,posts,photos', FACEBOOK_APP_ACCESS_TOKEN );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$facebook_posts_array = json_decode( $response->getBody(), true );

// Add facebook posts to news feed
foreach( $facebook_posts_array['posts']['data'] as $facebook_post ) {
  $published_at = new DateTime( $facebook_post['created_time'] );
  $formatted_date = $published_at->format('U');
  $content = $facebook_post['message'];
  if( str_word_count( $content ) >= 20 ) {
      $excerpt = preg_replace('/((\w+\W*){20}(\w+))(.*)/', '${1}', $content) . "...";
  } else {
    $excerpt = preg_replace('/((\w+\W*){20}(\w+))(.*)/', '${1}', $content);
  }

  $news_feed_item = array(
    "content_type" => "facebook",
    "published" => $formatted_date,
    "content" => $excerpt
  );

  array_push( $news_feed, $news_feed_item );

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

// Add twitter posts to news feed
foreach( $twitter_posts_array as $tweet ) {
  $published_at = new DateTime( $tweet['created_at'] );
  $formatted_date = $published_at->format('U');

  $news_feed_item = array(
    "content_type" => "twitter",
    "published" => $formatted_date,
    "content" => $tweet['text']
  );

  array_push( $news_feed, $news_feed_item );

}

// Get blog posts
$blog_posts_array = get_posts();

// Add blog post content to news feed
foreach ($blog_posts_array as $blog_post) {
  $published_at = new DateTime( $blog_post->post_date );
  $formatted_date = $published_at->format('U');
  $content = $blog_post->post_content;
  if( str_word_count( $content ) >= 20 ) {
      $excerpt = preg_replace('/((\w+\W*){20}(\w+))(.*)/', '${1}', $content) . "...";
  } else {
    $excerpt = preg_replace('/((\w+\W*){20}(\w+))(.*)/', '${1}', $content);
  }

  $news_feed_item = array(
    "content_type" => "post",
    "published" => $formatted_date,
    "title" => $blog_post->post_title,
    "content" => $excerpt
  );
  array_push( $news_feed, $news_feed_item );
}

// Sort news feeb items by date
function sort_by_date($a, $b) {
    return $a['published'] - $b['published'];
}
usort($news_feed, 'sort_by_date');


// Write cache file
$cache_location = 'wp-content/themes/ginandtonic/inc/news-feed.php';
file_put_contents( $cache_location, json_encode($news_feed) );
