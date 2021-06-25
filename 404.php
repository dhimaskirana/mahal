<?php

/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Mahal
 */

get_header(); ?>

<div id="primary" class="content-area grid w960">
	<main id="main" class="site-main row" role="main">
		<div class="c12">

			<section class="not-found">

				<div class="page-content">
					<span class="error-404"><?php _e('404', 'mahal'); ?></span>
					<p><?php _e('Oops! That page can&rsquo;t be found.', 'mahal'); ?></p>
				</div><!-- .page-content -->

			</section><!-- .error-404 -->

		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>