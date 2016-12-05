<?php

	function ninzio_addons_projects() {

		global $focuson_ninzio;
		$slug          = (isset($GLOBALS['focuson_ninzio']['projects-slug']) && !empty($GLOBALS['focuson_ninzio']['projects-slug'])) ? esc_attr($GLOBALS['focuson_ninzio']['projects-slug']) : 'projects';

		$labels = array(
			'name'               => esc_html__('Projects', 'ninzio-addons'),
			'singular_name'      => esc_html__('Projects', 'ninzio-addons'),
			'add_new'            => esc_html__('Add new', 'ninzio-addons'),
			'add_new_item'       => esc_html__('Add new project', 'ninzio-addons'),
			'edit_item'          => esc_html__('Edit project', 'ninzio-addons'),
			'new_item'           => esc_html__('New project', 'ninzio-addons'),
			'all_items'          => esc_html__('All projects', 'ninzio-addons'),
			'view_item'          => esc_html__('View project', 'ninzio-addons'),
			'search_items'       => esc_html__('Search projects', 'ninzio-addons'),
			'not_found'          => esc_html__('No projects found', 'ninzio-addons'),
			'not_found_in_trash' => esc_html__('No projects found in trash', 'ninzio-addons'), 
			'parent_item_colon'  => '',
			'menu_name'          => esc_html__('Projects', 'ninzio-addons')
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true, 
			'show_in_menu'       => true, 
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug,'with_front' => false ),
			'capability_type'    => 'post',
			'has_archive'        => true, 
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => '',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt'),
		);

		register_post_type( 'projects', $args );
	}

	add_action( 'init', 'ninzio_addons_projects' );

	function ninzio_addons_projects_taxonomies() {

		global $focuson_ninzio;
		$category_slug     = (isset($GLOBALS['focuson_ninzio']['projects-cat-slug']) && !empty($GLOBALS['focuson_ninzio']['projects-cat-slug'])) ? esc_attr($GLOBALS['focuson_ninzio']['projects-cat-slug']) : 'projects-category';
		$tag_slug          = (isset($GLOBALS['focuson_ninzio']['projects-tag-slug']) && !empty($GLOBALS['focuson_ninzio']['projects-tag-slug'])) ? esc_attr($GLOBALS['focuson_ninzio']['projects-tag-slug']) : 'projects-tag';

		register_taxonomy('projects-category', 'projects', array(
			'hierarchical' => true,
			'labels' => array(
				'name' 				=> esc_html__( 'Projects category', 'ninzio-addons' ),
				'singular_name' 	=> esc_html__( 'Projects category', 'ninzio-addons' ),
				'search_items' 		=> esc_html__( 'Search projects category', 'ninzio-addons' ),
				'all_items' 		=> esc_html__( 'All projects categories', 'ninzio-addons' ),
				'parent_item' 		=> esc_html__( 'Parent projects category', 'ninzio-addons' ),
				'parent_item_colon' => esc_html__( 'Parent projects category', 'ninzio-addons' ),
				'edit_item' 		=> esc_html__( 'Edit projects category', 'ninzio-addons' ),
				'update_item' 		=> esc_html__( 'Update projects category', 'ninzio-addons' ),
				'add_new_item' 		=> esc_html__( 'Add new projects category', 'ninzio-addons' ),
				'new_item_name' 	=> esc_html__( 'New projects category', 'ninzio-addons' ),
				'menu_name' 		=> esc_html__( 'Projects categories', 'ninzio-addons' ),
			),
			'rewrite' => array(
				'slug' 		   => $category_slug,
				'with_front'   => true,
				'hierarchical' => true
			),
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_admin_column' => true
		));

		register_taxonomy('projects-tag', 'projects', array(
			'hierarchical' => false,
			'labels' => array(
				'name' 				=> esc_html__( 'Projects tags', 'ninzio-addons' ),
				'singular_name' 	=> esc_html__( 'Projects tag', 'ninzio-addons' ),
				'search_items' 		=> esc_html__( 'Search projects tags', 'ninzio-addons' ),
				'all_items' 		=> esc_html__( 'All projects tags', 'ninzio-addons' ),
				'parent_item' 		=> esc_html__( 'Parent projects tags', 'ninzio-addons' ),
				'parent_item_colon' => esc_html__( 'Parent projects tag:', 'ninzio-addons' ),
				'edit_item' 		=> esc_html__( 'Edit projects tag', 'ninzio-addons' ),
				'update_item' 		=> esc_html__( 'Update projects tag', 'ninzio-addons' ),
				'add_new_item'	    => esc_html__( 'Add new projects tag', 'ninzio-addons' ),
				'new_item_name' 	=> esc_html__( 'New projects tag', 'ninzio-addons' ),
				'menu_name' 		=> esc_html__( 'Projects tags', 'ninzio-addons' ),
			),
			'rewrite' 		   => array(
				'slug' 		   => $tag_slug,
				'with_front'   => true,
				'hierarchical' => false
			),
		));

	}
	add_action( 'init', 'ninzio_addons_projects_taxonomies', 0 );

	add_action("admin_init", "ninzio_addons_add_projects_meta_box");
	function ninzio_addons_add_projects_meta_box(){
		add_meta_box(
	        "projects-details", 
	        esc_html__("Project details", 'ninzio-addons'),
	        "ninzio_addons_render_projects_details", 
	        "projects",
	        "normal", 
	        "high"
	    );
	}

	function ninzio_addons_render_projects_details($post) {

		$values           = get_post_custom( $post->ID );
	    $pcl              = isset( $values['pcl'][0] ) ? esc_attr( $values["pcl"][0] ) : "";
	    $project_details  = isset( $values['project_details'] ) ? esc_attr( $values["project_details"][0] ) : "";
	    wp_nonce_field( 'ninzio_addons_projects_meta_nonce', 'ninzio_addons_projects_meta_nonce' );
?>
        
		<div id="ninzio-projects-title-options">
			<div>
	            <label for="pcl"><?php echo esc_html__('Enter project custom link here (project custom page link):', 'ninzio-addons'); ?></label>
	        	<input name="pcl" id="pcl" type="text" value="<?php echo $pcl;?>"/>
	        </div>

	        <div>
	            <label for="project_details"><?php echo esc_html__('Enter project details here:', 'ninzio-addons'); ?></label>
	            <textarea name="project_details" id="project_details" type="text" ><?php echo $project_details;?></textarea>
	        	<p><?php echo esc_html__('Use line break (press Enter) to separate between items', 'ninzio-addons'); ?></p>
	        </div>
		</div>
<?php
   
	}

	add_action( 'save_post', 'ninzio_addons_save_projects_options' );  
	function ninzio_addons_save_projects_options( $post_id )  
	{  
	    
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
	    if( !isset( $_POST['ninzio_addons_projects_meta_nonce'] ) || !wp_verify_nonce( $_POST['ninzio_addons_projects_meta_nonce'], 'ninzio_addons_projects_meta_nonce' ) ) return;  
	    if ( ! current_user_can( 'edit_page', $post_id ) ) return;

	    if( isset( $_POST['project_details'] ) ){update_post_meta($post_id, "project_details",$_POST["project_details"]);}
	    if( isset( $_POST['pcl'] ) ){update_post_meta($post_id, "pcl",$_POST["pcl"]);}
	}

