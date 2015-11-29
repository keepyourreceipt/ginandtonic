<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php wp_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    </head>
    <body>

      <div class="off-canvas-menu">
        <div class="off-canvas-menu-opener">

        </div>
        <?php
        $defaults = array(
        	'theme_location'  => 'main-nav',
        	'menu'            => '',
        	'container'       => 'div',
        	'container_class' => '',
        	'container_id'    => '',
        	'menu_class'      => 'menu',
        	'menu_id'         => 'main-nav',
        	'echo'            => true,
        	'fallback_cb'     => 'wp_page_menu',
        	'before'          => '',
        	'after'           => '',
        	'link_before'     => '',
        	'link_after'      => '',
        	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        	'walker'          => ''
        );

        wp_nav_menu( $defaults );
        ?>
      </div>
