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
		'tanah-lot' => array(
			'url'           => '%s/images/Tanah-Lot.jpg',
			'thumbnail_url' => '%s/images/Tanah-Lot.jpg',
			'description'   => 'Tanah Lot is a rock formation off the Indonesian island of Bali. It is home to the ancient Hindu pilgrimage temple Pura Tanah Lot, a popular tourist and cultural icon for photography.'
		),
		'borobudur' => array(
			'url'           => '%s/images/Borobudur.jpg',
			'thumbnail_url' => '%s/images/Borobudur.jpg',
			'description'   => 'Borobudur is the biggest Buddhist monument, an ancient site widely considered to be one of the world\'s seven wonders.'
		),
		'bromo' => array(
			'url'           => '%s/images/Bromo.jpg',
			'thumbnail_url' => '%s/images/Bromo.jpg',
			'description'   => 'Mount Bromo is an active somma volcano and part of the Tengger mountains, in East Java, Indonesia. The area is one of the most visited tourist destinations in East Java.'
		),
		'padar-island' => array(
			'url'           => '%s/images/Padar-Island.jpg',
			'thumbnail_url' => '%s/images/Padar-Island.jpg',
			'description'   => 'Padar is a small island located between Komodo and Rinca islands within Komodo archipelago, administrated under the West Manggarai Regency, East Nusa Tenggara, Indonesia.'
		),
		'tugu-jogja' => array(
			'url'           => '%s/images/Tugu-Jogja.jpg',
			'thumbnail_url' => '%s/images/Tugu-Jogja.jpg',
			'description'   => 'Tugu Jogja is an important historical landmark in the city of Yogyakarta, Indonesia. Because of its historical background, Tugu Yogyakarta has become a historical icon of the city.'
		),
		'sydneyblur' => array(
			'url'           => '%s/images/SydneyBlur.jpg',
			'thumbnail_url' => '%s/images/SydneyBlur.jpg',
			'description'   => 'Sydney, capital of New South Wales and one of Australia\'s largest cities, is best known for its harbourfront Sydney Opera House.'
		),
		'los-angeles' => array(
			'url'           => '%s/images/Los-Angeles-by-Night.jpg',
			'thumbnail_url' => '%s/images/Los-Angeles-by-Night.jpg',
			'description'   => 'Los Angeles is a sprawling Southern California city and the center of the nation’s film and television industry.'
		),
		'milky-way' => array(
			'url'           => '%s/images/Shooting-Star-Rye.jpg',
			'thumbnail_url' => '%s/images/Shooting-Star-Rye.jpg',
			'description'   => 'The Milky Way is the galaxy that includes our Solar System, with the name describing the galaxy\'s appearance from Earth: a hazy band of light seen in the night sky formed from stars that cannot be individually distinguished by the naked eye.'
		),
		'earth' => array(
			'url'           => '%s/images/Earth.jpg',
			'thumbnail_url' => '%s/images/Earth.jpg',
			'description'   => 'Earth is the third planet from the Sun and the only astronomical object known to harbor and support life.'
		),
		'tatra' => array(
			'url'           => '%s/images/Tatra-Mountains.jpg',
			'thumbnail_url' => '%s/images/Tatra-Mountains.jpg',
			'description'   => 'The Tatra Mountains, part of the Carpathian mountain chain in eastern Europe, create a natural border between Slovakia and Poland.'
		),
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
