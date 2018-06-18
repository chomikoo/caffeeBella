<?php 

/**
*	@package Blank
*	
*/
	/* add most important inline css to head (https://github.com/RyanZim/postcss-uncss) */
	add_action('wp_head', 'inline_css');

	function inline_css() {

	 	 $file = get_template_directory() . '/inline_styles.css';
	  	if (!file_exists($file)) return false;
	 	 ?>
		<style>
		<?php readfile($file); ?>
		</style>
	<?php
	}


	if(!defined('BASE')) {
	//define('NAZWA_SZABLONU', ABSPATH.'wp-content/themes/'.get_template().'/');
		define('BASE', get_theme_root().'/'.get_template().'/');
	}	

	if(!defined('BASE_URL')) {
		define('BASE_URL', WP_CONTENT_URL.'/themes/'.get_template().'/');
	}

