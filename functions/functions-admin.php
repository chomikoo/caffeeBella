<?php 

	//Change Logo in login page
	function my_login_logo() { ?>
	    <style type="text/css">
	        #login h1 a, .login h1 a {
	            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/apple-touch-icon.png);
			height:65px;
			width:320px;
			background-repeat: no-repeat;
	        	padding-bottom: 30px;
	        }
	    </style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	
	// REMOVE ADMIN BAR
	add_action('get_header', 'remove_admin_login_header');
		function remove_admin_login_header() {
			remove_action('wp_head', '_admin_bar_bump_cb');
	}

	//Change Admin footer 
	function remove_footer_admin () {
	 
		echo 'Coded by <a href="www.szymontrzepla.pl" target="_blank" style="color: #afcb08">Chomioo</a></p>'; 
	}
	 
	add_filter('admin_footer_text', 'remove_footer_admin');


	//Userproof
	//Clientpfroof functions 
	// Remove adminbar
	add_action('after_setup_theme', 'remove_admin_bar');
	 
	function remove_admin_bar() {
	    if (!current_user_can('administrator') && !is_admin()) {
	      show_admin_bar(false);
	    }
	}


	//Hide update notification
	function hide_update_notice_to_all_but_admin_users() {

	    if (!current_user_can('update_core')) {
	        remove_action( 'admin_notices', 'update_nag', 3 );
	    }
	}

	add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1)


	// remove dashicons from wp_hear
	function wpdocs_dequeue_dashicon() {
	    if (current_user_can( 'update_core' )) {
	        return;
	    }
	    wp_deregister_style('dashicons');
	}
	
	add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

