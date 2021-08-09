<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Mahal
 */

//Mahal Breadcrumbs
if (!function_exists('mahal_breadcrumbs')) :
	function mahal_breadcrumbs() {
		if (!is_single()) {
			return false;
		}
		global $post;
		$separator = ' &#47; ';
		$post_title = get_the_title($post->post_parent);
		echo '<div xmlns:v="http://rdf.data-vocabulary.org/#" class="mahal_breadcrumbs">';
		echo '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="' . esc_url(home_url()) . '" rel="nofollow">' . esc_html__('Home', 'mahal') . '</a></span> ';
		$category = get_the_category();
		if ($category) {
			foreach ($category as $category) {
				echo $separator . '<span typeof="v:Breadcrumb"><a href="' . esc_url(get_category_link($category->term_id)) . '" rel="v:url" property="v:title">' . $category->name . '</a></span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
		echo $separator . '<span typeof="v:Breadcrumb"><span property="v:title">' . $post_title . '</span></span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</div>';
	}
endif;

if (!function_exists('mahal_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function mahal_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('%s', 'post date', 'mahal'), // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('mahal_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function mahal_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('%s', 'post author', 'mahal'), // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);
		echo '・<span class="byline">' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('mahal_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function mahal_entry_footer() {
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'mahal'));
			if ($categories_list) {
				printf(
					/* translators: 1: list of categories. */
					'<span class="cat-links">' . esc_html__('%1$s', 'mahal') . '</span>', // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
					wp_kses(
						$categories_list,
						array(
							'a' => array(
								'href' => array(),
								'rel' => array()
							),
						)
					)
				);
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'mahal'));
			if ($tags_list) {
				echo '・';
				printf(
					/* translators: 1: list of tags. */
					'<span class="tags-links">' . esc_html__('%1$s', 'mahal') . '</span>', // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
					wp_kses(
						$tags_list,
						array(
							'a' => array(
								'href' => array(),
								'rel' => array()
							),
						)
					)
				);
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '・';
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'mahal'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'mahal'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link">・',
			'</span>'
		);
	}
endif;

if (!function_exists('mahal_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function mahal_post_thumbnail() {
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('mahal-featured-image'); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'mahal-featured-image',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action('wp_body_open');
	}
endif;

if (!function_exists('mahal_numeric_pagination')) :
	function mahal_numeric_pagination() {

		if (is_singular())
			return;

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if ($wp_query->max_num_pages <= 1)
			return;

		$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
		$max   = intval($wp_query->max_num_pages);

		/** Add current page to the array */
		if ($paged >= 1)
			$links[] = $paged;

		/** Add the pages around the current page to the array */
		if ($paged >= 3) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if (($paged + 2) <= $max) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		printf('<div class="navigation"><h2 class="screen-reader-text">%s</h2><ul>' . "\n", esc_html__('Posts navigation', 'mahal'));

		/** Previous Post Link */
		if (get_previous_posts_link())
			printf('<li>%s</li>' . "\n", wp_kses(get_previous_posts_link(), array('a' => array(), 'href' => array())));

		/** Link to first page, plus ellipses if necessary */
		if (!in_array(1, $links)) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf('<li%s><a href="%s">%s</a></li>' . "\n", wp_kses($class, array('class' => array())), esc_url(get_pagenum_link(1)), '1');

			if (!in_array(2, $links))
				echo '<li>…</li>';
		}

		/** Link to current page, plus 2 pages in either direction if necessary */
		sort($links);
		foreach ((array) $links as $link) {
			$class = $paged == $link ? ' class="active"' : '';
			printf('<li%s><a href="%s">%s</a></li>' . "\n", wp_kses($class, array('class' => array())), esc_url(get_pagenum_link($link)), esc_html($link));
		}

		/** Link to last page, plus ellipses if necessary */
		if (!in_array($max, $links)) {
			if (!in_array($max - 1, $links))
				echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf('<li%s><a href="%s">%s</a></li>' . "\n", wp_kses($class, array('class' => array())), esc_url(get_pagenum_link($max)), esc_html($max));
		}

		/** Next Post Link */
		if (get_next_posts_link())
			printf('<li>%s</li>' . "\n", wp_kses(get_next_posts_link(), array('a' => array(), 'href' => array())));

		echo '</ul></div>' . "\n";
	}
endif;
