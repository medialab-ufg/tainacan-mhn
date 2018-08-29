<?php

// Estilos
function mhn_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style )
	);
	
	wp_enqueue_script( 'mhn', get_stylesheet_directory_uri() . '/js/mhn.js', array('jquery') );
	wp_enqueue_script( 'openseadragon', get_stylesheet_directory_uri() . '/openseadragon/openseadragon.js' );
}
add_action( 'wp_enqueue_scripts', 'mhn_enqueue_styles' );

add_filter('tainacan-get-the-document', function($html, $item) {
	return '<div class="openseadragon-wrapper-image"><img src="http://cantaloupe.medialab.ufg.br/iiif/2/003671.jpg/full/!500,500/0/default.jpg" /><a href="#" id="open-image-modal" class="mdi mdi-magnify-plus-outline"></a></div>';
}, 10, 2);

add_action('wp_footer', function() {
	?>
	
	<div class="modal fade" id="image-modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<a href="#" id="close-image-modal" class="mdi mdi-window-close"></a>
				<div id="map">
					
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	    OpenSeadragon({
	        id:                 "map",
	        prefixUrl:          "<?php echo get_stylesheet_directory_uri(); ?>/openseadragon/images/",
	        preserveViewport:   true,
	        visibilityRatio:    1,
	        minZoomLevel:       -1,
	        defaultZoomLevel:   0,
	        sequenceMode:       true,
			showNavigator:		true,
	        tileSources:   ['http://cantaloupe.medialab.ufg.br/iiif/2/003671.jpg/info.json']
	    });
	</script>
	<?php
});