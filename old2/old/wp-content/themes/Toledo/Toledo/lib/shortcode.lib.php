<?php

// [dropcap foo="foo-value"]
function dropcap_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'style' => 1
	), $atts));
	
	//get first char
	$first_char = substr($content, 0, 1);
	$text_len = strlen($content);
	$rest_text = substr($content, 1, $text_len);

	$return_html = '<span class="dropcap">'.$first_char.'</span>';
	$return_html.= do_shortcode($rest_text);
	
	return $return_html;
}
add_shortcode('dropcap', 'dropcap_func');




// fimage path shortcode
function my_images_url($atts, $content = null) {
		 return get_template_directory_uri() . '/images'; 
}
add_shortcode("images_url", "my_images_url");




// [quote foo="foo-value"]
function quote_func($atts, $content) {
	
	$return_html = '<blockquote><p>'.do_shortcode($content).'</p></blockquote>';
	
	return $return_html;
}
add_shortcode('quote', 'quote_func');



// pre function
function pre_func($atts, $content) {
	
	$return_html = '<pre>'.strip_tags($content).'</pre>';
	
	return $return_html;
}
add_shortcode('pre', 'pre_func');



// social facebook
function social_facebook($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/facebook.png" alt="facebook"/></a></div>';
	
	return $return_html;
}
add_shortcode('facebook', 'social_facebook');



// social behance
function social_behance($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/behance.png" alt="behance"/></a></div>';
	
	return $return_html;
}
add_shortcode('behance', 'social_behance');



// social dribbble
function social_dribbble($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/dribbble.png" alt="dribbble"/></a></div>';
	
	return $return_html;
}
add_shortcode('dribbble', 'social_dribbble');



// social envato
function social_envato($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/envato.png" alt="envato"/></a></div>';
	
	return $return_html;
}
add_shortcode('envato', 'social_envato');




// social evernote
function social_evernote($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/evernote.png" alt="evernote"/></a></div>';
	
	return $return_html;
}
add_shortcode('evernote', 'social_evernote');



// social flickr
function social_flickr($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/flickr.png" alt="flickr"/></a></div>';
	
	return $return_html;
}
add_shortcode('flickr', 'social_flickr');



// social forrst
function social_forrst($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/forrst.png" alt="forrst"/></a></div>';
	
	return $return_html;
}
add_shortcode('forrst', 'social_forrst');



// social google
function social_google($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/google.png" alt="google"/></a></div>';
	
	return $return_html;
}
add_shortcode('google', 'social_google');



// social google+
function social_googleplus($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/googleplus.png" alt="google+"/></a></div>';
	
	return $return_html;
}
add_shortcode('googleplus', 'social_googleplus');



// social gowalla
function social_gowalla($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/gowalla.png" alt="gowalla"/></a></div>';
	
	return $return_html;
}
add_shortcode('gowalla', 'social_gowalla');



// social icloud
function social_icloud($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/icloud.png" alt="icloud"/></a></div>';
	
	return $return_html;
}
add_shortcode('icloud', 'social_icloud');



// social linkedin
function social_linkedin($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/linkedin.png" alt="linkedin"/></a></div>';
	
	return $return_html;
}
add_shortcode('linkedin', 'social_linkedin');



// social paypal
function social_paypal($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/paypal.png" alt="paypal"/></a></div>';
	
	return $return_html;
}
add_shortcode('paypal', 'social_paypal');



// social pinterest
function social_pinterest($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/pinterest.png" alt="pinterest"/></a></div>';
	
	return $return_html;
}
add_shortcode('pinterest', 'social_pinterest');



// social rss
function social_rss($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/rss.png" alt="rss"/></a></div>';
	
	return $return_html;
}
add_shortcode('rss', 'social_rss');



// social tumblr
function social_tumblr($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/tumblr.png" alt="tumblr"/></a></div>';
	
	return $return_html;
}
add_shortcode('tumblr', 'social_tumblr');



// social twitter
function social_twitter($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/twitter.png" alt="twitter"/></a></div>';
	
	return $return_html;
}
add_shortcode('twitter', 'social_twitter');



// social vimeo
function social_vimeo($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/vimeo.png" alt="vimeo"/></a></div>';
	
	return $return_html;
}
add_shortcode('vimeo', 'social_vimeo');



// social wordpress
function social_wordpress($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/wordpress.png" alt="wordpress"/></a></div>';
	
	return $return_html;
}
add_shortcode('wordpress', 'social_wordpress');



// social youtube
function social_youtube($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
	), $atts));
	
	$return_html = '<div class="social-image"><a class="social-image" href="'.$url.'"><img src="' . get_template_directory_uri() . '/images/social/youtube.png" alt="youtube"/></a></div>';
	
	return $return_html;
}
add_shortcode('youtube', 'social_youtube');














// [quote foo="foo-value"]
function sidebar_widget_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
	), $atts));
	
	$return_html = '<div class="sidebar_'.$type.'">
						<div class="sidebar columns">
							<div class="inner_sidebar">'.get_sidebar('pages').'</div>
						</div>	
					</div>';
	
	return $return_html;

}
add_shortcode('sidebar_widget', 'sidebar_widget_func');


// [Entry title]
function entry_title_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="entry-title">
						<h5><span>'.$title.'</span></h5>
					</div>';
	
	return $return_html;
}
add_shortcode('entry_title', 'entry_title_func');



// [Normal button]
function normal_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
		'type' => '',
	), $atts));
	
	$return_html = '<a href="'.$url.'" class="button-ag '.$type.'"><span class="button-inner">' . do_shortcode( $content ) . '</span></a>';
	
	return $return_html;
}
add_shortcode('normal_button', 'normal_button_func');


// [Large button]
function large_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
		'type' => '',
	), $atts));
	
	$return_html = '<a href="'.$url.'" class="button-ag large '.$type.'"><span class="button-inner">' . do_shortcode( $content ) . '</span></a>';
	
	return $return_html;
}
add_shortcode('large_button', 'large_button_func');


