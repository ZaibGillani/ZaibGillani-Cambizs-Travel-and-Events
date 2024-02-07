(function($) {
  
  "use strict";

  // Preloader
  function stylePreloader() {
    $('body').addClass('preloader-deactive');
  }

  // Off Canvas JS
  var canvasWrapper = $(".off-canvas-wrapper");
  $(".btn-menu").on('click', function() {
    canvasWrapper.addClass('active');
    $("body").addClass('fix');
  });

  $(".close-action > .btn-close, .off-canvas-overlay").on('click', function() {
    canvasWrapper.removeClass('active');
    $("body").removeClass('fix');
  });

  //Responsive Slicknav JS
  $('.main-menu').slicknav({
      appendTo: '.res-mobile-menu',
      closeOnClick: true,
      removeClasses: true,
      closedSymbol: '<i class="icon_plus"></i>',
      openedSymbol: '<i class="icon_minus-06"></i>'
  });
	// Public-Private button
	$('#y02').click(function() {
	  $('#y02').css({'background':'#ffe6a5' ,'border':'2px solid #fec225'});
	  $('#n02').css({'background':'#fff2d0' ,'border':'2px solid #fff2d0'});
	  $('#ans02').val('Public');
	});

	$('#n02').click(function() {
	  $('#y02').css({'background':'#fff2d0' ,'border':'2px solid #fff2d0'});
	  $('#n02').css({'background':'#ffe6a5'  ,'border':'2px solid #fec225'});
	  $('#ans02').val('Private');
	});
  /* Featured Events */
	var swiper = new Swiper('.feature-event-slider-container', {
		loop: true,
		slidesPerView: 3,
		spaceBetween: 20,
		pagination: true,
		navigation: true,
		slideVisibleClass: 'swiper-slide-visible',
		watchSlidesVisibility:true,

		navigation: {
			nextEl: '.feature-event-slider-container .feature-event-list-next',
			prevEl: '.feature-event-slider-container .feature-event-list-prev'
		},

		// Responsive breakpoints
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 1,
			},
			// when window width is >= 480px
			480: {
				slidesPerView: 1,
			},
			// when window width is >= 575px
			575: {
				slidesPerView: 1,
			},
			// when window width is >= 768px
			768: {
				slidesPerView: 2,
			},
			// when window width is >= 992px
			992: {
				slidesPerView: 3,
			},
			// when window width is >= 1200px
			1200: {
				slidesPerView: 4,
			}
		}
	});


  var testimonialSlider = new Swiper('.testimonial-slider-container', {
    slidesPerView : 1,
    loop: true,
    spaceBetween : 30,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    navigation: {
      nextEl: '.testimonial-slider-container .swiper-button-next',
      prevEl: '.testimonial-slider-container .swiper-button-prev',
    }
  });


  // Scroll Top Hide Show
  var varWindow = $(window);
  varWindow.on('scroll', function(){
    if ($(this).scrollTop() > 250) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  /* ======== Input incrementer============*/
	$(".numbers-row").append('<div class="inc button_inc visible-hide">+</div><div class="dec button_inc visible-hide">-</div>');
	$(".button_inc").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find("input").val(newVal);
	});
	  /* ======== Nice Select Code ============*/
	$(document).ready(function() {
		  $('select:not(.ignore)').niceSelect();      
		//   FastClick.attach(document.body);
		});  
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
  
  varWindow.on('load', function() {
    AOS.init({
      once: true,
    });
    stylePreloader();
    // isotopePortfolio();
  });
  

})(window.jQuery);