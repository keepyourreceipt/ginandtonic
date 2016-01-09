jQuery(document).ready(function($) {

  themeInit();

  function themeInit() {
    addWaypointsFormClasses();
    ajaxAddProductToCart();
    toggleOffCanvasMenu();
    addBootstrapClassesWoocommerceFields();
    eventsAccordion();
    initGoogleMap();
    scrollToTop();
    fixedNavTop();
    fixedNavToggleSubNav();
    initWaypoints();
    FastClick.attach(document.body);
  }

  function eventsAccordion() {
    if( $('.events-calendar').length ) {
        $('.event-listing .event-header').on('click', function() {
          $(this).siblings('.event-description').slideToggle();
        });
    }
  }

  function toggleOffCanvasMenu() {
    $('.off-canvas-menu-opener').on('click', function() {
      $('.off-canvas-menu').toggleClass('off-canvas-menu-active');
    });

  }

  function addBootstrapClassesWoocommerceFields() {
    if( $('.woocommerce input, .woocommerce textarea').length ) {
      $('.woocommerce input, .woocommerce textarea').addClass('form-control');      
    }
  }

  function initGoogleMap() {
    if( $('#map').length ) {
      var mapLat = $('#map').data("lat");
      var mapLng = $('#map').data("lng");
      var mapLatLng = {lat: mapLat, lng: mapLng};

      var map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: mapLat,
          lng: mapLng
        },
        scrollwheel: false,
        zoom: 10
      });

      var marker = new google.maps.Marker({
        position: mapLatLng,
        map: map,
      });

    }
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
