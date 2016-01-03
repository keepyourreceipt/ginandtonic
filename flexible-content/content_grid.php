<div class="content-grid">
  <div class="container">
    <?php
      $posts = get_sub_field('content_grid');
      foreach( $posts as $post ) {
        ?>
        <?php setup_postdata($post); ?>
        <div class="col-sm-4">
          <a href="<?php the_permalink(); ?>">
            <?php if( has_post_thumbnail() ) {
              the_post_thumbnail('post-listing', array( 'class' => 'waypoint waypoint-bottom-to-top' ));
            } ?>
          </a>
          <a href="<?php the_permalink(); ?>">
            <h3 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h3>
          </a>
          <?php the_excerpt(); ?>
          <div class="linked_buttons waypoint waypoint-bottom-to-top">
            <a class="linked-button linked-button-dark" href="<?php the_permalink(); ?>">Learn More</a>
          </div>
        </div>
      <?php
      }
    ?>
    <?php wp_reset_postdata(); ?>
  </div>
</div>