/*====================================================================*/
/*	PORTFOLIO ADMIN COLUMNS
/*====================================================================*/
	
	add_filter("manage_edit-projects_columns", "ninzio_addons_projects_edit_columns");

	function ninzio_addons_projects_edit_columns($columns){


		$columns['cb']             = "<input type=\"checkbox\" />";
		$columns['title']          = esc_html__("Project title", 'ninzio-addons');
		$columns['category']       = esc_html__("Category", 'ninzio-addons');
		$columns['projects-tags'] = esc_html__("Tags", 'ninzio-addons');

		return $columns;
	}

	add_action("manage_projects_posts_custom_column", "ninzio_addons_projects_custom_columns");

	function ninzio_addons_projects_custom_columns($column){

		global $post;
		$values = get_post_custom();

		$focuson_ninzio_projects_format = isset($values["format"][0]) ? $values["format"][0] : "image";

		switch ($column){

			case "category":

				$terms = get_the_terms( $post->ID, 'projects-category' );

				if ( !empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'projects-category' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'projects-category', 'display' ) )
						);
					}

					echo join( ', ', $out );

				} else {
					echo esc_html__("No categories", 'ninzio-addons');
				}
				
			break;

			case "projects-tags":

				$terms = get_the_terms( $post->ID, 'projects-tag' );

				if ( !empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term ) {
						$out[] = sprintf( '<a href="%s">%s</a>',
							esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'projects-tag' => $term->slug ), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'projects-tag', 'display' ) )
						);
					}

					echo join( ', ', $out );

				} else {
					echo esc_html__("No tags", 'ninzio-addons');
				}
				
			break;

		}
	}


	

?>