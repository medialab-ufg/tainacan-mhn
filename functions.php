<?php

// Estilos
function mhn_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	// wp_enqueue_style( 'child-style',
	// 	get_stylesheet_directory_uri() . '/style.css',
	// 	array( $parent_style )
	// );

	wp_enqueue_style('google-custom-fonts', '//fonts.googleapis.com/css?family=EB+Garamond:400,400i,700,700i');

	wp_enqueue_script( 'mhn', get_stylesheet_directory_uri() . '/assets/js/mhn.js', array('jquery') );
	wp_enqueue_script( 'openseadragon', get_stylesheet_directory_uri() . '/openseadragon/openseadragon.js' );
}
add_action( 'wp_enqueue_scripts', 'mhn_enqueue_styles' );

require_once('iiif-integration.php');
require_once('inc/view_counter.php');

global $MHNViewCounter;
$MHNViewCounter = new MHNViewCounter();


/**
 * Register the menu for use before the banner
 */
add_action( 'after_setup_theme', 'mhn_top_menu' );
function mhn_top_menu() {
	register_nav_menu( 'navMenuaboveHeader', __( 'Nav Menu Above Header', 'tainacan-theme' ) );
}

/**
 * Adiciona classes extras à lista de elementos que mudam de cor de acordo com a preferência do usuário
 * 
 */
function add_class_customize($colors) {
    return ".tainacan-single-post article .title-content-items { color: {$colors['link_color']}; }";
}
add_filter('tainacan_customize_colors', 'add_class_customize');