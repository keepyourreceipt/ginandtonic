<div class="row related-posts">
  <div class="container">
    <?php
      $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
        while( $query->have_posts() ) : $query->the_post(); ?>
        <div class="col-sm-4 related-post">
          <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('post-listing'); ?>
            </a>
          </div>
          <div class="post-title">
            <a href="<?php the_permalink(); ?>">
              <h2><?php the_title(); ?></h2>
            </a>
          </div>
          <div class="post-meta">
            <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span><?php echo get_the_date(); ?></span>
          </div>
          <div class="post-excerpt">
            <p><?php the_excerpt(); ?></p>
          </div>
        </div>
        <?php
        endwhile;
      ?>
  </div>
</div>
