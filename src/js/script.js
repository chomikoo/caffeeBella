jQuery(function($){

	console.log('Hello from script.js');

	$('.wpcf7-form-control').on('focus', function(){
		$(this).closest('p').find('label').addClass('focus');
	})
	.on('blur', function(){
		if($(this).val() == '') {
			$(this).closest('p').find('label').removeClass('focus');
		}
	});

})