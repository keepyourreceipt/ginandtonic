<?php get_header(); ?>
<?php
  $posts_page = get_option( 'page_for_posts' );
  $background_image = get_field('header_image', $posts_page);
?>
<section class="page-header overlay" data-parallax="scroll" data-image-src="<?php echo $background_image['sizes']['full-hd']; ?>">
  <div class="container">
    <div class="mobile-overlay hidden-md hidden-lg">
      <?php // Shhhh, I'm hiding ?>
    </div>
    <div class="row waypoint waypoint-fade parallax-window">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-10 col-md-offset-1 table banner-text-container">
            <div class="table-cell banner-text">
              <h1 class="waypoint waypoint-bottom-to-top">Search Results</h1>
              <h4 class="waypoint waypoint-bottom-to-top">
                Displaying search results for: <?php the_search_query(); ?>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  if( have_posts() ) {
    get_template_part( 'template', 'parts/news-feed/default-layout' );
  } else {
    ?>
  <div class="container list-blog-posts">
    <div class="row">
      <?php get_template_part( 'template', 'parts/sidebars/blog-mobile-sidebar' ); ?>
      <div class="waypoint waypoint-bottom-to-top col-md-7 col-md-offset-1">

        <h2>Nothing found.</h2>
        <p>Please check your search term and try again. You may also want to use the menu to the right to see if you can find what you're looking for.</p>

      </div>
      <?php get_template_part( 'template', 'parts/sidebars/blog-sidebar' ); ?>
    </div>
  </div>

<?php } ?>


<?php get_footer(); ?>
