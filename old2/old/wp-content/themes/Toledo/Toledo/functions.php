<?php

define("THEMENAME", "Toledo");
define("SHORTNAME", "wpcrown");

load_theme_textdomain( 'agrg', get_template_directory().'/languages' );

$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);

//If clear cache
if(isset($_POST['method']) && !empty($_POST['method']) && $_POST['method'] == 'clear_cache')
{
	if(file_exists(get_template_directory()."/cache/combined.js"))
	{
		unlink(get_template_directory()."/cache/combined.js");
	}
	
	if(file_exists(get_template_directory()."/cache/combined.css"))
	{
		unlink(get_template_directory()."/cache/combined.css");
	}
	
	exit;
}



/* Register frontend javascripts: */
if(!is_admin()){
	add_action('init', 'agurghis_frontend_js');
}

function agurghis_frontend_js()
{	

	wp_register_script( 'agurghis-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) ); 
	wp_register_script( 'agurghis-prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array( 'jquery' ) );
	wp_register_script( 'agurghis-tabs', get_template_directory_uri() . '/js/jquery.tools.min.js', array( 'jquery' ) );
	wp_register_script( 'agurghis-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ) );
	wp_register_script( 'agurghis-custom', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
	wp_register_script( 'agurghis-quovolver', get_template_directory_uri() . '/js/jquery.quovolver.js', array( 'jquery' ) );
	wp_register_script( 'agurghis-twitter', get_template_directory_uri() . '/js/twitter.js', array( 'jquery' ) );
	wp_register_script( 'agurghis-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ) );
	wp_register_script( 'agurghis-hover-dir', get_template_directory_uri() . '/js/jquery.hoverdir.js', array( 'jquery' ) );
	wp_register_script( 'agurghis-google-map', 'http://maps.google.com/maps/api/js?sensor=true', array( 'jquery' ) );

}



//If delete image


//Search only posts
function mySearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','mySearchFilter');

// Must be on wordpress 2.9 or above
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		
		/*
			THUMBNAIL SIZES
			please note - you must delete and re-add the thumbnails on each post/page if you change 
			the sizes below or you will not see the change take effect.
		*/
		
		set_post_thumbnail_size( 80, 80, true ); 
		add_image_size( 'small_thumb', 50, 50, true);
		add_image_size( 'blog_post_image', 610, 180, true);
		add_image_size( 'header_image', 960, 380, true);
		add_image_size( 'project_big_image', 590, 330, true);
		add_image_size( 'project_small_image', 450, 250, true);
		add_image_size( 'team_image', 450, 280, true);
	}

	// attach medium image
	function wp_get_attachment_medium_url( $id )
	{
	    $medium_array = image_downsize( $id, 'project_small_image' );
	    $medium_path = $medium_array[0];

	    return $medium_path;
	}

	// PrettyPhoto default gallery
	add_filter( 'wp_get_attachment_link', 'sant_prettyadd');
 
	function sant_prettyadd ($content) {
		$content = preg_replace("/<a/","<a rel=\"prettyPhoto[pp_gal]\"",$content,1);
		return $content;
	}

	
	
	// pagination function
	function pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'><span class='pagination_pages'>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

// get  the post thumbnail src
function get_the_post_thumbnail_src($img)
{
  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}
	
// custom background
 add_theme_support( 'custom-background' );

//adds the plugin initalization scripts that add styles and functions
require_once( 'config-bbpress/config.php' );		//bbpress forum plugin


// Display 24 products per page
add_filter('loop_shop_per_page', create_function('$cols', 'return 9;'));


/*
 *  Setup main navigation menu
 */
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
	// register menu
	register_nav_menus (
		array(
		'primary' =>__('Main menu'),
		)
	);
}

function add_menuclass($ulclass) {
return preg_replace('/<ul>/', '<ul class="menu">', $ulclass, 1);
}
add_filter('wp_page_menu','add_menuclass');



	// create tiny url
	function get_tiny_url($url) {
 
		if (function_exists('curl_init')) {
			$url = 'http://tinyurl.com/api-create.php?url=' . $url;
		 
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			$tinyurl = curl_exec($ch);
			curl_close($ch);
		 
			return $tinyurl;
		}
		 
		else {
			# cURL disabled on server; Can't shorten URL
			# Return long URL instead.
			return $url;
		}
		 
	}

if ( function_exists( 'add_theme_support' ) ) {
	// Setup thumbnail support
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
}

/**
*	Setup all theme's library
**/

/**
*	Setup admin setting
**/
include (TEMPLATEPATH . "/lib/admin.lib.php");

/**
*	Setup Sidebar
**/
include (TEMPLATEPATH . "/lib/sidebar.lib.php");


//Get JSmin class
include (TEMPLATEPATH . "/lib/jsmin.lib.php");


//Get custom function
include (TEMPLATEPATH . "/lib/custom.lib.php");


// Setup theme custom widgets
include (TEMPLATEPATH . "/lib/widgets.lib.php");

// Projects
include (TEMPLATEPATH . "/lib/projects.php");

// Quotes
include (TEMPLATEPATH . "/lib/quotes.php");

// Team
include (TEMPLATEPATH . "/lib/team.php");

// Get custom shortcode
include (TEMPLATEPATH . "/lib/shortcode.lib.php");

// Clients
include (TEMPLATEPATH . "/lib/clients.php");

// Flex Slider
include (TEMPLATEPATH . "/lib/flex-slider.php");

// ADD POST FORMATS
add_theme_support( 'post-formats', array( 'gallery', 'image', 'link', 'quote', 'video' ) );


$wpcrown_handle = opendir(get_template_directory().'/fields');
$wpcrown_font_arr = array();

while (false!==($wpcrown_file = readdir($wpcrown_handle))) {
	if ($wpcrown_file != "." && $wpcrown_file != ".." && $wpcrown_file != ".DS_Store") { 
		include (TEMPLATEPATH . "/fields/".$wpcrown_file);
	}
}
closedir($wpcrown_handle);


function wpcrown_add_admin() {
 
global $themename, $shortname, $options;
 
if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
 
	if ( isset($_REQUEST['action']) && 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) 
		{
			if($value['type'] != 'image' && isset($value['id']) && isset($_REQUEST[ $value['id'] ]))
			{
				update_option( $value['id'], $_REQUEST[ $value['id'] ] );
			}
		}
		
foreach ($options as $value) {

	if( isset($value['id']) && isset( $_REQUEST[ $value['id'] ] ) && $value['type'] != 'image' && $value['type'] != 'font') { 
		if($value['id'] != $shortname."_sidebar0")
		{
			//if sortable type
			if($value['type'] == 'sortable')
			{
				$sortable_array = serialize($_REQUEST[ $value['id'] ]);
				
				$sortable_data = $_REQUEST[ $value['id'].'_sort_data'];
				$sortable_data_arr = explode(',', $sortable_data);
				$new_sortable_data = array();
				
				foreach($sortable_data_arr as $key => $sortable_data_item)
				{
					$sortable_data_item_arr = explode('_', $sortable_data_item);
					
					if(isset($sortable_data_item_arr[0]))
					{
						$new_sortable_data[] = $sortable_data_item_arr[0];
					}
				}
				
				update_option( $value['id'], $sortable_array );
				update_option( $value['id'].'_sort_data', serialize($new_sortable_data) );
			}
			else
			{
				update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
			}
		}
		elseif(isset($_REQUEST[ $value['id'] ]) && !empty($_REQUEST[ $value['id'] ]))
		{
			//get last sidebar serialize array
			$current_sidebar = get_option($shortname."_sidebar");
			$current_sidebar[ $_REQUEST[ $value['id'] ] ] = $_REQUEST[ $value['id'] ];

			update_option( $shortname."_sidebar", $current_sidebar );
		}
	} 
	else if(isset($_FILES[ $value['id'] ]) || isset($_FILES[ $value['id'].'_upload' ])) {

		if($value['type'] == 'image')
		{
			if(is_writable(get_template_directory().'/cache') && !empty($_FILES[$value['id']]['name']))
			{
			    $current_time = time();
			    $target = get_template_directory().'/cache/'.$current_time.'_'.basename( $_FILES[$value['id']]['name']);
			    $current_file = get_template_directory().'/cache/'.get_option($value['id']);
			
			    if(move_uploaded_file($_FILES[$value['id']]['tmp_name'], $target)) 
			    {
			    	if(file_exists($current_file))
			    	{
				    	unlink($current_file);
				    }
			     	update_option( $value['id'], $current_time.'_'.basename( $_FILES[$value['id']]['name'])  );
			    }
			}
		}
		else if($value['type'] == 'font')
		{
			if(is_writable(get_template_directory().'/fonts') && !empty($_FILES[$value['id'].'_upload']['name']))
			{
				if($_FILES[$value['id'].'_upload']['type'] == 'text/javascript')
				{
			    	$target = get_template_directory().'/fonts/'.basename( $_FILES[$value['id'].'_upload']['name']);
					move_uploaded_file($_FILES[$value['id'].'_upload']['tmp_name'], $target);
				}
			}
		}
	}
	else 
	{ 
		delete_option( $value['id'] );
	} 
}

	header("Location: admin.php?page=functions.php&saved=true".$_REQUEST['current_tab']);
 
} 
else if( isset($_REQUEST['action']) && 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
 
}
}
 
if ( ! isset( $content_width ) ) $content_width = 930;

add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'wpcrown_admin', get_admin_url().'/images/generic.png');
}

