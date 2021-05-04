// Custom Javascript

(function($) {
    "use strict";
    $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if(scroll >= 200) {
        $(".site-header").removeClass("hidden");
    } else {
        $(".site-header").addClass("hidden");
    }

});
})(jQuery);

(function($) {
    "use strict";
    $(window).load(function() {
          $('.container').addClass("down");

      setTimeout(
        function()
        {
          $('.preloader').addClass("hidden");
        }, 100);

          if ( $( "#wpadminbar" ).length ) {
                $('.site-header').addClass("pushdown");
                $('.site-logo-mob').addClass("pushdown");
                $('.site-logo-minimal').addClass("pushdown");
                $('.menu-box').addClass("pushdown");
                $('.menu-box-mob').addClass("pushdown");
                $('.search-overlay').addClass("pushdown");
                $('.mobile-menu.menu-overlay').addClass("pushdown");
              }

          $('.container').addClass("down");
          $('.luxi-button, #main-content, #sidebar-area, #container').addClass("show");
          $( "<div class='fx-wrapper'></div>" ).appendTo( ".slide-right" );
          $( "<div class='fx-wrapper2'></div>" ).appendTo( ".slide-left" );
          $( '.side-text h3' ).wrapInner( '<span></span>' );
          $( '.entry-header img, .zoomfx' ).wrap( '<div class="image-wrap"></div>' );
          $( '.woocommerce ul.products li.product .wp-post-image' ).wrap( '<div class="product-image-wrap"></div>' );
          $( '.products' ).wrap( '<div class="product-grid-wrapper"></div>' );
          $('<div class="clearfix"></div>').insertAfter(".single-product .entry-summary");
          $('.filter-main-container').append('<div class="closeicon small"></div>');
          $('.woocommerce ul.products li.product').append('<div class="wish-icon"><i class="fa fa-arrows" aria-hidden="true"></i></div>');

          $('.mobile-menu li > a').click(function(e){
             if($(this).siblings('ul').length > 0){
                 e.preventDefault();
             }
          });

          $('.wish-icon').on('click', function(e) {
             e.preventDefault();
             $(this).parent().find(".yith-wcqv-button").click();
           });

           $('.woo-filter').on('click', function(e) {
            $('.filter-main-container').toggleClass("hidden");
            $('.closeicon').removeClass("hidden");
          });

          $('.search-box').on('click', function(e) {
              $('.search-overlay').toggleClass("hidden");
              $(".site-header.trans").removeClass("transparent");
          });

          $('.search-overlay-inner .closeicon').on('click', function(e) {
              $('.search-overlay').toggleClass("hidden");
          });

          $('.cart-box').on('click', function(e) {
              $('.cart-sidebar').removeClass("hidden");
              $(".cart-sidebar-dark-overlay").removeClass("hidden");
          });

          $('.cart-sidebar .closeicon, .cart-sidebar-dark-overlay').on('click', function(e) {
              $('.cart-sidebar').addClass("hidden");
              $(".cart-sidebar-dark-overlay").addClass("hidden");
          });

          $('.menu-close-box').on('click', function(e) {
              $('.site-header').toggleClass("hidden");
              $('.menu-box').toggleClass("hidden");
              $('.site-logo-minimal').toggleClass("hidden");
              $('.page-title').toggleClass("pullup");
          });

          $('.menu-box').on('click', function(e) {
              $('.site-header').toggleClass("hidden");
              $('.menu-box').toggleClass("hidden");
              $('.site-logo-minimal').toggleClass("hidden");
              $('.page-title').toggleClass("pullup");
          });

          $('.menu-box-mob').on('click', function(e) {
              $('.menu-overlay').toggleClass("hidden");
          });

          $('.mobile-menu .menu-item-has-children').on('click', function(event) {
              $(this).children('ul').toggleClass('hidden');
          });

          $('.closeicon').on('click', function(e) {
              $('.search-overlay').addClass("hidden");
              $('.menu-overlay').addClass("hidden");
          });

          if($('.woocommerce').length){
            $('.page #respond').hide();
          }

          $( ".widget" ).wrapInner( "<div class='widget-inner'></div>");
          $( "#sidebar-area .widget-title" ).wrap( "<div class='widget-header-wrapper'></div>");
          $(".search-overlay .s").attr("placeholder", "Type here to search");


          (function() {

            $(".qty").before("<span class=\"input-number-decrement\">–</span>");
            $(".qty").after("<span class=\"input-number-increment\">+</span>");

            window.inputNumber = function(el) {

              var min = el.attr('min') || false;
              var max = el.attr('max') || false;

              var els = {};

              els.dec = el.prev();
              els.inc = el.next();

              el.each(function() {
                init($(this));
              });

              function init(el) {

                el.prev().on('click', decrement);
                el.next().on('click', increment);

                function decrement() {
                  $( 'div.woocommerce > form input[name="update_cart"]' ).prop( 'disabled', false );
                  var value = el[0].value;
                  value--;
                  if(!min || value >= min) {
                    el[0].value = value;
                  }
                }

                function increment() {
                  $( 'div.woocommerce > form input[name="update_cart"]' ).prop( 'disabled', false );
                  var value = el[0].value;
                  value++;
                  if(!max || value <= max) {
                    el[0].value = value++;
                  }
                }
              }
            }
          })();

          inputNumber($('.qty'));

          $('.owl-carousel.5items.arrowsnav').owlCarousel({
              loop:true,
              margin:20,
              slideBy:5,
              navText:[],
              smartSpeed:100,
              nav:false,
              dots:false,
              responsive:{0:{items:1},600:{items:3},1000:{items:5}}
          })

          $('.owl-carousel.4items.arrowsnav').owlCarousel({
              loop:true,
              margin:20,
              slideBy:4,
              navText:[],
              smartSpeed:300,
              nav:true,
              dots:false,
              responsive:{0:{items:1},600:{items:4},1000:{items:4}}
          })

          $('.owl-carousel.3items.arrowsnav').owlCarousel({
              loop:true,
              margin:30,
              slideBy:3,
              navText:[],
              smartSpeed:400,
              nav:true,
              dots:false,
              responsive:{0:{items:1},600:{items:3},1000:{items:3}}
          })

          $('.owl-carousel.2items.arrowsnav').owlCarousel({
              loop:true,
              margin:50,
              slideBy:2,
              navText:[],
              smartSpeed:300,
              nav:true,
              dots:false,
              responsive:{0:{items:1},600:{items:2},1000:{items:2}}
          })

          $('.owl-carousel.1items.arrowsnav').owlCarousel({
              loop:true,
              margin:20,
              slideBy:1,
              navText:[],
              smartSpeed:500,
              nav:true,
              dots:false,
              responsive:{0:{items:1},600:{items:1},1000:{items:1}}
          })

          $('.owl-carousel.5items.dotsnav').owlCarousel({
              loop:true,
              margin:20,
              slideBy:5,
              navText:[],
              smartSpeed:100,
              nav:false,
              dots:true,
              responsive:{0:{items:1},600:{items:3},1000:{items:5}}
          })

          $('.owl-carousel.4items.dotsnav').owlCarousel({
              loop:true,
              margin:20,
              slideBy:4,
              navText:[],
              smartSpeed:300,
              nav:false,
              dots:true,
              responsive:{0:{items:1},600:{items:4},1000:{items:4}}
          })

          $('.owl-carousel.3items.dotsnav').owlCarousel({
              loop:true,
              margin:30,
              slideBy:3,
              navText:[],
              smartSpeed:400,
              nav:false,
              dots:true,
              responsive:{0:{items:1},600:{items:3},1000:{items:3}}
          })

          $('.owl-carousel.2items.dotsnav').owlCarousel({
              loop:true,
              margin:40,
              slideBy:2,
              navText:[],
              smartSpeed:500,
              nav:false,
              dots:true,
              responsive:{0:{items:1},600:{items:2},1000:{items:2}}
          })

          $('.owl-carousel.1items.dotsnav').owlCarousel({
              loop:true,
              margin:20,
              slideBy:1,
              navText:[],
              smartSpeed:600,
              nav:false,
              dots:true,
              responsive:{0:{items:1},600:{items:1},1000:{items:1}}
          })
      });

})(jQuery);

(function($) {
    "use strict";

    $( "#accordion" ).accordion({
      animate: 300,
      heightStyle: "content",
      event:false,
      active :false
    });

var noSections = $("#accordion h3").length-1;

$("h3").each(function (index, element)
{
    $(element).click(function()
    {
       if($(this).hasClass('ui-state-active'))
       {
           if(index < noSections)
              $("#accordion").accordion('option','active',index + 1);
           else
              $("#accordion").accordion('option','active',index - 1);
       }
       else
       {
          $("#accordion").accordion('option','active',index);
       }
   });
});

})(jQuery);
