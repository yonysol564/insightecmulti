<?php
	$footer_logo = get_field('footer_logo','option');
	$footer_text = get_field('footer_text','option');

	$footer_logos = get_field('footer_logos', 'option');

	$footer_copyright_text = get_field('footer_copyright_text','option');
	$footer_copyright_img = get_field('footer_copyright_img','option');
?>
	 	<footer>

			<div class="top_footer">
		   		<div class="row">
		   			<div class="footer_div">
			   			<div class="large-12 columns">
			   				<div class="logo_div">
			   					<a href="<?php echo home_url(); ?>">
			   						<img src="<?php echo $footer_logo['url']; ?>" alt="Insightec">
			   					</a>
			   				</div>
			   				<div class="plus_div">
			   					<img src="<?php echo get_template_directory_uri(); ?>/images/footerplus.png" alt="plus">
			   				</div>
			   				<div class="text_div">
			   					<h4><?php echo $footer_text; ?></h4>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
			</div>

			<div class="bottom_footer">
				<?php if ($footer_logos) { ?>
			   		<div class="row">
				   		<div class="large-12 columns">
			   				<div class="footer_logos_div">
								<ul>
									<?php if( have_rows('footer_logos','option') ):
							            while ( have_rows('footer_logos','option') ) : the_row();
							            $url = '#'; $blank = 'target="_blank"'; $prevent = '';
							            $footer_logos_image = get_sub_field('footer_logos_image');
										$footer_logos_link = get_sub_field('footer_logos_link');
										if ($footer_logos_link) {
											 $url = $footer_logos_link;
											 $blank = 'target="_blank"';
										}else{
											$url = '#';
											$blank = '';
											$prevent = 'prevent';
										}
							        ?>
										<li>
											<a class="<?php echo $prevent; ?>" href="<?php echo $url; ?>" <?php echo $blank; ?>>
												<img src="<?php echo  $footer_logos_image['url']; ?>" alt="<?php echo $footer_social_title; ?>">
											</a>
										</li>
							        <?php endwhile; endif; ?>
								</ul>
				   			</div>
				   		</div>
			   		</div>
				<?php } ?>

		   		<div class="row">
			   		<div class="large-12 columns socials_col">
		   				<div class="footer_socials_div">
							<ul>
								<?php if( have_rows('footer_socials','option') ):
						            while ( have_rows('footer_socials','option') ) : the_row();
						            $footer_social_img = get_sub_field('footer_social_img');
									$footer_social_title = get_sub_field('footer_social_title');
						            $footer_social_url = get_sub_field('footer_social_url');
						        ?>
									<li>
										<a href="<?php echo $footer_social_url; ?>" target="_blank">
											<img src="<?php echo  $footer_social_img['url']; ?>" alt="<?php echo $footer_social_title; ?>">
										</a>
									</li>
						        <?php endwhile; endif; ?>
							</ul>
			   			</div>
			   		</div>
		   		</div>

		   		<div class="row">
			   		<div class="large-12 columns">
		   				<div class="footer_menu_div">
						    <?php
		                       wp_nav_menu( array(
		                          'theme_location'    => 'footer_menu',
		                          'menu_class'        => '',
		                          'container'         => '',
		                          'container_class'   => '',
		                          )
		                      );
		                 	?>
			   			</div>
			   		</div>
		   		</div>

		   		<div class="row">
			   		<div class="large-12 columns copyright_col">
		   				<div class="footer_copy_div">
							<?php echo $footer_copyright_text; ?>
			   			</div>
			   		</div>
		   		</div>

		   		<div class="row">
			   		<div class="large-12 columns">
		   				<div class="footer_image_div">
							<img src="<?php echo $footer_copyright_img['url']; ?>" title="" alt="">
			   			</div>
			   		</div>
		   		</div>
			</div>

	    </footer>


		    		</div><!--  wraper -->
				</div><!--  off-canvas-content -->
			</div><!--  off-canvas-wrapper-inner -->
		</div><!--  off-canvas-wrapper -->
    	<?php wp_footer(); ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-1730411-6', 'auto');
		  ga('require', 'displayfeatures');
		  ga('send', 'pageview');

		</script>
    </body>
</html>