// [Big button]
function big_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'url' => '',
		'type' => '',
	), $atts));
	
	$return_html = '<a href="'.$url.'" class="button-ag big '.$type.'"><span class="button-inner">' . do_shortcode( $content ) . '</span></a>';
	
	return $return_html;
}
add_shortcode('big_button', 'big_button_func');



function notification_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="box-notification"><div class="box-notification-content">'.html_entity_decode(do_shortcode($content)).'</div></div>';
	
	return $return_html;
}
add_shortcode('notification_box', 'notification_func');

function error_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="box-error"><div class="box-error-content">'.html_entity_decode(do_shortcode($content)).'</div></div>';
	
	return $return_html;
}
add_shortcode('error_box', 'error_func');

function download_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="box-download"><div class="box-download-content">'.html_entity_decode(do_shortcode($content)).'</div></div>';
	
	return $return_html;
}
add_shortcode('download_box', 'download_func');

function information_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="box-information"><div class="box-information-content">'.html_entity_decode(do_shortcode($content)).'</div></div>';
	
	return $return_html;
}
add_shortcode('information_box', 'information_func');


function frame_left_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_left">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_left', 'frame_left_func');




function frame_right_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_right">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_right', 'frame_right_func');



function frame_center_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'href' => '',
	), $atts));
	
	$return_html = '<div class="frame_center">';
	
	if(!empty($href))
	{
		$return_html.= '<a href="'.$href.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt=""/>';
	
	if(!empty($href))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_center', 'frame_center_func');



function big_button_left_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'link' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="big_button_'.$type.' alignleft">
						<a href="'.$link.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('big_button_left', 'big_button_left_func');


function big_button_right_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'link' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="big_button_'.$type.' alignright">
						<a href="'.$link.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('big_button_right', 'big_button_right_func');


function big_button_center_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'link' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="big_button_'.$type.' aligncenter">
						<a href="'.$link.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('big_button_center', 'big_button_center_func');



function medium_button_left_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'link' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="medium_button_'.$type.' alignleft">
						<a href="'.$link.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('medium_button_left', 'medium_button_left_func');


function medium_button_right_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'link' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="medium_button_'.$type.' alignright">
						<a href="'.$link.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('medium_button_right', 'medium_button_right_func');


function medium_button_center_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'link' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="medium_button_'.$type.' aligncenter">
						<a href="'.$link.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('medium_button_center', 'medium_button_center_func');


function small_button_left_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'link' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="small_button_'.$type.' alignleft">
						<a href="'.$link.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('small_button_left', 'small_button_left_func');


function small_button_right_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'href' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="small_button_'.$type.' alignright">
						<a href="'.$href.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('small_button_right', 'small_button_right_func');


function small_button_center_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
		'href' => '',
		'text' => '',
	), $atts));
	
	$return_html = '<div class="small_button_'.$type.' aligncenter">
						<a href="'.$href.'">'.$text.'</a>
					</div>';
	
	return $return_html;
}
add_shortcode('small_button_center', 'small_button_center_func');




function list_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => '',
	), $atts));
	
	$return_html = '<ul class="lists '.$type.'">'.$content.'</ul>';
	
	return $return_html;
}
add_shortcode('list', 'list_func');


// Toggle
function toggle_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="toggle">
				        <h4 class="trigger">'.$title.'</h4>
				        <div class="togglebox">
				          <div>'. $content .'</div>
				        </div>
				    </div>';
	
	return $return_html;
}
add_shortcode('toggle', 'toggle_func');


// FAQ Toggle
function faq_toggle_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$return_html = '<div class="toggle">
				        <h4 class="trigger"><i class="icon-plus"></i> '.$title.'</h4>
				        <div class="togglebox">
				          <div>'. $content .'</div>
				        </div>
				    </div>';
	
	return $return_html;
}
add_shortcode('faq_toggle', 'faq_toggle_func');


/*
* jQuery Tools - Tabs shortcode
*/
add_shortcode( 'tabgroup', 'etdc_tab_group' );

function etdc_tab_group( $atts, $content ){
	$GLOBALS['tab_count'] = 0;

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
	foreach( $GLOBALS['tabs'] as $tab ){
	$tabs[] = '<li><a class="" href="#">'.$tab['title'].'</a></li>';
	$panes[] = '<div class="pane">'.$tab['content'].'</div>';
	}
	$return = "\n".'<!-- the tabs --><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><div class="panes">'.implode( "\n", $panes ).'</div>'."\n";
	}
	return $return;
	}

	add_shortcode( 'tab', 'etdc_tab' );
	function etdc_tab( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Tab %d'
	), $atts));

	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

	$GLOBALS['tab_count']++;
}


function highlight_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'type' => 'red',
	), $atts));
	
	$return_html = '<span class="highlight_'.$type.'">'.strip_tags($content).'</span>';
	
	return $return_html;
}
add_shortcode('highlight', 'highlight_func');



function tagline_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'button' => '',
		'href' => '',
	), $atts));
	
	$return_html = '
		<div class="tagline" style="width:92%">
			<div class="tagline_text">
			    <h2 class="cufon">'.$title.'</h2>
			    <p>'.strip_tags(strip_shortcodes($content)).'</p>
			</div>
			<div class="tagline_button">
			    <a href="'.$href.'" class="button medium">'.$button.'</a>
			</div>
			<br class="clear"/>
		</div>
	';
	
	return $return_html;
}
add_shortcode('tagline', 'tagline_func');



function arrow_list_func($atts, $content) {
	
	$return_html = '<ul class="arrow_list">'.html_entity_decode(strip_tags($content,'<li><a>')).'</ul>';
	
	return $return_html;
}
add_shortcode('arrow_list', 'arrow_list_func');




