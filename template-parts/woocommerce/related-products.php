<div class="container related-products">
  <div class="row">
    <?php
      $query = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => 3) );
      if( $query->have_posts() ) {
        while( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-sm-4 related-product">
              <div class="product-image">
                <?php the_post_thumbnail('post-listing'); ?>
              </div>
              <div class="product-excerpt">
                <?php the_title(); ?>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">More Info</a>
              </div>
            </div>
        <?php
        endwhile;
      }
    ?>
  </div>
</div>
