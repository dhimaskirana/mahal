jQuery( document ).ready( function( $ ) {

	// Back To Top
	$('#top').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});
	
	// Slick Nav
	$('#menu').slicknav({
		label: ''
	});

} );