function check_list_func($atts, $content) {
	
	$return_html = '<ul class="check_list">'.html_entity_decode(strip_tags($content,'<li><a>')).'</ul>';
	
	return $return_html;
}
add_shortcode('check_list', 'check_list_func');




function star_list_func($atts, $content) {
	
	$return_html = '<ul class="star_list">'.html_entity_decode(strip_tags($content,'<li><a>')).'</ul>';
	
	return $return_html;
}
add_shortcode('star_list', 'star_list_func');


function full_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="full">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('full', 'full_func');

function one_half_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="one_half">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_half', 'one_half_func');




function one_half_first_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="one_half first">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_half_first', 'one_half_first_func');



function one_third_func($atts, $content) {
	
	$return_html = '<div class="one_third">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_third', 'one_third_func');




function one_third_first_func($atts, $content) {
	
	$return_html = '<div class="one_third first">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_third_first', 'one_third_first_func');



function two_third_func($atts, $content) {
	
	$return_html = '<div class="two_third">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('two_third', 'two_third_func');




function two_third_first_func($atts, $content) {
	
	$return_html = '<div class="two_third first">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('two_third_first', 'two_third_first_func');




function one_fourth_func($atts, $content) {
	
	$return_html = '<div class="one_fourth">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fourth', 'one_fourth_func');




function one_fourth_first_func($atts, $content) {
	
	$return_html = '<div class="one_fourth first">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fourth_first', 'one_fourth_first_func');

function three_fourth_func($atts, $content) {
	
	$return_html = '<div class="three_fourth">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('three_fourth', 'three_fourth_func');


function three_fourth_first_func($atts, $content) {
	
	$return_html = '<div class="three_fourth first">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('three_fourth_first', 'three_fourth_first_func');




function full_services_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="full column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('full_services', 'full_services_func');

function one_half_services_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="one_half column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_half_services', 'one_half_services_func');




function one_half_services_first_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'class' => '',
	), $atts));
	
	$return_html = '<div class="one_half first column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_half_services_first', 'one_half_services_first_func');



function one_third_services_func($atts, $content) {
	
	$return_html = '<div class="one_third column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_third_services', 'one_third_services_func');




function one_third_services_first_func($atts, $content) {
	
	$return_html = '<div class="one_third first column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_third_services_first', 'one_third_services_first_func');



function two_third_services_func($atts, $content) {
	
	$return_html = '<div class="two_third column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('two_third_services', 'two_third_services_func');




function two_third_services_first_func($atts, $content) {
	
	$return_html = '<div class="two_third first column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('two_third_services_first', 'two_third_services_first_func');




function one_fourth_services_func($atts, $content) {
	
	$return_html = '<div class="one_fourth column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fourth_services', 'one_fourth_services_func');




function one_fourth_services_first_func($atts, $content) {
	
	$return_html = '<div class="one_fourth first column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('one_fourth_services_first', 'one_fourth_services_first_func');



function three_fourth_services_func($atts, $content) {
	
	$return_html = '<div class="three_fourth column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('three_fourth_services', 'three_fourth_services_func');


// slideshow with attached images
function attached_images_slideshow($atts, $content) {
	
	//extract short code attr
	
	$output .= "<div class='flexslider'>

					<ul class='slides'>";

						global $post;

						$argsThumb = array(
							'order'          => 'ASC',
							'post_type'      => 'attachment',
							'post_parent'    => $post->ID,
							'post_mime_type' => 'image',
							'post_status'    => null
						);

						$attachments = get_posts($argsThumb);

						if ($attachments) {

							foreach ($attachments as $attachment) {

								$full_img_url = wp_get_attachment_url($attachment->ID);

								$postTitle = $attachment->post_title;

				$output .= "<li><img src=" . $full_img_url  ." alt=" . $postTitle . " /></li>";

											
			}
		}
											

		$output .= "</ul>

				</div>";	
	
	return $output;
}
add_shortcode('slideshow', 'attached_images_slideshow');




// Testimonials
function testimonials_slideshow($atts, $content) {
	
	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));

	//extract short code attr
	
	$output = "<div class='widget'>
					<div class='widget-title'><h5>" . $title . "</h5></div>

					<div class='widget-content'>";
		
							query_posts( array('post_type' => 'quote'));
						
							if (have_posts()) : while (have_posts()) : the_post(); $current++;

      						$quote_cont = get_the_content($post->ID);

      						$quote_title = get_the_title($post->ID);

							global $post;

				$output .= "<blockquote>
								<p>" . $quote_cont . "</p>
								<cite>" . $quote_title . "</cite>
							</blockquote>";
						
						endwhile;

					$output .= "</div></div>";

					endif;
					wp_reset_query();
	
	return $output;
}
add_shortcode('testimonials', 'testimonials_slideshow');



function three_fourth_services_first_func($atts, $content) {
	
	$return_html = '<div class="three_fourth first column_container">'.do_shortcode($content).'</div>';
	
	return $return_html;
}
add_shortcode('three_fourth_services_first', 'three_fourth_services_first_func');




function four_projects_row_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'projects' => '',
	), $atts));
	
	$custom_id = time().rand();

							global $post;

							if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('post_type' => 'project',  'posts_per_page' => $projects, 'paged' => $paged));

							$current = -1;



						
							if (have_posts()) : while (have_posts()) : the_post(); $current++; 
						
							$image_id = get_post_thumbnail_id();
							$image_url = wp_get_attachment_image_src($image_id,'project_small_image', true);
							$imgsource = $image_url[0]; 

							$temp_title = get_the_title($post->ID);

      						$postID = get_post( $post_id );

      						$template_link = get_template_directory_uri();

      						$proj_cont = wpcrown_substr(strip_tags(strip_shortcodes($postID->post_content)), 130);

      						$portfolio_link_url = get_post_meta(get_the_ID(), 'portfolio_link_url', true);
													
							if(empty($portfolio_link_url))
							{
								$temp_link = get_permalink($post->ID);
							}
							else
							{
								$temp_link = $portfolio_link_url;
							}



							global $agurghis_config;
							$agurghis_config['agurghis_is_overview'] = true;


			$output .= "<div class='one_fourth "; 
									if($current%4 ==0) { ;
							$output .= "first "; 
									}; 
							$output .= "project'>
							<div class='portfolio-image-holder'>
								<div class='portfolio-image'>
									<a href='$temp_link''>
										<img src='$imgsource' alt='$temp_title' />
										<div class='da-slideFromBottom'></div>
									</a>
								</div>
							</div>
							<h6>$temp_title</h6>
						</div>";
						
						endwhile;

					endif;
					wp_reset_query();			
	
	return $output;
}
add_shortcode('four_projects_row', 'four_projects_row_func');


