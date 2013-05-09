<?php 

/*
Template name: Archives
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
					

						<div class="entry-title">
							<h5><span><?php _e("The 20 latest Blog Posts", "agrgg"); ?></span></h5>
						</div>

						<div class="full column_container">

						<?php 
							//display the actual post content
							the_post();
							the_content();
							
							
							/*
							* Display the latest 20 blog posts
							*/
							
							
							query_posts(array('posts_per_page'=>20));

							// check if we got posts to display:
							if (have_posts()) :
							
							echo "<ul class='lists star'>";
								while (have_posts()) : the_post();
								
					        	echo "<li><a href='".get_permalink()."' rel='bookmark' title='". __('Permanent Link:','agrg')." ".get_the_title()."'>".get_the_title()."</a></li>";
								
								endwhile;
							echo "</ul>";
							endif;

							?>

							</div>

							<?php

							/*
							* Display pages, categories and month archives
							*/
							
							echo "<div class='one_third first'>";

							?>

							<div class="entry-title">
								<h5><span><?php _e("Available Pages", "agrg"); ?></span></h5>
							</div>

							<?php

							echo "<ul class='full lists star'>";
							wp_list_pages('title_li=&depth=-1' );
							echo "</ul>";
							echo "</div>";
							
							echo "<div class='one_third'>";

							?>

							<div class="entry-title">
								<h5><span><?php _e("Archives by Subject:", "agrg"); ?></span></h5>
							</div>

							<?php

							echo "<ul class='full lists star'>";
							wp_list_categories('sort_column=name&optioncount=0&hierarchical=0&title_li=');
							echo "</ul>";
							echo "</div>";
							
							echo "<div class='one_third'>";

							?>

							<div class="entry-title">
								<h5><span><?php _e("Archives by Month:", "agrg"); ?></span></h5>
							</div>

							<?php

							echo "<ul class='full lists star'>";
							wp_get_archives('type=monthly');
							echo "</ul>";
							echo "</div>";

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