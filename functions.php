<?php

// Add theme support for optional Wordpress features
function ginandtonic_setup() {
	add_theme_support( 'menus' );
	add_theme_support( 'widgets' );
	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'ginandtonic_setup' );

// Add theme scripts
function ginandtonic_scripts() {
	wp_enqueue_style( 'default-css', get_stylesheet_uri() );
	wp_enqueue_style( 'vendor-css', get_template_directory_uri() . '/css/vendor.css' );
	wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/css/theme.css' );

	wp_enqueue_script( 'vendor-js', get_template_directory_uri() . '/js/vendor.js', array('jquery'), '', true );
	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true );
}

add_action( 'wp_enqueue_scripts', 'ginandtonic_scripts' );

// Add Woo Commerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Include custom widgets
require_once dirname( __FILE__ ) . '/inc/widgets.php';

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

// Define custom excerpt length
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Add waypoints class to excerpt container
function add_excerpt_class( $excerpt ) {
  $excerpt = str_replace( "<p", "<p class=\"waypoint waypoint-bottom-to-top\"", $excerpt );
  return $excerpt;
}
add_filter( "the_excerpt", "add_excerpt_class" );

// Define custom image sizes
add_image_size( 'post-listing', 768, 476, true );
add_image_size( 'full-hd', 1920, 1080, true );
add_image_size( 'preview', 768, 276, true );
add_image_size( 'nav-logo', 120, 60, false );

// // Remove tickets from default list products
// add_action( 'pre_get_posts', 'custom_pre_get_posts' );
//
// function custom_pre_get_posts( $q ) {
//     if ( ! $q->is_main_query() ) return;
//     if ( ! $q->is_post_type_archive() ) return;
//
//     if ( ! is_admin() && is_shop() ) {
//         $q->set( 'tax_query', array(array(
//             'taxonomy' => 'product_cat',
//             'field' => 'slug',
//             'terms' => array( 'tickets'), // Don't display products in the private-clients category on the shop page
//             'operator' => 'NOT IN'
//         )));
//     }
//     remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
// }

// Include Composer PHP dependencies
require_once dirname( __FILE__ ) . '/inc/vendor/autoload.php';

function clean_up_admin_menu() {
    remove_menu_page( 'tools.php' );
		// remove_menu_page( 'plugins.php' );
		// remove_menu_page( 'options-general.php' );
}
add_action( 'admin_menu', 'clean_up_admin_menu' );