function three_projects_row_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'projects' => '',
	), $atts));
	
	$custom_id = time().rand();

							global $post;

							if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('post_type' => 'project',  'posts_per_page' => $projects, 'paged' => $paged));

							$current = -1;



						
							if (have_posts()) : while (have_posts()) : the_post(); $current++; 
						
							$image_id = get_post_thumbnail_id();
							$image_url = wp_get_attachment_image_src($image_id,'project_small_image', true);
							$imgsource = $image_url[0]; 

							$temp_title = get_the_title($post->ID);

      						$postID = get_post( $post_id );

      						$template_link = get_template_directory_uri();

      						$proj_cont = wpcrown_substr(strip_tags(strip_shortcodes($postID->post_content)), 130);

      						$portfolio_link_url = get_post_meta(get_the_ID(), 'portfolio_link_url', true);
													
							if(empty($portfolio_link_url))
							{
								$temp_link = get_permalink($post->ID);
							}
							else
							{
								$temp_link = $portfolio_link_url;
							}



							global $agurghis_config;
							$agurghis_config['agurghis_is_overview'] = true;


			$output .= "<div class='one_third "; 
									if($current%3 ==0) { ;
							$output .= "first "; 
									}; 
							$output .= "project'>
							<div class='portfolio-image-holder'>
								<div class='portfolio-image'>
									<a href='$temp_link''>
										<img src='$imgsource' alt='$temp_title' />
										<div class='da-slideFromBottom'></div>
									</a>
								</div>
							</div>
							<h5>$temp_title</h5>
						</div>";
						
						endwhile;

					endif;
					wp_reset_query();			
	
	return $output;
}
add_shortcode('three_projects_row', 'three_projects_row_func');

function two_projects_row_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'projects' => '',
	), $atts));
	
	$custom_id = time().rand();

							global $post;

							if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('post_type' => 'project',  'posts_per_page' => $projects, 'paged' => $paged));

							$current = -1;



						
							if (have_posts()) : while (have_posts()) : the_post(); $current++; 
						
							$image_id = get_post_thumbnail_id();
							$image_url = wp_get_attachment_image_src($image_id,'project_small_image', true);
							$imgsource = $image_url[0]; 

							$temp_title = get_the_title($post->ID);

      						$postID = get_post( $post_id);

      						$template_link = get_template_directory_uri();

      						$proj_cont = wpcrown_substr(strip_tags(strip_shortcodes($postID->post_content)), 130);

      						$portfolio_link_url = get_post_meta(get_the_ID(), 'portfolio_link_url', true);
													
							if(empty($portfolio_link_url))
							{
								$temp_link = get_permalink($post->ID);
							}
							else
							{
								$temp_link = $portfolio_link_url;
							}



							global $agurghis_config;
							$agurghis_config['agurghis_is_overview'] = true;


			$output .= "<div class='one_half "; 
									if($current%2 ==0) { ;
							$output .= "first "; 
									}; 
							$output .= "project'>
							<div class='portfolio-image-holder'>
								<div class='portfolio-image'>
									<a href='$temp_link''>
										<img src='$imgsource' alt='$temp_title' />
										<div class='da-slideFromBottom'></div>
									</a>
								</div>
							</div>
							<h5>$temp_title</h5>
						</div>";
						
						endwhile;

					endif;
					wp_reset_query();			
	
	return $output;
}
add_shortcode('two_projects_row', 'two_projects_row_func');




