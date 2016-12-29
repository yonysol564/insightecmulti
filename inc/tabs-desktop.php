<?php
	$regions = get_terms( 'location', array( 'parent' => 0 ) );
	$user_lang_code 		= get_user_country_code();
	$center_language_codes 	= get_regions_langage_codes();
	$search_term_id 		= array();
	$blog   				= (get_current_blog_id() == 7) ? "US" : "";
?>
<ul class="tabs" data-tabs id="center-tabs">

	<li id="tab_local" class="tabs-title is-active">
		  <a href="#panel1" aria-selected="true" title="<?php _e('Local Centers','insightec');?>">
			<div class="inner_div">
				<div class="img_div">
					<img class="local_img_act" src="<?php echo get_template_directory_uri(); ?>/images/centerlocalact.png" alt="<?php _e('Local Centers','insightec');?>">
				  	<img class="local_img" src="<?php echo get_template_directory_uri(); ?>/images/centerlocal.png" alt="<?php _e('Local Centers','insightec');?>">
				</div>
			  	<div class="text_div"><?php _e('Local Centers','insightec');?></div>
			</div>
		  </a>
		  <div class="clear:both;"></div>
	</li>

	<li id="tab_world" class="tabs-title">
	  	<a href="#panel2" title="<?php $blog == "US" ? _e('US centers','insightec') :_e('Worldwide Centers','insightec'); ?>">
			<div class="inner_div">
				<div class="img_div">
					<img class="world_img_act" src="<?php echo get_template_directory_uri(); ?>/images/centerworldact.png" alt="<?php _e('Worldwide Centers','insightec'); ?>">
			  		<img class="world_img" src="<?php echo get_template_directory_uri(); ?>/images/centerworld.png" alt="<?php _e('Worldwide Centers','insightec'); ?>">
				</div>
		  		<div class="text_div"><?php $blog == "US" ? _e('US centers','insightec') :_e('Worldwide Centers','insightec'); ?></div>
	  		</div>
	  	</a>
	  	<div class="clear:both;"></div>
	</li>

</ul>

<div class="sort_div">
	<div class="inner_div">
		<form>
			<div class="select_label_div">
				<?php _e('Select','insightec');?>
			</div>
			<div class="fields_div">
				<div class="inner_div">

					<div class="label_div">
						<span class="select_mobile_s"><?php _e('Select','insightec');?></span><span class="label_mob">
							<?php if($blog == "US"):?>
								<?php _e('State','insightec');?>
							<?php else:?>
								<?php _e('Region','insightec');?>
							<?php endif;?>
						</span><span class="nekudotaim">:</span>
					</div>

					<div class="select_div">
						<select id="select_reg">
							<option value="" selected>
								<?php if($blog == "US"):?>
									<?php _e('Select state','insightec');?>
								<?php else:?>
									<?php _e('Select region','insightec');?>
								<?php endif;?>
							</option>
							<?php
								foreach ($regions as $region) {
								if($region) {
									$link = get_term_link($region);
								?>
								<option data-id="<?php echo $region->term_id; ?>" value="<?php echo $region->term_id; ?>"><?php echo $region->name; ?></option>
								<?php
								}
							}
							?>
					  	</select>
					</div>
				</div>
				<div class="inner_div">
					<div class="label_div">
						<span class="select_mobile_s"><?php _e('Select','insightec');?></span><span class="label_mob">
							<?php if($blog == "US"):?>
								<?php _e('City','insightec');?>
							<?php else:?>
								<?php _e('Country','insightec');?>
							<?php endif;?>
						</span><span class="nekudotaim">:</span>
					</div>
					<div class="select_div">
						<select disabled id="select_cnt">
							<option id="disapear" value="" disabled selected>
								<?php if($blog == "US"):?>
									<?php _e('Select City','insightec');?>
								<?php else:?>
									<?php _e('Select Country','insightec');?>
								<?php endif;?>
							</option>
					  	</select>
							<img class="change_country_loader" src="<?php echo get_template_directory_uri(); ?>/images/loadersteps.gif" title="" alt="loader">
					</div>
				</div>
			</div>
		</form>


	</div>
	<img src="<?php echo get_template_directory_uri(); ?>/images/physiciantriangle.png" alt="tri">
</div>


<div class="tabs-content center_content" data-tabs-content="center-tabs">
	<div class="loader_div"><img src="<?php echo get_template_directory_uri(); ?>/images/482.gif" alt="loader"></div>

	<div class="tabs-panel is-active" id="panel1">
		<?php

			foreach($center_language_codes as $term_id=>$code) {
				if($user_lang_code == $code) {
					$search_term_id[] = $term_id;
				}
			}
			$local_args = array(
				'post_type'			=> 'center',
				'posts_per_page'	=> -1,
				'tax_query'			=> array(
					array(
						'terms'		=> $search_term_id,
						'field'		=> 'term_id',
						'taxonomy'	=> 'location'
					)
				)
			);


			$local_center_query = new WP_Query($local_args);
				while($local_center_query->have_posts()): $local_center_query->the_post();
				global $post;
				get_template_part("inc/ajax","center");
				?>
				<?php
				endwhile; wp_reset_query();
			?>
	</div>

	<div class="tabs-panel" id="panel2">
		<?php
			$def_args = array(
				'post_type'				=> 'center',
				'posts_per_page'		=> -1,
				'tax_query'			=> array(
					array(
						'terms'		=> $search_term_id,
						'field'		=> 'term_id',
						'taxonomy'	=> 'location',
						'operator'	=> 'NOT IN'
					)
				)
			);
			$def_query = new WP_Query($def_args);
		?>
		<?php while($def_query->have_posts()): $def_query->the_post(); ?>
			<?php get_template_part("inc/ajax","center"); ?>
		<?php endwhile; ?>


	</div>

	<div class="no_centers">
		<?php _e('There is no Centers','insightec'); ?>
	</div>

</div>
