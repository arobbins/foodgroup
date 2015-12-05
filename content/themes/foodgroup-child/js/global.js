jQuery(function( $ ){

  var $mobileMenuIcon = $('.mobile-nav-icon');
  var $mobileMenu = $('.nav-mobile');

	$(".site-header").after('<div class="bumper"></div>');

	$(window).scroll(function () {
	  if ($(document).scrollTop() > 1 ) {
	    $('.site-header').addClass('shrink');
	  } else {
	    $('.site-header').removeClass('shrink');
	  }
	});

  $("header .genesis-nav-menu").addClass("responsive-menu").before('<div id="responsive-menu-icon"></div>');

  $("#responsive-menu-icon").click(function(){
  	$("header .genesis-nav-menu").slideToggle(250);
  });

  $(window).resize(function(){
  	if(window.innerWidth > 600) {
  		$("header .genesis-nav-menu").removeAttr("style");
  	}
  });

  $(".component-video-wrapper").fitVids();




  $('.component-slider').imagesLoaded(function() {

    $('.component-slider').fadeIn(500).slick({
      arrows: false
    });

  });


  $mobileMenuIcon.click(function() {
    $(this).toggleClass('is-activated');
    $mobileMenu.slideToggle(250);
  });


  $(window).resizeend({
    delay : 250
  }, function() {
    if($mobileMenuIcon.hasClass('is-activated')) {
      if($(window).width() >= 768) {
        $mobileMenuIcon.removeClass('is-activated');
        $mobileMenu.hide();
      }
    }
  });

  var createPlaceholderText = function() {
    var $hiddenElement = $('.ss-secondary-text');
    var placeholder = $hiddenElement.html();

    $('.ss-secondary-text').parent().next().attr("placeholder", placeholder);
  }
  createPlaceholderText();

  (function() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');
    var edge = ua.indexOf('Edge/');

    if (msie > 0) {
      $('body').addClass('is-ie');

    } else if (trident > 0) {
      $('body').addClass('is-ie');

    } else if (edge > 0) {
      $('body').addClass('is-ie');

    } else {
      $('body').addClass('isnot-ie');
    }

    if(/MSIE 9/i.test(navigator.userAgent)){
      $('body').addClass('is-ie-9');
    }

  })();

});