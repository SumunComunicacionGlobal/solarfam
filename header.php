<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Solarfam
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'solarfam' ); ?></a>

	<header id="masthead">
		
		<div class="site-branding">
			<?php the_custom_logo();?>
		</div><!-- .site-branding -->	

		<div class="site-navigation">
			<?php
				wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'container' => 'nav',
					'container_class' => 'header-main-menu-wrapper',
					'depth' => 3
				));
			?>
		</div><!-- .site-navigation -->

	</header><!-- #masthead -->

	
