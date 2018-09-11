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

/**
 * Register the menu for use before the banner
 */
add_action( 'after_setup_theme', 'mhn_top_menu' );
function mhn_top_menu() {
	register_nav_menu( 'navMenuaboveHeader', __( 'Nav Menu Above Header', 'tainacan-theme' ) );
}

/**
 * Register endpoint for count number of visitors 
 */
add_action('wp_ajax_count_visit', 		 'count_visit_increase' ); 	// executed when logged in
add_action('wp_ajax_nopriv_count_visit', 'count_visit_increase' ); 	// executed when logged out
function count_visit_increase() {
	try {
		$object_id = $_GET['object_id'];
		$meta_value = get_metadata('post', $object_id, 'count_visit', true);	
		if ($meta_value == '') 
			$meta_value =  0;
		$meta_value++;	
		update_metadata ('post', $object_id, 'count_visit', $meta_value);
		echo "{'sucess':true, object: {'object_id':$object_id, 'meta_value':$meta_value }}";
	} catch (Exception $e) {
		echo "{'sucess':false, object: {'object_id':$object_id, 'meta_value':$meta_value }}";
	}
	wp_die();
}