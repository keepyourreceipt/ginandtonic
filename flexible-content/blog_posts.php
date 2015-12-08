<div class="container blog-posts waypoint waypoint-bottom-to-top">
  <div class="row">
    <?php
      $posts_per_page = get_sub_field('number_of_posts');
      $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $number_of_posts ) );
      while( $query->have_posts() ) : $query->the_post();
      ?>
        <div class="col-md-4">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'post-listing' ); ?>
          </a>
          <h3>
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h3>
          <p><?php the_excerpt(); ?></p>
        </div>
      <?php
      endwhile;
      wp_reset_query();
      ?>
  </div>
</div>
