<?php
	$center_bg_img            = get_field('center_bg_img');
	$center_phone             = get_field('center_phone');
	//$center_recipient_email = get_field('center_recipient_email');
	$center_website           = get_field('center_website');
	$centeremail              = get_field('centeremail');
	$center_address           = get_field('center_address');
	$center_logo           = get_field('center_logo');
	

	$locations = get_the_terms($post->ID, 'location');
	if($locations){
		$location  = reset($locations);
	}
 ?>

<div class="row_result" data-postid="<?php echo $post->ID;?>" data-email="<?php echo $centeremail;?>" data-title="<?php echo get_the_title($post->ID);?>">
	<div class="row">
		<div class="large-6 columns center_col">
	  		<div class="center_top_div">
		  		<div class="center_logo_div">
		  			<img src="<?php echo $center_logo['url']; ?>" alt="<?php the_title(); ?>">
		  		</div>
		  		<div class="center_title_div">
		  			<h4><?php the_title(); ?></h4>
					<?php
						if ($center_address) {?>
							<small><?php echo $center_address; ?></small>
						<?php }
					?>
		  		</div>
	  		</div>
	  		<div class="center_bottom_div">
		  		<ul>
		  			<?php
						if ($center_phone) {?>
						<li>
			  				<div class="img_div">
			  					<img src="<?php echo get_template_directory_uri(); ?>/images/center_phone.png" alt="Phone">
			  				</div>
			  				<div class="content_div">		  		
			  					<a href="tel:<?php echo $center_phone; ?>"><?php echo $center_phone; ?></a>
			  				</div>
			  			</li>
						<?php }
					?>
					<?php
						if ($centeremail) {?>
			  			<li>
			  				<div class="img_div">
			  					<img src="<?php echo get_template_directory_uri(); ?>/images/center_mail.png" alt="Email">
			  				</div>
			  				<div class="content_div">
			  					<a href="mailto:<?php echo $centeremail; ?>" target="_top"><?php echo $centeremail; ?></a>		
			  				</div>
			  			</li>
						<?php }
					?>
					<?php
						if ($center_website) {?>
						<li>
			  				<div class="img_div">
			  					<img src="<?php echo get_template_directory_uri(); ?>/images/center_website.png" alt="Website">
			  				</div>
			  				<div class="content_div">
			  					<a href="<?php echo $center_website; ?>" target="_blank"><?php echo $center_website; ?></a>		
			  				</div>
			  			</li>
						<?php }
					?>
		  		</ul>
	  		</div>
	  	</div>
	  	<div class="large-6 columns center_col center_col_img" style="background-image:url(<?php if($center_bg_img) { echo $center_bg_img['url']; }
	  									else{ echo get_template_directory_uri() .'/images/center_bg.jpg'; } ?>);">
			<a class="button open-popup-link" <?php if($location): ?>data-locationid="<?php echo $location->term_id; ?>"<?php endif; ?>>
				<?php _e('Submit a Request','insightec');?>
			</a>
	  	</div>
	</div>
</div>
