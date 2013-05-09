<?php


function bbpress_enabled()
{
	if (class_exists( 'bbPress' )) { return true; }
	return false;
}

//check if the plugin is enabled, otherwise stop the script
if(!bbpress_enabled()) { return false; }


global $config;


//remove forum and single topic summaries at the top of the page
add_filter('bbp_get_single_forum_description', 'bbpress_filter_form_message',10,2 );
add_filter('bbp_get_single_topic_description', 'bbpress_filter_form_message',10,2 );


function bbpress_filter_form_message( $retstr, $args )
{
	return false;
}