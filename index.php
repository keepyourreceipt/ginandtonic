<?php get_header(); ?>
<div class="image-banner">
  <?php $background_image = get_field('news_background_image', 'option'); ?>
  <div class="jumbotron waypoint waypoint waypoint-fade anim-time-short" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('news_text_heading', 'option'); ?></h1>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('news_text_sub_heading', 'option'); ?></h4>
            <?php
              if( have_rows('buttons') ) { ?>
                <div class="linked_buttons">
                  <?php
                  while ( have_rows('buttons') ) : the_row();
                    if( get_sub_field('link_type') == "Link to a Page on This Website" ) {
                      $button_link = get_sub_field('page_to_link_to');
                      $link_target = null;
                    } else {
                      $button_link = get_sub_field('external_website_link');
                      $link_target = "_blank";
                    }
                    ?>
                      <a class="waypoint waypoint-bottom-to-top anim-time-long" href="<?php echo $button_link ?>" <?php if( $link_target != null ) { echo $link_target; } ?>><?php the_sub_field('button_text'); ?></a>
                    <?php
                  endwhile;
                ?>
                </div>
                <?php
                }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row list-blog-posts">
  <div class="container">
    <div class="col-sm-8">
      <?php while( have_posts() ) : the_post(); ?>
          <div class="post-listing">
            <a href="<?php the_permalink(); ?>">
              <h2><?php the_title(); ?></h2>
            </a>
            <?php the_excerpt(); ?>
          </div>
      <?php endwhile; ?>
      <?php
          $args = array(
            'prev_text' => __('<'),
            'next_text' => __('>')
          );
          echo ( paginate_links( $args ));
      ?>
    </div>
    <div class="col-sm-4 widget-sidebar">
      <?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
      	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      		<?php dynamic_sidebar( 'blog_sidebar' ); ?>
      	</div><!-- #primary-sidebar -->
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
