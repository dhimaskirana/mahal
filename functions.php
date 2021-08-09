<?php

/**
 * Mahal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mahal
 */

if (!defined('MAHAL_VERSION')) {
	// Replace the version number of the theme on each release.
	define('MAHAL_VERSION', '0.7');
}

if (!function_exists('mahal_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mahal_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mahal, use a find and replace
		 * to change 'mahal' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('mahal', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		add_image_size('mahal-featured-image', 920, 300, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__('Primary Menu', 'mahal'),
			)
		);

		// Enable support for Post Formats.
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

		// Custom Header
		add_theme_support('custom-header');

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters(
			'mahal_custom_background_args',
			array(
				'default-color' => 'f9f9f9',
				'default-image' => '',
			)
		));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array('height' => 250, 'width' => 250, 'flex-width' => true, 'flex-height' => true));

		// Default block styles
		add_theme_support('wp-block-styles');

		// Wide Alignment
		add_theme_support('align-wide');

		// Responsive Embeds
		add_theme_support('responsive-embeds');
	}
endif;
add_action('after_setup_theme', 'mahal_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mahal_content_width() {
	$GLOBALS['content_width'] = apply_filters('mahal_content_width', 640);
}
add_action('after_setup_theme', 'mahal_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mahal_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__('Footer 1 Sidebar', 'mahal'),
			'id'            => 'footer-1-sidebar',
			'description'   => esc_html__('Appears as the Footer Sidebar.', 'mahal'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer 2 Sidebar', 'mahal'),
			'id'            => 'footer-2-sidebar',
			'description'   => esc_html__('Appears as the Footer Sidebar.', 'mahal'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'mahal_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function mahal_scripts() {
	// wp_enqueue_style('mahal-themes', get_stylesheet_uri(), array(), MAHAL_VERSION);
	wp_enqueue_style('mahal-style', get_template_directory_uri() . '/css/mahal.css', array('dashicons'));
	wp_enqueue_style('lato-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap');

	wp_style_add_data('mahal-style', 'rtl', 'replace');

	wp_enqueue_script('mahal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), MAHAL_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'mahal_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom Avatar
 */
require get_template_directory() . '/inc/custom-avatar.php';

/**
 * Mahal Documentation
 */
require get_template_directory() . '/inc/documentation.php';
