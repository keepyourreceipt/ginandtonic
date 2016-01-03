<div class="linked_buttons">
  <?php
    if( get_sub_field('link_type') == "Link to a Page on This Website" ) {
      $button_link = get_sub_field('page_to_link_to');
      $link_target = null;
    } else {
      $button_link = get_sub_field('external_website_link');
      $link_target = "_blank";
    }
    ?>
      <a class="linked-button linked-button-dark waypoint waypoint-bottom-to-top" href="<?php echo $button_link ?>" <?php if( $link_target != null ) { echo $link_target; } ?>><?php the_sub_field('button_text'); ?></a>
</div>
