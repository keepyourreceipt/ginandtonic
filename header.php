<!doctype html>
<html class="no-js" lang="">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title><?php wp_title(); ?></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php get_template_part( 'template', 'parts/custom-font-scripts' ); ?>
  <?php wp_head(); ?>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbuyLNGCjqB0wn5NG-ZInssrccSlY28IY">
  </script>
  </head>
  <body <?php body_class(); ?>>
    <?php get_template_part( 'template', 'parts/custom-font-styles' ); ?>
    <?php get_template_part( 'template', 'parts/navigation' ); ?>
  <div class="page-content">
