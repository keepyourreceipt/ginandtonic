<div class="container list-blog-posts">
  <div class="row">
    <div class="col-sm-8">
      <?php $query = new WP_Query( array( 'post_type' => 'post' ) ); ?>
      <?php while( $query->have_posts() ) : $query->the_post(); ?>
          <div class="post-listing">
            <a href="<?php the_permalink(); ?>">
              <h2 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h2>
            </a>
            <div class="post-meta">
              <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?></span>
              <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list('|'); ?></span>
            </div>
            <?php the_excerpt(); ?>
          </div>
      <?php endwhile; wp_reset_query(); ?>
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
