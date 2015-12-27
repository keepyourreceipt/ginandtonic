<div class="three-column-text">
  <div class="row">
    <div class="container">
      <?php
        if( have_rows('text_boxes') ) { ?>
          <div class="col-sm-4 text-box">
            <?php while ( have_rows('text_boxes') ) : the_row(); ?>
                <h2 class="waypoint waypoint-bottom-to-top anim-time-long"><?php the_sub_field('text_heading'); ?></h2>
                <p><?php the_sub_field('text_content'); ?></p>
            <?php endwhile; ?>
          </div>
          <?php
          }
        ?>
    </div>
  </div>
</div>
