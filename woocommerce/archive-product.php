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


<div class="row woo-commerce products-archive">
	<div class="container">

		<?php
		// check if the flexible content field has rows of data
		if( have_rows('flexible_content') ) {
				while ( have_rows('flexible_content') ) : the_row();
					// Include content blocks
					$content_block = get_row_layout();
					include ( TEMPLATEPATH . "/flexible-content/" . $content_block . '.php');
					echo "boobs";
				endwhile;
		}
		?>
			<?php
			/**
			 * The Template for displaying product archives, including the main shop page which is a post type archive.
			 *
			 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
			 *
			 * @author 		WooThemes
			 * @package 	WooCommerce/Templates
			 * @version     2.0.0
			 */

			if ( ! defined( 'ABSPATH' ) ) {
				exit; // Exit if accessed directly
			}

			get_header( 'shop' ); ?>
				<?php
					/**
					 * woocommerce_before_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<div class="col-sm-12">
							<h2 class="page-title"><?php woocommerce_page_title(); ?></h2>
						</div>
					<?php endif; ?>

					<?php
						/**
						 * woocommerce_archive_description hook
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
					?>
					<?php if ( have_posts() ) : ?>

						<?php
							/**
							 * woocommerce_before_shop_loop hook
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							?>

							<div class="col-sm-12">
								<?php do_action( 'woocommerce_before_shop_loop' );?>
							</div>

						<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php
							/**
							 * woocommerce_after_shop_loop hook
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>

				<?php
					/**
					 * woocommerce_after_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
