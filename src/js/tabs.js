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

				$this.siblings('a').removeClass('active_tabs');
				$this.addClass('active_tabs');

				$target.siblings('.tabs__content').fadeOut().removeClass('active_tabs');
				$target.fadeIn().addClass('active_tabs');

			}

		});


	});


});