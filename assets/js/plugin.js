jQuery(document).ready(function ($) {

	// Back To Top
	$('#top').click(function () {
		$('body,html').animate({ scrollTop: 0 }, 800);
	});

	// Slick Nav
	$('#menu').slicknav({
		label: ''
	});

	// Accessibility
	$('li.menu-item-has-children').hover(
		function () {
			$(this).addClass('open');
		},
		function () {
			$(this).removeClass('open');
		}
	);

	$('li.menu-item-has-children a').click(function (event) {
		event.preventDefault();
		$('li.menu-item-has-children').toggleClass('open');
	});

});