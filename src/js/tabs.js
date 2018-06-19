jQuery(function($){

	console.log('Hello from tabs');

	$('.tabs').addClass('js');

	$('.tabs__nav').each(function(){

		const $a = $(this).find('a');

		$a.on('click', function(e) {

			const $this = $(this);

			const href = $this.attr('href');
			// console.log(href);
			const $target = $(href);

			if( $target.length ){

				e.preventDefault();

				$this.siblings('a').removeClass('active');

				$this.addClass('active');

				$target.siblings('.tabs__content').fadeOut().removeClass('active');
				$target.fadeIn().addClass('active');





			}

		});


	});


});