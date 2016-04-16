<?php get_header(); ?>
<?php while( have_posts() ) : the_post(); ?>

<?php
  $post_id = get_the_ID();
  $post_thumbnil_id = get_post_thumbnail_id( $post_id );
  $featured_image = wp_get_attachment_image_src( $post_thumbnil_id, 'full-hd' );
  $background_image = $featured_image[0];
?>
<div class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image; ?>">
  <div class="container">
    <div class="row waypoint waypoint-fade parallax-window">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-md-offset-1 table banner-text-container">
            <div class="table-cell banner-text">
              <h1><?php the_title(); ?></h1>
              <div class="post-meta">
                <span><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?></span>
                &nbsp;&nbsp;
                <span><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list('|'); ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row single-post-content">
  <div class="container">
    <div class="col-md-7 col-md-offset-1">
      <div class="content waypoint waypoint-bottom-to-top">
        <?php the_content(); ?>
      </div>
    </div>
    <?php get_template_part( 'template', 'parts/sidebars/blog-sidebar' ); ?>
  </div>
</div>
<div class="row single-post-comments">
  <div class="container">
    <div class="col-sm-8 waypoint waypoint-bottom-to-top">
      <?php comments_template(); ?>
    </div>
  </div>
</div>

<?php get_template_part( 'template', 'parts/related-posts' ); ?>

<?php endwhile; ?>
<?php get_footer(); ?>
