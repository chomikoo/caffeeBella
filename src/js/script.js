jQuery(function($){

	console.log('Hello from script.js');

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
			mobileFirst: true,
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