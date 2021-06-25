<?php

/**
 * Mahal functions and definitions
 *
 * @package Mahal
 */

//Function Remove Read More Link Scroll 
function remove_more_link_scroll($link) {
	$link = preg_replace('|#more-[0-9]+|', '', $link);
	return $link;
}
add_filter('the_content_more_link', 'remove_more_link_scroll');

//Mahal Breadcrumbs
if (!function_exists('mahalbreadcrumbs')) :
	function mahalbreadcrumbs() {
		global $post;
		$separator = ' &rang; ';
		$blog_url = home_url();
		$post_title = get_the_title($post->post_parent);
		echo '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="mahalbreadcrumbs">';
		echo '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="' . $blog_url . '" rel="nofollow">' . __('Home', 'mahal') . '</a></span> ';
		$category = get_the_category();
		if ($category) {
			foreach ($category as $category) {
				echo $separator . '<span typeof="v:Breadcrumb"><a href="' . get_category_link($category->term_id) . '" rel="v:url" property="v:title">' . $category->name . '</a></span>';
			}
		}
		echo $separator . '<span typeof="v:Breadcrumb"><span property="v:title">' . $post_title . '</span></span>';
		echo '</div>';
	}
endif;

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
	$content_width = 640; /* pixels */
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
	 * to change 'mahal' to the name of your theme in all the template files
	 */
		load_theme_textdomain('mahal', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
		//add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'mahal')
		));

		// Enable support for Post Formats.
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		// Enable Title Tag
		add_theme_support('title-tag');

		// Custom Header
		add_theme_support('custom-header');

		// Setup the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('mahal_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Enable support for HTML5 markup.
		add_theme_support('html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
			'caption',
		));
	}
endif; // mahal_setup
add_action('after_setup_theme', 'mahal_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mahal_widgets_init() {
	register_sidebar(array(
		'name' => __('Footer 1 Sidebar', 'mahal'),
		'id' => 'footer-1-sidebar',
		'description' => 'Appears as the Footer Sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	));
	register_sidebar(array(
		'name' => __('Footer 2 Sidebar', 'mahal'),
		'id' => 'footer-2-sidebar',
		'description' => 'Appears as the Footer Sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	));
}
add_action('widgets_init', 'mahal_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function mahal_scripts() {
	wp_enqueue_style('mahal-style', get_template_directory_uri() . '/assets/css/style.css', array('dashicons'));
	wp_enqueue_style('lato-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap');
	wp_enqueue_script('mahal-plugin', get_template_directory_uri() . '/assets/js/plugin.js', array('jquery'), '20120206', true);
	wp_enqueue_script('jquery-slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), '20120206', false);
	wp_enqueue_script('mahal-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true);
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
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Avatar
 */
require get_template_directory() . '/inc/custom-avatar.php';

/**
 * Mahal Documentation
 */
require get_template_directory() . '/inc/documentation.php';
