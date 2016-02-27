<?php get_header(); ?>
<div class="page-header">
  <?php
    $news_page = get_option( 'page_for_posts' );
    $background_image = get_field('header_image', $news_page );
  ?>
  <div class="container-fluid anim-time-short parallax-window" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading', $news_page ); ?></h1>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading', $news_page ); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container list-blog-posts">
  <div class="row">
    <div class="col-sm-8">
      <?php while( have_posts() ) : the_post(); ?>
          <div class="post-listing">
            <a href="<?php the_permalink(); ?>">
              <h2 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h2>
            </a>
            <div class="post-meta">
              <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?></span>
              <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-comments-o"></i></i>&nbsp;&nbsp;<?php comments_number( 'Be the First to Comment', 'one comment', '% comments' ); ?></span>
              <span class="waypoint waypoint-bottom-to-top"><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list('|'); ?></span>
            </div>
            <?php the_excerpt(); ?>
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
<?php get_footer(); ?>
