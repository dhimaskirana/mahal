<?php

/**
 * The sidebar containing the footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mahal
 */

if (!is_active_sidebar('footer-1-sidebar') && !is_active_sidebar('footer-2-sidebar')) {
	return;
}
?>

<div id="secondary" class="widget-area grid w960" role="complementary">
	<div class="row">
		<div class="c6"><?php dynamic_sidebar('footer-1-sidebar'); ?></div>
		<div class="c6 end"><?php dynamic_sidebar('footer-2-sidebar'); ?></div>
	</div>
</div><!-- #secondary -->