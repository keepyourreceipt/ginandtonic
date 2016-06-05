<?php
function linked_button_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'link' => './',
    'target' => null,
    'color-scheme' => 'dark'
  ), $atts );

  if( $a['color-scheme'] == "dark" ) {
    $color_scheme_class = "dark";
  } else {
    $color_scheme_class = "light";
  }

  if( $a['target'] == "new" ) {
    $target = "_blank";
  }

  return '<a href="' . esc_attr( $a['link'] ) . '" target="' . esc_attr( $target ) . '" class="linked-button linked-button-' . $color_scheme_class . '">' . $content . '</a>';
}
add_shortcode( 'button', 'linked_button_shortcode' );
