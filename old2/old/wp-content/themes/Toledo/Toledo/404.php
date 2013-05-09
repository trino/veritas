<?php 

/*
Template Name: 404 Page
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_title = get_post_meta($current_page_id, 'page_title', true);

$page_slogan = get_post_meta($current_page_id, 'page_slogan', true);

$page_slider = get_post_meta($current_page_id, 'page_slider', true);

$page_bg_image = get_post_meta($current_page_id, 'page_bg', true);

get_header(); ?>
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
								<h2><?php _e("Page Not Found", "agrg"); ?></h2>
							</div>	
						</div>	
						<!-- End Page Title Container -->

						<!-- Page Breadcrumbs Container -->
						<div class="full">
							<div class="breadcrumbs">
								<p>You are here: <a href="<?php echo home_url(); ?>" style="margin-left: 10px;">Home</a> <span style="margin-left: 10px;">/</span><span style="margin-left: 10px;">404</span></p>
							</div>
						</div>
						<!-- End Page Breadcrumbs Container -->

						<!-- Begin Error 404 Text -->
						<div class="full" id="error404">
						
							<!-- Content -->
							<span class="error404">404</span>
								
							<div class="center"><h4><?php _e("Ooops, you've encountered an error", "agrg"); ?></h4></div>
							<div class="center"><h4><?php _e("The page you were looking for doesn't exist.", "agrg"); ?></h4></div>
							
						</div>
						<!-- End Error 404 Text -->

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