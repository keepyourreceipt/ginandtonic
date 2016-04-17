<div class="related-posts">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row waypoint waypoint-bottom-to-top">
          <div class="col-md-12 row-heading">
            <h2>You may also want to checkout these posts</h2>
          </div>
          <?php
          $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
            while( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-sm-4 related-post waypoint waypoint-bottom-to-top">
              <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-listing'); ?>
                </a>
              </div>
              <div class="post-meta">
                  <span><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list('  |  '); ?></span>
              </div>
              <div class="post-title">
                <a href="<?php the_permalink(); ?>">
                  <h4><?php the_title(); ?></h4>
                </a>
              </div>
            </div>
            <?php
            endwhile;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
