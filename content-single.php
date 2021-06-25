<?php

/**
 * @package Mahal
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php mahalbreadcrumbs(); ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php mahal_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Pages:', 'mahal'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list(__(', ', 'mahal'));

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list('', __(', ', 'mahal'));

		if (!mahal_categorized_blog()) {
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ('' != $tag_list) {
				$meta_text = __('<span class="dashicons dashicons-tag"></span> %2$s. <span class="dashicons dashicons-admin-links"></span> <a href="%3$s" rel="bookmark">permalink</a>.', 'mahal');
			} else {
				$meta_text = __('<span class="dashicons dashicons-admin-links"></span> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'mahal');
			}
		} else {
			// But this blog has loads of categories so we should probably display them here
			if ('' != $tag_list) {
				$meta_text = __('<span class="dashicons dashicons-category"></span> %1$s <span class="dashicons dashicons-tag"></span> %2$s <span class="dashicons dashicons-admin-links"></span> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'mahal');
			} else {
				$meta_text = __('<span class="dashicons dashicons-category"></span> %1$s <span class="dashicons dashicons-admin-links"></span> Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'mahal');
			}
		} // end check for categories on this blog

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink()
		);
		?>

		<?php edit_post_link(__('Edit', 'mahal'), '<span class="edit-link"><span class="dashicons dashicons-edit"></span>', '</span>'); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->