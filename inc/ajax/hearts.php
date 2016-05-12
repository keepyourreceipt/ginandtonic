<?php

  // Enqueue ajax hearts script
  wp_enqueue_script( 'ajax-hearts', get_template_directory_uri() . '/inc/ajax/hearts.js', array('jquery') );

  // Localize the script since it's being called after jquery
  wp_localize_script( 'ajax-hearts', 'ajax_handler', array( 'url' => site_url('/wp-admin/admin-ajax.php') ) );

  // Add action to call the update_post_hearts function from JS
  // Support both logged in and logged out users
  add_action( 'wp_ajax_update_hearts', 'update_post_hearts' );
  add_action( 'ap_ajax_nopriv_update_hearts', 'update_post_hearts' );

  function update_post_hearts() {

    $url = wp_get_referer();
    $post_id = url_to_postid( $url );

    if( $post_id == 0 ) {
      $post_id = get_option('page_on_front');
    }

    $post_title = get_the_title( $post_id );
    $post_hearts = get_post_meta( $post_id, '_post_hearts', true );

    if( $post_hearts ) {
      update_post_meta( $post_id, '_post_hearts', $post_hearts + 1 );
    } else {
      add_post_meta( $post_id, '_post_hearts', 1, true );
    }

    echo get_post_meta( $post_id, '_post_hearts', true );

    die();
  }

 ?>
