<?php
  $link_color = get_field( 'text_link_color', 'option' );
  $link_hover_color = get_field( 'text_link_hover_color', 'option' );
?>
<style>
  <?php if( $link_color ) { ?>
    a {
      color: <?php echo $link_color; ?>;
    }
  <?php } ?>
  <?php if( $link_hover_color ) { ?>
    a:hover {
      color: <?php echo $link_hover_color; ?>;
    }
  <?php } ?>
</style>
