<?php

/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package Mahal
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses mahal_header_style()
 * @uses mahal_admin_header_style()
 * @uses mahal_admin_header_image()
 */
function mahal_custom_header_setup() {
	add_theme_support('custom-header', apply_filters('mahal_custom_header_args', array(
		'random-default'         => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'mahal_header_style',
		'admin-head-callback'    => 'mahal_admin_header_style',
		'admin-preview-callback' => 'mahal_admin_header_image',
		'default-text-color'     => '#fff',
		'header-text'            => true,
		'width'					 => 1920,
		'height'				 => 600,
	)));
	register_default_headers(array(
		'green-background' => array(
			'url'           => '%s/assets/images/green-background.jpg',
			'thumbnail_url' => '%s/assets/images/green-background.jpg',
			'description'   => 'Green Background'
		),
		'little-shadow' => array(
			'url'           => '%s/assets/images/little-shadow.jpg',
			'thumbnail_url' => '%s/assets/images/little-shadow.jpg',
			'description'   => 'Little Shadow'
		),
		'sky-1' => array(
			'url'           => '%s/assets/images/sky-1.jpg',
			'thumbnail_url' => '%s/assets/images/sky-1.jpg',
			'description'   => 'Sky 1'
		),
		'sky-2' => array(
			'url'           => '%s/assets/images/sky-2.jpg',
			'thumbnail_url' => '%s/assets/images/sky-2.jpg',
			'description'   => 'Sky 2'
		),
		'mountains' => array(
			'url'           => '%s/assets/images/mountains.jpg',
			'thumbnail_url' => '%s/assets/images/mountains.jpg',
			'description'   => 'Mountains'
		),
		'space' => array(
			'url'           => '%s/assets/images/space.jpg',
			'thumbnail_url' => '%s/assets/images/space.jpg',
			'description'   => 'Space'
		)
	));
}
add_action('after_setup_theme', 'mahal_custom_header_setup');

if (!function_exists('mahal_header_style')) :
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see mahal_custom_header_setup().
	 */
	function mahal_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail
		// If we get this far, we have custom styles. Let's do this.
?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ('blank' == $header_text_color) :
			?>.site-title a,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that
			else :
			?>.site-title a,
			.site-description {
				color: #<?php echo $header_text_color; ?>;
			}

			<?php endif; ?>
		</style>
	<?php
	}
endif; // mahal_header_style

if (!function_exists('mahal_admin_header_style')) :
	/**
	 * Styles the header image displayed on the Appearance > Header admin panel.
	 *
	 * @see mahal_custom_header_setup().
	 */
	function mahal_admin_header_style() {
	?>
		<style type="text/css">
			.appearance_page_custom-header #headimg {
				border: none;
			}

			#headimg h1,
			#desc {}

			#headimg h1 {}

			#headimg h1 a {}

			#desc {}

			#headimg img {}
		</style>
	<?php
	}
endif; // mahal_admin_header_style

if (!function_exists('mahal_admin_header_image')) :
	/**
	 * Custom header image markup displayed on the Appearance > Header admin panel.
	 *
	 * @see mahal_custom_header_setup().
	 */
	function mahal_admin_header_image() {
		$style = sprintf(' style="color:#%s;"', esc_attr(get_header_textcolor()));
	?>
		<div id="headimg">
			<h1 class="displaying-header-text"><a id="name" <?php echo $style; ?> onclick="return false;" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
			<div class="displaying-header-text" id="desc" <?php echo $style; ?>><?php bloginfo('description'); ?></div>
			<?php if (get_header_image()) : ?>
				<img src="<?php header_image(); ?>" alt="">
			<?php endif; ?>
		</div>
<?php
	}
endif; // mahal_admin_header_image