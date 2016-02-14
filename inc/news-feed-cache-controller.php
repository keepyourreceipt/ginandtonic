<?php

date_default_timezone_set("America/New_York");
if ( file_exists( dirname(__FILE__) . '/news-feed.php' ) ) {
  $cache_file_uri = dirname(__FILE__) . '/news-feed.php';
  $cache_file_exists = true;
  $cache_modified = date ("F d Y H:i:s", filemtime($cache_file_uri));
  $cache_expires = date( "F d Y H:i:s", strtotime($cache_modified . "+30 Minutes"));
  $cache_access_time = date( "F d Y H:i:s" );

  if( strtotime( $cache_access_time ) > strtotime( $cache_expires ) ) {
    require_once dirname(__FILE__) . '/build-news-feed.php';
  } else {
  }

} else {
    require_once dirname(__FILE__) . '/build-news-feed.php';
}

?>
