<?php 

/*
Template name: Gallery 3 Col
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_title = get_post_meta($current_page_id, 'page_title', true);

$page_slogan = get_post_meta($current_page_id, 'page_slogan', true);

$page_slider = get_post_meta($current_page_id, 'page_slider', true);

$page_bg_image = get_post_meta($current_page_id, 'page_bg', true);

get_header(); ?>
<!-- this is index.php -->

			<?php if($page_slider == "parallax") : ?>

				<!-- Parallax Container -->
				<div id="layerslider">

					<?php echo do_shortcode('[layerslider id="1"]'); ?>

				</div>	
				<!-- End Parallax Container -->

			<?php elseif ($page_slider == "FlexSlider") : ?>
			
				<!-- Slideshow Container -->
				<div class="container_wrap" id="slideshow_big">
						
					<!-- start header -->
					<div class="container" style="position:relative; z-index:2;">

					    <div class="flexslider">
							<ul class="slides">
								<?php 
						
								$my_query = new WP_Query('post_type=flex_sldr'); while ($my_query->have_posts()) : $my_query->the_post();
									
								$custom = get_post_custom($post->ID);
								
								$image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);

								$link_url = get_post_meta($post->ID, 'flex_sldr_link_url', true);
													
								if(empty($link_url))
								{ ?>
									
									<li>
										<?php if($post->post_content=="") : ?>
										<!-- Do stuff with empty posts (or leave blank to skip empty posts) -->
										<?php else : ?>
										<?php the_content(); ?>
										<?php endif; ?>

										<?php the_post_thumbnail('header_image'); ?>

									</li>
									

								<?php } else { ?>

									<li>

										<?php if($post->post_content=="") : ?>
										<!-- Do stuff with empty posts (or leave blank to skip empty posts) -->
										<?php else : ?>
										<?php the_content(); ?>
										<?php endif; ?>

										<a href="<?php echo $link_url; ?>"><?php the_post_thumbnail('header_image'); ?></a>

									</li>

							<?php } ?>

							<?php endwhile; ?>
							</ul>
						</div>

				 	</div>
					<!-- end header -->
				</div>
				<!-- End Slideshow Container -->	

			<?php endif; ?>

			<!-- Container -->
			<div id="container">			
			
				<!-- Begin Main Container -->
				<div class="container_wrap" id="main">

					<!-- Begin Services  -->
					<div class="container">

						<?php

							if(!empty($page_title))
								{
						?>

						<!-- Page Title Container -->
						<div id="page-title">
							<div class="page-title full">
								<h2><?php echo $page_title; ?></h2>
							</div>	
						</div>	
						<!-- End Page Title Container -->

						<!-- Page Breadcrumbs Container -->
						<div class="full">
							<div class="breadcrumbs">
								<p>You are here: <a href="<?php echo home_url(); ?>" style="margin-left: 10px;">Home</a> <span style="margin-left: 10px;">/</span><span style="margin-left: 10px;"><?php echo $page_title; ?></span></p>
							</div>
						</div>
						<!-- End Page Breadcrumbs Container -->

						<?php
							}
						?>
			
						<?php

							if(!empty($page_slogan))
								{
						?>

						<!-- Page Title Container -->
						<div class="full">
							<div class="slogan">
								<?php echo $page_slogan; ?>
							</div>	
						</div>	
						<!-- End Page Title Container -->

						<?php
							}
						?>	
					
						<div class="full">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<?php the_content(); ?>
										
							<?php endwhile; endif; ?>

						</div>

							<?php
								$attachments = get_children(array('post_parent' => $post->ID,
									'post_status' => 'inherit',
									'post_type' => 'attachment',
									'post_mime_type' => 'image',
									'order' => 'ASC',
									'orderby' => 'menu_order ID'));

								$current = -1;

								foreach($attachments as $att_id => $attachment) {

									$full_img_url = wp_get_attachment_url($attachment->ID);
									$split_pos = strpos($full_img_url, 'wp-content');
									$split_len = (strlen($full_img_url) - $split_pos);
									$abs_img_url = substr($full_img_url, $split_pos, $split_len);
									$full_info = @getimagesize(ABSPATH.$abs_img_url);

									$medium_img_url = wp_get_attachment_medium_url($attachment->ID);

									$current++;	
							?>

							<div class="one_third <?php if($current%3 ==0) { echo 'first '; } ?> column_container">
								<div class="gallery-image">
									<a href="<?php echo $full_img_url; ?>" rel="prettyPhoto[pp_gal]">
										<img src="<?php echo $medium_img_url; ?>" alt="<?php echo $attachment->post_title; ?>" />
										<div class="da-slideFromBottom"></div>
									</a>
								</div>
							</div>

							<?php
								}
							?>

					</div>
				
				</div>
				<!-- End Main Container -->

				<?php
																			
				if(!empty($page_bg_image))
					{
				?>

					<!-- Background image -->
					<div class="bg-pattern"></div>
					<div class="bg-image">
						<img src="<?php echo $page_bg_image ?>" class="bg" alt="background" />
					</div>
					<!-- End Background image -->

				<?php
					} 		
				?>
			
<?php get_footer(); ?>