// Team Shortcode
function three_columns_team_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'items' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$output = "<div id='team'>";

							global $post;
		
							if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('post_type' => 'team',  'posts_per_page' => $items, 'paged' => $paged));

							$current = -1;
						
							if (have_posts()) : while (have_posts()) : the_post(); $current++; 
						
							$image_id = get_post_thumbnail_id();
							$image_url = wp_get_attachment_image_src($image_id,'team_image', true);
							$imgsource = $image_url[0]; 
							
							$custom = get_post_custom($post->ID);
							
							$position = $custom["memberPosition"][0];
							$twitter = $custom["memberTwitter"][0];
							$facebook = $custom["memberFacebook"][0];
							$dribbble = $custom["memberDribbble"][0];
							$flickr = $custom["memberFlickr"][0];
							$forrst = $custom["memberForrst"][0];
							$tumblr = $custom["memberTumblr"][0];
							$vimeo = $custom["memberVimeo"][0];
							$behance = $custom["memberBehance"][0];
							$envato = $custom["memberEnvato"][0];
							$evernote = $custom["memberEvernote"][0];
							$google = $custom["memberGoogle"][0];
							$googlePlus = $custom["memberGooglePlus"][0];
							$gowalla = $custom["memberGowalla"][0];
							$iCloud = $custom["memberiCloud"][0];
							$linkedin = $custom["memberLinkedin"][0];
							$paypal = $custom["memberPaypal"][0];
							$pinterest = $custom["memberPinterest"][0];
							$RSS = $custom["memberRSS"][0];
							$WordPress = $custom["memberWordPress"][0];
							$Youtube = $custom["memberYoutube"][0];

							$temp_title = get_the_title($post->ID);

      						$postID = get_post( $post_id, $output );

      						$template_link = get_template_directory_uri();

      						$proj_cont = $postID->post_content;

							$output .= "<div class='one_third "; 
									if($current%3 ==0) { ;
							$output .= "first "; 
									}; 
							$output .= "column_container team'>
										<div class='team-image'><img src='$imgsource' alt='$temp_title>'' /></div>
										<h3>$temp_title</h3>
										<span class='team-position'>$position</span>
								<p>$proj_cont</p>
								<ul class='social_bookmarks'>";

						
									if(!empty($facebook)) { ;
									
							$output .= "<li><a href='$facebook'><img src='$template_link/images/social/facebook.png' alt='facebook'/></a></li>";

									}

									if(!empty($dribbble)) { ;
										
							$output .= "<li><a href='$dribbble'><img src='$template_link/images/social/dribbble.png' alt='dribbble'/></a></li>";
									
									}

									if(!empty($twitter)) { ;
										
							$output .= "<li><a href='$twitter'><img src='$template_link/images/social/twitter.png' alt='twitter'/></a></li>";
									
									}

									if(!empty($forrst)) { ;
										
							$output .= "<li><a href='$forrst'><img src='$template_link/images/social/forrst.png' alt='forrst'/></a></li>";
									
									}
						
									if(!empty($flickr)) { ;
											
							$output .= "<li><a href='$flickr'><img src='$template_link/images/social/flickr.png' alt='flickr'/></a></li>";
									
									} 
						
									if(!empty($vimeo)) { ;
									
							$output .= "<li><a href='$vimeo'><img src='$template_link/images/social/vimeo.png' alt='vimeo'/></a></li>";
									
									}
						
									if(!empty($tumblr)) { ;
										

							$output .= "<li><a href='$tumblr'><img src='$template_link/images/social/tumblr.png' alt='tumblr'/></a></li>";
									
									}
						
									if(!empty($behance)) { ;
										

							$output .= "<li><a href='$behance'><img src='$template_link/images/social/behance.png' alt='behance'/></a></li>";
									
									}
						
									if(!empty($evernote)) { ;
										

							$output .= "<li><a href='$evernote'><img src='$template_link/images/social/evernote.png' alt='evernote'/></a></li>";
									
									}
						
									if(!empty($googleplus)) { ;
										

							$output .= "<li><a href='$googleplus'><img src='$template_link/images/social/googleplus.png' alt='googleplus'/></a></li>";
									
									}
						
									if(!empty($linkedin)) { ;
										

							$output .= "<li><a href='$linkedin'><img src='$template_link/images/social/linkedin.png' alt='linkedin'/></a></li>";
									
									}
						
									if(!empty($paypal)) { ;
										

							$output .= "<li><a href='$paypal'><img src='$template_link/images/social/paypal.png' alt='paypal'/></a></li>";
									
									}
						
									if(!empty($rss)) { ;
										

							$output .= "<li><a href='$rss'><img src='$template_link/images/social/rss.png' alt='rss'/></a></li>";
									
									}
						
									if(!empty($wordpress)) { ;
										

							$output .= "<li><a href='$wordpress'><img src='$template_link/images/social/wordpress.png' alt='wordpress'/></a></li>";
									
									}
						
									if(!empty($youtube)) { ;
										

							$output .= "<li><a href='$youtube'><img src='$template_link/images/social/youtube.png' alt='youtube'/></a></li>";
									
									}
									
						$output .= "</ul>
							</div>";
						
						endwhile;

					$output .= "</div>";

					endif;
					wp_reset_query();
	
	return $output;
}
add_shortcode('three_columns_team', 'three_columns_team_func');

