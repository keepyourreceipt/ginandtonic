<div class="container list-blog-posts">
  <div class="row">
    <?php get_template_part( 'template', 'parts/sidebars/blog-mobile-sidebar' ); ?>
    <div class="col-md-7 col-md-offset-1">
      <?php while( have_posts() ) : the_post(); ?>
        <div class="post-listing">
          <div class="featured-image col-sm-12 remove-padding waypoint waypoint-bottom-to-top">
            <?php
              $featured_image_id = get_post_thumbnail_id();
              $featured_image_url_desktop = wp_get_attachment_image_src( $featured_image_id, 'news-lising', false ); ?>
                <img class="" src="<?php echo $featured_image_url_desktop[0]; ?>">
              </a>
          </div>
          <a href="<?php the_permalink(); ?>">
            <h2 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h2>
          </a>
          <div class="post-meta">
            <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo get_the_author(); ?>&nbsp;&nbsp;</span>
            <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?>&nbsp;&nbsp;</span>
            <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list(' | '); ?></span>
          </div>
          <hr class="waypoint waypoint-bottom-to-top">
          <div class="post-excerpt">
            <?php the_excerpt(); ?>
          </div>
        </div>
      <?php endwhile; ?>
      <div class="post-pagination waypoint waypoint-bottom-to-top">
        <?php
            $args = array(
              'prev_text' => '<i class="fa fa-chevron-left"></i>',
              'next_text' => '<i class="fa fa-chevron-right"></i>'
            );
            echo ( paginate_links( $args ));
        ?>
      </div>
    </div>
    <?php get_template_part( 'template', 'parts/sidebars/blog-sidebar' ); ?>
  </div>
</div>
