<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
	<link rel="shortcut icon" href="<?php echo BASE_URL ?>/dist/images/favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Sacramento&amp;subset=latin-ext" rel="stylesheet">
</head>

<body <?php body_class(); ?> 
	<?php if( get_theme_mod( 'custom-background' )  ) {?>
		style="<?php echo get_theme_mod( 'custom-background' ); ?>"
	<?php } ?>
	>
	
	<header id="header" class="header bg-center" style="background-image:url(<?php header_image(); ?>)">

		<div class="header__container container">

			<h1 class="logo">
				
				<a href="<?php home_url('/'); ?>" >
					<?php if( get_theme_mod( 'chomikoo_theme_logo' ) ): ?> 
						<img src="<?php echo get_theme_mod( 'chomikoo_theme_logo' ) ?>" class="logo__img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<?php else : ?>
						<?php bloginfo( 'name' ); ?>
					<?php endif; ?>
				</a>

			</h1>

			<nav class="nav">
				
				<?php wp_nav_menu( 
					array( 
						'theme_location' 	=> 'header-menu',
						'container'			=> false,	
						'menu_class'		=> 'nav__list',
						) 
				); ?>

			</nav>

			<p class="header__description">
				lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore mag na aliqua. Ut enim ad minim veniam
			</p>
		</div>
	</header>

