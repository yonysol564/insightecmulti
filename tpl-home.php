<?php /* Template Name: Home */  ?>
<?php get_header(); ?>
	<div class="home_bg">
		<?php
		 $contact_shad_class = 'contact_shad_class';
		 ?>
		 <?php if( have_rows('home_bg_slider') ):
            while ( have_rows('home_bg_slider') ) : the_row();
            $home_bg_slider_img = get_sub_field('home_bg_slider_img');
            $home_bg_slider_box_1 = get_sub_field('home_bg_slider_box_1');
            $home_bg_slider_box_2 = get_sub_field('home_bg_slider_box_2');
         ?>
			<div class="home_bg_slide" style="background-image: url('<?php echo $home_bg_slider_img['url']; ?>');">
				<div class="row">
					<div class="large-12 columns">
						<div class="header_div">
							<div class="div_orange">
								<div class="div_orange_inner">
									<?php echo $home_bg_slider_box_1; ?>
								</div>
								<div class="div_plus">
									<img src="<?php echo get_template_directory_uri(); ?>/images/bghomeplus.png" alt="plus">
								</div>
							</div>
							<div class="div_white">
								<div class="div_white_inner">
									<?php echo $home_bg_slider_box_2; ?>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
        <?php endwhile; endif; ?>
	</div>
	<section>
		<div class="row">
		<?php
		 $contact_shad_class = 'contact_shad_class';
		 ?>
		 <?php if( have_rows('home_top_section') ):
            while ( have_rows('home_top_section') ) : the_row();
            $top_text = get_sub_field('top_text');
            $bottom_text = get_sub_field('bottom_text');
         ?>
			<div class="small-12 medium-6 large-3 columns top_col">
			  	<div class="top_div">
			  		<div class="text_div">
			  			<?php echo $top_text; ?>
			  		</div>
			  		<div class="plus_line">
			  			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_line.png" alt="plus line">
			  		</div>
			  	</div>

			  	<div class="bottom_div">
			  		<div class="text_div">
			  			<?php echo $bottom_text; ?>
			  		</div>
			  	</div>
			</div>
        <?php endwhile; endif; ?>
		</div>
	</section>

	<section class="silder_sec">
		<div class="slider_div">
			<?php
			 $contact_shad_class = 'contact_shad_class';
			 ?>
			 <?php if( have_rows('home_main_slider') ):
	            while ( have_rows('home_main_slider') ) : the_row();
	            $home_main_slider_img = get_sub_field('home_main_slider_img');
	            $home_main_slider_text = get_sub_field('home_main_slider_text');
	        ?>
			<div>
				<div class="row">
					<div class="large-6 small-12 columns text_div">
						<div class="text_div_row">
							<div class="silder_text">
							  <?php echo $home_main_slider_text; ?>
							</div>
							<div class="signs_div">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/signs.png" alt="signs">
							</div>
						</div>
					</div>
				</div>

				<div class="img_div" style="background-image: url('<?php echo $home_main_slider_img['url']; ?>');">
				</div>
			</div>
	        <?php endwhile; endif; ?>
		</div>
	</section>

	<section class="worldwide_sec">
		<?php
			$home_worldwide_img = get_field('home_worldwide_img');
			$home_worldwide_img_text = get_field('home_worldwide_img_text');
			$home_worldwide_orange_box = get_field('home_worldwide_orange_box');
			$centers_link = get_field('centers_link','option');
		?>
		<div class="map_div" style="background-image: url('<?php echo $home_worldwide_img['url']; ?>');">

			<a href="<?php echo $centers_link; ?>" title="Find a treatment center near you.">
				<div class="map_inner_div">
					<h3>
						<?php echo $home_worldwide_img_text; ?>
					</h3>
				</div>
			</a>

		</div>
		<div class="orange_div">
			<div class="inner_div">
				<?php echo $home_worldwide_orange_box; ?>
			</div>
		</div>
	</section>

	<section class="contact_sec">
		<div class="row title_row">
			<div class="large-6 columns top_col">
				<div class="h1_div">
					<h2>
					<?php $home_contact_form_title = get_field('home_contact_form_title'); ?>
					<?php echo $home_contact_form_title ; ?>
					</h2>
				</div>
				<div class="info_div">
					<span>
					<?php $home_contact_form_sub_title = get_field('home_contact_form_sub_title'); ?>
					<?php echo $home_contact_form_sub_title; ?>&nbsp;(<span class="form_ast">*</span> Required)
					</span>
				</div>
			</div>
		</div>
		<?php echo do_shortcode(get_field('home_contact_form')); ?>
	</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
