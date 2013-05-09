<?php

/**
 * Create the Post meta boxes
 */
 
add_action('add_meta_boxes', 'wpcrown_metabox_posts');
function wpcrown_metabox_posts(){
	
	/* Create a link metabox ----------------------------------------------------*/
	$meta_box = array(
		'id' => 'wpcrown-metabox-post-link',
		'title' =>  __('Link Settings', 'wpcrown'),
		'description' => __('Input your link', 'wpcrown'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
					'name' =>  __('The Link', 'wpcrown'),
					'desc' => __('Insert your link URL, e.g. http://www.alexgurghis.com.', 'wpcrown'),
					'id' => '_wpcrown_link_url',
					'type' => 'text',
					'std' => ''
				)
		)
	);
    wpcrown_add_meta_box( $meta_box );
    
    /* Create a video metabox -------------------------------------------------------*/
    $meta_box = array(
		'id' => 'wpcrown-metabox-post-video',
		'title' => __('Video Settings', 'wpcrown'),
		'description' => __('These settings enable you to embed videos into your posts.', 'wpcrown'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
					'name' => __('Embedded Code', 'wpcrown'),
					'desc' => __('Paste the embed code here. Width is best at 610px with any height.', 'wpcrown'),
					'id' => '_wpcrown_video_embed_code',
					'type' => 'textarea',
					'std' => ''
				)
		)
	);
	wpcrown_add_meta_box( $meta_box ); 
	
	/* Create an audio metabox ------------------------------------------------------*/
	/*

	$meta_box = array(
		'id' => 'wpcrown-metabox-post-audio',
		'title' =>  __('Audio Settings', 'wpcrown'),
		'description' => __('These settings enable you to embed audio into your posts. You must provide both .mp3 and .agg/.oga file formats in order for self hosted audio to function accross all browsers.', 'wpcrown'),
		'page' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('MP3 File URL', 'wpcrown'),
					'desc' => __('The URL to the .mp3 audio file', 'wpcrown'),
					'id' => '_wpcrown_audio_mp3',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('OGA File URL', 'wpcrown'),
					'desc' => __('The URL to the .oga, .ogg audio file', 'wpcrown'),
					'id' => '_wpcrown_audio_ogg',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Audio Poster Image', 'wpcrown'),
					'desc' => __('The preview image for this audio track. Image width should be 500px.', 'wpcrown'),
					'id' => '_wpcrown_audio_poster_url',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Audio Poster Image Height', 'wpcrown'),
					'desc' => __('The height of the poster image', 'wpcrown'),
					'id' => '_wpcrown_audio_height',
					'type' => 'text',
					'std' => ''
				)
		)
	);
	wpcrown_add_meta_box( $meta_box );

	*/
}