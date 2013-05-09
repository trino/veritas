<?php $wpcrown_theme_version = '1.0'; ?>

<!DOCTYPE html> 
<html <?php language_attributes(); ?>> 

<head> 

<meta charset="UTF-8" />
<meta name="robots" content="index, follow" />

<meta name="keywords" content="<?php echo get_option('wpcrown_seo_meta_key'); ?>" />
<meta name="description" content="<?php echo get_option('wpcrown_seo_meta_desc'); ?>" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<title><?php
/*
	* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'agrg' ), max( $paged, $page ) );

?></title>


<?php if (get_option('wpcrown_favicon')) : ?>
<link rel="shortcut icon" href="<?php echo get_option('wpcrown_favicon'); ?>" type="image/x-icon" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- add css stylesheets -->	
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css" media="screen"/>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />

<?php $toledo_layout = get_option('wpcrown_layout'); 
	
if(empty($toledo_layout))

{ ?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main-boxed.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/grid-boxed.css" type="text/css" media="screen"/>

	<?php } ?>
			
	<?php if($toledo_layout == "boxed-layout") : ?>

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main-boxed.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/grid-boxed.css" type="text/css" media="screen"/>
			
	<?php elseif($toledo_layout == "wide-layout") : ?>

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main-wide.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/grid-wide.css" type="text/css" media="screen"/>

	<?php endif; ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/prettyPhoto.css" type="text/css" media="screen" />

<!--[if lte IE 6]>
	<style>#top, #bottom, #left, #right { display: none; }</style>
<![endif]-->

<!--[if IE]> 
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 

<!--[if lte IE 7]> 
	<script src="js/IE8.js" type="text/javascript"></script>
<![endif]--> 

<!--[if lt IE 7]>  
	<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/>
<![endif]--> 


<!-- Main Color -->
<?php
	$wpcrown_color = get_option('wpcrown_color');
										
	if(!empty($wpcrown_color))
	{
?>

<style type="text/css">

	a { color: <?php echo $wpcrown_color; ?>; }

	.info-break a {  color: <?php echo $wpcrown_color; ?>; }

	#footer a, #socket a { color: <?php echo $wpcrown_color; ?>; }

	a h1, a h2, a h3, a h4, a h5, a h6 { color: <?php echo $wpcrown_color; ?>; }

	#main a h1, #main ar h2, #main a h3, #main a h4, #main a h5, #main a h6 { color: <?php echo $wpcrown_color; ?>; }

	.left-round { background-color: <?php echo $wpcrown_color; ?>; }

	.slogan { border-left: solid 5px <?php echo $wpcrown_color; ?>; }

	.post-title { border-left: solid 5px <?php echo $wpcrown_color; ?>; }

	#top .main_menu .menu li ul a:hover, #top .main_menu .menu li ul li.current_page_item a { color: <?php echo $wpcrown_color; ?>; }

	.info-break a:hover { color: <?php echo $wpcrown_color; ?>; }

	#search_submit_block { background: <?php echo $wpcrown_color; ?>; }

	.post-content h5 { border-left: solid 5px <?php echo $wpcrown_color; ?>; }

	.comment-reply-link { color: <?php echo $wpcrown_color; ?>; }

	.comment-reply-link:hover { color: <?php echo $wpcrown_color; ?>; }

	.input-textarea:focus {	border: 1px solid <?php echo $wpcrown_color; ?>; }

	.contactform textarea:focus { border: 1px solid <?php echo $wpcrown_color; ?>; }

	.widget-title h5{ border-left: solid 5px <?php echo $wpcrown_color; ?>; }

	.sidebar .widget a:hover { color: <?php echo $wpcrown_color; ?>; }

	.sidebar .news-link:hover>.news-headline { color: <?php echo $wpcrown_color; ?>; }

	.news-link:hover>.news-headline { color: <?php echo $wpcrown_color; ?>; }

	.flickr_images:hover { background-color: <?php echo $wpcrown_color; ?>; }

	.project:hover > h1, .project:hover > h2, .project:hover > h3, .project:hover > h4, .project:hover > h5, .project:hover > h6, .project:hover > p { background-color: <?php echo $wpcrown_color; ?>; }

	#filters a:hover { color: <?php echo $wpcrown_color; ?>; }

	#filters a.active_sort { color: <?php echo $wpcrown_color; ?>; } 

	h4.trigger.active, h4.trigger:hover, h4.trigger.active:hover {	color: <?php echo $wpcrown_color; ?>; }

	.sep-boxed-pricing ul li.title-row { background: <?php echo $wpcrown_color; ?>; }

	ul.tabs li a:hover, ul.tabs li.active a { color: <?php echo $wpcrown_color; ?>; }

	input#bbp_topic_title:focus, input#bbp_topic_tags:focus { border: 1px solid <?php echo $wpcrown_color; ?>; }

	#layerslider { border-bottom: solid 1px <?php echo $wpcrown_color; ?>; }

	.button.read-more, .input-submit {	background-color: <?php echo $wpcrown_color; ?>; }

	.bbp-submit-wrapper button.button:hover { color: <?php echo $wpcrown_color; ?>; }

}

</style>

<?php
	} 		
?>

<!-- Second Color -->
<?php
	$wpcrown_color_second = get_option('wpcrown_color_second');
										
	if(!empty($wpcrown_color_second))
	{
?>

<style type="text/css">

	#footer a:hover, #socket a:hover {	color: <?php echo $wpcrown_color_second; ?>;	}

	a:hover { color: <?php echo $wpcrown_color_second; ?>; }

	.info-break a:hover {  color: <?php echo $wpcrown_color_second; ?>; }

	a h1:hover, a h2:hover, a h3:hover, a h4:hover, a h5:hover, a h6:hover { color: <?php echo $wpcrown_color_second; ?>; }

	#main a:hover h1, #main a:hover h2, #main a:hover h3, #main a:hover h4, #main a:hover h5, #main a:hover h6 { color: <?php echo $wpcrown_color_second; ?>; }

	.sep-boxed-pricing ul li.title-row { border-color: <?php echo $wpcrown_color_second; ?>; }

	.button.read-more, .input-submit { border: 1px solid <?php echo $wpcrown_color_second; ?>; }

</style>

<?php
	} 		
?>

<!-- google webfont font replacement -->
<link href='http://fonts.googleapis.com/css?family=Armata' rel='stylesheet' type='text/css'>


<?php $header_font = get_option('wpcrown_header_font'); 
	
if(empty($header_font))

{ ?>

	<style type="text/css">
	
		h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Armata',"Helvetica Neue",Arial,Helvetica,Geneva,sans-serif; font-weight: lighter; }
			
	</style>

	<?php } ?>
			
	<?php if($header_font == "Prosto One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Prosto+One&subset=latin,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Prosto One', cursive; }
				
		</style>
			
	<?php elseif($header_font == "PT Sans") : ?>

		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'PT Sans', sans-serif; }
				
		</style>

	<?php elseif($header_font == "Economica") : ?>

		<link href='http://fonts.googleapis.com/css?family=Economica:400,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Economica', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Seaweed Script") : ?>

		<link href='http://fonts.googleapis.com/css?family=Seaweed+Script&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Seaweed Script', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Poiret One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Poiret One', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Cantata One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Cantata+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Cantata One', serif; }
				
		</style>
		
	<?php elseif($header_font == "Cutive") : ?>

		<link href='http://fonts.googleapis.com/css?family=Cutive&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Cutive', serif; }
				
		</style>
		
	<?php elseif($header_font == "Simonetta") : ?>

		<link href='http://fonts.googleapis.com/css?family=Simonetta:400,400italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Simonetta', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Advent Pro") : ?>

		<link href='http://fonts.googleapis.com/css?family=Advent+Pro&subset=latin,greek,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Advent Pro', sans-serif; }
				
		</style>	
		
	<?php elseif($header_font == "Glass Antiqua") : ?>

		<link href='http://fonts.googleapis.com/css?family=Glass+Antiqua&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Glass Antiqua', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Voces") : ?>

		<link href='http://fonts.googleapis.com/css?family=Voces&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Voces', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Krona One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Krona+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Krona One', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Doppio One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Doppio+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Doppio One', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Sevillana") : ?>

		<link href='http://fonts.googleapis.com/css?family=Sevillana&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Sevillana', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Share") : ?>

		<link href='http://fonts.googleapis.com/css?family=Share:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Share', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Fascinate") : ?>

		<link href='http://fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Fascinate', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Righteous") : ?>

		<link href='http://fonts.googleapis.com/css?family=Righteous&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Righteous', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Ruthie") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ruthie&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Ruthie', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Ceviche One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Ceviche One', cursive; }
				
		</style>	
		
	<?php elseif($header_font == "Almendra SC") : ?>

		<link href='http://fonts.googleapis.com/css?family=Almendra+SC' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Almendra SC', serif; }
				
		</style>		
		
	<?php elseif($header_font == "Fresca") : ?>

		<link href='http://fonts.googleapis.com/css?family=Fresca&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Fresca', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Voltaire") : ?>

		<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Voltaire', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Ewert") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ewert&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Ewert', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Exo") : ?>

		<link href='http://fonts.googleapis.com/css?family=Exo&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Exo', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Allura") : ?>

		<link href='http://fonts.googleapis.com/css?family=Allura&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Allura', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Norican") : ?>

		<link href='http://fonts.googleapis.com/css?family=Norican&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Norican', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Shojumaru") : ?>

		<link href='http://fonts.googleapis.com/css?family=Shojumaru&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Shojumaru', cursive; }
				
		</style>		
		
	<?php elseif($header_font == "Metamorphous") : ?>

		<link href='http://fonts.googleapis.com/css?family=Metamorphous&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Metamorphous', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Noticia Text") : ?>

		<link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Noticia Text', serif; }
				
		</style>
		
	<?php elseif($header_font == "Creepster") : ?>

		<link href='http://fonts.googleapis.com/css?family=Creepster' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Creepster', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Glegoo") : ?>

		<link href='http://fonts.googleapis.com/css?family=Glegoo&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Glegoo', serif; }
				
		</style>	
		
	<?php elseif($header_font == "Iceberg") : ?>

		<link href='http://fonts.googleapis.com/css?family=Iceberg' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Iceberg', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Gudea") : ?>

		<link href='http://fonts.googleapis.com/css?family=Gudea:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Gudea', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Port Lligat Slab") : ?>

		<link href='http://fonts.googleapis.com/css?family=Port+Lligat+Slab' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Port Lligat Slab', serif; }
				
		</style>
		
	<?php elseif($header_font == "Galdeano") : ?>

		<link href='http://fonts.googleapis.com/css?family=Galdeano' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Galdeano', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Galdeano") : ?>

		<link href='http://fonts.googleapis.com/css?family=Galdeano' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Galdeano', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Overlock SC") : ?>

		<link href='http://fonts.googleapis.com/css?family=Overlock+SC&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Overlock SC', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Italianno") : ?>

		<link href='http://fonts.googleapis.com/css?family=Italianno&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Italianno', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Inika") : ?>

		<link href='http://fonts.googleapis.com/css?family=Inika:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Inika', serif; }
				
		</style>
		
	<?php elseif($header_font == "Felipa") : ?>

		<link href='http://fonts.googleapis.com/css?family=Felipa&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Felipa', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Ropa Sans") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans:400,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Ropa Sans', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Geo") : ?>

		<link href='http://fonts.googleapis.com/css?family=Geo' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Geo', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Open Sans Condensed") : ?>

		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic&subset=latin,greek,cyrillic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Open Sans Condensed', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Convergence") : ?>

		<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Convergence', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Montserrat") : ?>

		<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Montserrat', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Amatic SC") : ?>

		<link href='http://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Amatic SC', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Maven Pro") : ?>

		<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Maven Pro', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Lato") : ?>

		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Lato', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Ubuntu Condensed") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed&subset=latin,greek,cyrillic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Ubuntu Condensed', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Nova Mono") : ?>

		<link href='http://fonts.googleapis.com/css?family=Nova+Mono&subset=latin,greek' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Nova Mono', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Droid Sans") : ?>

		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Droid Sans', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Droid Sans Mono") : ?>

		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Droid Sans Mono', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Droid Serif") : ?>

		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Droid Serif', serif; }
				
		</style>

	<?php elseif($header_font == "Armata") : ?>

		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .entry-title span, .entry-title strong { font-family: 'Armata',"Helvetica Neue",Arial,Helvetica,Geneva,sans-serif; font-weight: lighter; }
				
		</style>																																																
	
<?php endif; ?>


<style type="text/css">
	<?php
		$wpcrown_body_font_size = get_option('wpcrown_body_font_size');
			
		if(!empty($wpcrown_body_font_size))
		{
		?>
		body { font-size: <?php echo $wpcrown_body_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_entry_title_font_size = get_option('wpcrown_entry_title_font_size');
			
		if(!empty($wpcrown_entry_title_font_size))
		{
		?>
		.page-title { font-size: <?php echo $wpcrown_entry_title_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h1_font_size = get_option('wpcrown_h1_font_size');
			
		if(!empty($wpcrown_h1_font_size))
		{
		?>
		h1 { font-size: <?php echo $wpcrown_h1_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h2_font_size = get_option('wpcrown_h2_font_size');
			
		if(!empty($wpcrown_h2_font_size))
		{
		?>
		h2 { font-size: <?php echo $wpcrown_h2_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h3_font_size = get_option('wpcrown_h3_font_size');
			
		if(!empty($wpcrown_h3_font_size))
		{
		?>
		h3 { font-size: <?php echo $wpcrown_h3_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h4_font_size = get_option('wpcrown_h4_font_size');
			
		if(!empty($wpcrown_h4_font_size))
		{
		?>
		h4 { font-size: <?php echo $wpcrown_h4_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h5_font_size = get_option('wpcrown_h5_font_size');
			
		if(!empty($wpcrown_h5_font_size))
		{
		?>
		h5 { font-size: <?php echo $wpcrown_h5_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h6_font_size = get_option('wpcrown_h6_font_size');
			
		if(!empty($wpcrown_h6_font_size))
		{
		?>
		h6 { font-size: <?php echo $wpcrown_h6_font_size; ?>px; }
		<?php
		} 		
	?>
</style>

<script type="text/javascript">
	var templateDir = "<?php echo get_template_directory_uri() ?>";
</script>

<!-- mobile setting -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<?php

	/* add javascript */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'agurghis-easing' );
	wp_enqueue_script( 'agurghis-prettyPhoto' );
	wp_enqueue_script( 'agurghis-tabs' );
	wp_enqueue_script( 'agurghis-custom' );
	wp_enqueue_script( 'agurghis-quovolver' );
	wp_enqueue_script( 'agurghis-twitter' );
	wp_enqueue_script( 'agurghis-isotope' );
	wp_enqueue_script( 'agurghis-hover-dir' );
	wp_enqueue_script( 'agurghis-custom' );
	wp_enqueue_script( 'agurghis-flexslider' );
	wp_enqueue_script( 'agurghis-google-map' );
	
