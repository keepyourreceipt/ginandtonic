<?php get_header();

get_template_part( 'template', 'parts/page-header' );
// check if the flexible content field has rows of data
if( have_rows('flexible_content') ) {
    while ( have_rows('flexible_content') ) : the_row();
    	// Include content blocks
   		$content_block = get_row_layout();
   		include ( TEMPLATEPATH . "/flexible-content/" . $content_block . '.php');
    endwhile;
} else {
  while( have_posts() ) : the_post(); ?>
    <div class="row">
      <div class="container no-content-message">
        <h2>This page has no content. Click "Edit Page" to continue.</h2>
      </div>
    </div>
    <?php
  endwhile;
 }
?>

<?php get_footer(); ?>
