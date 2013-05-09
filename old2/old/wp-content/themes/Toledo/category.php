<?php 

/*
The main template file for display categories
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

						<!-- Page Title Container -->
						<div id="page-title">
							<div class="page-title full">
								<h2><?php _e("Category", "agrgg"); ?>: <?php	printf( __( ' %s', '' ), '' . single_cat_title( '', false ) . '' );	?></h2>
							</div>	
						</div>	
						<!-- End Page Title Container -->

						<!-- Page Breadcrumbs Container -->
						<div class="full">
							<div class="breadcrumbs">
								<p>You are here: <a href="<?php echo home_url(); ?>" style="margin-left: 10px;">Home</a> <span style="margin-left: 10px;">/</span><span style="margin-left: 10px;"><?php _e("Category", "agrgg"); ?>: <?php	printf( __( ' %s', '' ), '' . single_cat_title( '', false ) . '' );	?></span></p>
							</div>
						</div>
						<!-- End Page Breadcrumbs Container -->
		

						<div class="content eight alpha columns services">

						<?php

							global $more; $more = false; # some wordpress wtf logic

								$cat_id = get_cat_ID(single_cat_title('', false));
								if(!empty($cat_id))
								{
									$query_string.= '&cat='.$cat_id;
								}
							
							query_posts($query_string);

							if (have_posts()) : while (have_posts()) : the_post();
						

						?> 
						
						<div class="post-preview" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<?php if(function_exists('get_post_format') && 'link' == get_post_format($post->ID)) : ?>


								<!-- Post Title Container -->
								<div class="post-full">
									<div class="post-title">
										<h2><?php _e("Link", "agrg"); ?>: <a href="<?php echo get_post_meta($post->ID, '_wpcrown_link_url', true); ?>" target='_blank' ><?php the_title(); ?></a></h2>
									</div>	
								</div>	
								<!-- End Post Title Container -->

								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
								
								<div class="post-full">

									<?php $more = 0;the_content(''); ?>
									
									<a href="<?php the_permalink() ?>" class="button read-more" ><span class="button-inner">Read More &rarr;</span></a> 
								
								</div>	




							<?php elseif(function_exists('get_post_format') && 'image' == get_post_format($post->ID)) : ?>

								<!-- Post Title Container -->
								<div class="post-full">
									<div class="post-title">
										<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
									</div>	
								</div>	
								<!-- End Post Title Container -->
										
								<?php if ( has_post_thumbnail() ) { ?>
											
									<div class="post-image">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('blog_post_image'); ?></a>
									</div>
													
								<?php 
									}
								?>
									
								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
										
								<div class="post-full">
											
									<?php $more = 0;the_content(''); ?>
							
									<a href="<?php the_permalink() ?>" class="button read-more" ><span class="button-inner">Read More &rarr;</span></a> 
										
								</div>



							<?php elseif(function_exists('get_post_format') && 'video' == get_post_format($post->ID)) : ?>

								<!-- Post Title Container -->
								<div class="post-full">
									<div class="post-title">
										<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
									</div>	
								</div>	
								<!-- End Post Title Container -->
										
								<div class="post-image full">
									<?php 
										$embed = get_post_meta($post->ID, '_wpcrown_video_embed_code', true);
										       
										echo stripslashes(htmlspecialchars_decode($embed));
									?>
								</div>
									
								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
										
								<div class="post-full">
											
									<?php $more = 0;the_content(''); ?>
							
									<a href="<?php the_permalink() ?>" class="button read-more" ><span class="button-inner">Read More &rarr;</span></a> 
										
								</div>



							<?php elseif(function_exists('get_post_format') && 'gallery' == get_post_format($post->ID)) : ?>

								<!-- Post Title Container -->
								<div class="post-full">
									<div class="post-title">
										<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
									</div>	
								</div>	
								<!-- End Post Title Container -->
										
								<div class="post-image">

									<div class="flexslider">

										<ul class="slides">

											<?php
												$attachments = get_children(array('post_parent' => $post->ID,
																				'post_status' => 'inherit',
																				'post_type' => 'attachment',
																				'post_mime_type' => 'image',
																				'order' => 'ASC',
																				'orderby' => 'menu_order ID'));

												foreach($attachments as $att_id => $attachment) {
													$full_img_url = wp_get_attachment_url($attachment->ID);
														$split_pos = strpos($full_img_url, 'wp-content');
														$split_len = (strlen($full_img_url) - $split_pos);
														$abs_img_url = substr($full_img_url, $split_pos, $split_len);
														$full_info = @getimagesize(ABSPATH.$abs_img_url);
													?>

											<li><img src="<?php echo $full_img_url; ?>" alt="<?php echo $attachment->post_title; ?>" /></li>

											<?php
												}
											?>

										</ul>

									</div>
											
								</div>		
									
								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
										
								<div class="post-full">
											
									<?php $more = 0;the_content(''); ?>
							
									<a href="<?php the_permalink() ?>" class="button read-more" ><span class="button-inner">Read More &rarr;</span></a> 
										
								</div>



							<?php elseif(function_exists('get_post_format') && 'quote' == get_post_format($post->ID)) : ?>
										
								<div class="post-full">
											
									<blockquote>
										<?php echo the_content(); ?>
										<cite><?php the_title(); ?></cite>
									</blockquote>

									<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
							
									<a href="<?php the_permalink() ?>" class="button read-more" ><span class="button-inner">Read More &rarr;</span></a>
										
								</div>




							<?php else : ?>

								<!-- Post Title Container -->
								<div class="post-full">
									<div class="post-title">
										<h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
									</div>	
								</div>	
								<!-- End Post Title Container -->
									
								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
										
								<div class="post-full">
											
									<?php $more = 0;the_content(''); ?>
							
									<a href="<?php the_permalink() ?>" class="button read-more" ><span class="button-inner">Read More &rarr;</span></a> 
										
								</div>



								<?php endif; ?>
								
								</div>
					
								<?php endwhile; ?>
						
								<!-- Begin Pagination-->	
								<div>
									<?php pagination(); ?>
								</div>
								<!-- End Pagination-->	
								
								<?php endif; ?>
							
							</div>

							<div class="sidebar columns sidebar_right three">
								<div class="inner_sidebar">
										
									<?php get_sidebar('blog'); ?>
												
								</div>
							</div>

					</div>
					<!-- End Content -->
				
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