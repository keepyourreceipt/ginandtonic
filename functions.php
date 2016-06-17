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

// Load admin scripts and styles
function load_custom_wp_admin_style() {
	$theme_url = get_bloginfo('template_directory');
	if( get_field('show_projects_portfolio', 'option') == "hide" ) {
		wp_enqueue_style( 'hide-acf-portfolio-css', $theme_url . '/admin/stylesheets/hide-acf-portfolio.css' );
	}

	if( get_field('show_testimonials', 'option') == "hide" ) {
		wp_enqueue_style( 'hide-acf-testimonials-css', $theme_url . '/admin/stylesheets/hide-acf-testimonials.css' );
	}

	if( get_field('show_events', 'option') == "hide" ) {
		wp_enqueue_style( 'hide-acf-events-css', $theme_url . '/admin/stylesheets/hide-acf-events.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


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
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-admin-site',
		'position' => 3
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Brand Colors',
		'menu_title'	=> 'Brand Colors',
		'parent_slug'	=> 'theme-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Developer',
		'menu_title'	=> 'Developer',
		'parent_slug'	=> 'theme-settings',
	));

}

// Define custom excerpt length
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Add waypoints class to excerpt container
// function add_excerpt_class( $excerpt ) {
//   $excerpt = str_replace( "<p", "<p class=\"waypoint waypoint-bottom-to-top\"", $excerpt );
//   return $excerpt;
// }
// add_filter( "the_excerpt", "add_excerpt_class" );

// Define custom image sizes
add_image_size( 'post-listing', 768, 476, true );
add_image_size( 'news-lising', 768, 276, true );
add_image_size( 'news-grid-lising', 768, 768, true );
add_image_size( 'full-hd', 1920, 1080, true );
add_image_size( 'preview', 768, 276, true );
add_image_size( 'nav-logo', 600, 100, false );
add_image_size( 'featured-image-portrait', 376, 345, true );
add_image_size( 'featured-image-landscape', 458, 358, true );

// Include Composer PHP dependencies
require_once dirname( __FILE__ ) . '/inc/vendor/autoload.php';

function clean_up_admin_menu() {
	remove_menu_page( 'themes.php' );                 				//Appearance
	remove_menu_page( 'users.php' );                  				//Users
	remove_menu_page( 'tools.php' );                  				//Tools
	remove_menu_page( 'options-general.php' );        				//Settings
	remove_menu_page( 'pods' );																// PODs
	remove_menu_page( 'edit.php?post_type=acf-field-group' ); // ACF
}

if( get_field('admin_toolbar', 'option') == "Display Limited Admin Bar" ) {
	add_action( 'admin_menu', 'clean_up_admin_menu', 999 );
}

// Remove woo commerce sidebar from single products page
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);

// Remove woocommerce breadcrumbs
add_action( 'init', 'remove_wc_breadcrumbs' );
function remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Remove related products
function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);

// Count page views
function update_page_views() {
	$number_of_views = (int)get_post_meta( get_the_ID(), '_number_of_views', true );
	if( $number_of_views ) {
		update_post_meta( get_the_ID(), '_number_of_views', $number_of_views + 1 );
	} else {
		add_post_meta( get_the_ID(), '_number_of_views', 1, true );
	}
}

function update_hearts() {
 $message = $post;
 var_dump( $message );
 die();
}
add_action( 'wp_ajax_update_page_hearts', 'update_hearts' );


// Allow user to show of hide additional content types
add_filter( 'custom_menu_order', 'toggle_custom_menu_order' );
function remove_menu_items( $menu_order ){
    global $menu;

    foreach ( $menu as $mkey => $m ) {
			$portfolio 	= array_search( 'edit.php?post_type=portfolio', $m );
			$testimonials = array_search( 'edit.php?post_type=testimonial', $m );
			$events = array_search( 'edit.php?post_type=events', $m );
			$product = array_search( 'edit.php?post_type=product', $m );

 			// Hide portfolio custom post type
			if( get_field('show_projects_portfolio', 'option') == "hide" ) {
				if ( $portfolio ) {
					unset( $menu[$mkey] );
				}
			}
			// Hide testimonials custom post type
			if( get_field('show_testimonials', 'option') == "hide" ) {
				if ( $testimonials ) {
					unset( $menu[$mkey] );
				}
			}
			// Hide events custom post type
			if( get_field('show_events', 'option') == "hide" ) {
				if ( $events ) {
					unset( $menu[$mkey] );
				}
			}
			// Hide woo commerce products post type
			if( get_field('show_ecommerce', 'option') == "hide" ) {
				if ( $product ) {
					unset( $menu[$mkey] );
				}
			}
    }

    return $menu_order;
}
add_filter( 'menu_order', 'remove_menu_items' );


// Hide main woo commerce menu page
function toggle_woocommerce_menu_pages() {
	if( get_field('show_ecommerce', 'option') == "hide" ) {
    remove_menu_page( 'woocommerce' );
	}
}
add_action( 'admin_menu', 'toggle_woocommerce_menu_pages' );


// Custom excerpt more link
function new_excerpt_more($more) {
       global $post;
	return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> [more]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Get excerpt from any text content
function custom_field_excerpt( $field_name ) {
	global $post;
	$text = get_field( $field_name );
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 40; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

// Include hearts ajax handler
require_once dirname( __FILE__ ) . '/inc/ajax/hearts.php';

// Include shortcodes
require_once dirname( __FILE__ ) . '/inc/shortcodes/linked-button.php';
