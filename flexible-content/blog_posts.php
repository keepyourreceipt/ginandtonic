<div class="blog-posts">
  <div class="container">
    <div class="row three-column-slider">
      <?php
        $posts_per_page = get_sub_field('number_of_posts');
        $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $number_of_posts ) );
        while( $query->have_posts() ) : $query->the_post();
        ?>
          <div class="col-md-4">
            <a class="waypoint waypoint-bottom-to-top" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail( 'post-listing' ); ?>
            </a>
            <h3 class="waypoint waypoint-bottom-to-top">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>
            <div class="waypoint waypoint-bottom-to-top anim-time-medium">
              <p><?php the_excerpt(); ?></p>
            </div>
          </div>
        <?php
        endwhile;
        wp_reset_query();
        ?>
    </div>
    <div class="row">
      <div class="col-sm-12 text-center opacity-lighten">
        <i class="fa fa-long-arrow-left"></i><span>&nbsp;&nbsp;Swipe for More&nbsp;&nbsp;</span><i class="fa fa-long-arrow-right"></i>
      </div>
    </div>
  </div>
</div>
