<?php
  if( get_sub_field( 'section_id' ) ) {
    $scroll_to = "id='" . get_sub_field( 'section_id' ) . "'";
  }
?>
<section class="container" <?php if( $scroll_to ) { echo $scroll_to; } ?>>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <?php
        while( have_posts() ) : the_post();
          the_content();
        endwhile;
        ?>
    </div>
  </div>
</section>
