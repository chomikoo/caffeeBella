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
		$ver = '1a';
		///////////////////


		// wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array( 'reset' ) );
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/style.css',array(), $ver );

		// wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/scripts/main.min.js', array( 'jquery-core' ), $ver, true );
		wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/src/js/tabs.js', array('jquery-core'),'1.01a', true );

		wp_enqueue_script( 'script_main', get_stylesheet_directory_uri() . '/src/js/script.js', array('jquery-core'),'1.01a', true );
	}

	add_action( 'wp_enqueue_scripts', 'my_assets' );

