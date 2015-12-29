<div class="three-column-text">
  <div class="row">
    <div class="container">
      <?php
        if( have_rows('text_boxes') ) { ?>
          <?php while ( have_rows('text_boxes') ) : the_row(); ?>
            <div class="col-sm-4 text-box center-text">
              <h3 class="waypoint waypoint-bottom-to-top"><?php the_sub_field('text_heading'); ?></h3>
              <p class="waypoint waypoint-bottom-to-top"><?php the_sub_field('text_content'); ?></p>
            </div>
          <?php endwhile; ?>
        <?php
        }
      ?>
    </div>
  </div>
</div>
