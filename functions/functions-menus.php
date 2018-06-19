<?php
/**
*	@package Blank
*	
*/
	// Register Menu
	function chomikoo_custom_new_menu() {
	  register_nav_menu('header-menu',__( 'Header menu' ));
	}
	add_action( 'init', 'chomikoo_custom_new_menu' );


