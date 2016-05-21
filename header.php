<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Techfind
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'techfind' ); ?></a>

	<!-- begin .header-mobile-menu -->
	<nav class="st-menu st-effect-1" id="menu-3">
		<div class="btn-close-home">
			<button class="close-button" id="closemenu"></button>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-button"><i class="fa fa-home"></i></a>
		</div>
		<?php wp_nav_menu( array('theme_location' => 'primary','echo' => true,'items_wrap' => '<ul>%3$s</ul>')); ?>
		<?php get_search_form( $echo = true ); ?>
	</nav>
	<!-- end .header-mobile-menu -->


	<header id="masthead" class="site-header" role="banner">
		<div class="top-bar">
			<div class="container">
				<button class="top-mobile-menu-button mobile-menu-button" data-effect="st-effect-1" type="button"><i class="fa fa-bars"></i></button>
				<div class="top-search-button">
					<a href="#"><i class="fa fa-search"></i></a>
				</div>
				<div class="top-search-form">
					<?php get_search_form(); ?>
				</div>
			</div>

		</div>

		<div class="container">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo">
						<?php techfind_the_custom_logo(); ?>
					</div>
				<?php endif; ?>

				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php

				$description = get_bloginfo( 'description', 'display' );
				if ( $description ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->
		</div>

	</header><!-- #masthead -->

	<div class="menu-sticky clear">
		<div class="container">
			<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

			<div class="search-button">
				<a href="#"><i class="fa fa-search"></i><span>Search</span></a>
				<div class="nav-search-form">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="secondary-navigation">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'walker' => new Techfind_Walker_Nav_Menu() ) ); ?>
		</div>
	</div>


	<div id="content" class="site-content">
