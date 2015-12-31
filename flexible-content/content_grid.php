<div class="row content-grid">
  <div class="container">
    <?php
      $posts = get_sub_field('content_grid');
      foreach( $posts as $post ) {
        ?>
        <?php setup_postdata($post); ?>
        <div class="col-sm-4">
          <a href="<?php the_permalink(); ?>">
            <?php if( has_post_thumbnail() ) {
              the_post_thumbnail('post-listing');
            } ?>
          </a>
          <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
          </a>
          <p><?php the_excerpt(); ?></p>
        </div>
      <?php
      }
    ?>
    <?php wp_reset_postdata(); ?>
  </div>
</div>
