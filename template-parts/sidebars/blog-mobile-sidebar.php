<div class="col-sm-12 visible-sm visible-xs widget-sidebar waypoint waypoint-bottom-to-top anim-time-medium">
  <?php if ( is_active_sidebar( 'blog_mobile_sidebar' ) ) : ?>
    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
      <?php dynamic_sidebar( 'blog_mobile_sidebar' ); ?>
    </div><!-- #primary-sidebar -->
  <?php endif; ?>
</div>
