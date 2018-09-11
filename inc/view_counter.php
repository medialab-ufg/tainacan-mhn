<?php 


class MHNViewCounter {
	
	public $meta_key = '_views';
	
	function __construct() {
		add_action('wp_ajax_count_visit', 		 [$this, 'count_visit_increase'] ); 	// executed when logged in
		add_action('wp_ajax_nopriv_count_visit', [$this, 'count_visit_increase'] ); 	// executed when logged out
		add_action('wp_footer', [$this, 'footer']);
	}
	
	function count_visit_increase() {
		try {
			$object_id = $_GET['object_id'];
			$meta_value = get_post_meta($object_id, $this->meta_key, true);	
			if ($meta_value == '') 
				$meta_value =  0;
			$meta_value++;	
			update_post_meta($object_id, $this->meta_key, $meta_value);
			echo "{'sucess':true, object: {'object_id':$object_id, 'meta_value':$meta_value }}";
		} catch (Exception $e) {
			echo "{'sucess':false, object: {'object_id':$object_id, 'meta_value':$meta_value }}";
		}
		wp_die();
	}
	
	function footer() {
		
		if ( is_single() && tainacan_get_item() ) { 
		
		?>
        
		    <script>
                var url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
                var data = {
                    'action': 'count_visit', 
                    'object_id': <?php echo get_the_ID(); ?> 
                };
                jQuery.get(url, data);
            </script>
        
		<?php 
		
		} 
		
	}
	
	function get_items($max = 3) {

		$query = new WP_Query([
			'post_type' => \Tainacan\Repositories\Repository::get_collections_db_identifiers(),
			'orderby' => 'meta_value',
			'order' => 'DESC',
			'meta_key' => $this->meta_key,
			'posts_per_page' => $max
		]);
		
		return $query;
		
	}
	
}