function wpcrown_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_style("jquery-ui", $file_dir."/functions/jquery-ui/css/ui-lightness/jquery-ui-1.8.10.custom.css", false, "1.0", "all");
wp_enqueue_style("colorpicker_css", $file_dir."/functions/colorpicker/css/colorpicker.css", false, "1.0", "all");
wp_enqueue_script("jquery-ui", $file_dir."/functions/jquery-ui/js/jquery-ui-1.9.2.custom.min.js", false, "1.0");
wp_enqueue_script("colorpicker_script", $file_dir."/functions/colorpicker/js/colorpicker.js", false, "1.0");
wp_enqueue_script("eye_script", $file_dir."/functions/colorpicker/js/eye.js", false, "1.0");
wp_enqueue_script("utils_script", $file_dir."/functions/colorpicker/js/utils.js", false, "1.0");
wp_enqueue_script("iphone_checkboxes", $file_dir."/functions/iphone-style-checkboxes.js", false, "1.0");
wp_enqueue_script("jslider_depend", $file_dir."/functions/jquery.dependClass.js", false, "1.0");
wp_enqueue_script("jslider", $file_dir."/functions/jquery.slider-min.js", false, "1.0");
wp_enqueue_script("admin", $file_dir."/functions/jquery.custom.admin.js", false, "1.0");

