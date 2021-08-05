<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mahal
 */

get_header();
?>

<main id="primary" class="site-main grid w960">
	<div class="row">
		<div class="c12">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'mahal'); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<span class="error-404"><?php _e('404', 'mahal'); ?></span>
					<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mahal'); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
