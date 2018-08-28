//jQuery( function( $ ) {
jQuery( document ).ready(function() {


	//jQuery('#image-modal').modal({
	//  keyboard: true,
	//  show: false
	//});
	
	jQuery('#open-image-modal').click(function() {
		jQuery('#image-modal').modal('show');

		return false;
	});

	jQuery('#close-image-modal').click(function() {
		jQuery('#image-modal').modal('hide');

		return false;
	});
});