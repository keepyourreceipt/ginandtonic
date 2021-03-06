jQuery(document).ready(function($) {

  // Setup theme functions
  themeInit();

  // Remove page loader
  $('.loader-overlay').fadeOut();

  $(window).on('resize', function() {
    // Call functions on resize
  });

  function themeInit() {
    autoLayout();
    // fixedTopMenu();
    productFeatures();
    toggleMobileModalMenuOnClick();
    appendMobileToolbar();
    preventScrollJumpMobileMenuParentItem();
    toggleMobileModalSubMenu();
    testimonialsSlider();
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
    isotopeGrid();
    bootstrapAccordionCallback();
    smoothScrollLinks();
    FastClick.attach(document.body);
  }

  function fixedTopMenu() {
    if( $('.fixed-top-menu').length ) {
      var $menu = $('.fixed-top-menu');
      var $menuLinks = $menu.find('.fixed-top-menu-inner');
      var $logo = $('.company-logo');
      var $logoHeight = $logo.find('img').height() + 20;
      $logo.css('height', $logoHeight + "px");
    }
  }

  function smoothScrollLinks() {
    if( $('.nav-menu').length ) {
      $('.nav-menu a').on( 'click', function(e) {
        var $href = $(this).attr('href');
        var $hrefHash = $href.split('#')[1];
        if( $hrefHash && $('#' + $hrefHash).length ) {
          if( ! $(this).attr('target') ) {
            e.preventDefault();
            $('html,body').animate({
                 scrollTop: $('#' + $hrefHash).offset().top - 60
             }, 1000, 'swing');
          }
        }
      });
    }
  }

  function productFeatures() {
    if( $('.product-features').length ) {
      $('.product-features').each(function() {
        var $container = $(this);
        $container.find('button').on('click', function() {
          var $activeSection = $(this).attr('class').split(' ')[0];
          $container.find('.section').hide().removeClass('active');
          $container.find('button').removeClass('active');
          $container.find('.' + $activeSection).show().addClass('active');

          // Trigger resize to re-calculate js pased positioning for
          // parallax and dynamically positioned elements
          $(window).trigger('resize');
        });
      });
    }
  }

  function bootstrapAccordionCallback() {
    $('.panel-collapse').on('hidden.bs.collapse', function () {
      // Trigger resize to re-calculate js pased positioning for
      // parallax and dynamically positioned elements
      $(window).trigger('resize');
    });
  }

  function appendMobileToolbar() {
    if( ! $('.fixed-top-menu').hasClass('hide-top-toolbar') ) {
      var mobileToolbar = $('.mobile-nav-toolbar-container').html();
      $('.modal-menu').append( mobileToolbar );
    }
  }

  function isotopeGrid() {
    var filterClass;
    var isotopGrid = $('.portfolio-grid-items').isotope({
      itemSelector: '.portfolio-grid-item',
      layoutMode: 'fitRows'
    });

    $('.portfolio-grid-filter button').on('click', function() {
      $(window).trigger('resize');
      $('.portfolio-grid-filter button.active').removeClass('active');
      if( $(this).hasClass( 'all' ) ) {
        $(this).addClass('active');
        isotopGrid.isotope({
          filter: '*'
        });
      } else {
        filterClass = $(this).data('filter');
        $(this).addClass('active');
        isotopGrid.isotope({
          filter: '.' + filterClass
        });
      }
      // Trigger resize to re-calculate js pased positioning for
      // parallax and dynamically positioned elements
      setTimeout(function() {
        $(window).trigger('resize');
      }, 750);
    });
  }

  function preventScrollJumpMobileMenuParentItem() {
    if( $('.modal-menu li.menu-item-has-children').length ) {
      $('.modal-menu li.menu-item-has-children > a').on('click', function(e) {
        e.preventDefault();
      });
    }
  }

  function toggleMobileModalMenu() {
    $('html, body').toggleClass('no-scroll');
    $('.modal-menu-container').toggleClass('active');
    $('.modal-menu-overlay').toggleClass('active');
    $('.menu-toggle-bar').toggleClass('active');

    $('.menu > li').each(function( index ) {
      var menuItem = $(this);
      var delay = 50 * index;
      setTimeout( function() {
        menuItem.toggleClass( 'active' );
      }, delay);
    });

    var toolbarTimingOffset = $('.menu > li').length * 50;
    setTimeout(function() {
      $('.mobile-nav-toolbar').toggleClass('active');
    }, toolbarTimingOffset );
  }

  function toggleMobileModalMenuOnClick() {
    if( $('.modal-menu-toggle').length ) {
      $('.modal-menu-toggle').on('click', function() {
        $(this).toggleClass('active');
        toggleMobileModalMenu();
      });
    }
  }

  function toggleMobileModalSubMenu() {
    if( $('.modal-menu-toggle').length ) {
      $('.modal-menu .menu > li.menu-item-has-children').on('click', function() {
        $(this).find('.sub-menu').toggleClass('active');
      });
    }
  }

  function autoLayout() {

    if( $('.hero-image').length ) {
      $('.hero-image').each(function( index ) {
        var heroImage = $(this);
        if( heroImage.find('.text-content').children().eq(0).css('text-align') == "center" ) {
          heroImage.css('text-align', 'center');
        }
      });
    }

    var firstSection = $('.page-content section').eq(0);
    var navMenuHeight = $('.nav-menu').height();
    var navToolbarHeight = null;
    if( $('.top-nav-toolbar').length ) {
      navToolbarHeight = $('.top-nav-toolbar').height();
    }

    if( firstSection.hasClass('hero-image') || firstSection.hasClass('page-header') ) {
      if( navToolbarHeight != null && $('.top-nav-toolbar').css('display') != "none" ) {
        firstSection.css('padding-top', (navMenuHeight + navToolbarHeight) + "px");
      } else {
        firstSection.css('padding-top', (navMenuHeight) + "px");
      }
    }

    $('.side-by-side').each(function() {
      if( $(this).next('section').hasClass('side-by-side') ) {
        $(this).css('padding-bottom', '0');
      }
    });

    $('.hero-image').each(function( index ) {
      if( $(this).index() > 0 ) {
        $(this).find('.table')
          .css('padding-top', '10vh')
          .css('padding-bottom', '10vh');
      }
    });
  }

  function testimonialsSlider() {
    if( $('.testimonials').length ) {
      $('.testimonials .slides').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: true,
              arrows: false,
              autoplay: true,
              autoplaySpeed: 5000
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              arrows: false,
              autoplay: true,
              autoplaySpeed: 5000
            }
          }
        ]
      });
    }
  }

  function initMasonryGrid() {
    if( $('.blog-posts-grid-layout').length ) {
      $('.blog-posts-grid-layout').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-item',
      });
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
          // Redirect to cart page
          window.location.href = "http://localhost/ginandtonic.com/cart";
        }
      });
    });
  }

  function scrollToTop() {
    $('a[data-animate-scroll]').on('click', function(e) {
      e.preventDefault();
      $("html, body").animate({ scrollTop: 0 }, 1000);
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
        offset: '95%'
      })
    });
  }

});
