jQuery(document).ready(function($) {

  themeInit();

  $(window).on('resize', function() {
    vertCenterHeroImageContent();
  });

  function themeInit() {
    alignHeroImageButtons();
    vertCenterHeroImageContent();
    addWaypointsFormClasses();
    ajaxAddProductToCart();
    toggleOffCanvasMenu();
    addBootstrapClassesWoocommerceFields();
    eventsAccordion();
    initGoogleMap();
    scrollToTop();
    fixedNavTop();
    toggleSubNav();
    initWaypoints();
    addIndexToGalleryImage();
    launchPhotoSwipeGallery();
    submitSearchForm();
    initMasonryGrid();
    FastClick.attach(document.body);
  }

  function initMasonryGrid() {
    $('.masonry-container').masonry({
      itemSelector: '.masonry-item',
      columnWidth: '.masonry-item',
    });
  }

  function alignHeroImageButtons() {
    if( $('.hero-image').length ) {
      $('.hero-image').each(function( index ) {
        var heroImage = $(this);
        if( heroImage.find('.text-content').children().eq(0).css('text-align') == "center" ) {
          heroImage.css('text-align', 'center');
        }
      });
    }
  }

  function vertCenterHeroImageContent() {
    var firstSection = $('.page-content section').eq(0);
    var navMenuHeight = $('.nav-menu').height();
    if( firstSection.hasClass('hero-image') ) {
      firstSection.addClass( 'adjusted-for-menu-height' );
      firstSection.css('padding-top', navMenuHeight + "px");
    }
  }

  function launchPhotoSwipeGallery() {
    if( $('.image-gallery img').length ) {
      $('.image-gallery img').on('click', function() {
        var imageIndex = $(this).data('index');
        buildPhotoSwipeGallery( imageIndex );
      });
    }
  }

  function submitSearchForm() {
    if( $('#submit-search-form').length ) {
      $('#submit-search-form').on('click', function() {
        $('#search-form').submit();
      });
    }
  }

  function addIndexToGalleryImage() {
    if( $('.image-gallery img').length ) {
      var $counter = 0;
      $('.image-gallery img').each(function() {
        $(this).attr('data-index', $counter);
        $counter++;
      });
    }
  }

  function buildPhotoSwipeGallery( $imageIndex ) {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    var items = [];
    $('.image-gallery img').each(function() {
      var src = $(this).attr('src');
      var width = 900;
      var height = 600;

      var item = {
        src: src,
        w: width,
        h: height
      }

      items.push( item );
    });

      var options = {
          index: $imageIndex,
          showHideOpacity:true,
          getThumbBoundsFn: function( $imageIndex ) {
              var thumbnail = document.querySelectorAll('.image-gallery img')[$imageIndex];
              var pageYScroll = window.pageYOffset || document.documentElement.scrollTop;
              var rect = thumbnail.getBoundingClientRect();
              return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
          }
      };

      var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
      gallery.init();
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

      var mapPin = null;
      if( $('#map').data('custom-map-pin').length ) {
        mapPin = $('#map').data('custom-map-pin');
      }

      var map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: mapLat,
          lng: mapLng
        },
        scrollwheel: false,
        zoom: 12
      });

      var marker = new google.maps.Marker({
        position: mapLatLng,
        map: map,
        icon: mapPin
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
    if( $('.fixed-top-menu').length ) {
      $(window).on('scroll', function() {
        if( $(window).scrollTop() > 10 ) {
          $('.fixed-top-menu').addClass('active');
        } else {
          $('.fixed-top-menu').removeClass('active');
        }
      });
    }
  }

  function toggleSubNav() {
    $('.nav-menu ul li.menu-item-has-children > a').on('click', function( event ) {
      event.preventDefault();
      if( $(this).parents('li').find('.sub-menu').hasClass('sub-menu-active') ) {
        $('.sub-menu').removeClass( 'sub-menu-active' );
      } else {
        $('.sub-menu').removeClass( 'sub-menu-active' );
        $(this).parents('li').find('.sub-menu').addClass('sub-menu-active');
      }
    });

    $(document).bind('click', function(e) {
      if(!$(e.target).is('.nav-menu ul li.menu-item-has-children > a')) {
        $('.sub-menu').removeClass( 'sub-menu-active' );
      }
    });
  }

  function initWaypoints() {
    $('.waypoint').each(function() {
      var $element = $(this);
      var waypoints = $element.waypoint(function( direction ) {
        $element.addClass('waypoint-active');
      }, {
        offset: '85%'
      })
    });
  }

});
