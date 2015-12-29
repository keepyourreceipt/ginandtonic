<div class="row">
  <div class="container">
    <?php
      $posts = get_sub_field('content_grid');
      foreach( $posts as $post ) {
        the_title();
      }
    ?>
  </div>
</div>
