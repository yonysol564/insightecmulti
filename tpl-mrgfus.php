<?php /* Template Name: Mrgfus */  ?>
<?php get_header();  ?>
<?php
	$about_mrgfus_bg = get_field('about_mrgfus_bg');
?>
		<div class="about_bg" style="background-image: url('<?php echo $about_mrgfus_bg['url']; ?>');">
			<div class="row">
				<div class="large-6 columns header_col">
				<div class="top_div">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="bottom_div">

				</div>
				</div>
			</div>
		</div>

		<?php
			$mrgfus_therapy_bg_img = get_field('mrgfus_therapy_bg_img');
			$mrgfus_bg_img_text = get_field('mrgfus_bg_img_text');
			$mrgfus_therapy_section_text = get_field('mrgfus_therapy_section_text');
		?>

		<section class="mrgfus">
			<div class="mrgfus_img_div" style="background-image: url('<?php echo $mrgfus_therapy_bg_img['url']; ?>');">
				<div class="img_inner_div">

					<a class="mrgfus_pop" href="#" title="<?php the_title(); ?>">
						<img src="<?php echo THEME_DIR; ?>/images/playy.png" title="" alt="">
					</a>
					<div class="watch_span">
						<span>
							<?php echo $mrgfus_bg_img_text; ?>
						</span>
					</div>
					<?php $youtube_id = get_field('mrg_youtube_id'); ?>
					<div id="mrgfus_popup" class="mrgfus_popup white-popup mfp-hide">
				  		<iframe src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>" width="471" height="270" frameborder="0" allowfullscreen>
                        </iframe>
					</div>

				</div>
			</div>

			<div class="mrgfus_text_div">
				<div class="inner_div">
					<?php echo $mrgfus_therapy_section_text; ?>
				</div>
			</div>
		</section>

		<?php
			$mrgfus_tab_section_title = get_field('mrgfus_tab_section_title');
			$mrgfus_tab_section_img = get_field('mrgfus_tab_section_img');
		?>




		<!--##############   D E S K T O P   S E C T I O N ############-->

		<section class="tabs_sec">
			<div class="tab_text_div">
				<div class="inner_div">
					<div class="row collapse">
						<div class="large-6 medium-2 columns dis_col">&nbsp;&nbsp;</div>
						<div class="large-6 medium-10 columns end">
							<div class="title">
								<span><?php echo $mrgfus_tab_section_title; ?></span>
							</div>
						    <ul class="tabs vertical" id="example-vert-tabs" data-tabs>
						    	<?php
								 $counter = 1;
								 ?>
								 <?php if( have_rows('mrgfus_tab_section_list') ):
						            while ( have_rows('mrgfus_tab_section_list') ) : the_row();
						            $list_title = get_sub_field('mrgfus_tab_section_list_title');
						         ?>
									<li class="tabs-title <?php if($counter == 1){ echo 'is-active'; } ?>">
										<a href="#panel<?php echo $counter; ?>" aria-selected="true" title="<?php echo $list_title; ?>">
											<?php echo $counter . '. ' . $list_title ; ?>
										</a>
									</li>
						        <?php $counter++; endwhile; endif; ?>
						    </ul>
						</div>

						<div class="abs_tabs">

						    <div class="tabs-content vertical" data-tabs-content="example-vert-tabs">
								<?php
								 $counter = 1;
								 ?>
								 <?php if( have_rows('mrgfus_tab_section_list') ):
						            while ( have_rows('mrgfus_tab_section_list') ) : the_row();
						            $list_content = get_sub_field('mrgfus_tab_section_list_content');
						         ?>
						         	<div class="tabs-panel <?php if($counter == 1){ echo 'is-active'; } ?>" id="panel<?php echo $counter; ?>">
								     <?php echo $list_content;?>
								    </div>
						        <?php $counter++; endwhile; endif; ?>
						    </div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab_img_div" style="background-image: url('<?php echo $mrgfus_tab_section_img['url']; ?>');">

			</div>
		</section>
		<?php if( have_rows('mrgfus_dynamic_tab_sections') ):
			$cnt = 1;
            while ( have_rows('mrgfus_dynamic_tab_sections') ) : the_row();
            $dynamic_section_title 	   = get_sub_field('dynamic_section_title');
            $dynamic_section_image 	   = get_sub_field('dynamic_section_image');
            $dynamic_img_pos = get_sub_field('dynamic_section_image_pos');
        ?>
		<section class="tabs_sec <?php if($dynamic_img_pos == 'right'){ echo 'tabs_sec_pos'; } ?>">

			<div class="tab_text_div" style="float: <?php echo $dynamic_img_pos; ?>">
				<div class="inner_div">
					<div class="row collapse">
						<div class="large-6 medium-2 columns dis_col <?php if($dynamic_img_pos == 'right') { echo 'right_pos'; } ?>">&nbsp;&nbsp;</div>

						<div class="large-6 medium-10 columns contents_col end">
							<div class="title">
								<span><?php echo $dynamic_section_title; ?></span>
							</div>
						    <ul class="tabs vertical" id="example-vert-tabs" data-tabs>
						    	<?php
								 $counter = 1;
								 ?>
								 <?php if( have_rows('dynamic_section_list') ):
						            while ( have_rows('dynamic_section_list') ) : the_row();
						            $list_title = get_sub_field('dynamic_section_list_title');
						         ?>
									<li class="tabs-title <?php if($counter == 1){ echo 'is-active'; } ?>">
										<a href="#panel<?php echo $counter.$cnt; ?>" aria-selected="true" title="<?php echo $list_title; ?>">
											<?php echo $counter . '. ' . $list_title ; ?>
										</a>
									</li>
						        <?php $counter++; endwhile; endif; ?>
						    </ul>
						</div>

						<div class="abs_tabs">

						    <div class="tabs-content vertical" data-tabs-content="example-vert-tabs">
								<?php
								 $counter = 1;
								 ?>
								 <?php if( have_rows('dynamic_section_list') ):
						            while ( have_rows('dynamic_section_list') ) : the_row();
						            $list_content = get_sub_field('dynamic_section_list_content');
						         ?>
						         	<div class="tabs-panel <?php if($counter == 1){ echo 'is-active'; } ?>" id="panel<?php echo $counter.$cnt; ?>">
								     <?php echo $list_content;?>
								    </div>
						        <?php $counter++; endwhile; endif; ?>
						    </div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab_img_div" style="background-image: url('<?php echo $dynamic_section_image['url']; ?>'); float: <?php echo $dynamic_img_pos; ?>">
			</div>
		</section>
       	<?php $cnt++; endwhile; endif; ?>




		<!--##############   M O B I L E   S E C T I O N ############-->

		<section class="tabs_sec_mobile">
			<div class="row">

				<div class="large-12 columns accordion_div">
					<div class="main">
						<div class="accordion">
							<?php
							$counter = 1;
							$contact_shad_class = 'contact_shad_class';
							?>
							<?php if( have_rows('mrgfus_tab_section_list') ):
					            while ( have_rows('mrgfus_tab_section_list') ) : the_row();
					            $stages_box_title = get_sub_field('mrgfus_tab_section_list_title');
					            $stages_box_content = get_sub_field('mrgfus_tab_section_list_content');
					        ?>
								<div class="accordion-section">
									<a class="accordion-section-title" href="#accordion-<?php echo $counter; ?>" title="<?php _e('Read More','insightec');?>">
										<?php echo $counter; ?>. <?php echo $stages_box_title; ?>
										<div class="tab_img_div" style="background-image: url('<?php echo $mrgfus_tab_section_img['url']; ?>');"></div>
									</a>
									<div id="accordion-<?php echo $counter; ?>" class="accordion-section-content">
										<p><?php echo $stages_box_content; ?></p>
									</div>
								</div>
					        <?php $counter++; endwhile; endif; ?>
						</div><!--end .accordion-->
					</div>
				</div>
			</div>
		</section>
		<?php if( have_rows('mrgfus_dynamic_tab_sections') ):
			$cnt = 1;
            while ( have_rows('mrgfus_dynamic_tab_sections') ) : the_row();
            $dynamic_section_title 	   = get_sub_field('dynamic_section_title');
            $dynamic_section_image 	   = get_sub_field('dynamic_section_image');
            $dynamic_img_pos = get_sub_field('dynamic_section_image_pos');
        ?>
		<section class="tabs_sec_mobile">
			<div class="row">

				<div class="large-12 columns accordion_div">
					<div class="main">
						<div class="accordion">

							<?php
							 $counter = 1;
							 ?>
							 <?php if( have_rows('dynamic_section_list') ):
					            while ( have_rows('dynamic_section_list') ) : the_row();
					            $list_title = get_sub_field('dynamic_section_list_title');
					            $list_content = get_sub_field('dynamic_section_list_content');
					         ?>
								<div class="accordion-section">
									<a class="accordion-section-title" href="#accordion-<?php echo $counter.$cnt; ?>" title="<?php _e('Read More','insightec');?>">
										<?php echo $counter; ?>. <?php echo $list_title; ?>
										<div class="tab_img_div" style="background-image: url('<?php echo $mrgfus_tab_section_img['url']; ?>');"></div>
									</a>
									<div id="accordion-<?php echo $counter.$cnt; ?>" class="accordion-section-content">
										<p><?php echo $list_content; ?></p>
									</div>
								</div>

					        <?php $counter++; endwhile; endif; ?>


						</div><!--end .accordion-->
					</div>
				</div>
			</div>
		</section>
       	<?php $cnt++; endwhile; endif; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
