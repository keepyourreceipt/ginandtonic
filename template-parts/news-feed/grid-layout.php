<div class="container list-blog-posts blog-posts-grid-layout">
  <div class="row">
    <?php get_template_part( 'template', 'parts/sidebars/blog-mobile-sidebar' ); ?>
    <div class="col-md-10 col-md-offset-1">
      <div class="row">
        <?php $post_counter = 1; ?>
        <?php while( have_posts() ) : the_post(); ?>
          <?php
            $post_layout = "default";
            $post_counter == 3 ? $post_layout = "featured" : $post_layout = "default";
            $post_counter == 5 ? $post_layout = "title-card" : $post_layout = "default";
          ?>
          <div class="post-listing grid-item col-sm-6 col-md-4">
            <div class="featured-image waypoint waypoint-bottom-to-top">
              <?php
                $featured_image_id = get_post_thumbnail_id();
                if( $post_layout == "default" ) {
                  $featured_image_url_desktop = wp_get_attachment_image_src( $featured_image_id, 'news-grid-lising', false );
                }  else {
                  $featured_image_url_desktop = wp_get_attachment_image_src( $featured_image_id, 'post-listing', false );
                }
                ?>
                <a href="<?php the_permalink(); ?>">
                  <img class="" src="<?php echo $featured_image_url_desktop[0]; ?>">
                </a>
            </div>
            <a href="<?php the_permalink(); ?>">
              <h2 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h2>
            </a>
            <div class="post-meta">
              <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list(' | '); ?></span>
            </div>
            <hr class="waypoint waypoint-bottom-to-top">
            <?php if( $post_layout == "default" ) { ?>
              <div class="post-excerpt">
                <?php the_excerpt(); ?>
              </div>
              <?php } ?>
          </div>
          <?php
            if( $post_counter == 5 ) {
              $post_counter = 1;
            } else {
              $post_counter++;
            }
          ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
