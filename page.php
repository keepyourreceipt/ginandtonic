<?php get_header();?>

<div class="image-banner">
  <?php $background_image = get_field('header_image'); ?>
  <div class="jumbotron waypoint waypoint waypoint-fade anim-time-short" style="background-image: url(<?php echo $background_image['sizes']['full-hd'] ?>)">
    <div class="image-overlay">
      <?php // Image overlay ?>
    </div>
    <div class="container">
      <div class="row">
        <div class="table banner-text-container">
          <div class="table-cell banner-text">
            <?php if( get_field( 'text_heading' ) ) { ?>
              <h1 class="waypoint waypoint-bottom-to-top"><?php the_field('text_heading'); ?></h1>
              <?php } else { ?>
              <h1 class="waypoint waypoint-bottom-to-top"><?php the_title(); ?></h1>
            <?php } ?>
            <h4 class="waypoint waypoint-bottom-to-top anim-time-medium"><?php the_field('text_sub_heading'); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
// check if the flexible content field has rows of data
if( have_rows('flexible_content') ) {
    while ( have_rows('flexible_content') ) : the_row();
    	// Include content blocks
   		$content_block = get_row_layout();
   		include ( TEMPLATEPATH . "/flexible-content/" . $content_block . '.php');
    endwhile;
} else {
  while( have_posts() ) : the_post();
    ?>

    <div class="row">
      <div class="container text-center">
        <h2>This page has no content. Click "Edit Page" to continue.</h2>
      </div>
    </div>

    <?php
  endwhile;
 }
?>

<?php get_footer(); ?>
