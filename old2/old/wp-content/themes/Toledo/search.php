<?php 

/*
The main template file for search
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_title = get_post_meta($current_page_id, 'page_title', true);

$page_slogan = get_post_meta($current_page_id, 'page_slogan', true);

$page_slider = get_post_meta($current_page_id, 'page_slider', true);

$page_bg_image = get_post_meta($current_page_id, 'page_bg', true);

get_header(); 

$current = 0; ?>
<!-- this is index.php -->

			<!-- Container -->
			<div id="container">			
			
				<!-- Begin Main Container -->
				<div class="container_wrap" id="main">

					<!-- Begin Services  -->
					<div class="container">

						<!-- Page Title Container -->
						<div id="page-title">
							<div class="page-title full">
								<h2><?php _e( 'Search results for: ', 'agrg' ); ?><?php the_search_query(); ?></h2>
							</div>	
						</div>	
						<!-- End Page Title Container -->

						<!-- Page Breadcrumbs Container -->
						<div class="full">
							<div class="breadcrumbs">
								<p>You are here: <a href="<?php echo home_url(); ?>" style="margin-left: 10px;">Home</a> <span style="margin-left: 10px;">/</span><span style="margin-left: 10px;"><?php _e( 'Search', 'agrg' ); ?></span></p>
							</div>
						</div>
						<!-- End Page Breadcrumbs Container -->


						<div class="content eight alpha columns services">

							<?php if (have_posts()) : while (have_posts()) : the_post(); $current++; ?>	
						
							<div class="full">
							
								<h3 class="page-title"><?php echo $current ?>. <?php the_title(); ?></h3>

								<div class="full"><?php $more = 0;the_content(''); ?>

								<a href="<?php the_permalink() ?>"><?php echo the_permalink() ?></a></div>
							
							</div>
					
							<?php 

							endwhile;		
							else: 
							
							 ?>

							 <div class="full">
								<p><strong><?php _e('Nothing Found', 'agrg'); ?></strong><br/>
								   <?php _e('Sorry, no posts matched your criteria. Try another search?', 'agrg'); ?>
							    </p>
								
								<?php _e('You might want to consider some of our suggestions to get better results:', 'agrg'); ?></p>
								<ul>
									<li><?php _e('Check your spelling.', 'agrg'); ?></li>
									<li><?php _e('Try a similar keyword, for example: tablet instead of laptop.', 'agrg'); ?></li>
									<li><?php _e('Try using more than one keyword.', 'agrg'); ?></li>
								</ul>

							</div>
					
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