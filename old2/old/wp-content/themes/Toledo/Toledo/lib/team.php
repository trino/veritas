<?php

	// slideshow
	add_action('init', 'create_member');
	function create_member() {
    	$memberArgs = array(
        	'label' => __('Team', 'agrg'),
        	'singular_label' => __('Image', 'agrg'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => get_stylesheet_directory_uri().'/functions/images/screen.png'
        );
    	register_post_type('team',$memberArgs);
	}
	
	
	add_action("admin_init", "add_member");
	add_action('save_post', 'update_member_url');
	function add_member(){
		add_meta_box("member_details", "Member Options", "member_options", "team", "normal", "low");
	}
	function member_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$memberPosition = $custom["memberPosition"][0];
		$memberTwitter = $custom["memberTwitter"][0];
		$memberFacebook = $custom["memberFacebook"][0];
		$memberDribbble = $custom["memberDribbble"][0];
		$memberFlickr = $custom["memberFlickr"][0];
		$memberForrst = $custom["memberForrst"][0];
		$memberTumblr = $custom["memberTumblr"][0];
		$memberVimeo = $custom["memberVimeo"][0];
		$memberBehance = $custom["memberBehance"][0];
		$memberEnvato = $custom["memberEnvato"][0];
		$memberEvernote = $custom["memberEvernote"][0];
		$memberGoogle = $custom["memberGoogle"][0];
		$memberGooglePlus = $custom["memberGooglePlus"][0];
		$memberGowalla = $custom["memberGowalla"][0];
		$memberiCloud = $custom["memberiCloud"][0];
		$memberLinkedin = $custom["memberLinkedin"][0];
		$memberPaypal = $custom["memberPaypal"][0];
		$memberPinterest = $custom["memberPinterest"][0];
		$memberRSS = $custom["memberRSS"][0];
		$memberWordPress = $custom["memberWordPress"][0];
		$memberYoutube = $custom["memberYoutube"][0];
?>		

	<div id="slide-options">
		<label>Position: </label><input name="memberPosition" value="<?php echo $memberPosition; ?>" /> <br /><br />
		<label>Twitter URL: </label><input name="memberTwitter" value="<?php echo $memberTwitter; ?>" /> <br /><br />
		<label>Facebook URL: </label><input name="memberFacebook" value="<?php echo $memberFacebook; ?>" />	<br /><br />
		<label>Dribbble URL: </label><input name="memberDribbble" value="<?php echo $memberDribbble; ?>" />	<br /><br />
		<label>Flickr URL: </label><input name="memberFlickr" value="<?php echo $memberFlickr; ?>" /> <br /><br />
		<label>Forrst URL: </label><input name="memberForrst" value="<?php echo $memberForrst; ?>" /> <br /><br />
		<label>Tumblr URL: </label><input name="memberTumblr" value="<?php echo $memberTumblr; ?>" /> <br /><br />
		<label>Vimeo URL: </label><input name="memberVimeo" value="<?php echo $memberVimeo; ?>" /> <br /><br />
		<label>Behance URL: </label><input name="memberBehance" value="<?php echo $memberBehance; ?>" /> <br /><br />
		<label>Evernote URL: </label><input name="memberEvernote" value="<?php echo $memberEvernote; ?>" /> <br /><br />
		<label>Google+ URL: </label><input name="memberGooglePlus" value="<?php echo $memberGooglePlus; ?>" /> <br /><br />
		<label>Linkedin URL: </label><input name="memberLinkedin" value="<?php echo $memberLinkedin; ?>" /> <br /><br />
		<label>Paypal URL: </label><input name="memberPaypal" value="<?php echo $memberPaypal; ?>" /> <br /><br />
		<label>RSS URL: </label><input name="memberRSS" value="<?php echo $memberRSS; ?>" /> <br /><br />
		<label>WordPress URL: </label><input name="memberWordPress" value="<?php echo $memberWordPress; ?>" /> <br /><br />
		<label>Youtube URL: </label><input name="memberYoutube" value="<?php echo $memberYoutube; ?>" /> <br /><br />
	</div><!--end slide-options-->
	
<?php		
		}
	function update_member_url(){
		global $post;
		if(isset($_POST["memberPosition"]))
		update_post_meta($post->ID, "memberPosition", $_POST["memberPosition"]);
		update_post_meta($post->ID, "memberTwitter", $_POST["memberTwitter"]);
		update_post_meta($post->ID, "memberFacebook", $_POST["memberFacebook"]);
		update_post_meta($post->ID, "memberDribbble", $_POST["memberDribbble"]);
		update_post_meta($post->ID, "memberFlickr", $_POST["memberFlickr"]);
		update_post_meta($post->ID, "memberForrst", $_POST["memberForrst"]);
		update_post_meta($post->ID, "memberTumblr", $_POST["memberTumblr"]);
		update_post_meta($post->ID, "memberVimeo", $_POST["memberVimeo"]);
		update_post_meta($post->ID, "memberBehance", $_POST["memberBehance"]);
		update_post_meta($post->ID, "memberEnvato", $_POST["memberEnvato"]);
		update_post_meta($post->ID, "memberEvernote", $_POST["memberEvernote"]);
		update_post_meta($post->ID, "memberGoogle", $_POST["memberGoogle"]);
		update_post_meta($post->ID, "memberGooglePlus", $_POST["memberGooglePlus"]);
		update_post_meta($post->ID, "memberGowalla", $_POST["memberGowalla"]);
		update_post_meta($post->ID, "memberiCloud", $_POST["memberiCloud"]);
		update_post_meta($post->ID, "memberLinkedin", $_POST["memberLinkedin"]);
		update_post_meta($post->ID, "memberPaypal", $_POST["memberPaypal"]);
		update_post_meta($post->ID, "memberPinterest", $_POST["memberPinterest"]);
		update_post_meta($post->ID, "memberRSS", $_POST["memberRSS"]);
		update_post_meta($post->ID, "memberWordPress", $_POST["memberWordPress"]);
		update_post_meta($post->ID, "memberYoutube", $_POST["memberYoutube"]);
	}	

?>