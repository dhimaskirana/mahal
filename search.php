<?php

/**
 * The template for displaying Search Results pages.
 *
 * @package Mahal
 */

get_header(); ?>

<section id="primary" class="content-area grid w960">
	<div class="row">
		<div class="c12">
			<main id="main" class="site-main" role="main">
				<?php if (have_posts()) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf(__('Search Results for: %s', 'mahal'), '<span>' . get_search_query() . '</span>'); ?></h1>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while (have_posts()) : the_post(); ?>

						<?php get_template_part('content', 'search'); ?>

					<?php endwhile; ?>

					<?php mahal_paging_nav(); ?>

				<?php else : ?>

					<?php get_template_part('content', 'none'); ?>

				<?php endif; ?>
		</div>
	</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>