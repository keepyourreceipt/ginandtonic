<?php get_header(); ?>
<div class="row product-content">
  <div class="container">
    <div class="col-sm-12">
      <?php
        if ( ! defined( 'ABSPATH' ) ) { exit; }
    	   do_action( 'woocommerce_before_single_product' );

    	  if ( post_password_required() ) {
    	 	   echo get_the_password_form();
    	 	   return;
    	   }
      ?>
      <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
        <div class="summary entry-summary">
      		<?php do_action( 'woocommerce_single_product_summary' ); ?>
      	</div>
      	<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
      	<meta itemprop="url" content="<?php the_permalink(); ?>" />
      </div>

      <?php do_action( 'woocommerce_after_single_product' ); ?>
    </div>
  </div>
</div>
