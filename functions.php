<?php

// Estilos
function mhn_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	// wp_enqueue_style( 'child-style',
	// 	get_stylesheet_directory_uri() . '/style.css',
	// 	array( $parent_style )
	// );

	wp_enqueue_style('google-custom-fonts', '<//fonts.googleapis.com/css?family=EB+Garamond:400,400i,700,700i|Roboto:400,400i,700,700i');

	wp_enqueue_script( 'mhn', get_stylesheet_directory_uri() . '/assets/js/mhn.js', array('jquery') );
	wp_enqueue_script( 'openseadragon', get_stylesheet_directory_uri() . '/openseadragon/openseadragon.js' );
}
add_action( 'wp_enqueue_scripts', 'mhn_enqueue_styles' );

require_once('iiif-integration.php');

/**
 * Register the menu for use after the banner
 */
register_nav_menus( array(
	'navMenuaboveHeader' => __( 'Nav Menu Above Header', 'tainacan-theme' ),
) );