<?php

get_header();
get_template_part( 'template', 'parts/page-headers/single-product' );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

 do_action( 'woocommerce_before_single_product' );

 if ( post_password_required() ) {
 	echo get_the_password_form();
 	return;
 }
?>

<div class="container woocommerce-breadcrumbs">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <?php woocommerce_breadcrumb(); ?>
    </div>
  </div>
</div>

<div class="container single-product-page-content">
  <div class="row">
    <div class="desktop-sidebar hidden-xs hidden-sm">
      <?php get_template_part( 'template', 'parts/sidebars/shop-sidebar' ); ?>
    </div>
    <div class="col-md-7 single-product-content">
      <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
      	<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
      	<div class="summary entry-summary">
      		<?php do_action( 'woocommerce_single_product_summary' ); ?>
      	</div>
      	<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
      	<meta itemprop="url" content="<?php the_permalink(); ?>" />
      </div><!-- #product-<?php the_ID(); ?> -->
    </div>
    <div class="mobile-sidebar hidden-md hidden-lg">
      <?php get_template_part( 'template', 'parts/sidebars/shop-sidebar' ); ?>
    </div>
  </div>

  <?php get_template_part( 'template', 'parts/woocommerce/related-products' ); ?>

</div>
