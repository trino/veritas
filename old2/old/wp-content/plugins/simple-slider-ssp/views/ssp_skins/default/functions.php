<?php

function muneeb_ssp_default_slider_skin_enqueue() {

	if ( is_admin() ) return FALSE;

	$flex_stylesheet = plugins_url( 'lib/flexslider.css', __FILE__ );
	$flex_script = plugins_url( 'lib/jquery.flexslider-min.js', __FILE__ );

	wp_enqueue_style( 'flexslider-css', $flex_stylesheet );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'flexslider', $flex_script );

}

function muneeb_ssp_default_slider_skin_wp_head() {

	
	//stylesheet
	echo '<style>';
		include 'lib/style.css';
	echo '</style>';
	//stylesheet end

}

function muneeb_ssp_default_slider_skin_hooks() {

	add_action( 'wp_enqueue_scripts', 'muneeb_ssp_default_slider_skin_enqueue', 12 );
	add_action( 'wp_head', 'muneeb_ssp_default_slider_skin_wp_head', 9 );

}

?>