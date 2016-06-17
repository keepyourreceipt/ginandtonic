<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title('|','true','right'); ?><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php // Google varification ?>
    <meta name="google-site-verification" content="uTilvixm63uU6mVTpR7BMbwYvflF86eftiwR7z_83As" />
    <?php get_template_part( 'template', 'parts/custom-font-scripts' ); ?>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbuyLNGCjqB0wn5NG-ZInssrccSlY28IY">
  </script>
</head>

<body <?php body_class(); ?>>
  <?php get_template_part( 'template', 'parts/styles/dark-button-color-scheme' ); ?>
  <?php get_template_part( 'template', 'parts/styles/light-button-color-scheme' ); ?>
  <?php get_template_part( 'template', 'parts/styles/text-link-color-scheme' ); ?>
  <?php get_template_part( 'template', 'parts/custom-font-styles' ); ?>
  <?php
    $desktop_menu_style = get_field('desktop_navigation_style', 'option');
    get_template_part( 'template', 'parts/navigation/' . $desktop_menu_style . '-navigation' );
  ?>
  <?php update_page_views(); ?>
  <div class="page-content">
    <div class="loader-overlay">
      <div class="loader-container">
        <?php
          if( get_field( 'primary_brand_color', 'option' ) ) {
            $primary_brand_color = get_field( 'primary_brand_color', 'option' );
            $loader_border_color = "style='border-top-color: " . $primary_brand_color . "; ";
            $loader_border_color .= "border-right-color: " . $primary_brand_color . "; ";
            $loader_border_color .= "border-bottom-color: " . $primary_brand_color . ";";
            $loader_border_color .= "'";
          }
        ?>
        <div class="loader" <?php if( $primary_brand_color ) { echo $loader_border_color; } ?>>Loading...</div>
      </div>
    </div>
