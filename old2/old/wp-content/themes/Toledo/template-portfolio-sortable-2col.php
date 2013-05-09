<?php 

/*
Template Name: Portfolio Sortable 2 Col
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
					<div class="container" id="portfolio">

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

						global $agurghis_config;
						$agurghis_config['agurghis_is_overview'] = true;

						
						// check if we got a page to display:

						//get the categories for each post and create a string that serves as classes so the javascript can sort by those classes
							$sort_classes = "";
							$item_categories = get_the_terms( $id, 'portfoliosets' );

							if(is_object($item_categories) || is_array($item_categories))
							{
								foreach ($item_categories as $cat)
								{
									$sort_classes .= $cat->slug.'_sort ';
								}
							}
								
							if(!empty($agurghis_config['portfolio_ajax'])) $sort_classes .= " ajax_portfolio";

						$includeArray = "";
						if(isset($agurghis_config['new_query']['tax_query'][0]['terms'])) $includeArray = $agurghis_config['new_query']['tax_query'][0]['terms'];

						$args = array(
			
							'taxonomy'	=> 'portfoliosets',
							'hide_empty'=> 0,
							'include'	=> $includeArray
						
						);

						$categories = get_categories($args);
						$container_id = "";
						
						
								$hide = "hidden";
								if (isset($categories[1])){ $hide = ""; }
								
								echo "<div class='sort_by_cat' id='filters' data-option-key='filter'>";
								echo "<a href='#filter' data-option-value='*' class='active_sort'>All</a>";
								
								foreach($categories as $category)
								{
									echo "<span class='text-sep'>/</span>";
									echo "<a href='#filter' data-option-value='.".$category->category_nicename."_sort'>".$category->cat_name."</a>";
									$container_id .= $category->term_id;
								}
								
								echo "</div>";
						

						?>
						
					<div id="portfolio-sort-container" class="portfolio-sort-container isotope">

						<?php					

							if ( get_query_var('paged') ) {
										$paged = get_query_var('paged');
								} elseif ( get_query_var('page') ) {
									$paged = get_query_var('page');
								} else {
									$paged = 1;
								}
							query_posts( array('post_type' => 'project',  'posts_per_page' => 8, 'paged' => $paged));

							$loop_counter = 1;
							
							if (have_posts()) : while (have_posts()) : the_post(); 

							//get the categories for each post and create a string that serves as classes so the javascript can sort by those classes
							$sort_classes = "";
							$item_categories = get_the_terms( $id, 'portfoliosets' );

							if(is_object($item_categories) || is_array($item_categories))
							{
								foreach ($item_categories as $cat)
								{
									$sort_classes .= $cat->slug.'_sort ';
								}
							}
								
							if(!empty($agurghis_config['portfolio_ajax'])) $sort_classes .= " ajax_portfolio";

							$portfolio_link_url = get_post_meta($post->ID, 'portfolio_link_url', true);
															
							if(empty($portfolio_link_url))
							{
								$permalink_url = get_permalink($post->ID);
							}
							else
							{
								$permalink_url = $portfolio_link_url;
							}
							
						?>

					<div class="one_half <?php if($current%2 ==0) { echo 'first '; } ?> project <?php echo $sort_classes; ?> isotope-item">
						<div class="portfolio-image-holder">
							<div class="portfolio-image">
								<a href="<?php echo $permalink_url; ?>">
									<?php the_post_thumbnail('project_small_image'); ?>
									<div class="da-slideFromBottom"></div>
								</a>
							</div>
						</div>
						<h5><?php the_title(); ?></h5>
					</div>
					
					<?php endwhile; ?>

					</div>	

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