?>


<?php
	/*
    	Setup Google Analytic Code
    */
    include (TEMPLATEPATH . "/google-analytic.php");
?>

<style type="text/css">
	
	<?php
		$wpcrown_custom_css = get_option('wpcrown_custom_css');
				
		if(!empty($wpcrown_custom_css))
		{
			echo $wpcrown_custom_css;
		} 		
	?>
</style>

</head>

<body id="top" <?php body_class( $class ); ?>>

	<?php
		$page_bg = get_option('page_bg');
																			
		if(!empty($page_bg))
		{
	?>
	<!-- Background image -->
	<div class="bg-image">
		<img src="<?php echo $page_bg; ?>" class="bg" alt="background" />
	</div>
	<!-- End Background image -->

	<div id="content" class="bg-pattern">

	<?php
		} else {
	?>

	<div id="content">

	<?php
		} 
	?>

		<!-- Main Container -->
		<section id="main-content">

			<!-- Head Container -->
			<header class="container_wrap" id="header">

				<div class="container-big top-menu-container">

					<div class="container top-menu-container">

						<div class="top-menu">

							<div class="seven columns alignleft info-break">
								<p><?php echo stripslashes(get_option('wpcrown_sm_top_info')); ?></p>
							</div>

							<div class="five columns alignright">
								<ul class="social_bookmarks">
									<?php
										$wpcrown_sm_facebook = get_option('wpcrown_sm_facebook');
																			
										if(!empty($wpcrown_sm_facebook))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_facebook; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" alt="facebook"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_behance = get_option('wpcrown_sm_behance');
																			
										if(!empty($wpcrown_sm_behance))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_behance; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/behance.png" alt="behance"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_dribbble = get_option('wpcrown_sm_dribbble');
																			
										if(!empty($wpcrown_sm_dribbble))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_dribbble; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/dribbble.png" alt="dribbble"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_envato = get_option('wpcrown_sm_envato');
																			
										if(!empty($wpcrown_sm_envato))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_envato; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/envato.png" alt="envato"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_evernote = get_option('wpcrown_sm_evernote');
																			
										if(!empty($wpcrown_sm_evernote))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_evernote; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/evernote.png" alt="evernote"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_flickr = get_option('wpcrown_sm_flickr');
																			
										if(!empty($wpcrown_sm_flickr))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_flickr; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/flickr.png" alt="flickr"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_forrst = get_option('wpcrown_sm_forrst');
																			
										if(!empty($wpcrown_sm_forrst))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_forrst; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/forrst.png" alt="forrst"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_google = get_option('wpcrown_sm_google');
																			
										if(!empty($wpcrown_sm_google))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_google; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/google.png" alt="google"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_googleplus = get_option('wpcrown_sm_googleplus');
																			
										if(!empty($wpcrown_sm_googleplus))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_googleplus; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googleplus.png" alt="googleplus"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_gowalla = get_option('wpcrown_sm_gowalla');
																			
										if(!empty($wpcrown_sm_gowalla))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_gowalla; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/gowalla.png" alt="gowalla"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_icloud = get_option('wpcrown_sm_icloud');
																			
										if(!empty($wpcrown_sm_icloud))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_icloud; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/icloud.png" alt="icloud"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_linkedin = get_option('wpcrown_sm_linkedin');
																			
										if(!empty($wpcrown_sm_linkedin))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_linkedin; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" alt="linkedin"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_paypal = get_option('wpcrown_sm_paypal');
																			
										if(!empty($wpcrown_sm_paypal))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_paypal; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/paypal.png" alt="paypal"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_pinterest = get_option('wpcrown_sm_pinterest');
																			
										if(!empty($wpcrown_sm_pinterest))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_pinterest; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/pinterest.png" alt="pinterest"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_rss = get_option('wpcrown_sm_rss');
																			
										if(!empty($wpcrown_sm_rss))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_rss; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" alt="rss"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_tumblr = get_option('wpcrown_sm_tumblr');
																			
										if(!empty($wpcrown_sm_tumblr))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_tumblr; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/tumblr.png" alt="tumblr"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_twitter = get_option('wpcrown_sm_twitter');
																			
										if(!empty($wpcrown_sm_twitter))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_twitter; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt="twitter"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_vimeo = get_option('wpcrown_sm_vimeo');
																			
										if(!empty($wpcrown_sm_vimeo))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_vimeo; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/vimeo.png" alt="vimeo"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_wordpress = get_option('wpcrown_sm_wordpress');
																			
										if(!empty($wpcrown_sm_wordpress))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_wordpress; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/wordpress.png" alt="wordpress"/></a></li>
									<?php
										} 		
									?>

									<?php
										$wpcrown_sm_youtube = get_option('wpcrown_sm_youtube');
																			
										if(!empty($wpcrown_sm_youtube))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_youtube; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" alt="youtube"/></a></li>
									<?php
										} 		
									?>


								</ul>
							</div>
						</div>

					</div>

				</div>

				<div class="container-big logo-container">

					<div class="container logo-container">

						<div class="logo">
							<a href="<?php echo home_url(); ?>">
								<?php if (get_option('wpcrown_logo')) { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/cache/<?php echo get_option('wpcrown_logo'); ?>" alt="Logo" />
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo" />
								<?php } ?>
							</a>
						</div>

						<div class="four columns alignright">
							<div class="top-info">
								<?php
									$wpcrown_sm_top_tel = get_option('wpcrown_sm_top_tel');
																			
									if(!empty($wpcrown_sm_top_tel))
									{
								?>
									<span class="tel"><?php echo $wpcrown_sm_top_tel; ?></span>
								<?php
									} 		
								?>
								<?php
									$wpcrown_sm_top_email = get_option('wpcrown_sm_top_email');
																			
									if(!empty($wpcrown_sm_top_email))
									{
								?>
									<span class="email"><?php echo $wpcrown_sm_top_email; ?></span>
								<?php
									} 		
								?>
							</div>
						</div>

					</div>

				</div>

				<div class="menu-content container-big">

					<div class="container menu-content">

						<div class="main_menu">
							<div>
								<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false')); ?>
							</div>
						</div>
					</div>

				</div>

				<?php wp_head(); ?>

			</header>
			<!-- End Head Container -->