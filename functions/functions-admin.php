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

	add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1);


	// remove dashicons from wp_hear
	function wpdocs_dequeue_dashicon() {
	    if (current_user_can( 'update_core' )) {
	        return;
	    }
	    wp_deregister_style('dashicons');
	}
	
	add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );


/*-----------------------------------------------------------------------------------*/
/* All Pages Dropdown List */
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'admin_menu_links_to_all_edit_post_type_custom' ) ) {

	function admin_menu_links_to_all_edit_post_type_custom() {
	    if ( !is_admin() ) // Only Run if On Admin Pages
	        return;

	     $custom = 'page';  // Change this to your custom post type slug ( So for "http://www.example.com/wp-admin/edit.php?post_type=recipes" you would change this to 'recipes'  )



	      // Full List of Paramaters - http://codex.wordpress.org/Template_Tags/get_posts
	      $args = array(
	          'orderby'          => 'modified', //Orderr by date , title , modified, etc
	          'order'            => 'DESC', // Show most recently edited on top
	          'post_type'        => $custom, // Post Type Slug
	          'numberposts'      => -1,  // Number of Posts to Show (Use -1 to Show All)
	          'post_status'      => array('publish', 'pending', 'draft', 'future', 'private', 'inherit'),
	      );
	      $types = get_posts( $args ); // Get All Pages
	      foreach ($types as $post_type) {

		      add_submenu_page( // add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		          'edit.php?post_type='.$custom
		        , esc_attr(ucwords($post_type->post_title)) // Get title, remove bad characters, and uppercase it
		        , esc_attr(ucwords($post_type->post_title)) // Get title, remove bad characters, and uppercase it
		        , 'edit_posts' // Require Edit Post/Page/Custom Capability
		        , 'post.php?post=' . $post_type->ID . '&amp;action=edit' // Get the page link by its id
		        , '' // No function callback
		      );    

	      }

	      wp_reset_postdata();
	}

	add_action('admin_menu', 'admin_menu_links_to_all_edit_post_type_custom');

}

	if ( !function_exists( 'admin_menu_links_to_all_edit_post_type_custom_css' ) ) {
		
	    function admin_menu_links_to_all_edit_post_type_custom_css() {
		?>
			<style type="text/css">ul#adminmenu li.wp-has-submenu > ul.wp-submenu.wp-submenu-wrap {max-height: 700px;overflow-x: hidden;}</style>
		<?php

	   }

	    add_action('admin_head', 'admin_menu_links_to_all_edit_post_type_custom_css');
	}