<?php get_header(); ?>
<div class="image-banner">
  <?php $background_image = get_field('shop_background_image', 'option'); ?>
  <div class="jumbotron waypoint waypoint waypoint-fade anim-time-short" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('shop_text_heading', 'option'); ?></h1>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('shop_text_sub_heading', 'option'); ?></h4>
            <?php
              if( have_rows('buttons') ) { ?>
                <div class="linked_buttons">
                  <?php
                  while ( have_rows('buttons') ) : the_row();
                    if( get_sub_field('link_type') == "Link to a Page on This Website" ) {
                      $button_link = get_sub_field('page_to_link_to');
                      $link_target = null;
                    } else {
                      $button_link = get_sub_field('external_website_link');
                      $link_target = "_blank";
                    }
                    ?>
                      <a class="waypoint waypoint-bottom-to-top anim-time-long" href="<?php echo $button_link ?>" <?php if( $link_target != null ) { echo $link_target; } ?>><?php the_sub_field('button_text'); ?></a>
                    <?php
                  endwhile;
                ?>
                </div>
                <?php
                }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="container">
    <div class="col-sm-8">
      <?php
      /**
       * The template for displaying product content in the single-product.php template
       *
       * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
       *
       * @author 		WooThemes
       * @package 	WooCommerce/Templates
       * @version     1.6.4
       */

      if ( ! defined( 'ABSPATH' ) ) {
      	exit; // Exit if accessed directly
      }

      ?>

      <?php
      	/**
      	 * woocommerce_before_single_product hook
      	 *
      	 * @hooked wc_print_notices - 10
      	 */
      	 do_action( 'woocommerce_before_single_product' );

      	 if ( post_password_required() ) {
      	 	echo get_the_password_form();
      	 	return;
      	 }
      ?>

      <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

      	<?php
      		/**
      		 * woocommerce_before_single_product_summary hook
      		 *
      		 * @hooked woocommerce_show_product_sale_flash - 10
      		 * @hooked woocommerce_show_product_images - 20
      		 */
      		do_action( 'woocommerce_before_single_product_summary' );
      	?>

      	<div class="summary entry-summary">

      		<?php
      			/**
      			 * woocommerce_single_product_summary hook
      			 *
      			 * @hooked woocommerce_template_single_title - 5
      			 * @hooked woocommerce_template_single_rating - 10
      			 * @hooked woocommerce_template_single_price - 10
      			 * @hooked woocommerce_template_single_excerpt - 20
      			 * @hooked woocommerce_template_single_add_to_cart - 30
      			 * @hooked woocommerce_template_single_meta - 40
      			 * @hooked woocommerce_template_single_sharing - 50
      			 */
      			do_action( 'woocommerce_single_product_summary' );
      		?>

      	</div><!-- .summary -->

      	<?php
      		/**
      		 * woocommerce_after_single_product_summary hook
      		 *
      		 * @hooked woocommerce_output_product_data_tabs - 10
      		 * @hooked woocommerce_upsell_display - 15
      		 * @hooked woocommerce_output_related_products - 20
      		 */
      		do_action( 'woocommerce_after_single_product_summary' );
      	?>

      	<meta itemprop="url" content="<?php the_permalink(); ?>" />

      </div><!-- #product-<?php the_ID(); ?> -->

      <?php do_action( 'woocommerce_after_single_product' ); ?>
    </div>
    <div class="col-sm-4 sidebar">
      <?php get_sidebar( 'blog_sidebar' ); ?>
    </div>
  </div>
</div>
