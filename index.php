<?php

get_header();
get_template_part( 'template', 'parts/page-headers/posts-page' );

  $posts_page = get_option( 'page_for_posts' );
  if( get_field( 'news_feed_layout', $posts_page ) == "grid" ) {    
    get_template_part( 'template', 'parts/news-feed/grid-layout' );
  } else {
    get_template_part( 'template', 'parts/news-feed/default-layout' );
  }

get_footer();

?>
