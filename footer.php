<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Mahal
 */
?>
<?php get_sidebar('footer'); ?>
</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">

		<a href="<?php echo esc_url(__('https://wordpress.org/', 'mahal')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'mahal'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Design Themes by %1$s by %2$s.', 'mahal'), 'mahal', '<a href="https://www.dhimaskirana.com/" rel="designer">Dhimas Kirana</a>');
		?>
	</div><!-- .site-info -->
	<div class="backtotop"><span id="top" class="dashicons dashicons-arrow-up-alt2"></span></div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>