function two_columns_team_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'items' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$output = "<div id='team'>";

							global $post;
		
							if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('post_type' => 'team',  'posts_per_page' => $items, 'paged' => $paged));

							$current = -1;
						
							if (have_posts()) : while (have_posts()) : the_post(); $current++; 
						
							$image_id = get_post_thumbnail_id();
							$image_url = wp_get_attachment_image_src($image_id,'team_image', true);
							$imgsource = $image_url[0]; 
							
							$custom = get_post_custom($post->ID);
							
							$position = $custom["memberPosition"][0];
							$twitter = $custom["memberTwitter"][0];
							$facebook = $custom["memberFacebook"][0];
							$dribbble = $custom["memberDribbble"][0];
							$flickr = $custom["memberFlickr"][0];
							$forrst = $custom["memberForrst"][0];
							$tumblr = $custom["memberTumblr"][0];
							$vimeo = $custom["memberVimeo"][0];
							$behance = $custom["memberBehance"][0];
							$envato = $custom["memberEnvato"][0];
							$evernote = $custom["memberEvernote"][0];
							$google = $custom["memberGoogle"][0];
							$googlePlus = $custom["memberGooglePlus"][0];
							$gowalla = $custom["memberGowalla"][0];
							$iCloud = $custom["memberiCloud"][0];
							$linkedin = $custom["memberLinkedin"][0];
							$paypal = $custom["memberPaypal"][0];
							$pinterest = $custom["memberPinterest"][0];
							$RSS = $custom["memberRSS"][0];
							$WordPress = $custom["memberWordPress"][0];
							$Youtube = $custom["memberYoutube"][0];

							$temp_title = get_the_title($post->ID);

      						$postID = get_post( $post_id, $output );

      						$template_link = get_template_directory_uri();

      						$proj_cont = $postID->post_content;

							$output .= "<div class='one_half "; 
									if($current%2 ==0) { ;
							$output .= "first "; 
									}; 
							$output .= "column_container team'>
										<div class='team-image'><img src='$imgsource' alt='$temp_title>'' /></div>
										<h3>$temp_title</h3>
										<span class='team-position'>$position</span>
								<p>$proj_cont</p>
								<ul class='social_bookmarks'>";

						
									if(!empty($facebook)) { ;
									
							$output .= "<li><a href='$facebook'><img src='$template_link/images/social/facebook.png' alt='facebook'/></a></li>";

									}

									if(!empty($dribbble)) { ;
										
							$output .= "<li><a href='$dribbble'><img src='$template_link/images/social/dribbble.png' alt='dribbble'/></a></li>";
									
									}

									if(!empty($twitter)) { ;
										
							$output .= "<li><a href='$twitter'><img src='$template_link/images/social/twitter.png' alt='twitter'/></a></li>";
									
									}

									if(!empty($forrst)) { ;
										
							$output .= "<li><a href='$forrst'><img src='$template_link/images/social/forrst.png' alt='forrst'/></a></li>";
									
									}
						
									if(!empty($flickr)) { ;
											
							$output .= "<li><a href='$flickr'><img src='$template_link/images/social/flickr.png' alt='flickr'/></a></li>";
									
									} 
						
									if(!empty($vimeo)) { ;
									
							$output .= "<li><a href='$vimeo'><img src='$template_link/images/social/vimeo.png' alt='vimeo'/></a></li>";
									
									}
						
									if(!empty($tumblr)) { ;
										

							$output .= "<li><a href='$tumblr'><img src='$template_link/images/social/tumblr.png' alt='tumblr'/></a></li>";
									
									}
						
									if(!empty($behance)) { ;
										

							$output .= "<li><a href='$behance'><img src='$template_link/images/social/behance.png' alt='behance'/></a></li>";
									
									}
						
									if(!empty($evernote)) { ;
										

							$output .= "<li><a href='$evernote'><img src='$template_link/images/social/evernote.png' alt='evernote'/></a></li>";
									
									}
						
									if(!empty($googleplus)) { ;
										

							$output .= "<li><a href='$googleplus'><img src='$template_link/images/social/googleplus.png' alt='googleplus'/></a></li>";
									
									}
						
									if(!empty($linkedin)) { ;
										

							$output .= "<li><a href='$linkedin'><img src='$template_link/images/social/linkedin.png' alt='linkedin'/></a></li>";
									
									}
						
									if(!empty($paypal)) { ;
										

							$output .= "<li><a href='$paypal'><img src='$template_link/images/social/paypal.png' alt='paypal'/></a></li>";
									
									}
						
									if(!empty($rss)) { ;
										

							$output .= "<li><a href='$rss'><img src='$template_link/images/social/rss.png' alt='rss'/></a></li>";
									
									}
						
									if(!empty($wordpress)) { ;
										

							$output .= "<li><a href='$wordpress'><img src='$template_link/images/social/wordpress.png' alt='wordpress'/></a></li>";
									
									}
						
									if(!empty($youtube)) { ;
										

							$output .= "<li><a href='$youtube'><img src='$template_link/images/social/youtube.png' alt='youtube'/></a></li>";
									
									}
									
						$output .= "</ul>
							</div>";
						
						endwhile;

					$output .= "</div>";

					endif;
					wp_reset_query();
	
	return $output;
}
add_shortcode('two_columns_team', 'two_columns_team_func');



// Blog Shortcodes
function latest_four_posts_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$output = "<div class='container' id='homepage-blog'>
			
						<div class='entry-title'>
							<h5><span>".$title."</span></h5>
						</div>";

							global $post;
		
							if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('posts_per_page' => 4, 'paged' => $paged));

							$current = -1;
						
							if (have_posts()) : while (have_posts()) : the_post(); $current++; 

							$temp_title = get_the_title($post->ID);
      						$temp_link = get_permalink($post->ID);

      						$temp_category = get_the_category($post->ID);
      						$temp_category_url = get_category_link($temp_category[0]->term_id );
      						$temp_category_slug = $temp_category[0]->cat_name;

      						$temp_author = get_the_author();
      						$temp_author_url = get_author_posts_url(get_the_author_meta( 'ID' ));

      						$postID = get_post( $post_id, $output );

      						$proj_cont = wpcrown_substr(strip_tags(strip_shortcodes($postID->post_content)), 130);

				$output .= "<div class='one_fourth "; 
						if($current%4 ==0) { ;
				$output .= "first "; 
						}; 
				$output .= "column_container'>
							<h1><a href='$temp_link'>$temp_title</a></h1>
							<span class='news-author'>by <a href='$temp_author_url'>$temp_author</a> on <a href='$temp_category_url'>$temp_category_slug</a></span>
							<p>$proj_cont </p>
							<span class='more'><a href='$temp_link'>Read More &rarr;</a></span>
						</div>";
						
						endwhile;

					$output .= "</div>";

					endif;
					wp_reset_query();
	
	return $output;
}
add_shortcode('latest_four_posts', 'latest_four_posts_func');


function latest_three_posts_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$output .= "<div class='container' id='homepage-blog'>
			
						<div class='entry-title'>
							<h5><span>".$title."</span></h5>
						</div>";

							global $post;
		
							if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('posts_per_page' => 3, 'paged' => $paged));

							$current = -1;
						
							if (have_posts()) : while (have_posts()) : the_post(); $current++; 
						
							$temp_title = get_the_title($post->ID);
      						$temp_link = get_permalink($post->ID);

      						$temp_category = get_the_category($post->ID);
      						$temp_category_url = get_category_link($temp_category[0]->term_id );
      						$temp_category_slug = $temp_category[0]->cat_name;

      						$temp_author = get_the_author();
      						$temp_author_url = get_author_posts_url(get_the_author_meta( 'ID' ));

      						$postID = get_post( $post_id, $output );

      						$proj_cont = wpcrown_substr(strip_tags(strip_shortcodes($postID->post_content)), 130);

				$output .= "<div class='one_third "; 
						if($current%3 ==0) { ;
				$output .= "first "; 
						}; 
				$output .= "column_container'>
							<h1><a href='$temp_link'>$temp_title</a></h1>
							<span class='news-author'>by <a href='$temp_author_url'>$temp_author</a> on <a href='$temp_category_url'>$temp_category_slug</a></span>
							<p>$proj_cont </p>
							<span class='more'><a href='$temp_link'>Read More &rarr;</a></span>
						</div>";
						
						endwhile;

					$output .= "</div>";

					endif;
					wp_reset_query();
	
	return $output;
}
add_shortcode('latest_three_posts', 'latest_three_posts_func');

