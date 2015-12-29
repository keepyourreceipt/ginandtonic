jQuery(document).ready(function($) {

  themeInit();

  function themeInit() {
    addWaypointsFormClasses();
    ajaxAddProductToCart();
    // initThreeColumnSlider();
    scrollToTop();
    fixedNavTop();
    fixedNavToggleSubNav();
    initWaypoints();
  }

  function addWaypointsFormClasses() {
    $('div.wpcf7').addClass( 'contact-form' );
    $('.contact-form form p').addClass( 'waypoint waypoint-bottom-to-top anim-time-medium' );
  }

  function ajaxAddProductToCart() {
    $('.ajax-submit-button').on('click', function(e) {
      e.preventDefault();
      var $url   = $(this).attr('href'),
          $this   = $(this);
      $.ajax({
        type: "POST",
        url: $url,
        success: function() {
          $this.siblings('.added-to-cart-message').addClass('active');
        }
      });
    });
  }

  function initThreeColumnSlider() {
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
  }


  FastClick.attach(document.body);

  function scrollToTop() {
    $('a[data-animate-scroll]').on('click', function() {
      $('html, body').animate({
        scrollTop:0
      }, 1400, 'ease');
    });
  }

  function fixedNavTop() {
    if( $('.nav-fixed-top').length ) {
      $(window).on('scroll', function() {
        if( $(window).scrollTop() > 10 ) {
          $('.nav-fixed-top').addClass('active');
        } else {
          $('.nav-fixed-top').removeClass('active');
        }
      });
    }
  }

  function fixedNavToggleSubNav() {
    $('.nav-fixed-top ul li').on('mouseenter', function() {
      $(this).find('.sub-menu').addClass('sub-menu-active');
    });

    $('.nav-fixed-top ul li').on('mouseleave', function() {
      $(this).find('.sub-menu').removeClass('sub-menu-active');
    });
  }

  function initWaypoints() {
    $('.waypoint').each(function() {
      var $element = $(this);
      var waypoints = $element.waypoint(function( direction ) {
        $element.addClass('waypoint-active');
      }, {
        offset: '80%'
      })
    });
  }


});
