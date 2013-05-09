				<!-- Footer Container -->
				<footer class="container_wrap" id="footer">
				
					<!-- Begin Footer -->
					<div class="container">
					
						<div class="one_fourth first column_container">
							<?php get_sidebar('footer-one'); ?>
						</div>	
						
						<div class="one_fourth column_container">
							<?php get_sidebar('footer-two'); ?>
						</div>
						
						<div class="one_fourth column_container">
							<?php get_sidebar('footer-three'); ?>
						</div>
							
						<div class="one_fourth column_container">
							<?php get_sidebar('footer-four'); ?>
						</div>
						
					</div>
					<!-- End Footer -->
				
				</footer>
				<!-- End Footer Container -->
				
				<!-- Socket Container -->
				<div class="container_wrap" id="socket">
				
					<!-- Begin Copyright -->
					<div class="container">
						<span class="copyright">
							<?php if (get_option('wpcrown_footer_copyright') <> ""){
									echo stripslashes(stripslashes(get_option('wpcrown_footer_copyright')));
								}else{
									echo '&#64; Copyright. Toledo - A Responsive & Super Flexible Multipurpose Theme - by <a href="http://alexgurghis.com">AlexGurghis.com</a>';
							}?>
						</span>
						
						<div class="backtop">
							<a href="#backtop">Top</a>
						</div>
					</div>
					<!-- End Copyright -->
				
				</div>
				<!-- End Socket Container -->

			</div>
			<!-- End Container -->

		</section>	
		<!-- End Main Container -->
	
	</div>

	<?php wp_footer(); ?>
		
</body>
</html>