<?php

/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Mahal
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses mahal_header_style()
 */
function mahal_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'mahal_custom_header_args',
			array(
				'random-default'         => true,
				'flex-height'            => true,
				'wp-head-callback'       => 'mahal_header_style',
				'admin-head-callback'    => 'mahal_admin_header_style',
				'admin-preview-callback' => 'mahal_admin_header_image',
				'default-text-color'     => '#fff',
				'header-text'            => true,
				'width'					 => 1920,
				'height'				 => 600,
			)
		)
	);
	register_default_headers(array(
		'green-background' => array(
			'url'           => '%s/images/green-background.jpg',
			'thumbnail_url' => '%s/images/green-background.jpg',
			'description'   => 'Green Background'
		),
		'little-shadow' => array(
			'url'           => '%s/images/little-shadow.jpg',
			'thumbnail_url' => '%s/images/little-shadow.jpg',
			'description'   => 'Little Shadow'
		),
		'sky-1' => array(
			'url'           => '%s/images/sky-1.jpg',
			'thumbnail_url' => '%s/images/sky-1.jpg',
			'description'   => 'Sky 1'
		),
		'sky-2' => array(
			'url'           => '%s/images/sky-2.jpg',
			'thumbnail_url' => '%s/images/sky-2.jpg',
			'description'   => 'Sky 2'
		),
		'mountains' => array(
			'url'           => '%s/images/mountains.jpg',
			'thumbnail_url' => '%s/images/mountains.jpg',
			'description'   => 'Mountains'
		),
		'space' => array(
			'url'           => '%s/images/space.jpg',
			'thumbnail_url' => '%s/images/space.jpg',
			'description'   => 'Space'
		)
	));
}
add_action('after_setup_theme', 'mahal_custom_header_setup');

if (!function_exists('mahal_header_style')) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see mahal_custom_header_setup().
	 */
	function mahal_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if (!display_header_text()) :
			?>.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
			?>.site-title a,
			.site-description {
				color: #<?php echo esc_attr($header_text_color); ?>;
			}

			<?php endif; ?>
		</style>
<?php
	}
endif;
