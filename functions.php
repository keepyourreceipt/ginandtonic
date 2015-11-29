<?php

function gin_and_tonic_scripts() {
	wp_enqueue_style( 'default-css', get_stylesheet_uri() );
  wp_enqueue_style( 'combined-css', get_template_directory_uri() . '/css/dist/combined.css' );

  // wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );
}

add_action( 'wp_enqueue_scripts', 'gin_and_tonic_scripts' );
