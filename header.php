<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mahal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'mahal'); ?></a>

		<header id="masthead" class="site-header" <?php if (get_header_image()) : ?> style="background:url(<?php header_image(); ?>) fixed;" <?php endif; ?>>
			<nav id="site-navigation" class="main-navigation">
				<div class="grid w960">
					<div class="row">
						<div class="c12"><button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="dashicons dashicons-menu"></span></button></div>
						<?php if (has_nav_menu('primary')) : ?>
							<?php wp_nav_menu(array(
								'theme_location'  => 'primary',
								'container'       => 'div',
								'container_class' => 'c12 primary-menu-list',
								'menu_id'		  => 'menu'
							)); ?>
						<?php else : ?>
							<div class="main-navigation-not-set c12">
								<p><?php printf(esc_attr('Please go to <a href="%1$s">menus</a> to set this area.', 'mahal'), esc_url(admin_url('nav-menus.php'))); ?></p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</nav><!-- #site-navigation -->

			<?php if (is_home()) : ?>
				<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()) :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					else :
					?>
						<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
					<?php
					endif;
					$mahal_description = get_bloginfo('description', 'display');
					if ($mahal_description || is_customize_preview()) :
					?>
						<p class="site-description"><?php echo $mahal_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
													?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<?php if (get_theme_mod('custom_avatar')) : ?>
					<img src="<?php echo esc_url(get_theme_mod('custom_avatar')); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="avatar">
				<?php else : ?>
					<?php echo get_avatar(get_bloginfo('admin_email'), 150); ?>
				<?php endif; ?>
			<?php endif; ?>
		</header><!-- #masthead -->

		<div id="content" class="site-content">