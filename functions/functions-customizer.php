<?php 
/**
*
*	@package CaffeBella
*/
// Supports
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );


function chomikoo_customizer( $wp_customize ){
 // 	$wp_customize->add_section(
 //        'example_section_one',
 //        array(
 //            'title' => 'Example Settings',
 //            'description' => 'This is a settings section.',
 //            'priority' => 35,
 //        )
 //    );
 //  	$wp_customize->add_setting(
 //        'copyright_textbox',
 //        array(
 //            'default' => 'Default copyright text',
 //        )
 //    );

 //    $wp_customize->add_control(
	//     'copyright_textbox',
	//     array(
	//         'label' => 'Copyright text',
	//         'section' => 'example_section_one',
	//         'type' => 'text',
	//     )
	// );
	// setting for the site logo
	$wp_customize->add_setting('chomikoo_theme_logo');
	// control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chomikoo_theme_logo',
		array(
			'label' => 'Upload Logo',
			'section' => 'title_tagline',
			'settings' => 'chomikoo_theme_logo',
		) 
	) );

	// $wp_customize->add_setting('chomikoo_theme_bg',
	// 	array(
	// 		'dafault' => '#ffffff',
	// 	)
	// );

	// $wp_customize->add_control(
 //     new WP_Customize_Color_Control(
 //         $wp_customize,
 //         'chomikoo_theme_bg', 
 //         array(
 //             'label'      => __( 'BG Color', 'chomikootheme' ), //set the label to appear in the Customizer
 //             'section'    => 'colors', //select the section for it to appear under  
 //             'settings'   => 'chomikoo_theme_bg' //pick the setting it applies to
 //         )
 //     )
	// );





}

add_action( 'customize_register', 'chomikoo_customizer' );


