<?php
get_header();
get_template_part( 'template', 'parts/page-headers/shop' );

if( have_rows('flexible_content') ) {
	while ( have_rows('flexible_content') ) : the_row();
		// Include content blocks
		$content_block = get_row_layout();
		include ( TEMPLATEPATH . "/flexible-content/" . $content_block . '.php');
	endwhile;
}

// Start Woocommerce
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

do_action( 'woocommerce_archive_description' );

if ( have_posts() ) :
?>

  <div class="container woocommerce-breadcrumbs">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php woocommerce_breadcrumb(); ?>
      </div>
    </div>
  </div>

  <div class="container shop-products">
    <div class="row">

      <?php do_action( 'woocommerce_before_main_content' ); ?>
      <?php get_template_part( 'template', 'parts/sidebars/shop-sidebar' ); ?>

      <div class="col-md-offset-1 col-sm-7">
        <?php
          woocommerce_product_loop_start();
          woocommerce_product_subcategories();
        ?>

        <?php
          while ( have_posts() ) : the_post();
      		     wc_get_template_part( 'content', 'product' );
      	  endwhile; // end of the loop.

          woocommerce_product_loop_end();
      		do_action( 'woocommerce_after_shop_loop' );
        ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
        	<?php wc_get_template( 'loop/no-products-found.php' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div> <!-- end container -->
</div>

<?php get_footer(); ?>
