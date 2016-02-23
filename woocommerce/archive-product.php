<?php get_header(); ?>
<div class="page-header">
  <?php
    $news_page = get_page_by_title( 'Shop' );
    $background_image = get_field('header_image', $news_page->ID);
  ?>
  <div class="container-fluid anim-time-short parallax-window" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading', $news_page->ID); ?></h1>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading', $news_page->ID); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
// check if the flexible content field has rows of data
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
?>

<?php do_action( 'woocommerce_archive_description' ); ?>

<?php if ( have_posts() ) : ?>

  <div class="container woocommerce-breadcrumbs">
    <div class="row">
      <div class="col-sm-12">
        <?php woocommerce_breadcrumb(); ?>
      </div>
    </div>
  </div>

  <div class="container shop-products">

    <div class="row">

      <?php do_action( 'woocommerce_before_main_content' ); ?>

      <?php get_template_part( 'template', 'parts/sidebars/shop-sidebar' ); ?>

      <div class="col-md-offset-1 col-sm-8">
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
  </div>


</div>

<?php get_footer(); ?>
