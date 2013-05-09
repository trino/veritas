<?php

	function post_type_portfolios() {
		$labels = array(
	    	'name' => _x('Projects', 'post type general name', 'agrg'),
	    	'singular_name' => _x('Portfolio', 'post type singular name', 'agrg'),
	    	'add_new' => _x('Add New Project', 'book', 'agrg'),
	    	'add_new_item' => __('Add New Project', 'agrg'),
	    	'edit_item' => __('Edit Project', 'agrg'),
	    	'new_item' => __('New Project', 'agrg'),
	    	'view_item' => __('View Project', 'agrg'),
	    	'search_items' => __('Search Projects', 'agrg'),
	    	'not_found' =>  __('No Project found', 'agrg'),
	    	'not_found_in_trash' => __('No Projects found in Trash', 'agrg'), 
	    	'parent_item_colon' => ''
		);		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
	    	'publicly_queryable' => true,
	    	'show_ui' => true, 
	    	'query_var' => true,
	    	'rewrite' => true,
	    	'capability_type' => 'post',
	    	'hierarchical' => false,
	    	'menu_position' => null,
	    	'supports' => array('title','editor', 'thumbnail'),
	    	'menu_icon' => get_stylesheet_directory_uri().'/functions/images/sign.png'
		); 		

		register_post_type( 'project', $args );
		
	  	$labels = array(			  
	  	  'name' => _x( 'Sets', 'taxonomy general name' , 'agrg'),
	  	  'singular_name' => _x( 'Set', 'taxonomy singular name' , 'agrg'),
	  	  'search_items' =>  __( 'Search Sets', 'agrg'),
	  	  'all_items' => __( 'All Sets', 'agrg' ),
	  	  'parent_item' => __( 'Parent Set', 'agrg' ),
	  	  'parent_item_colon' => __( 'Parent Set:', 'agrg' ),
	  	  'edit_item' => __( 'Edit Set', 'agrg' ), 
	  	  'update_item' => __( 'Update Set', 'agrg' ),
	  	  'add_new_item' => __( 'Add New Set', 'agrg' ),
	  	  'new_item_name' => __( 'New Set Name', 'agrg' ),
	  	); 							  
	  	
	  	register_taxonomy(
			'portfoliosets',
			'project',
			array(
				'public'=>true,
				'hierarchical' => true,
				'labels'=> $labels,
				'query_var' => 'portfoliosets',
				'show_ui' => true,
				'rewrite' => array( 'slug' => 'portfoliosets', 'with_front' => false ),
			)
		);					  
	} 
									  
	add_action('init', 'post_type_portfolios');

?>