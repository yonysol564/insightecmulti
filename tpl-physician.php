<?php /* Template Name: Physician  */  ?>
<?php get_header(); ?>
<?php 
	$questions_to_ask_bg = get_field('questions_to_ask_bg'); 
?>
		<div class="about_bg" style="background-image: url('<?php echo $questions_to_ask_bg['url']; ?>');">
			<div class="row">
				<div class="large-6 columns header_col">
				<div class="top_div">
					<h1><?php echo the_title(); ?></h1>
				</div>
				<div class="bottom_div">
					
				</div>
				</div>
			</div>
		</div>

		<section class="physician_sec">
			<div class="row physician_row">
				<ul class="tabs" data-tabs id="example-tabs">
			    	<?php 
					 $counter = 1; 
					 ?>
					 <?php if( have_rows('questions_to_ask_tabs_list') ):
			            while ( have_rows('questions_to_ask_tabs_list') ) : the_row();
			            $questions_list_title = get_sub_field('questions_to_ask_tabs_list_title');
			            $questions_list_img = get_sub_field('questions_to_ask_tabs_list_img');
			            $questions_list_img_active = get_sub_field('questions_to_ask_tabs_list_img_active');
			         ?>   	
			        	<li class="tabs-title <?php if($counter == 1){ echo 'is-active'; } ?>">
						  	<a href="#panel<?php echo $counter; ?>" aria-selected="true" title="<?php echo $questions_list_title; ?>">
						  		<div class="img_div_icon">
						  			<img class="tab_list_img" style="<?php if($counter == 1){ echo 'display:none;'; } ?>"  src="<?php echo $questions_list_img['url']; ?>" alt="<?php echo $questions_list_title; ?>">
						  			<img class="tab_list_img_active" style="<?php if($counter == 1){ echo 'display:block;'; } ?>" src="<?php echo $questions_list_img_active['url']; ?>" alt="<?php echo $questions_list_title; ?>">
						  		</div>
						  		<div class="label_div">				  		
						  			<?php echo $questions_list_title; ?>
								</div>
						  	</a>
						 </li>
			        <?php $counter++; endwhile; endif; ?>
				</ul>
				
				<div class="tabs-content" data-tabs-content="example-tabs">
					<?php
					$counter = 1;
					if( have_rows('questions_to_ask_tabs_list') ):
					    while ( have_rows('questions_to_ask_tabs_list') ) : the_row();
							$questions_list_desc = get_sub_field('questions_to_ask_tabs_list_desc');
							?>
							<div class="tabs-panel <?php if($counter == 1){ echo 'is-active'; } ?>" id="panel<?php echo $counter; ?>">
								<div class="short_desc">
									<p><?php echo $questions_list_desc; ?></p>
									<img src="<?php echo get_template_directory_uri(); ?>/images/physiciantriangle.png" alt="">
								</div> 
								<?php if( have_rows('questions_to_ask_tabs_list_content') ): ?>
										<?php $cnt = 0; $bg_row = 'bg_faq_row_color'  ?>
										<?php while ( have_rows('questions_to_ask_tabs_list_content') ) : the_row();
											$questions_list_row_title = get_sub_field('questions_to_ask_tabs_list_row_title');
											$questions_list_row_content = get_sub_field('questions_to_ask_tabs_list_row_content');
										?>
			    							<div class="faq_row row <?php if($cnt%2 == 0) { echo 'bg_faq_row_color'; } ?>">
											    <div class="large-1 columns img_div_faq">
											    	<img src="<?php echo get_template_directory_uri(); ?>/images/physicianfaq.png" alt="Faq">
											    </div>
											    <div class="large-11 columns content_div_faq">
											    	<div class="h2_div">
											    		<h2>
											    			<?php echo $questions_list_row_title; ?>
											    		</h2>
											    	</div>
											    	<div class="con_div">
											    		<?php echo $questions_list_row_content; ?>
											    	</div>						    	
											    </div>	  	
											</div>
									<?php $cnt++; endwhile; ?>
								<?php endif; // inner if ?> 				
							</div>
					<?php $counter++; endwhile;//main while ?>
					<?php endif;// main if ?>
				</div>
			</div>
		</section>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
