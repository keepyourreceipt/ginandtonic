<?php
  $light_button_color = get_field( 'light_button_color', 'option' );
  $light_button_text_color = get_field( 'light_button_text_color', 'option' );
  $light_button_hover_color = get_field( 'light_button_hover_color', 'option' );
  $light_button_hover_text_color = get_field( 'light_button_hover_text_color', 'option' );
  ?>

  <?php // light button color scheme ?>
  <style>
    <?php if( $light_button_color ) { ?>
      .linked-button-light {
        background-color: <?php echo $light_button_color; ?>;
        border-color: <?php echo $light_button_color; ?>;
      }
    <?php } else { ?>
      .linked-button-light  {
        background-color: transparent;
        <?php if( $light_button_text_color ) { ?>
          border-color: <?php echo $light_button_text_color; ?>;
        <?php } ?>
      }
    <?php } ?>
    <?php if( $light_button_text_color ) { ?>
      .linked-button-light  {
        color: <?php echo $light_button_text_color; ?>;
      }
    <?php } ?>
    <?php if( $light_button_hover_color ) { ?>
        .linked-button-light:hover,
        .linked-button-light.active {
          background-color: <?php echo $light_button_hover_color; ?>;
          border-color: <?php echo $light_button_hover_color; ?>;
        }
    <?php } ?>
    <?php if( $light_button_hover_text_color ) { ?>
        .linked-button-light:hover,
        .linked-button-light.active {
          color: <?php echo $light_button_hover_text_color; ?> !important;
        }
    <?php } ?>
  </style>
