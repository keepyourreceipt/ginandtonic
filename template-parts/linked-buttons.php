<?php
  if( have_rows('buttons') ) { ?>
    <div class="linked_buttons">
      <?php
      while ( have_rows('buttons') ) : the_row();
        if( get_sub_field('link_type') == "Link to a Page on This Website" ) {
          $button_link = get_sub_field('page_to_link_to');
          $link_target = null;
        } else {
          $button_link = get_sub_field('external_website_link');
          $link_target = "_blank";
        }
        ?>
          <a class="linked-button linked-button-light waypoint waypoint-bottom-to-top anim-time-long" href="<?php echo $button_link ?>" <?php if( $link_target != null ) { echo $link_target; } ?>><?php the_sub_field('button_text'); ?></a>
        <?php
      endwhile;
    ?>
    </div>
    <?php
    }
  ?>
