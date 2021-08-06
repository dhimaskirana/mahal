<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mahal
 */

?>

<?php get_sidebar('footer'); ?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'mahal')); ?>">WordPress</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('%1$s design by %2$s.', 'mahal'), 'Mahal Themes', '<a href="https://www.dhimaskirana.com/">Dhimas Kirana</a>');
		?>
	</div><!-- .site-info -->
	<div class="backtotop" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });return false;"><span id="top" class="dashicons dashicons-arrow-up-alt2"></span></div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>