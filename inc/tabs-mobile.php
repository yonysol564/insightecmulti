<?php $regions = get_terms( 'location', array( 'parent' => 0 ) ); ?>

<ul class="accordion" data-accordion>

	<li class="accordion-item is-active" data-accordion-item>
		<?php
			$user_lang_code 		= get_ip_list();
			$center_language_codes 	= array();
			$search_term_id 		= array();
			$locations 				= get_terms('location', array('hide_empty'=>true));
			foreach($locations as $location) {
				if($location->parent) {
					$center_language_code = get_field('center_language_code','location_'.$location->term_id);
					$center_language_codes[$location->term_id] = $center_language_code;
				}

			}
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
		?>
	    <a href="#" class="accordion-title" title="<?php _e('Local Centers','insightec');?>">
			<div class="wrap_div">
				<div class="img_div">
				  	<img class="local_img" src="<?php echo get_template_directory_uri(); ?>/images/centerlocal.png" alt="Local center">
				</div>
			  	<div class="text_div"><?php _e('Local Centers','insightec');?></div>
			</div>
	  	</a>

	    <div class="accordion-content" data-tab-content>
	   		<div class="loader_div"><img src="<?php echo get_template_directory_uri(); ?>/images/482.gif" alt="loader"></div>
		    <div class="content_m">


				<?php
					$local_center_query = new WP_Query($local_args);
					while($local_center_query->have_posts()): $local_center_query->the_post();
						global $post;
						get_template_part("inc/ajax","center");
					endwhile; wp_reset_query();
				?>	 
			</div>
	    </div>

	</li>

    <li class="accordion-item" data-accordion-item>
	    <a href="#" class="accordion-title" title="<?php _e('Worldwide Centers','insightec');?>">
	    	<div class="wrap_div">
				<div class="img_div">
			  		<img class="world_img" src="<?php echo get_template_directory_uri(); ?>/images/centerworld.png" alt="<?php _e('Worldwide Centers','insightec');?>">
				</div>
		  		<div class="text_div"><?php _e('Worldwide Centers','insightec');?></div>
		  	</div>
	    </a>
	    <div class="accordion-content" data-tab-content>
	      	<div class="sort_div">
				<div class="inner_div">
					<form>
						<div class="select_label_div">
							<?php _e('Select','insightec');?>
						</div>
						<div class="fields_div">
							<div class="inner_div">

								<div class="label_div">
									<span class="select_mobile_s"><?php _e('Select','insightec');?></span><span class="label_mob"><?php _e('Region','insightec');?></span><span class="nekudotaim">:</span>
								</div>

								<div class="select_div">
									<select id="select_reg_m">
										<option value="" disabled selected><?php _e('All Regions','insightec');?></option>
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
									<span class="select_mobile_s"><?php _e('Select','insightec');?></span><span class="label_mob"><?php _e('Country','insightec');?></span><span class="nekudotaim">:</span>
								</div>
								<div class="select_div">
									<select disabled id="select_cnt_m">
										<option value="" disabled selected><?php _e('All Countries','insightec');?></option>
								  	</select>
								</div>
							</div>
						</div>
					</form>


				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/physiciantriangle.png" alt="tri">

			</div>
			<div class="loader_div"><img src="<?php echo get_template_directory_uri(); ?>/images/482.gif" alt="loader"></div>
			<div class="content_m">


			</div>
	    </div>
  	</li>

</ul>
