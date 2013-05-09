<?php

/*
	Begin Create Shortcode Generator Options
*/

add_action('admin_menu', 'wpcrown_shortcode_generator');

function wpcrown_shortcode_generator() {

  //add_submenu_page('functions.php', 'Shortcode Generator', 'Shortcode Generator', 'manage_options', 'wpcrown_shortcode_generator', 'wpcrown_shortcode_generator_options');
  
  global $page_postmetas;
	if ( function_exists('add_meta_box') && isset($page_postmetas) && count($page_postmetas) > 0 ) {  
		add_meta_box( 'shortcode_metabox', 'Shortcode Generator', 'wpcrown_shortcode_generator_options', 'page', 'normal', 'high' );
		add_meta_box( 'shortcode_metabox', 'Shortcode Generator', 'wpcrown_shortcode_generator_options', 'post', 'normal', 'high' );  
		add_meta_box( 'shortcode_metabox', 'Shortcode Generator', 'wpcrown_shortcode_generator_options', 'portfolios', 'normal', 'high' );  
	}

}

function wpcrown_shortcode_generator_options() {

  	if (!current_user_can('manage_options'))  {
    	wp_die( __('You do not have sufficient permissions to access this page.', 'agrg') );
  	}
  	
  	$plugin_url = get_stylesheet_directory_uri().'/plugins/shortcode_generator';

	//Begin shortcode array
	$shortcodes = array(

		'full' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		'one_half_first' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		'one_half' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		
		'one_third_first' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		'one_third' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		
		'two_third_first' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		'two_third' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		
		'one_fourth_first' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		'one_fourth' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),

		'three_fourth_first' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		'three_fourth' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),

		'facebook' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your facebook link',
			)
		),

		'behance' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your behance link',
			)
		),

		'dribbble' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your dribbble link',
			)
		),

		'evernote' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your evernote link',
			)
		),

		'flickr' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your flickr link',
			)
		),

		'forrst' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your forrst link',
			)
		),

		'googleplus' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your googleplus link',
			)
		),

		'linkedin' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your linkedin link',
			)
		),

		'paypal' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your paypal link',
			)
		),

		'rss' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your rss link',
			)
		),

		'tumblr' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your tumblr link',
			)
		),

		'twitter' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your twitter link',
			)
		),

		'vimeo' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your vimeo link',
			)
		),

		'wordpress' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your wordpress link',
			)
		),

		'youtube' => array(
			'attr' => array(
				'url' => 'text',
			),
			'desc' => array(
				'url' => 'Enter your youtube link',
			)
		),

		'entry_title' => array(
			'attr' => array(
				'title' => 'text',
			),
			'desc' => array(
				'title' => 'Enter your title here',
			)
		),

		'normal_button' => array(
			'attr' => array(
				'type' => 'select',
				'url' => 'text',
			),
			'desc' => array(
				'type' => 'List type',
				'url' => 'Enter button link here',
			),
			'options' => array(
				'blue-navy' => 'blue-navy',
				'green' => 'green',
				'orange' => 'orange',
				'gray' => 'gray',
				'rose' => 'rose',
				'purple' => 'purple',
				'pink' => 'pink',
				'brown' => 'brown',
				'yellow' => 'yellow',
				'red' => 'red',
				'light-gray' => 'light-gray',
				'dark-blue' => 'dark-blue',
				'black' => 'black',
			),
			'content' => TRUE,
			'content_text' => 'Enter button text',
		),

		'large_button' => array(
			'attr' => array(
				'type' => 'select',
				'url' => 'text',
			),
			'desc' => array(
				'type' => 'List type',
				'url' => 'Enter button link here',
			),
			'options' => array(
				'blue-navy' => 'blue-navy',
				'green' => 'green',
				'orange' => 'orange',
				'gray' => 'gray',
				'rose' => 'rose',
				'purple' => 'purple',
				'pink' => 'pink',
				'brown' => 'brown',
				'yellow' => 'yellow',
				'red' => 'red',
				'light-gray' => 'light-gray',
				'dark-blue' => 'dark-blue',
				'black' => 'black',
			),
			'content' => TRUE,
			'content_text' => 'Enter button text',
		),

		'big_button' => array(
			'attr' => array(
				'type' => 'select',
				'url' => 'text',
			),
			'desc' => array(
				'type' => 'List type',
				'url' => 'Enter button link here',
			),
			'options' => array(
				'blue-navy' => 'blue-navy',
				'green' => 'green',
				'orange' => 'orange',
				'gray' => 'gray',
				'rose' => 'rose',
				'purple' => 'purple',
				'pink' => 'pink',
				'brown' => 'brown',
				'yellow' => 'yellow',
				'red' => 'red',
				'light-gray' => 'light-gray',
				'dark-blue' => 'dark-blue',
				'black' => 'black',
			),
			'content' => TRUE,
			'content_text' => 'Enter button text',
		),

		'four_projects_row' => array(
			'attr' => array(
				'projects' => 'text',
			),
			'desc' => array(
				'projects' => 'Enter projects number to display',
			)
		),

		'three_projects_row' => array(
			'attr' => array(
				'projects' => 'text',
			),
			'desc' => array(
				'projects' => 'Enter projects number to display',
			)
		),

		'two_projects_row' => array(
			'attr' => array(
				'projects' => 'text',
			),
			'desc' => array(
				'projects' => 'Enter projects number to display',
			)
		),

		'three_columns_team' => array(
			'attr' => array(
				'items' => 'text',
			),
			'desc' => array(
				'items' => 'Enter team members number to display',
			)
		),

		'two_columns_team' => array(
			'attr' => array(
				'items' => 'text',
			),
			'desc' => array(
				'items' => 'Enter team members number to display',
			)
		),

		'testimonials' => array(
			'attr' => array(
				'title' => 'text',
			),
			'desc' => array(
				'title' => 'Enter tstimonials title',
			)
		),

		'dropcap' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		'quote' => array(
			'attr' => array(),
			'desc' => array(),
			'content' => TRUE,
		),
		
		'toggle' => array(
			'attr' => array(
				'title' => 'text',
			),
			'desc' => array(
				'title' => 'Enter toggle title',
			),
			'content' => TRUE,
			'content_text' => 'Toggle content',
		),

		'faq_toggle' => array(
			'attr' => array(
				'title' => 'text',
			),
			'desc' => array(
				'title' => 'Enter faq question',
			),
			'content' => TRUE,
			'content_text' => 'FAQ answer',
		),

		'partners' => array(
		),
		
		'frame_left' => array(
			'attr' => array(
				'src' => 'text',
				'href' => 'text',
			),
			'desc' => array(
				'src' => 'Enter image URL',
				'href' => 'Enter hyperlink URL for image',
			),
			'content' => TRUE,
			'content_text' => 'Image Caption',
		),
		
		'frame_right' => array(
			'attr' => array(
				'src' => 'text',
				'href' => 'text',
			),
			'desc' => array(
				'src' => 'Enter image URL',
				'href' => 'Enter hyperlink URL for image',
			),
			'content' => TRUE,
			'content_text' => 'Image Caption',
		),
		
		'frame_center' => array(
			'attr' => array(
				'src' => 'text',
				'href' => 'text',
			),
			'desc' => array(
				'src' => 'Enter image URL',
				'href' => 'Enter hyperlink URL for image',
			),
			'content' => TRUE,
			'content_text' => 'Image Caption',
		),

		
		'notification_box' => array(
			'content' => TRUE,
		),
		
		'error_box' => array(
			'content' => TRUE,
		),
		
		'download_box' => array(
			'content' => TRUE,
		),
		
		'information_box' => array(
			'content' => TRUE,
		),
		
		'list' => array(
			'attr' => array(
				'type' => 'select',
			),
			'desc' => array(
				'type' => 'List type',
			),
			'options' => array(
				'arrow' => 'arrow',
				'black bullets' => 'black',
				'red bullets' => 'red',
				'blue bullets' => 'blue',
				'yellow bullets' => 'yellow',
				'green bullets' => 'green',
				'square' => 'square',
				'star' => 'star',
				'arrow_down' => 'arrow_down',
				'arrow_up' => 'arrow_up',
				'arrow_left' => 'arrow_left',
				'arrow_right' => 'arrow_right',
				'bookmark' => 'bookmark',
				'calendar' => 'calendar-list',
				'check' => 'check',
				'clock' => 'clock',
				'cross' => 'cross',
				'crosshair' => 'crosshair',
				'email' => 'email',
				'favorite' => 'favorite',
				'unfavorite' => 'unfavorite',
				'heart' => 'heart',
				'house' => 'house',
				'aminus' => 'minus',
				'plus' => 'plus',
				'musical' => 'musical',
				'speech' => 'speech',
				'vcard' => 'vcard',
				'tag' => 'tag',
			),
			'content' => TRUE,
			'content_text' => 'Enter list (ex: &lt;li&gt;your item&lt;/li&gt;;)',
		),
		
		'chart' => array(
			'attr' => array(
				'width' => 'text',
				'height' => 'text',
				'type' => 'select',
				'title' => 'text',
				'data' => 'text',
				'label' => 'text',
				'colors' => 'text',
			),
			'desc' => array(
				'width' => 'Enter chart width',
				'height' => 'Enter chart height',
				'type' => 'Select chart type',
				'title' => 'Enter chart title',
				'data' => 'Enter chart data (ex: 10,35,40,100)',
				'label' => 'Enter chart labels (ex: 2008|2009|2010|2011)',
				'colors' => 'Enter chart colors (ex: 00ffff,ff0000,666666,cccccc)',
			),
			'options' => array(
				'3dpie' => '3dpie',
				'pie' => 'pie',
				'line' => 'line',
			),
			'content' => FALSE,
		),
		
		'youtube' => array(
			'attr' => array(
				'width' => 'text',
				'height' => 'text',
				'video_id' => 'text',
			),
			'desc' => array(
				'width' => 'Video width in pixels',
				'height' => 'Video height in pixels',
				'video_id' => 'Youtube video ID something like Js9Z8UQAA4E',
			),
			'content' => FALSE,
		),
		
		'vimeo' => array(
			'attr' => array(
				'width' => 'text',
				'height' => 'text',
				'video_id' => 'text',
			),
			'desc' => array(
				'width' => 'Video width in pixels',
				'height' => 'Video height in pixels',
				'video_id' => 'Vimeo video ID something like 9380243',
			),
			'content' => FALSE,
		),
		
	);

