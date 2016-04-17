<?php

get_header();
get_template_part( 'template', 'parts/page-headers/posts-page' );

  $posts_page = get_option( 'page_for_posts' );
  if( get_field( 'news_feed_settings', $posts_page ) == "social" ) {
    require_once dirname(__FILE__) . '/inc/news-feed/news-feed-view.php';
  } else {
    get_template_part( 'template', 'parts/news-feed/default-layout' );
  }

get_footer();

?>
