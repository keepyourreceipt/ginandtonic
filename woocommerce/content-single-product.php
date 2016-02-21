<?php get_header(); ?>
<div class="page-header">
  <?php
    $shop_page = get_page_by_title( 'Shop' );
    $background_image = get_field('header_image', $shop_page->ID);
  ?>
  <div class="container-fluid anim-time-short parallax-window" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading', $shop_page->ID); ?></h1>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading', $shop_page->ID); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
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
    <div class="col-sm-12">
      <?php woocommerce_breadcrumb(); ?>
    </div>
  </div>
</div>

<div class="container single-product-page-content">

  <div class="row">

    <?php get_template_part( 'template', 'parts/sidebars/shop-sidebar' ); ?>

    <div class="col-sm-offset-1 col-sm-8 single-product-content">

      <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

      	<?php do_action( 'woocommerce_before_single_product_summary' ); ?>

      	<div class="summary entry-summary">
      		<?php do_action( 'woocommerce_single_product_summary' ); ?>
      	</div>

      	<?php do_action( 'woocommerce_after_single_product_summary' ); ?>

      	<meta itemprop="url" content="<?php the_permalink(); ?>" />

      </div><!-- #product-<?php the_ID(); ?> -->

    </div>
  </div>

  <?php get_template_part( 'template', 'parts/woocommerce/related-products' ); ?>
  
</div>
