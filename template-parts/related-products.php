<div class="row related-products">
  <div class="container">
    <?php
      $query = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => 3 ) );
        while( $query->have_posts() ) : $query->the_post(); ?>
        <div class="col-sm-4 related-product waypoint waypoint-bottom-to-top">
          <div class="product-thumbnail">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('post-listing'); ?>
            </a>
          </div>
          <div class="product-title">
            <a href="<?php the_permalink(); ?>">
              <h2><?php the_title(); ?></h2>
            </a>
          </div>
          <div class="product-meta">
            <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span><?php echo get_the_date(); ?></span>
          </div>
          <div class="product-excerpt">
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>
        <?php
        endwhile;
      ?>
  </div>
</div>
