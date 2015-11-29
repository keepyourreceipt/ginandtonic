<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php wp_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://use.typekit.net/buc6qub.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <?php wp_head(); ?>
    </head>
    <body>

      <div class="off-canvas-menu">
        <div class="off-canvas-menu-opener">
          <span class="off-canvas-nav-opener-bar-one"></span>
          <span class="off-canvas-nav-opener-bar-two"></span>
          <span class="off-canvas-nav-opener-bar-three"></span>
        </div>
        <?php
          $defaults = array(
          	'theme_location'  => '',
          	'menu'            => '',
          	'container'       => 'div',
          	'container_class' => 'off-canvas-nav',
          	'container_id'    => '',
          	'menu_class'      => 'menu',
          	'menu_id'         => '',
          	'echo'            => true,
          	'fallback_cb'     => 'wp_page_menu',
          	'before'          => '',
          	'after'           => '',
          	'link_before'     => '',
          	'link_after'      => '',
          	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          	'depth'           => 0,
          	'walker'          => ''
          );

          wp_nav_menu( $defaults );
          ?>
      </div>
