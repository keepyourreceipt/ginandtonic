<?php get_header(); ?>

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
      <div class="container">
        <?php the_content(); ?>
      </div>
    </div>

    <?php
  endwhile;
 }
?>

<?php get_footer(); ?>
