<?php

$cache_file_uri = dirname(__FILE__) . '/news-feed.php';
$cache_expires = date("F j, Y, H:i", strtotime('+1 hour'));
if ( file_exists( dirname(__FILE__) . '/news-feed.php' ) ) {
  $cache_file_exists = true;
  $cache_modified = date ("F d Y H:i:s.", filemtime($cache_file_uri));

  if( $cache_modified > $cache_expires ) {

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
      if( !empty( $facebook_post['message'] ) ) {
        $content = $facebook_post['message'];
      }
      if( str_word_count( $content ) >= 20 ) {
          $excerpt = preg_replace('/((\w+\W*){20}(\w+))(.*)/', '${1}', $content) . "...";
      } else {
        $excerpt = preg_replace('/((\w+\W*){20}(\w+))(.*)/', '${1}', $content);
      }
      $id_array = explode( "_", $facebook_post["id"] );

      $post_id = $facebook_post['id'];
      try {
        $photos_response = $fb->get( $post_id . '?fields=attachments', FACEBOOK_APP_ACCESS_TOKEN );
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      $facebook_photo = json_decode( $photos_response->getBody(), true );
      if( !empty( $facebook_photo['attachments']['data'][0]['media']['image']['src'] ) ) {
        $photo_src = $facebook_photo['attachments']['data'][0]['media']['image']['src'];
      }
      $id = $facebook_post['id'];

        if( $facebook_post['id'] == $id ) {
          $news_feed_item = array(
            "id" => $facebook_post['id'],
            "content_type" => "facebook",
            "published" => $formatted_date,
            "content" => $excerpt,
            "link" => "http://www.facebook.com/" . $id_array[0] . "/posts/" . $id_array[1],
            "image_src" => $photo_src
          );
        } else {
          $news_feed_item = array(
            "id" => $facebook_post['id'],
            "content_type" => "facebook",
            "published" => $formatted_date,
            "content" => $excerpt,
            "link" => "http://www.facebook.com/" . $id_array[0] . "/posts/" . $id_array[1]
          );
      }

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
      $screen_name = $tweet['user']['screen_name'];

      $news_feed_item = array(
        "content_type" => "twitter",
        "published" => $formatted_date,
        "content" => $tweet['text'],
        "link" => "https://twitter.com/" . $screen_name . "/status/" . $tweet['id']
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
      $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $blog_post->ID ), 'large' );
      if( str_word_count( $content ) >= 20 ) {
          $excerpt = preg_replace('/((\w+\W*){20}(\w+))(.*)/', '${1}', $content) . "...";
      } else {
        $excerpt = preg_replace('/((\w+\W*){20}(\w+))(.*)/', '${1}', $content);
      }

      $news_feed_item = array(
        "content_type" => "post",
        "published" => $formatted_date,
        "title" => $blog_post->post_title,
        "content" => $excerpt,
        "link" => $blog_post->guid,
        "image_src" => $featured_image[0]
      );

      array_push( $news_feed, $news_feed_item );

    }

    // Sort news feeb items by date
    function sort_by_date($a, $b) {
        return $b['published'] - $a['published'];
    }
    usort($news_feed, 'sort_by_date');


    // Write cache file
    $cache_location = 'wp-content/themes/ginandtonic/inc/news-feed.php';
    file_put_contents( $cache_location, json_encode($news_feed) );
  }
}
