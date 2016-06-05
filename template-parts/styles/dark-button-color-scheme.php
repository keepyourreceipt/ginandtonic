<?php
  $dark_button_color = get_field( 'dark_button_color', 'option' );
  $dark_button_text_color = get_field( 'dark_button_text_color', 'option' );
  $dark_button_hover_color = get_field( 'dark_button_hover_color', 'option' );
  $dark_button_hover_text_color = get_field( 'dark_button_hover_text_color', 'option' );
  ?>

  <?php // Dark button color scheme ?>
  <?php if( $dark_button_color ) { ?>
    <style>
      .linked-button-dark {
        background-color: <?php echo $dark_button_color; ?> !important;
      }
    </style>
  <?php } ?>
  <?php if( $dark_button_text_color ) { ?>
    <style>
      .linked-button-dark {
        color: <?php echo $dark_button_text_color; ?> !important;
      }
    </style>
  <?php } ?>
  <?php if( $dark_button_hover_color ) { ?>
      <style>
        .linked-button-dark:hover {
          background-color: <?php echo $dark_button_hover_color; ?> !important;
        }
      </style>
    <?php } ?>
    <?php if( $dark_button_hover_text_color ) { ?>
      <style>
        .linked-button-dark:hover {
          color: <?php echo $dark_button_hover_text_color; ?> !important;
        }
      </style>
    <?php } ?>
