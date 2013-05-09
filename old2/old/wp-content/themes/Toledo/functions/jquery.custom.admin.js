// All custom JS not relating to theme options goes here

jQuery(document).ready(function($) {

/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/

    /* Grab our vars ---------------------------------------------------------------*/
	var linkOptions = $('#wpcrown-metabox-post-link'),
    	linkTrigger = $('#post-format-link'),
    	audioOptions = $('#wpcrown-metabox-post-audio'),
    	audioTrigger = $('#post-format-audio'),
    	videoOptions = $('#wpcrown-metabox-post-video'),
    	videoTrigger = $('#post-format-video'),
    	group = jQuery('#post-formats-select input');

    /* Hide and show sections as needed --------------------------------------------*/
    wpcrownHideAll(null);	
	
	group.change( function() {
		wpcrownHideAll(null);		
		
		if($(this).val() == 'link') {
			linkOptions.css('display', 'block');
		} else if($(this).val() == 'audio') {
			audioOptions.css('display', 'block');
		} else if($(this).val() == 'video') {
			videoOptions.css('display', 'block');
		}
	});
		
	if(linkTrigger.is(':checked'))
		linkOptions.css('display', 'block');
		
	if(audioTrigger.is(':checked'))
		audioOptions.css('display', 'block');
		
	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');
		
    function wpcrownHideAll(notThisOne) {
		videoOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		audioOptions.css('display', 'none');
    }
	
});