function latest_two_posts_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$output .= "<div class='container' id='homepage-blog'>
			
						<div class='entry-title'>
							<h5><span>".$title."</span></h5>
						</div>";

							global $post;
		
							if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('posts_per_page' => 2, 'paged' => $paged));

							$current = -1;
						
							if (have_posts()) : while (have_posts()) : the_post(); $current++; 
						
							$temp_title = get_the_title($post->ID);
      						$temp_link = get_permalink($post->ID);

      						$temp_category = get_the_category($post->ID);
      						$temp_category_url = get_category_link($temp_category[0]->term_id );
      						$temp_category_slug = $temp_category[0]->cat_name;

      						$temp_author = get_the_author();
      						$temp_author_url = get_author_posts_url(get_the_author_meta( 'ID' ));

      						$postID = get_post( $post_id, $output );

      						$proj_cont = wpcrown_substr(strip_tags(strip_shortcodes($postID->post_content)), 130);

				$output .= "<div class='one_half "; 
						if($current%2 ==0) { ;
				$output .= "first "; 
						}; 
				$output .= "column_container'>
							<h1><a href='$temp_link'>$temp_title</a></h1>
							<span class='news-author'>by <a href='$temp_author_url'>$temp_author</a> on <a href='$temp_category_url'>$temp_category_slug</a></span>
							<p>$proj_cont </p>
							<span class='more'><a href='$temp_link'>Read More &rarr;</a></span>
						</div>";
						
						endwhile;

					$output .= "</div>";

					endif;
					wp_reset_query();
	
	return $output;
}
add_shortcode('latest_two_posts', 'latest_two_posts_func');
// end blog shortcodes


// Partners Shortcodes
function partners_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$output = "<div class='partners'><div class='partners-container'>";
		
							query_posts( array('post_type' => 'spns'));

							$current = -1;
						
							if (have_posts()) : while (have_posts()) : the_post(); $current++;

      						$image_id = get_post_thumbnail_id();
							$image_url = wp_get_attachment_image_src($image_id,'large', true);
							$imgsource = $image_url[0]; 

							global $post;

							$custom = get_post_custom( $post->ID );
							$link = $custom["brandUrl"][0];

				$output .= "<div class='one_fifth ";
				if($current%5 ==0) { ;
				$output .= "first "; 
						}; 
				$output .= "column_container'>
								<a class='partners_images' href='$link'><img src='$imgsource' alt='' /></a>
							</div>";
						
						endwhile;

					$output .= "</div></div>";

					endif;
					wp_reset_query();
	
	return $output;
}
add_shortcode('partners', 'partners_func');



function accordion_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'close' => 0,
	), $atts));
	
	$close_class = '';
	
	if(!empty($close))
	{
		$close_class = 'wpcrown_accordion_close';
	}
	
	$return_html = '<div class="wpcrown_accordion '.$close_class.'"><h3><a href="#">'.$title.'</a></h3>';
	$return_html = '<div><p>';
	$return_html.= do_shortcode($content);
	$return_html = '</p></div></div><br class="clear"/>';
	
	return $return_html;
}
add_shortcode('accordion', 'accordion_func');


function recent_posts_func($atts) {
	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 3,
	), $atts));

	$return_html = wpcrown_posts('recent', $items, FALSE, 'black', FALSE);
	
	return $return_html;
}
add_shortcode('recent_posts', 'recent_posts_func');



function popular_posts_func($atts) {
	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 3,
	), $atts));

	$return_html = wpcrown_posts('poopular', $items, FALSE, 'black', FALSE);
	
	return $return_html;
}
add_shortcode('popular_posts', 'popular_posts_func');


function slide_vimeo_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'video_id' => '',
	), $atts));

	if(empty($wpcrown_slider_height))
	{
		$wpcrown_slider_height = 405;
	}
	
	$wpcrown_slider_height_offset = $wpcrown_slider_height - 405;
	
	$return_html = '<li>';
	$return_html = '<object width="939" height="'.intval(400+$wpcrown_slider_height_offset).'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="939" height="'.intval(400+$wpcrown_slider_height_offset).'" wmode="transparent"></embed></object>';
	$return_html = '</li>'. PHP_EOL;
	
	return $return_html;
}
add_shortcode('slide_vimeo', 'slide_vimeo_func');


function slide_youtube_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'video_id' => '',
	), $atts));

	if(empty($wpcrown_slider_height))
	{
		$wpcrown_slider_height = 405;
	}
	
	$wpcrown_slider_height_offset = $wpcrown_slider_height - 405;
	
	$return_html = '<li>';
	$return_html = '<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$video_id.'&hd=1" style="width:939px;height:'.intval(400+$wpcrown_slider_height_offset).'px"><param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$video_id.'&hd=1" /></object>';
	$return_html = '</li>'. PHP_EOL;
	
	return $return_html;
}
add_shortcode('slide_youtube', 'slide_youtube_func');

/**
*	End Portfolio slider shortcodes
**/


