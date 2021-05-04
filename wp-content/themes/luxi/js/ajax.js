//AJAX
(function($) {
"use strict";
  jQuery(document).ready(function($) {
  // Ajax Product Grid
  $('.cat-trigger').live('click', function(e) {
    $('.cat-trigger').removeClass("active");
    $(this).addClass("active");
  });

  $('.cat-trigger').on('click', function(e) {
    e.preventDefault();
    $('.product-grid-cover').removeClass("hidden");
  	var cat = $(this).text();
    var pageNumber = 1;

  	$.ajax({
      cache: false,
  		url: luxi_ajax_obj.ajaxurl,
  		data: {
  			'action':'luxi_ajax_request',
  			'cat' : cat
  		},
  		success:function(html, data) {
          var total = $('ul.products').attr("totalpages");
          $('.product-grid-cover').addClass("hidden");
          $('.et-load-more').attr('data-category', cat);
          $('.et-load-more').attr('data-pager', '1');
          $('.et-load-more').attr('data-totalpages', total);
          $('.et-product-grid-wrapper').replaceWith(html);
          $( '.woocommerce ul.products li.product .wp-post-image' ).wrap( '<div class="product-image-wrap"></div>' );
  		},
  		error: function(errorThrown){
  		    console.log(errorThrown);
  		}
  	});
  });

  // Ajax Load More
    var ppp = 6; // Post per page
    $(".et-load-more").live( "click", function(e) {
        e.preventDefault();
        $('.et-load-more').hide();
        var cat = $(this).attr("data-category");
        var pageNumber = $(this).attr("data-pager");
        var total = $('ul.products').attr("data-totalpages");
        pageNumber++;
        $('.et-load-more').attr('data-pager', pageNumber);

        $.ajax({
            cache: false,
            url: luxi_ajax_obj.ajaxurl,
            data: {
            'action':'more_post_ajax',
      			'cat' : cat,
            'ppp' : ppp,
            'page' : pageNumber,
            'total' : total
            },
            success: function(html, data){

              var $data = $(html);
                          if($data.length){
                              $(".et-product-grid-wrapper .products").append(html);
                              $( '.woocommerce ul.products li.product .wp-post-image' ).wrap( '<div class="product-image-wrap"></div>' );
                              //$('.woocommerce ul.products li.product').append('<div class="wish-icon"><i class="fa fa-arrows" aria-hidden="true"></i></div>');
                              //$(this).parent().parent().parent().find(".yith-wcqv-button").click();
                          } else{}
                      },

            error: function(errorThrown){
        		    console.log(errorThrown);
            }
          });
        });
      });
})(jQuery);
