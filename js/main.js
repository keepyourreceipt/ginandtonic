jQuery(document).ready(function($) {

  $('.three-column-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    dots: true,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });

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

  // if( $('.menu-item-has-children').length ) {
  //   toggleNavSubMenus();
  // }

  function toggleOffCanvasNav() {
    var navOpener = $('.off-canvas-menu-opener');
    var navMenu = $('.off-canvas-menu');

    navOpener.on('click', function() {
      navMenu.toggleClass('off-canvas-menu-active');
      $('body').toggleClass('menu-open');
    });
  }

  // if( $('.off-canvas-menu').length ) {
  //   toggleOffCanvasNav();
  // }


  if( $('.nav-fixed-top').length ) {
    $(window).on('scroll', function() {
      if( $(window).scrollTop() > 10 ) {
        $('.nav-fixed-top').addClass('active');
      } else {
        $('.nav-fixed-top').removeClass('active');
      }
    });
  }

  $('.nav-fixed-top ul li').on('mouseenter', function() {
    $(this).find('.sub-menu').addClass('sub-menu-active');
  });

  $('.nav-fixed-top ul li').on('mouseleave', function() {
    $(this).find('.sub-menu').removeClass('sub-menu-active');
  });

  // Waypoints
  $('.waypoint').each(function() {
    var $element = $(this);
    var waypoints = $element.waypoint(function( direction ) {
      $element.addClass('waypoint-active');
    }, {
      offset: '80%'
    })
  });


});
