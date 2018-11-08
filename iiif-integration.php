<?php 

class MHNIIIF {
	
	
	function __construct() {
		
		add_filter('tainacan-get-the-document', [$this, 'filter_document'], 10, 2);
		
		add_action('wp_footer', [$this, 'footer']);
		
		add_action('admin_init', [$this, 'theme_options_init']);
		add_action('admin_menu', [$this, 'theme_options_menu']);
		
		
	}
	
	function theme_options_init() {
		register_setting('mhn_options_group', 'mhn_options', [$this, 'validate_callback_function']);
	}
	
	function validate_callback_function($input) {

	    // Se necessário, faça aqui alguma validação ao salvar seu formulário
	    return $input;

	}
	
	function theme_options_menu() {
	    
	    // Por padrão criamos uma página exclusiva para as opções desse site
	    // Mas se quiser você pode colocar ela embaixo de aparencia, opções, ou o q vc quiser. O modelo para todos os casos estão comentados abaixo
	    
	    $topLevelMenuLabel = 'mhn';
	    $page_title = 'Opções MHN';
	    $menu_title = 'MHN';
	    
	     
	    /* Menu embaixo de um menu existente */
	    //add_dashboard_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_posts_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_plugin_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_media_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_links_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_pages_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_comments_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_plugins_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_users_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    //add_management_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    add_options_page($page_title, $menu_title, 'manage_options', 'mhn_options', [$this, 'options_page']);
	    //add_theme_page($page_title, $menu_title, 'manage_options', 'theme_options', 'theme_options_page_callback_function');
	    
	}
	
	function options_page() {
		?>
		  <div class="wrap span-20">
		    <h2>Opões MHN</h2>

		    <form action="options.php" method="post" class="clear prepend-top">
		      <?php settings_fields('mhn_options_group'); ?>
		      <?php $options = get_option('mhn_options'); ?>
		      
		      <div class="span-20 ">
		        
		        <h3>Inntegração IIIF</h3>
		        
		        <div class="span-6 last">
		          
		          
		          <label for="iiif_base_url"><strong>URL base do servidor de imagens</strong></label><br/>
		          <input type="text" id="iiif_base_url" class="text" name="mhn_options[iiif_base_url]" value="<?php echo htmlspecialchars($options['iiif_base_url']); ?>"/>
		          <br/><br/>
				  
				  <label for="iiif_flag_meta_id"><strong>ID do Metadado que indica se possui recurso IIIIF</strong></label><br/>
		          <input type="text" id="iiif_flag_meta_id" class="text" name="mhn_options[iiif_flag_meta_id]" value="<?php echo htmlspecialchars($options['iiif_flag_meta_id']); ?>"/>
		          <br/><br/>
				  
				  <label for="iiif_num_registro_meta_id"><strong>ID do Metadado que traz o valor do nome da imagem (Número de registro no SERET)</strong></label><br/>
		          <input type="text" id="iiif_num_registro_meta_id" class="text" name="mhn_options[iiif_num_registro_meta_id]" value="<?php echo htmlspecialchars($options['iiif_num_registro_meta_id']); ?>"/>
		          <br/><br/>
		          
		        </div>
		      </div>
		      
		      <p class="textright clear prepend-top">
		        <input type="submit" class="button-primary" value="Salvar" />
		      </p>
		    </form>
		  </div>

		<?php
	}
	
	function filter_document($html, $item) {
		
		$flag_id = $this->get_option('iiif_flag_meta_id');
		if (get_post_meta($item->get_id(), $flag_id, true) != 'Sim') {
			return $html;
		}
		
		$meta_id = $this->get_option('iiif_num_registro_meta_id');
		$id = get_post_meta($item->get_id(), $meta_id, true);
		
		//return '<div class="openseadragon-wrapper-image"><img src="https://media.nga.gov/iiif/public/objects/1/0/6/3/8/2/106382-primary-0-nativeres.ptif/full/!500,500/0/default.jpg" /><a href="#" id="open-image-modal" class="mdi mdi-magnify-plus-outline"></a><span class="caption-image-modal">Imagem da Google</span></div>';
		return '<div class="openseadragon-wrapper-image"><img src="http://cantaloupe.medialab.ufg.br/iiif/2/' . $id . '.jpg/full/!1000,800/0/default.jpg" /><a href="#" id="open-image-modal" class="mdi mdi-magnify-plus-outline"></a><span class="caption-image-modal">Imagem da Google</span></div>';
	}
	
	function footer() {
		$item = tainacan_get_item();
		if (!$item) {
			return;
		}
		$options = 
		$flag_id = $this->get_option('iiif_flag_meta_id');
		if (get_post_meta($item->get_id(), $flag_id, true) != 'Sim') {
			return;
		}
		$meta_id = $this->get_option('iiif_num_registro_meta_id');
		$id = get_post_meta($item->get_id(), $meta_id, true);
		
		$url = $this->get_option('iiif_base_url') . $id . '.jpg/info.json';
		?>
		
		<div class="modal fade" id="image-modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content modal--super-zoom">
					<a href="#" id="close-image-modal" class="mdi mdi-window-close"></a>
					<div id="map">
						
					</div>
					<span class="caption-image-modal">Imagem da Google</span>
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
				showSequenceControl: false,
				prefixUrl: '<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/',
				navImages: {
					zoomIn: {
						REST: 'zoom_in.png',
						GROUP: 'zoom_in.png',
						HOVER: 'hover/zoom_in.png',
						DOWN: 'active/zoom_in.png'
					},
					zoomOut: {
						REST: 'zoom_out.png',
						GROUP: 'zoom_out.png',
						HOVER: 'hover/zoom_out.png',
						DOWN: 'active/zoom_out.png'
					},
					home: {
						REST: 'home.png',
						GROUP: 'home.png',
						HOVER: 'hover/home.png',
						DOWN: 'active/home.png'
					},
					fullpage: {
						REST: 'full_screen.png',
						GROUP: 'full_screen.png',
						HOVER: 'hover/full_screen.png',
						DOWN: 'active/full_screen.png'
					}
				},
		        tileSources:   ['<?php echo $url; //echo 'https://media.nga.gov/iiif/public/objects/1/0/6/3/8/2/106382-primary-0-nativeres.ptif/info.json'; ?>']
		    });
		</script>
		<?php
	}
	
	function get_option($option) {
		$options = get_option('mhn_options');
		if (isset($options[$option])) {
			return $options[$option];
		}
		return false;
	}
	
	
}

new MHNIIIF();