/**
*	Check selected font
**/
$wpcrown_font = get_option('wpcrown_font');

if(empty($wpcrown_font))
{
	$wpcrown_font = 'Sansation_700.font';
}
	
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function wpcrown_admin() {
 
global $themename, $shortname, $options;
$i=0;

?>
	
	<form method="post" enctype="multipart/form-data">
	<div class="wpcrown_wrap rm_wrap">
	
	<div class="header_wrap">
		<div style="float:left; width: 140px; border-right: dashed 1px #888; margin-top: 20px;">
		<a href="http://www.wpcrown.com" target="_blnk"><img src="<?php echo get_template_directory_uri(); ?>/functions/images/logo.png" /></a>
		</div>
		
		<div style="float:left; padding-left: 20px; margin-top: 7px;">
		<h2><?php echo $themename; ?> Settings</h2>
		Version 1.0
		</div>
		<div style="float:right;margin:32px 0 0 0">
			<input name="save<?php echo $i; ?>" type="submit" value="Save changes" style="margin-left: 25px;"  class="input-submit" /><br/><br/>
 <input type="hidden" name="action" value="save" />
 <input type="hidden" name="current_tab" id="current_tab" value="#wpcrown_panel_general" />
		</div>
		<input type="hidden" name="wpcrown_admin_url" id="wpcrown_admin_url" value="<?php echo get_stylesheet_directory_uri(); ?>"/>
		<br style="clear:both"/><br/>
		
		<?php
$cache_dir = get_template_directory().'/cache';
 
if(!is_writable($cache_dir))
{
?>

	<div id="message" class="error fade">
	<p style="line-height:1.5em"><strong>
		The path <?php echo $cache_dir; ?> is not writable, please login with your FTP account and make it writable (chmod 777) otherwise all images won't display.
	</p></strong>
	</div>

<?php
}
?>

	</div>
	
	<div class="wpcrown_wrap">
	<div id="wpcrown_panel">
	<?php 
		foreach ($options as $value) {
			/*print '<pre>';
			print_r($value);
			print '</pre>';*/
			
			$active = '';
			
			if($value['type'] == 'section')
			{
				if($value['name'] == 'General')
				{
					$active = 'nav-tab-active';
				}
				echo '<a id="wpcrown_panel_'.strtolower($value['name']).'_a" href="#wpcrown_panel_'.strtolower($value['name']).'" class="nav-tab '.$active.'"><img src="'.get_stylesheet_directory_uri().'/functions/images/icon/'.$value['icon'].'" class="ver_mid"/>'.$value['name'].'</a>';
			}
		}
	?>
	</h2>
	</div>

	<div class="rm_opts">
	
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?> <?php break;
 
case "close":
?>
	
	</div>
	</div>


	<?php break;
 
case "title":
?>
	<br />


<?php break;
 
case 'text':
	
	//if sidebar input then not show default value
	if($value['id'] != $shortname."_sidebar0")
	{
		$default_val = get_option( $value['id'] );
	}
	else
	{
		$default_val = '';	
	}
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
		value="<?php if ($default_val != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
		<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	
	<?php
	if($value['id'] == $shortname."_sidebar0")
	{
		$current_sidebar = get_option($shortname."_sidebar");
		
		if(!empty($current_sidebar))
		{
	?>
		<ul id="current_sidebar" class="rm_list">

	<?php
		$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	
		foreach($current_sidebar as $sidebar)
		{
	?> 
			
			<li id="<?php echo $sidebar; ?>"><?php echo $sidebar; ?>&nbsp;<a href="<?php echo $url; ?>" class="button sidebar_del" rel="<?php echo $sidebar; ?>">Delete</a></li>
	
	<?php
		}
	?>
	
		</ul>
	
	<?php
		}
	}
	?>

	</div>
	<?php
break;

case 'password':
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"
		value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>

	</div>
	<?php
break;

break;

case 'image':
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<a id="<?php echo $value['id']; ?>_btn" class="button" href="javascript:;" onclick="jQuery('#<?php echo $value['id']; ?>').trigger('click')">Upload Image</a>
	<input onchange="jQuery('#<?php echo $value['id']; ?>_btn').html('Upload '+jQuery(this).val())" name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="file"
		value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	
	<?php 
		if(is_file($cache_dir.'/'.get_option( $value['id'] )) && !is_bool(get_option( $value['id'] )))
		{
			$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	?>
	
	<div id="<?php echo $value['id']; ?>_wrapper" style="width:380px;font-size:11px;">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/cache/<?php echo get_option( $value['id'] ); ?>"/><br/><br/>
		Current Image <a href="<?php echo $url; ?>" class="image_del button" rel="<?php echo $value['id']; ?>">Delete</a>
	</div>
	<?php
		}
	?>

	</div>
	<?php
break;

case 'jslider':
?>

	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<div style="float:left;width:390px;margin-top:10px">
	<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="text" class="jslider"
		value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	</div>
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	
	<script>jQuery("#<?php echo $value['id']; ?>").slider({ from: <?php echo $value['from']; ?>, to: <?php echo $value['to']; ?>, step: <?php echo $value['step']; ?>, smooth: true });</script>

	</div>
	<?php
break;

case 'colorpicker':
?>
	<div class="rm_input rm_text"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<div id="<?php echo $value['id']; ?>_bg" class="colorpicker_bg" onclick="jQuery('#<?php echo $value['id']; ?>').click()" style="background:<?php if (get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>">&nbsp;</div>
		<small><?php echo $value['desc']; ?></small>
		<input name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" type="text"
		value="<?php if ( get_option( $value['id'] ) != "" ) { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?>  class="color_picker"/>
	<div class="clearfix"></div>
	
	</div>
	
<?php
break;
 
case 'textarea':
?>

	<div class="rm_input rm_textarea"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	<textarea name="<?php echo $value['id']; ?>"
		type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>

	</div>

	<?php
break;
 
case 'select':
?>

	<div class="rm_input rm_select"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<select name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $key => $option) { ?>
		<option
		<?php if (get_option( $value['id'] ) == $key) { echo 'selected="selected"'; } ?>
			value="<?php echo $key; ?>"><?php echo $option; ?></option>
		<?php } ?>
	</select> <small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>
	<?php
