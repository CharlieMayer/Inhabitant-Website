<?php
/**
 * The header for our theme.
 *
 * @package RED_Starter_Theme
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

	<?php if(is_home()): ?>

						<div id="page" class="hfeed site">
							<a class="skip-link screen-reader-text" href="#content"><?php esc_html( 'Skip to content' ); ?></a>
				      <?php $homeinfo = get_bloginfo('template_url')."/images/home-hero.jpg";
				     ?>

<div class="bannerimage" style="background: url(' <?php echo $homeinfo ?>'); background-size: cover">

					<?php endif; ?>



					<header id="masthead" class="site-header <?php echo (is_home()? 'full-header' : 'min-header') ?> " role="banner">




				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

						<div class="link-space"></div>
					</a>

				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" ><?php esc_html( 'Primary Menu' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

							</nav><!-- #site-navigation -->
					<?php if(is_home()): ?>


					<img src="<?php bloginfo('template_url'); ?>/images/logos/inhabitent-logo-full.svg"; style="margin-right: 440px; margin-top: 200px">
					<?php endif; ?>





			</div>

			</header><!-- #masthead -->

			<div id="content" class="site-content">
