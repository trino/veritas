<?php if ('open' == $post->comment_status) : ?>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<h6><?php _e("You must be", "agrg"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in", "agrg"); ?></a> <?php _e("to post a comment.", "agrg"); ?></h6><br/>
	<?php else : ?>
			
		<div class="comment_input">
			<!-- Start of form --> 

			<?php comment_form(); ?>

		</div>
		<!-- End of form --> 
			

	<?php endif; // If registration required and not logged in ?>

<?php endif; // if comment is open ?>
