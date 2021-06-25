<?php

/**
 * @package Mahal
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php if ('post' == get_post_type()) : ?>
			<div class="entry-meta">
				<?php mahal_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if (is_search() || is_home()) : // Only display Excerpts for Search 
	?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages(array(
				'before' => '<div class="page-links">' . __('Pages:', 'mahal'),
				'after'  => '</div>',
			));
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search 
		?>
			<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(__(', ', 'mahal'));
			if ($categories_list && mahal_categorized_blog()) :
			?>
				<span class="cat-links">
					<span class="dashicons dashicons-category"></span> <?php printf(__('%1$s', 'mahal'), $categories_list); ?>
				</span>
			<?php endif; // End if categories 
			?>

			<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', __(', ', 'mahal'));
			if ($tags_list) :
			?>
				<span class="tags-links">
					<span class="dashicons dashicons-tag"></span> <?php printf(__('%1$s', 'mahal'), $tags_list); ?>
				</span>
			<?php endif; // End if $tags_list 
			?>
		<?php endif; // End if 'post' == get_post_type() 
		?>

		<?php if (!post_password_required() && (comments_open() || '0' != get_comments_number())) : ?>
			<span class="comments-link"><span class="dashicons dashicons-admin-comments"></span></span> <?php comments_popup_link(__('Leave a comment', 'mahal'), __('1 Comment', 'mahal'), __('% Comments', 'mahal')); ?></span>
		<?php endif; ?>

		<?php edit_post_link(__('Edit', 'mahal'), '<span class="edit-link"><span class="dashicons dashicons-edit"></span> ', '</span>'); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->