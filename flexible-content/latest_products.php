<div class="row latest-products">
  <div class="container">
    <?php $query = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => 4, 'cat' => '-15' ) ); ?>
    <?php while( $query->have_posts() ) : $query->the_post(); ?>

      <div class="col-sm-3">
        <a class="waypoint waypoint-bottom-to-top" href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('medium'); ?>
          <h2 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h2>
        </a>
        <a class="button waypoint waypoint-left-to-right anim-time-medium" href="<?php the_permalink(); ?>">View</a>
        <a class="button ajax-submit-button waypoint waypoint-left-to-right anim-time-short" href="<?php echo $_SERVER['REQUEST_URI'] . '/?add-to-cart=' . get_the_ID(); ?>">Buy</a>

        <div class="added-to-cart-message">
          <div><?php the_title(); ?> added to cart!</div>
          <span><a href="<?php echo get_permalink( get_page_by_title( 'Cart' ) ); ?>">View Cart</a></span>
          <span><a href="<?php echo get_permalink( get_page_by_title( 'Checkout' ) ); ?>">Checkout</a></span>
        </div>
      </div>

    <?php wp_reset_query(); endwhile; ?>
  </div>
</div>
