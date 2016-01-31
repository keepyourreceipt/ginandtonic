<?php
  $background_image = get_sub_field( 'background_image' );
  get_sub_field( 'background_style' ) == "cover" ? $container_classes = "background-tiled" : $container_classes = "background-cover";
 ?>
<div class="content-grid <?php echo $classes; ?>" style="<?php if( isset( $background_image ) ) { echo 'background-image: url(' . $background_image['sizes']['full-hd'] . ');'; } ?>">
  <div class="container">
    <div class="row">
      <?php
        $posts = get_sub_field('content_select');
        foreach( $posts as $post ) {
          ?>
          <?php setup_postdata($post); ?>
          <div class="col-sm-4 post-card">
            <div class="post-thumbnail">
              <a href="<?php the_permalink(); ?>">
                <?php if( has_post_thumbnail() ) {
                  the_post_thumbnail('post-listing', array( 'class' => 'waypoint waypoint-bottom-to-top' ));
                } ?>
              </a>
            </div>
            <div class="post-title">
              <a href="<?php the_permalink(); ?>">
                <h3 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h3>
              </a>
            </div>
            <div class="post-excerpt">
              <?php the_excerpt(); ?>
            </div>
            <div class="visible-xs linked_buttons waypoint waypoint-bottom-to-top">
              <a class="linked-button linked-button-dark" href="<?php the_permalink(); ?>">Learn More</a>
            </div>
          </div>
        <?php
        }
        ?>
        </div>
      </div>
      <div class="container hidden-xs post-read-more-buttons">
        <div class="row">
          <?php foreach( $posts as $post ) { ?>
            <div class="col-sm-4">
              <div class="linked_buttons waypoint waypoint-bottom-to-top">
                <a class="linked-button linked-button-dark" href="<?php the_permalink(); ?>">Learn More</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php wp_reset_postdata(); ?>
</div>
