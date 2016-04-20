<div class="container related-products">
  <div class="row">
    <div class="col-md-10 col-md-offset-1 remove-padding">
      <div class="row">
        <?php
          $query = new WP_Query( array( 'post_type' => 'product', 'posts_per_page' => 3, 'meta_query' => array( array( 'key' => '_visibility', 'value' => array( 'catalog', 'visible' ), 'compare' => 'IN' ) )) );
          if( $query->have_posts() ) {
            while( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-sm-4 related-product">
                  <div class="product-image">
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('post-listing'); ?>
                    </a>
                  </div>
                  <div class="product-excerpt">
                    <?php the_title(); ?>
                    <p>$<?php echo get_post_meta( get_the_ID(), '_regular_price', true);?></p>
                    <a class="button" href="<?php the_permalink(); ?>">More Info</a>
                  </div>
                </div>
            <?php
            endwhile;
          }
        ?>
      </div>
    </div>
  </div>
</div>