break;

case 'font':
?>

	<div class="rm_input rm_font"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<div id="<?php echo $value['id']; ?>_wrapper" style="float:left;width:380px;font-size:11px;">
	<select name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $key => $option) { ?>
		<option
		<?php if (get_option( $value['id'] ) == $key) { echo 'selected="selected"'; } ?>
			value="<?php echo $key; ?>"><?php echo $option; ?></option>
		<?php } ?>
	</select> 
	<br/><br/><div id="wpcrown_preview_font">Preview Font Style</div>
	<br/><br/>
	
	<strong>Upload New Font (.js file only)</strong><br/>
	<a id="<?php echo $value['id']; ?>_btn" class="button" href="javascript:;" onclick="jQuery('#<?php echo $value['id']; ?>_upload').trigger('click')">Browse for Font</a>
	<input onchange="jQuery('#<?php echo $value['id']; ?>_btn').html('Upload '+jQuery(this).val())" name="<?php echo $value['id']; ?>_upload"
		id="<?php echo $value['id']; ?>_upload" type="file"
		value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"
		<?php if(!empty($value['size'])) { echo 'style="width:'.$value['size'].'"'; } ?> />
	</div>
	
	<small>
		For new fonts go to <a href="http://cufon.shoqolate.com/generate/">Cufon site</a> and generate font javascript file (.js) and upload it here. You can find free fonts on <a href="http://fontsquirrel.com/">Fontsquirrel</a>, <a href="http://www.dafont.com/">Dafont</a>.
	</small>
	
	<div class="clearfix"></div>
	</div>
	<?php
