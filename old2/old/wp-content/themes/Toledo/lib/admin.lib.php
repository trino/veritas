<?php
/*
	Begin creating admin options
*/

$themename = THEMENAME;
$shortname = SHORTNAME;


$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array(
	0		=> "Choose a category"
);
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages(array('parent' => -1));
$wp_pages = array(
	0		=> "Choose a page"
);
foreach ($pages as $page_list ) {
	$template_name = get_post_meta( $page_list->ID, '_wp_page_template', true );
	
	//exclude contact template
	if($template_name != 'contact.php')
	{
       $wp_pages[$page_list->ID] = $page_list->post_title;
    }
}


$api_url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


$options = array (
 
//Begin admin header
array( 
		"name" => $themename." Options",
		"type" => "title"
),
//End admin header

//Begin first tab "General"
array( 
		"name" => "General",
		"type" => "section",
		"icon" => "gear.png",
)
,

array( "type" => "open"),

array( "name" => "Logo",
	"desc" => "Upload your logo. It will be shown on header. Logo Size: Height 60px; Width auto",
	"id" => $shortname."_logo",
	"type" => "image",
	"std" => "",
),

array( "name" => "Favicon",
	"desc" => "Upload your favicon.",
	"id" => $shortname."_favicon",
	"type" => "image",
	"std" => "",
),

array( "name" => "Google Analytics Domain ID ",
	"desc" => "Get analytics on your site. Enter Google Analytics Domain ID (ex: UA-123456-1)",
	"id" => $shortname."_ga_id",
	"type" => "text",
	"std" => ""

),

array( "name" => "Custom CSS",
	"desc" => "You can add your custom CSS here",
	"id" => $shortname."_custom_css",
	"type" => "textarea",
	"std" => ""

),
	
array( "type" => "close"),
//End first tab "General"

//Begin first tab "Layout"
array( 
		"name" => "Layout",
		"type" => "section",
		"icon" => "layout.png",
)
,

array( "type" => "open"),

array( "name" => "Layout",
	"desc" => "Select the website layout (boxed or wide)",
	"id" => $shortname."_layout",
	"type" => "radio",
	"options" => array(
		'boxed-layout' => '<div style="float:left;width:50px;height:40px" class="wpcrown_checkbox_wrapper"><img src="'.get_bloginfo( 'stylesheet_directory' ).'/functions/images/boxed_width.png"/></div>',
		'wide-layout' => '<div style="float:left;width:50px;height:40px" class="wpcrown_checkbox_wrapper"><img src="'.get_bloginfo( 'stylesheet_directory' ).'/functions/images/fixed_width.png"/></div>',
	),
),
array( "type" => "close"),
//End first tab "Layout"

//Begin first tab "Colors"
array( 
		"name" => "Color",
		"type" => "section",
		"icon" => "color.png",
)
,

array( "type" => "open"),

array( "name" => "Main Color",
	"desc" => "Select the main color, for 'a'. (default #19d7e3)",
	"id" => $shortname."_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#19d7e3"

),

array( "name" => "Main Color",
	"desc" => "Select the second color, for 'a:hover'. For best results should be a little darker than the main color. (default #19afb9)",
	"id" => $shortname."_color_second",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#19afb9"

),

array( "type" => "close"),
//End first tab "Colors"

//Begin first tab "Font"
array( 
		"name" => "Font",
		"type" => "section",
		"icon" => "font.png",
)
,

array( "type" => "open"),

array( "name" => "Header Font (using Google Webfonts API)",
	"desc" => "Select header fonts (You can view preview of all fonts from <a href='http://www.google.com/webfonts'>Google web fonts</a>)",
	"id" => $shortname."_header_font",
	"type" => "select",
	"options" => array(
		'Armata' => 'Armata',
		'PT Sans' => 'PT Sans',
		'Prosto One' => 'Prosto One',
		'Economica' => 'Economica',
		'Seaweed Script' => 'Seaweed Script',
		'Poiret One' => 'Poiret One',
		'Cantata One' => 'Cantata One',
		'Cutive' => 'Cutive',
		'Simonetta' => 'Simonetta',
		'Advent Pro' => 'Advent Pro',
		'Glass Antiqua' => 'Glass Antiqua',
		'Voces' => 'Voces',
		'Krona One' => 'Krona One',
		'Doppio One' => 'Doppio One',
		'Sevillana' => 'Sevillana',
		'Share' => 'Share',
		'Fascinate' => 'Fascinate',
		'Righteous' => 'Righteous',
		'Ruthie' => 'Ruthie',
		'Ceviche One' => 'Ceviche One',
		'Almendra SC' => 'Almendra SC',
		'Fresca' => 'Fresca',
		'Voltaire' => 'Voltaire',
		'Ewert' => 'Ewert',
		'Exo' => 'Exo',
		'Allura' => 'Allura',
		'Norican' => 'Norican',
		'Shojumaru' => 'Shojumaru',
		'Metamorphous' => 'Metamorphous',
		'Noticia Text' => 'Noticia Text',
		'Creepster' => 'Creepster',
		'Glegoo' => 'Glegoo',
		'Iceberg' => 'Iceberg',
		'Gudea' => 'Gudea',
		'Port Lligat Slab' => 'Port Lligat Slab',
		'Galdeano' => 'Galdeano',
		'Overlock SC' => 'Overlock SC',
		'Italianno' => 'Italianno',
		'Inika' => 'Inika',
		'Felipa' => 'Felipa',
		'Ropa Sans' => 'Ropa Sans',
		'Geo' => 'Geo',
		'Open Sans Condensed' => 'Open Sans Condensed',
		'Convergence' => 'Convergence',
		'Montserrat' => 'Montserrat',
		'Amatic SC' => 'Amatic SC',
		'Maven Pro' => 'Maven Pro',
		'Lato' => 'Lato',
		'Ubuntu Condensed' => 'Ubuntu Condensed',
		'Nova Mono' => 'Nova Mono',
		'Droid Sans' => 'Droid Sans',
		'Droid Sans Mono' => 'Droid Sans Mono',
		'Droid Serif' => 'Droid Serif',
	),
	"std" => 'Armata'
),

array( "name" => "Body Font Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_body_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "14",
	"from" => 14,
	"to" => 24,
	"step" => 1,
),

array( "name" => "Entry Title Font Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_entry_title_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "40",
	"from" => 20,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H1 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h1_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "40",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H2 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h2_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "30",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H3 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h3_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "24",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H4 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h4_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "20",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H5 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h5_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "16",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H6 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h6_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "14",
	"from" => 14,
	"to" => 60,
	"step" => 1,
),
	
array( "type" => "close"),
//End first tab "Font"

//Begin first tab "Hello Bar"
array( 
		"name" => "Header",
		"type" => "section",
		"icon" => "bar.png",
)
,

array( "type" => "open"),

array( "name" => "Top bar info",
	"desc" => "Enter text for top bar",
	"id" => $shortname."_sm_top_info",
	"type" => "textarea",
	"std" => ""

),

array( "name" => "Top bar tel",
	"desc" => "Enter telephone number for header",
	"id" => $shortname."_sm_top_tel",
	"type" => "text",
	"std" => ""

),

array( "name" => "Top bar email",
	"desc" => "Enter email address for header",
	"id" => $shortname."_sm_top_email",
	"type" => "text",
	"std" => ""

),

array( "type" => "close"),
//End first tab "Hello Bar"

//Begin first tab "Social Media"
array( 
		"name" => "Social-Icons",
		"type" => "section",
		"icon" => "social.png",
)
,

array( "type" => "open"),

array( "name" => "Facebook Link",
	"desc" => "Enter Facebook Page link for header social media buttons",
	"id" => $shortname."_sm_facebook",
	"type" => "text",
	"std" => ""

),

array( "name" => "Twitter Link",
	"desc" => "Enter Twitter link for header social media buttons",
	"id" => $shortname."_sm_twitter",
	"type" => "text",
	"std" => ""

),

array( "name" => "Dribbble Link",
	"desc" => "Enter Dribbble link for header social media buttons",
	"id" => $shortname."_sm_dribbble",
	"type" => "text",
	"std" => ""

),

array( "name" => "Flickr Link",
	"desc" => "Enter Flickr link for header social media buttons",
	"id" => $shortname."_sm_flickr",
	"type" => "text",
	"std" => ""

),

array( "name" => "Forrst Link",
	"desc" => "Enter Forrst link for header social media buttons",
	"id" => $shortname."_sm_forrst",
	"type" => "text",
	"std" => ""

),

array( "name" => "Tumblr Link",
	"desc" => "Enter Tumblr link for header social media buttons",
	"id" => $shortname."_sm_tumblr",
	"type" => "text",
	"std" => ""

),

array( "name" => "Vimeo Link",
	"desc" => "Enter Vimeo link for header social media buttons",
	"id" => $shortname."_sm_vimeo",
	"type" => "text",
	"std" => ""

),

array( "name" => "Behance Link",
	"desc" => "Enter Behance link for header social media buttons",
	"id" => $shortname."_sm_behance",
	"type" => "text",
	"std" => ""

),

array( "name" => "Evernote Link",
	"desc" => "Enter Evernote link for header social media buttons",
	"id" => $shortname."_sm_evernote",
	"type" => "text",
	"std" => ""

),

array( "name" => "Google+ Link",
	"desc" => "Enter Google+ link for header social media buttons",
	"id" => $shortname."_sm_googleplus",
	"type" => "text",
	"std" => ""

),

array( "name" => "Linkedin Link",
	"desc" => "Enter Linkedin link for header social media buttons",
	"id" => $shortname."_sm_linkedin",
	"type" => "text",
	"std" => ""

),

array( "name" => "Paypal Link",
	"desc" => "Enter Paypal link for header social media buttons",
	"id" => $shortname."_sm_paypal",
	"type" => "text",
	"std" => ""

),

array( "name" => "RSS Link",
	"desc" => "Enter RSS link for header social media buttons",
	"id" => $shortname."_sm_rss",
	"type" => "text",
	"std" => ""

),

array( "name" => "WordPress Link",
	"desc" => "Enter WordPress link for header social media buttons",
	"id" => $shortname."_sm_wordpress",
	"type" => "text",
	"std" => ""

),

array( "name" => "Youtube Link",
	"desc" => "Enter Youtube link for header social media buttons",
	"id" => $shortname."_sm_youtube",
	"type" => "text",
	"std" => ""

),

	
array( "type" => "close"),
//End first tab "Social Media"

//Begin first tab "Contact"
array( 
		"name" => "Contact",
		"type" => "section",
		"icon" => "mail-receive.png",
)
,

array( "type" => "open"),

array( "name" => "Your email address",
	"desc" => "Enter which email address will be sent from contact form",
	"id" => $shortname."_contact_email",
	"type" => "text",
	"std" => ""
),

array( "name" => "Email error message",
	"desc" => "Enter message display whene email introduced is incorect",
	"id" => $shortname."_contact_email_error",
	"type" => "text",
	"std" => "You entered an invalid email."
),

array( "name" => "Name error message",
	"desc" => "Enter message display whene name is not introduced",
	"id" => $shortname."_contact_name_error",
	"type" => "text",
	"std" => "You forgot to enter your name."
),

array( "name" => "Message error",
	"desc" => "Enter message display whene message is not introduced",
	"id" => $shortname."_contact_message_error",
	"type" => "text",
	"std" => "You forgot to enter your message."
),

array( "name" => "Thank you message",
	"desc" => "Enter message display once form submitted",
	"id" => $shortname."_contact_thankyou",
	"type" => "text",
	"std" => "Thank you! We will get back to you as soon as possible"
),

array( "name" => "Show/Hide Map",
	"desc" => "Show or Hide the map",
	"id" => $shortname."_contact_map",
	"type" => "iphone_checkboxes",
	"std" => 1
),

array( "name" => "Your location name",
	"desc" => "Enter your loction name",
	"id" => $shortname."_contact_locTitle",
	"type" => "text",
	"std" => "Chisinau"
),

array( "name" => "Latitude",
	"desc" => "Enter map latitude (to find coordinates visit: http://itouchmap.com/latlong.html",
	"id" => $shortname."_contact_latitude",
	"type" => "text",
	"std" => "47.02"
),

array( "name" => "Longitude",
	"desc" => "Enter map longitude (to find coordinates visit: http://itouchmap.com/latlong.html",
	"id" => $shortname."_contact_longitude",
	"type" => "text",
	"std" => "28.83"
),

array( "name" => "Zoom level",
	"desc" => "Enter zoom level. (Range: 1-16) ",
	"id" => $shortname."_contact_zoomLevel",
	"type" => "text",
	"std" => "10"
),
	
array( "type" => "close"),
//End first tab "Contact"


//Begin second tab "Footer"
array( "name" => "Footer",
	"type" => "section",
	"icon" => "footer.png",
),

array( "type" => "open"),

array( "name" => "Footer Copyright Text",
	"desc" => "You can add text and HTML in here",
	"id" => $shortname."_footer_copyright",
	"type" => "textarea",
	"std" => ""

),

array( "type" => "close"),
//End second tab "Footer"


//Begin second tab "SEO"
array( "name" => "SEO",
	"type" => "section",
	"icon" => "zoom.png",
),

array( "type" => "open"),

array( "name" => "Meta Keywords",
	"desc" => "Enter your site keywords (separate by comma ,)",
	"id" => $shortname."_seo_meta_key",
	"type" => "textarea",
	"std" => ""

),

array( "name" => "Meta Description",
	"desc" => "Enter your site description",
	"id" => $shortname."_seo_meta_desc",
	"type" => "textarea",
	"std" => ""

),

array( "type" => "close"),
//End second tab "SEO"
 
array( "type" => "close")
 
);
?>