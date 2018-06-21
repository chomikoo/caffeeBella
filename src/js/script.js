jQuery(function($){
	'use strict'
	
	console.log('Hello from script.js');

	// Init scrollreveal

	window.sr = ScrollReveal();
	sr.reveal('.reveal');


	// Smooth scroll CssTricks
	// Select all links with hashes
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .not('[href*="#tab"]')
	  .click(function(event) {  
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          $target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            $target.focus(); // Set focus again
	          };
	        });
	      }
	    }
	  });

	// Init Slider
	const $carousel = $('.tabs__content');

	$('.tabs__btn').on('click', () => {
		console.log('slick');
		if( $carousel.hasClass('slick-initialized') ) {
			$carousel.slick('unslick');
		}
		

		$carousel.slick({
			slidesToShow: 1,  
			slidesToScroll: 1,
			arrows: false, 
			// adaptiveHeight: true,
			mobileFirst: true ,
			// variableWidth: true,
		});  

	})




	// Contact Form Movin Labels

	$('.wpcf7-form-control').on('focus', function(){
		$(this).closest('p').find('label').addClass('focus');
	})
	.on('blur', function(){
		if($(this).val() == '') {
			$(this).closest('p').find('label').removeClass('focus');
		}
	});

})