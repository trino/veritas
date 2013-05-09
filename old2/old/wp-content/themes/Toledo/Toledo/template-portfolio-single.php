<?php 

/*
 The main template for project page.
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

get_header(); 

?>


			<!-- Container -->
			<div id="container">			
			
				<!-- Begin Main Container -->
				<div class="container_wrap" id="main">

					<!-- Begin Services  -->
					<div class="container">

						<!-- Page Title Container -->
						<div id="page-title">
							<div class="page-title full">
								<h2><?php the_title(); ?></h2>
							</div>	
						</div>	
						<!-- End Page Title Container -->

						<!-- Page Breadcrumbs Container -->
						<div class="full">
							<div class="breadcrumbs">
								<p>You are here: <a href="<?php echo home_url(); ?>" style="margin-left: 10px;">Home</a> <span style="margin-left: 10px;">/</span><span style="margin-left: 10px;"><?php the_title(); ?></span></p>
							</div>
						</div>
						<!-- End Page Breadcrumbs Container -->	

						<div class="content eight alpha columns services">
										
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
									
							<div class="post-full">
											
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
								<?php the_content(); ?>
														
								<?php endwhile; endif; ?> 
										
							</div>
									
						</div>

						<div class="sidebar columns sidebar_right three">
							<div class="inner_sidebar">
									
								<?php get_sidebar('pages'); ?>
											
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