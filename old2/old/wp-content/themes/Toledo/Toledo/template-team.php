<?php 

/*
Template Name: Team
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
				<div class="container_wrap">

					<!-- Begin Services  -->
					<div class="container" id="main">

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
					

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<?php the_content(); ?>
									
						<?php endwhile; endif; ?>

						<div class="full" id="team">

				<?php 
			
					if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} elseif ( get_query_var('page') ) {
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
					query_posts( array('post_type' => 'team',  'posts_per_page' => 6, 'paged' => $paged));

					$current = -1;
				?>
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); $current++; 
					
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);
					//$imagem = '';						
					//$imagem = wpcrown_vt_resize( '', $image_url[0], '160', '100', true, 'left', true);
					
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
					$evernote = $custom["memberEvernote"][0];
					$googlePlus = $custom["memberGooglePlus"][0];
					$linkedin = $custom["memberLinkedin"][0];
					$paypal = $custom["memberPaypal"][0];
					$RSS = $custom["memberRSS"][0];
					$WordPress = $custom["memberWordPress"][0];
					$Youtube = $custom["memberYoutube"][0];
				
				?>

					<div class="one_third <?php if($current%3 ==0) { echo 'first '; } ?>column_container team">
						<div class="team-image"><?php the_post_thumbnail('team_image'); ?></div>
						<h3><?php the_title(); ?></h3>
						<span class="team-position"><?php echo $position; ?></span>
						<p><?php echo the_content(); ?></p>
						<ul class="social_bookmarks">
									<?php
																			
										if(!empty($facebook))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_facebook; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" alt="facebook"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($behance))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_behance; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/behance.png" alt="behance"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($dribbble))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_dribbble; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/dribbble.png" alt="dribbble"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($evernote))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_evernote; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/evernote.png" alt="evernote"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($flickr))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_flickr; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/flickr.png" alt="flickr"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($forrst))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_forrst; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/forrst.png" alt="forrst"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($googleplus))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_googleplus; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/googleplus.png" alt="googleplus"/></a></li>
									<?php
										} 		
									?><?php
																			
										if(!empty($linkedin))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_linkedin; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" alt="linkedin"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($paypal))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_paypal; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/paypal.png" alt="paypal"/></a></li>
									<?php
										} 		
									?>
									
									<?php
																			
										if(!empty($RSS))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_rss; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" alt="rss"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($tumblr))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_tumblr; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/tumblr.png" alt="tumblr"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($twitter))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_twitter; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt="twitter"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($vimeo))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_vimeo; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/vimeo.png" alt="vimeo"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($WordPress))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_wordpress; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/wordpress.png" alt="wordpress"/></a></li>
									<?php
										} 		
									?>

									<?php
																			
										if(!empty($Youtube))
										{
									?>
										<li><a href="<?php echo $wpcrown_sm_youtube; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" alt="youtube"/></a></li>
									<?php
										} 		
									?>


								</ul>
					</div>

					<?php endwhile; ?>

					<!-- Begin Pagination-->
					<div class="pagination">	
						<?php pagination(); ?>	
					</div>
					<!-- End Pagination-->
						
					<?php endif; ?>
					<?php wp_reset_query(); ?>

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