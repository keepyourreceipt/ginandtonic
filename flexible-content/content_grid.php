<?php
  $background_image = get_sub_field( 'background_image' );
  get_sub_field( 'background_image_tile' ) == "cover" ? $classes = "background-tiled" : $classes = "background-cover";
 ?>
<div class="content-grid <?php echo $classes; ?>" style="<?php if( isset( $background_image ) ) { echo 'background-image: url(' . $background_image['sizes']['full-hd'] . ');'; } ?>">
  <div class="container">
    <?php
      $posts = get_sub_field('content_grid');
      foreach( $posts as $post ) {
        ?>
        <?php setup_postdata($post); ?>
        <div class="col-sm-4 post-card">
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
