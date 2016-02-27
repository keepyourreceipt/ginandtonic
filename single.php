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
<?php while( have_posts() ) : the_post(); ?>
<div class="row single-post-content">
  <div class="container">
    <div class="col-sm-8">
      <div class="post-title waypoint waypoint-bottom-to-top">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="post-meta waypoint waypoint-bottom-to-top">
        <span><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo get_the_date(); ?></span>
        &nbsp;&nbsp;
        <span><i class="fa fa-folder-o"></i>&nbsp;&nbsp;<?php echo get_the_category_list('|'); ?></span>
      </div>
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
