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
		<a href="<?php echo esc_url(__('http://wordpress.org/', 'mahal')); ?>"><?php printf(__('%s', 'mahal'), 'WordPress'); ?></a>
		<span class="sep"> | </span>
		<?php printf(__('Design Themes by %1$s', 'mahal'), '<a href="http://www.dhimaskirana.com/" rel="designer">Dhimas Kirana</a>'); ?>
	</div><!-- .site-info -->
	<div class="backtotop"><span id="top" class="dashicons dashicons-arrow-up-alt2"></span></div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>