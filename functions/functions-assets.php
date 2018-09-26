<?php 

	//Remove WP jQ from head add in main.min.js

	// function myphpinformation_scripts() {    


	// 	    if( !is_admin()){
	// 		 wp_deregister_script('jquery');

	// 	}

	// }

	// add_action( 'wp_enqueue_scripts', 'myphpinformation_scripts' );


	// ENQUEUE ASSETS

	function my_assets() {
		// cache VERSION //
		// $ver = time();
		$ver = 2106;

		///////////////////


		// wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array( 'reset' ) );
		wp_enqueue_style( 'styles', BASE_URL . 'dist/css/style.min.css',array(), $ver );

		wp_enqueue_script( 'scripts', BASE_URL . 'dist/js/main.min.js', array( 'jquery-core' ), $ver, true );
	
	}

	add_action( 'wp_enqueue_scripts', 'my_assets' );

