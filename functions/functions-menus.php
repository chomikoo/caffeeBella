<?php
/**
*	@package Blank
*	
*/
	// Register Menu
	function chomikoo_custom_new_menu() {
	  register_nav_menu('Main_menu',__( 'Main_menu' ));
	}
	add_action( 'init', 'chomikoo_custom_new_menu' );