?>
<script>
jQuery(document).ready(function(){ 
	jQuery('#shortcode_select').change(function() {
  		var target = jQuery(this).val();
  		jQuery('.rm_section').css('display', 'none');
  		jQuery('#div_'+target).css('display', '');
	});	
	
	jQuery('.code_area').click(function() { 
		document.getElementById(jQuery(this).attr('id')).focus();
    	document.getElementById(jQuery(this).attr('id')).select();
	});
	
	jQuery('.button').click(function() { 
		var target = jQuery(this).attr('id');
		var gen_shortcode = '';
  		gen_shortcode+= '['+target;
  		
  		if(jQuery('#'+target+'_attr_wrapper .attr').length > 0)
  		{
  			jQuery('#'+target+'_attr_wrapper .attr').each(function() {
				gen_shortcode+= ' '+jQuery(this).attr('name')+'="'+jQuery(this).val()+'"';
			});
		}
		
		gen_shortcode+= ']';
		
		if(jQuery('#'+target+'_content').length > 0)
  		{
  			gen_shortcode+= jQuery('#'+target+'_content').val()+'[/'+target+']';
  			
  			var repeat = jQuery('#'+target+'_content_repeat').val();
  			for (count=1;count<=repeat;count=count+1)
			{
				if(count<repeat)
				{
					gen_shortcode+= '['+target+']';
					gen_shortcode+= jQuery('#'+target+'_content').val()+'[/'+target+']';
				}
				else
				{
					gen_shortcode+= '['+target+'_last]';
					gen_shortcode+= jQuery('#'+target+'_content').val()+'[/'+target+'_last]';
				}
			}
  		}
  		
  		jQuery('#'+target+'_code').val(gen_shortcode);
	});
});
</script>

	<div style="padding:20px 10px 10px 10px">
	<?php
		if(!empty($shortcodes))
		{
	?>
			<strong>Select Shortcode:</strong>
			<select id="shortcode_select">
				<option value="">---Select---</option>
			
	<?php
			foreach($shortcodes as $shortcode_name => $shortcode)
			{
	?>
	
			<option value="<?php echo $shortcode_name; ?>"><?php echo $shortcode_name; ?></option>
	
	<?php
			}
	?>
			</select>
	<?php
		}
	?>
	
	<br/><br/>
	
	<?php
		if(!empty($shortcodes))
		{
			foreach($shortcodes as $shortcode_name => $shortcode)
			{
	?>
	
			<div id="div_<?php echo $shortcode_name; ?>" class="rm_section" style="display:none">
				<div class="rm_title">
					<h3><?php echo ucfirst($shortcode_name); ?></h3>
					<div class="clearfix"></div>
				</div>
				
				<div class="rm_text" style="padding: 10px 0 20px 0">
				
				<!-- img src="<?php echo $plugin_url.'/'.$shortcode_name.'.png'; ?>" alt=""/><br/><br/><br/ -->
				
				<?php
					if(isset($shortcode['content']) && $shortcode['content'])
					{
						if(isset($shortcode['content_text']))
						{
							$content_text = $shortcode['content_text'];
						}
						else
						{
							$content_text = 'Your Content';
						}
				?>
				
				<strong><?php echo $content_text; ?>:</strong><br/>
				<input type="hidden" id="<?php echo $shortcode_name; ?>_content_repeat" value="<?php echo $shortcode['repeat']; ?>"/>
				<textarea id="<?php echo $shortcode_name; ?>_content" style="width:100%;height:70px" rows="3" wrap="off"></textarea><br/><br/>
				
				<?php
					}
				?>
			
				<?php
					if(isset($shortcode['attr']) && !empty($shortcode['attr']))
					{
				?>
						
						<div id="<?php echo $shortcode_name; ?>_attr_wrapper">
						
				<?php
						foreach($shortcode['attr'] as $attr => $type)
						{
				?>
				
							<?php echo '<strong>'.ucfirst($attr).'</strong>: '.$shortcode['desc'][$attr]; ?><br/><br/>
							
							<?php
								switch($type)
								{
									case 'text':
							?>
							
									<input type="text" id="<?php echo $shortcode_name; ?>_text" style="width:100%" class="attr" name="<?php echo $attr; ?>"/>
							
							<?php
									break;
									
									case 'select':
							?>
							
									<select id="<?php echo $shortcode_name; ?>_select" style="width:25%" class="attr" name="<?php echo $attr; ?>">
									
										<?php
											if(isset($shortcode['options']) && !empty($shortcode['options']))
											{
												foreach($shortcode['options'] as $select_key => $option)
												{
										?>
										
													<option value="<?php echo $select_key; ?>"><?php echo $option; ?></option>
										
										<?php	
												}
											}
										?>							
									
									</select>
							
							<?php
									break;
								}
							?>
							
							<br/><br/>
				
				<?php
						} //end attr foreach
				?>
				
						</div>
				
				<?php
					}
				?>
				<br/>
				
				<input type="button" id="<?php echo $shortcode_name; ?>" value="Generate Shortcode" class="button"/>
				
				<br/><br/><br/>
				
				<strong>Shortcode:</strong><br/>
				<textarea id="<?php echo $shortcode_name; ?>_code" style="width:90%;height:70px" rows="3" readonly="readonly" class="code_area" wrap="off"></textarea>
				
				</div>
				
			</div>
	
	<?php
			} //end shortcode foreach
		}
	?>
	
</div>

<?php

}

/*
	End Create Shortcode Generator Options
*/

?>