<?php 

/*
 The main template file for display single post page.
*/

if($post->post_type == 'project')
{
	include (TEMPLATEPATH . "/template-portfolio-single.php");
    exit;
}

$page = get_page($post->ID);
$current_page_id = $page->ID;

get_header(); 

?>

<?php

if (have_posts()) : while (have_posts()) : the_post();
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
						
							<div class="post-v2" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							<?php if(function_exists('get_post_format') && 'link' == get_post_format($post->ID)) : ?>

								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
								
								<div class="post-full">

									<?php echo the_content(); ?>
								
								</div>	

								<div class="full-clear">
									<span><?php _e("Share this on", "agrg"); ?></span>: <a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">Facebook</a> // <a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">Twitter</a> // <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">Delicious</a> // <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Digg</a> // <a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">Reddit</a> // <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Stumbleupon</a>
								</div>




							<?php elseif(function_exists('get_post_format') && 'image' == get_post_format($post->ID)) : ?>
										
								<?php if ( has_post_thumbnail() ) { ?>
											
									<div class="post-image">
										<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('blog_post_image'); ?></a>
									</div>
													
								<?php 
									}
								?>
									
								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
										
								<div class="post-full">
											
									<?php echo the_content(); ?> 
										
								</div>

								<div class="full-clear">
									<span><?php _e("Share this on", "agrg"); ?></span>: <a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">Facebook</a> // <a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">Twitter</a> // <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">Delicious</a> // <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Digg</a> // <a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">Reddit</a> // <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Stumbleupon</a>
								</div>



							<?php elseif(function_exists('get_post_format') && 'video' == get_post_format($post->ID)) : ?>
										
								<div class="post-image full">
									<?php 
										$embed = get_post_meta($post->ID, '_wpcrown_video_embed_code', true);
										       
										echo stripslashes(htmlspecialchars_decode($embed));
									?>
								</div>
									
								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
										
								<div class="post-full">
											
									<?php echo the_content(); ?>
										
								</div>

								<div class="full-clear">
									<span><?php _e("Share this on", "agrg"); ?></span>: <a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">Facebook</a> // <a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">Twitter</a> // <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">Delicious</a> // <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Digg</a> // <a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">Reddit</a> // <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Stumbleupon</a>
								</div>



							<?php elseif(function_exists('get_post_format') && 'gallery' == get_post_format($post->ID)) : ?>
										
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
											
									<?php echo the_content(); ?> 
										
								</div>

								<div class="full-clear">
									<span><?php _e("Share this on", "agrg"); ?></span>: <a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">Facebook</a> // <a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">Twitter</a> // <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">Delicious</a> // <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Digg</a> // <a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">Reddit</a> // <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Stumbleupon</a>
								</div>



							<?php elseif(function_exists('get_post_format') && 'quote' == get_post_format($post->ID)) : ?>
										
								<div class="post-full">
											
									<blockquote>
										<?php echo the_content(); ?>
										<cite><?php the_title(); ?></cite>
									</blockquote>

									<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
										
								</div>

								<div class="full-clear">
									<span><?php _e("Share this on", "agrg"); ?></span>: <a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">Facebook</a> // <a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">Twitter</a> // <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">Delicious</a> // <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Digg</a> // <a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">Reddit</a> // <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Stumbleupon</a>
								</div>




							<?php else : ?>
									
								<div class="post-full"><p><?php _e("In", "agrg"); ?> <?php the_category(', ') ?> // <?php _e("on", "agrg"); ?> <?php the_time('F jS, Y') ?> // <?php _e("by", "agrg"); ?> <?php the_author_posts_link(); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></div>
										
								<div class="post-full">
											
									<?php echo the_content(); ?>
										
								</div>

								<div class="full-clear">
									<span><?php _e("Share this on", "agrg"); ?></span>: <a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">Facebook</a> // <a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">Twitter</a> // <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">Delicious</a> // <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Digg</a> // <a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">Reddit</a> // <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Stumbleupon</a>
								</div>

							<?php endif; ?>

							</div>
					
							<!-- End each blog post -->

							<?php comments_template( '' ); ?>
												
							<?php endwhile; endif; ?>
									
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