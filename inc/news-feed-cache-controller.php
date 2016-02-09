<?php

$cache_expires = date("F j, Y, H:i", strtotime('+1 hour'));
if ( file_exists( dirname(__FILE__) . '/news-feed.php' ) ) {
  $cache_file_uri = dirname(__FILE__) . '/news-feed.php';
  $cache_file_exists = true;
  $cache_modified = date ("F d Y H:i:s.", filemtime($cache_file_uri));

  if( $cache_modified > $cache_expires ) {
    require_once dirname(__FILE__) . '/build-news-feed.php';
  }

} else {
    require_once dirname(__FILE__) . '/build-news-feed.php';
}

?>
