<div class="col-sm-4 widget-sidebar waypoint waypoint-bottom-to-top anim-time-medium">
  <?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'blog_sidebar' ); ?>
    </div><!-- #primary-sidebar -->
  <?php endif; ?>
</div>
