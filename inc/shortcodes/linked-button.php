<?php
function linked_button_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'link' => './',
    'target' => null
  ), $atts );

  if( $a['target'] == "new" ) {
    $target = "_blank";
  }

  return '<a href="' . esc_attr( $a['link'] ) . '" target="' . esc_attr( $target ) . '" class="shortcode-button">' . $content . '</a>';
}
add_shortcode( 'button', 'linked_button_shortcode' );
