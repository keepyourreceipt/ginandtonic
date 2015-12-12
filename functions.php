<?php

// Add theme support for optional Wordpress features
function ginandtonic_setup() {
	add_theme_support( 'menus' );
	add_theme_support( 'widgets' );
}
add_action( 'after_setup_theme', 'ginandtonic_setup' );

// Add theme scripts
function ginandtonic_scripts() {
	wp_enqueue_style( 'default-css', get_stylesheet_uri() );
  wp_enqueue_style( 'combined-css', get_template_directory_uri() . '/css/dist/combined.css' );

  wp_enqueue_script( 'combined-js', get_template_directory_uri() . '/js/dist/combined.js', array('jquery'), '', true );
}

add_action( 'wp_enqueue_scripts', 'ginandtonic_scripts' );

// Add Woo Commerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Create ACF options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Global Content',
		'menu_title'	=> 'Global Content',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-admin-site',
		'position' => 3
	));
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Shop Page',
		'menu_title'	=> 'Shop Page',
		'menu_slug' 	=> 'shop-page',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-products',
		'position' => 4
	));
}

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_image_size( 'post-listing', 768, 476, true );
add_image_size( 'full-hd', 1920, 1080, true );
add_image_size( 'preview', 768, 276, true );


function blog_sidebar_init() {

	register_sidebar( array(
		'name'          => 'Blog Sidebar',
		'id'            => 'blog_sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'blog_sidebar_init' );

add_action( 'pre_get_posts', 'custom_pre_get_posts' );

function custom_pre_get_posts( $q ) {
    if ( ! $q->is_main_query() ) return;
    if ( ! $q->is_post_type_archive() ) return;

    if ( ! is_admin() && is_shop() ) {
        $q->set( 'tax_query', array(array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array( 'tickets'), // Don't display products in the private-clients category on the shop page
            'operator' => 'NOT IN'
        )));
    }
    remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
}