break;
 
case 'radio':
?>

	<div class="rm_input rm_select"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<div style="float:left;width:350px">
	<?php foreach ($value['options'] as $key => $option) { ?>
	<div style="float:left;margin:0 20px 20px 0">
		<input style="float:left;" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" type="radio"
		<?php if (get_option( $value['id'] ) == $key) { echo 'checked="checked"'; } ?>
			value="<?php echo $key; ?>"/><?php echo html_entity_decode($option); ?>
	</div>
	<?php } ?>
	</div>
	
		<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>
	<?php
break;

case 'sortable':
?>

	<div class="rm_input rm_select"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<div style="float:left;width:100%;margin-top:15px;">
	<?php 
	$sortable_array = unserialize(get_option( $value['id'] ));
	
	$current = 1;
	
	if(!empty($value['options']))
	{
	foreach ($value['options'] as $key => $option) { 
		if($key > 0)
		{
	?>
	<div class="wpcrown_checkbox" style="float:left;margin:0 20px 20px 0;font-size:11px">
		<div class="wpcrown_checkbox_wrapper">
		<input style="float:left;" id="<?php echo $value['id']; ?>[]" name="<?php echo $value['id']; ?>[]" type="checkbox"
		<?php if (is_array($sortable_array) && in_array($key, $sortable_array)) { echo 'checked="checked"'; } ?>
			value="<?php echo $key; ?>" rel="<?php echo $value['id']; ?>_sort" alt="<?php echo html_entity_decode($option); ?>" />&nbsp;<span style="margin-top:-3px"><?php echo html_entity_decode($option); ?></span>
		</div>
	</div>
	<?php }
	
			if($current>1 && ($current-1)%4 == 0)
			{
	?>
	
			<br style="clear:both"/>
	
	<?php		
			}
			
			$current++;
		}
	}
	?>
	 
	 <br style="clear:both"/>
	 
	 <div class="wpcrown_sortable_header" style="width:570px"><?php echo $value['sort_title']; ?></div>
	 <div class="wpcrown_sortable_wrapper" style="width:570px">
	 Drag each item for sorting.<br/>
	 <ul id="<?php echo $value['id']; ?>_sort" class="wpcrown_sortable" rel="<?php echo $value['id']; ?>_sort_data"> 
	 <?php
	 	$sortable_data_array = unserialize(get_option( $value['id'].'_sort_data' ));
	 
	 	if(!empty($sortable_data_array))
	 	{
	 	foreach($sortable_data_array as $key => $sortable_data_item)
	 	{
	 		if (is_array($sortable_array) && in_array($sortable_data_item, $sortable_array)) {
	 ?>
	 	<li id="<?php echo $sortable_data_item; ?>_sort" class="ui-state-default"><?php echo $value['options'][$sortable_data_item]; ?></li> 	
	 <?php
	 		}
	 	}
	 	}
	 ?>
	 </ul>
	 
	 </div>
	 
	</div>
	
	<input type="hidden" id="<?php echo $value['id']; ?>_sort_data" name="<?php echo $value['id']; ?>_sort_data" value="" style="width:100%"/>
	<br style="clear:both"/><br/>
	
	<div class="clearfix"></div>
	</div>
	<?php