function pricing_func($atts, $content) {
	
	//extract short code attr
	extract(shortcode_atts(array(
		'size' => '',
		'title' => '',
		'column' => 3,
	), $atts));
	
	$width_class = 'three';
	switch($column)
	{
		case 3:
			$width_class = 'three';
		break;
		case 4:
			$width_class = 'four';
		break;
		case 5:
			$width_class = 'five';
		break;
	}
	
	$return_html = '<div class="pricing_box '.$size.' '.$width_class.'">';
	
	if(!empty($title))
	{
		$return_html = '<div class="header">';
		$return_html = '<span>'.$title.'</span>';
		$return_html = '</div><br/>';
	}
	
	$return_html.= do_shortcode($content);
	$return_html = '</div>';
	
	return $return_html;
}
add_shortcode('pricing', 'pricing_func');

function youtube_func($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$video_id.'&hd=1" style="width:'.$width.'px;height:'.$height.'px"><param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$video_id.'&hd=1" /></object>';
	
	return $return_html;
}
add_shortcode('youtube-video', 'youtube_func');


function vimeo_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<object width="'.$width.'" height="'.$height.'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'" wmode="transparent"></embed></object>';
	
	return $return_html;
}
add_shortcode('vimeo-video', 'vimeo_func');


function twitter_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 5,
		'username' => ''
	), $atts));
	
	$return_html = '';
	
	if(!empty($username))
	{
		get_template_part(TEMPLATEPATH . "/lib/twitter.lib.php");
		$obj_twitter = new Twitter($username); 
		$tweets = $obj_twitter->get($items);
	
		$return_html = '<ul class="twitter">';
		
		foreach($tweets as $tweet)
		{
		    $return_html = '<li>';
		    
		    if(isset($tweet[0]))
		    {
		    	$return_html = '<a href="'.$tweet[2][0].'">'.$tweet[0].'</a>';
		    }
		    
		    $return_html = '</li>';
		}
		
		$return_html = '</ul>';
	}
	
	return $return_html;
}
add_shortcode('twitter', 'twitter_func');


function flickr_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 9,
		'flickr_id' => ''
	), $atts));
	
	$return_html = '';
	
	if(!empty($flickr_id))
	{
		$photos_arr = get_flickr(array('type' => 'user', 'id' => $flickr_id, 'items' => $items));

		$return_html = '<ul class="flickr">';
		
		foreach($photos_arr as $photo)
		{
		    $return_html = '<li>';
		    $return_html = '<a href="'.$photo['url'].'" title="'.$photo['title'].'"><img src="'.$photo['thumb_url'].'" alt="" class="frame img_nofade" /></a>';$return_html = '</li>';
		}
		
		$return_html = '</ul><br class="clear"/>';
	}
	
	return $return_html;
}
add_shortcode('flickr', 'flickr_func');


function chart_func($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 590,
		'height' => 250,
		'type' => '',
		'title' => '',
		'data' => '',
		'label' => '',
		'colors' => '',
	), $atts));
	
	switch($type)
	{
		case '3dpie':
			$type_q = 'p3';
		break;
		case 'pie':
			$type_q = 'p';
		break;
		case 'line':
			$type_q = 'lc';
		break;
	}
	
	$content_bg = get_option('wpcrown_content_bg_color');
	$content_bg = substr($content_bg, 1);
	
	$return_html = '<img src="http://chart.apis.google.com/chart?cht='.$type_q.'&#038;chtt='.$title.'&#038;chl='.$label.'&#038;chco='.$colors.'&#038;chs='.$width.'x'.$height.'&#038;chd=t:'.$data.'&#038;chf=bg,s,'.$content_bg.'" alt="'.$title.'"/>';
	
	return $return_html;
}
add_shortcode('chart', 'chart_func');


function table_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'color' => '',
	), $atts));
	
	switch(strtolower($color))
		{
			case 'black':
				$bg_color = '#000000';
				$text_color = '#ffffff';
			break;
			default:
			case 'gray':
				$bg_color = '#666666';
				$text_color = '#ffffff';
			break;
			case 'white':
				$bg_color = '#f5f5f5';
				$text_color = '#444444';
			break;
			case 'blue':
				$bg_color = '#004a80';
				$text_color = '#ffffff';
			break;
			case 'yellow':
				$bg_color = '#f9b601';
				$text_color = '#ffffff';
			break;
			case 'red':
				$bg_color = '#9e0b0f';
				$text_color = '#ffffff';
			break;
			case 'orange':
				$bg_color = '#fe7201';
				$text_color = '#ffffff';
			break;
			case 'green':
				$bg_color = '#7aad34';
				$text_color = '#ffffff';
			break;
			case 'pink':
				$bg_color = '#d2027d';
				$text_color = '#ffffff';
			break;
			case 'purple':
				$bg_color = '#582280';
				$text_color = '#ffffff';
			break;
		}
	
	$bg_color_light = '#'.hex_lighter(substr($bg_color, 1), 20);
	$border_color = '#'.hex_lighter(substr($bg_color, 1), 10);
	
	$return_html = '<style>
	#content_wrapper .table_'.strtolower($color).' table 
	{
		border:1px solid '.$border_color.';
	}
	#content_wrapper .table_'.strtolower($color).' table tr th
	{
		background: -webkit-gradient(linear, left top, left bottom, from('.$bg_color_light.'), to('.$bg_color.'));background: -moz-linear-gradient(top,  '.$bg_color_light.',  '.$bg_color.');filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr=\''.$bg_color_light.'\', endColorstr=\''.$bg_color.'\');color:'.$text_color.';
	}
	#content_wrapper .table_'.strtolower($color).' table tr th, #content_wrapper .table_'.strtolower($color).' table tr td
	{
		border-bottom:1px solid '.$border_color.';
	}
	#content_wrapper table tr:last-child
	{
		border-bottom: 0;
	}
	</style>';
	$return_html = '<div class="table_'.strtolower($color).'">';
	$return_html.= html_entity_decode(do_shortcode($content));
	$return_html = '</div>';
	
	return $return_html;
}
add_shortcode('table', 'table_func');

?>