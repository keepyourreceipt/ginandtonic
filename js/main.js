jQuery(document).ready(function($) {

  FastClick.attach(document.body);

  $.stellar();

  // Set scroll to top link functionality
  $('a[data-animate-scroll]').on('click', function() {
    $('html, body').animate({
      scrollTop:0
    }, 1400, 'ease');
  });

  function toggleNavSubMenus() {
    var parentLink = $('.menu-item-has-children');
    var subMenuContainer = parentLink.find('.sub-menu');

    parentLink.on('click', function(event) {
      event.preventDefault();
      subMenuContainer = $(this).find('.sub-menu');
      subMenuContainer.toggleClass('sub-menu-active');
    });
  }

  if( $('.menu-item-has-children').length ) {
    toggleNavSubMenus();
  }

  function toggleOffCanvasNav() {
    var navOpener = $('.off-canvas-menu-opener');
    var navMenu = $('.off-canvas-menu');

    navOpener.on('click', function() {
      navMenu.toggleClass('off-canvas-menu-active');
      $('body').toggleClass('menu-open');
    });
  }

  if( $('.off-canvas-menu').length ) {
    toggleOffCanvasNav();
  }

  // Waypoints
  $('.waypoint').each(function() {
    var $element = $(this);
    var waypoints = $element.waypoint(function( direction ) {
      $element.addClass('waypoint-active');
    }, {
      offset: '75%'
    })
  });


});
