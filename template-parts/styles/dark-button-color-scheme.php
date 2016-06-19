<?php
  $dark_button_color = get_field( 'dark_button_color', 'option' );
  $dark_button_text_color = get_field( 'dark_button_text_color', 'option' );
  $dark_button_hover_color = get_field( 'dark_button_hover_color', 'option' );
  $dark_button_hover_text_color = get_field( 'dark_button_hover_text_color', 'option' );
  ?>

  <?php // dark button color scheme ?>
  <style>
    <?php if( $dark_button_color ) { ?>
      .linked-button-dark {
        background-color: <?php echo $dark_button_color; ?>;
        border-color: <?php echo $dark_button_color; ?>;
      }
    <?php } else { ?>
      .linked-button-dark  {
        <?php if( $dark_button_text_color ) { ?>
          border-color: <?php echo $dark_button_text_color; ?>;
        <?php } ?>
      }
    <?php } ?>
    <?php if( $dark_button_text_color ) { ?>
      .linked-button-dark  {
        color: <?php echo $dark_button_text_color; ?>;
      }
    <?php } ?>
    <?php if( $dark_button_hover_color ) { ?>
        .linked-button-dark:hover,
        .linked-button-dark.active {
          background-color: <?php echo $dark_button_hover_color; ?>;
          border-color: <?php echo $dark_button_hover_color; ?>;
        }
    <?php } ?>
    <?php if( $dark_button_hover_text_color ) { ?>
        .linked-button-dark:hover,
        .linked-button-dark.active {
          color: <?php echo $dark_button_hover_text_color; ?> !important;
        }
    <?php } ?>
  </style>
