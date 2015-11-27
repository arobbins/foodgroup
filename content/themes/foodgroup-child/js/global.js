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
  	$("header .genesis-nav-menu").slideToggle();
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
    $mobileMenu.slideToggle();
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
    var placeholder = $hiddenElement.text();

    $('.ss-secondary-text').parent().next().attr("placeholder", placeholder);
  }
  createPlaceholderText();

});