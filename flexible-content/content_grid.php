<?php
  if( get_sub_field( 'content_type' ) == "dynamic" ) {
    get_template_part( 'flexible', 'content/flexible-template-parts/dynamic-content-grid' );
  } else {
    get_template_part( 'flexible', 'content/flexible-template-parts/flexible-content-grid' );
  }
?>
