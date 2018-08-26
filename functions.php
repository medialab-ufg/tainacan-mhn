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
	return '<img src="http://cantaloupe.medialab.ufg.br/iiif/2/003671.jpg/full/!500,500/0/default.jpg" /><a id="open-image-modal">OPEN</a>';
}, 10, 2);

add_action('wp_footer', function() {
	?>
	
	<div class="modal" id="image-modal" style="width: 100$; heigth: 100%;">
			<div class="modal-content">
				<div id="map" style="width: 1000px; height: 700px;">
					
				</div>
			</div>
	</div>

	<script type="text/javascript">
	    OpenSeadragon({
	        id:                 "map",
	        prefixUrl:          "<?php echo get_stylesheet_directory_uri(); ?>/openseadragon/images/",
	        preserveViewport:   true,
	        visibilityRatio:    1,
	        minZoomLevel:       1,
	        defaultZoomLevel:   1,
	        sequenceMode:       true,
			showNavigator:		true,
	        tileSources:   ['http://cantaloupe.medialab.ufg.br/iiif/2/003671.jpg/info.json']
	    });
	</script>
	<?php
});