break;
 
case "checkbox":
?>

	<div class="rm_input rm_checkbox"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>
<?php break; 

case "iphone_checkboxes":
?>

	<div class="rm_input rm_checkbox"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" class="iphone_checkboxes" name="<?php echo $value['id']; ?>"
		id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>

<?php break; 

case "html":
?>

	<div class="rm_input rm_checkbox"><label
		for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	<?php echo $value['html']; ?>

	<small><?php echo $value['desc']; ?></small>
	<div class="clearfix"></div>
	</div>

<?php break; 
	
case "section":

$i++;

?>

	<div id="wpcrown_panel_<?php echo strtolower($value['name']); ?>" class="rm_section">
	<div class="rm_title">
	<h3><img
		src="<?php echo get_stylesheet_directory_uri(); ?>/functions/images/trans.png"
		class="inactive" alt="""><?php echo $value['name']; ?></h3>
	<span class="submit"><input class="button-primary" name="save<?php echo $i; ?>" type="submit"
		value="Save changes" /> </span>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options"><?php break;
 
}
}
?>
 	
 	<div class="clearfix"></div>
 	</form>
	</div>


	<?php
}

add_action('admin_init', 'wpcrown_add_init');
add_action('admin_menu', 'wpcrown_add_admin');


/**
*	Setup all theme's plugins
**/
// Setup shortcode generator plugin
include (TEMPLATEPATH . "/plugins/shortcode_generator.php");
//include (TEMPLATEPATH . "/plugins/theme_store.php");


// This will do nothing but will allow the shortcode to be stripped
add_shortcode( 'foobar', 'shortcode_foobar' );
 
// Actual processing of the shortcode happens here
function foobar_run_shortcode( $content ) {
    global $shortcode_tags;
 
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    remove_all_shortcodes();
 
    add_shortcode( 'foobar', 'shortcode_foobar' );
 
    // Do the shortcode (only the one above is registered)
    $content = do_shortcode( $content );
 
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
 
    return $content;
}
 
add_filter( 'the_content', 'foobar_run_shortcode', 7 );
	
	// filter tag clould output so that it can be styled by CSS
	function style_my_tag_cloud($tags)
	{
	$tags = preg_replace_callback("|(class='tag-link-[0-9]+)('.*?)(style='font-size: )([0-9]+)(pt;')|",
	create_function(
	'$match',
	'$low=1; $high=5; $sz=($match[4]-8.0)/(22-8)*($high-$low)+$low;'
	),
	$tags);
	return $tags;
	}
	
	add_action('wp_tag_cloud', 'style_my_tag_cloud');


add_filter('widget_tag_cloud_args','style_tags');
function style_tags($args) {
$args = array(
     'largest'    => '10',
     'smallest'   => '10',
     'format'     => '',
     );
return $args;
}

//function my_menu_notitle( $menu ){
//  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
//}

//add_filter( 'wp_nav_menu', 'my_menu_notitle' );
//add_filter( 'wp_page_menu', 'my_menu_notitle' );
//add_filter( 'wp_list_categories', 'my_menu_notitle' );



// Before displaying for viewing, apply this function
//add_filter('widget_text', 'wpcrown_formatter', 99);

//Remove the 2 main auto-formatters
//remove_filter('the_content', 'wpautop');
//remove_filter('the_excerpt', 'wpautop');
//remove_filter('the_content', 'wptexturize');


//Make widget support shortcode
add_filter('widget_text', 'do_shortcode');

if (isset($_GET['activated']) && $_GET['activated']){
	global $wpdb;
	
    wp_redirect(admin_url("themes.php?page=functions.php&activate=true"));
}


//clean formatt on pages
/*function my_wpautop_correction() {	
	if( is_page() ) {		
		remove_filter('the_content', 'wpautop');
		remove_filter('the_excerpt', 'wpautop');
		remove_filter('the_content', 'wptexturize');			
	}
}

add_action('pre_get_posts', 'my_wpautop_correction');*/