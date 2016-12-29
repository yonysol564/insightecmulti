<?php /* Template Name: About Uterine Fibroids */  ?>
<?php get_header();  ?>
<?php
	$uterine_bg_img = get_field('about_uterine_bg_img');
	$about_bgtitle = get_field('about_bgtitle');
?>
		<div class="about_bg" style="background-image: url('<?php echo $uterine_bg_img['url']; ?>');">
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
			$section_1_img = get_field('section_1_img');
			$section_1_box_text = get_field('section_1_box_text');
			$section_1_content = get_field('section_1_content');
		?>
		<section class="about_uterine_sec1">
			<div class="about_img_div" style="background-image: url('<?php echo $section_1_img['url']; ?>');">
				<div class="img_inner_div">
					<?php echo $section_1_box_text; ?>
				</div>
			</div>

			<div class="about_uterine_text_div">
				<div class="inner_div">
					<?php echo $section_1_content; ?>
				</div>
			</div>
		</section>


		<?php
			$section_2_img = get_field('section_2_img');
			$section_2_list = get_field('section_2_list');
		?>
<!-- 		<section class="about_uterine_sec2">
		</section> -->

		<section class="about_uterine_sec2">
			<div class="about_uterine_text_div">
				<div class="inner_div">
					<div class="row collapse">
						<div class="large-5 columns">&nbsp;&nbsp;</div>
						<div class="large-7 columns end">
							<div class="list_div_abs">
								<?php echo $section_2_list; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="about_uterine_img_div">
				<div class="womb_div">
					<div class="womb_title">
						<?php echo get_field("section_2_title") ? get_field("section_2_title") : "Uterine Fibroids";?>
					</div>
					<div class="womb_img">
						<img src="<?php echo $section_2_img['url'];  ?>" alt="Uterine Fibroids">
					</div>
				</div>
			</div>
		</section>


		<?php
			$section_3_img = get_field('section_3_img');
			$section_3_box_text = get_field('section_3_box_text');
			$section_3_content = get_field('section_3_content');
		?>
		<section class="about_uterine_sec3">
			<div class="about_img_div" style="background-image: url('<?php echo $section_3_img['url']; ?>');">
				<div class="img_inner_div">
					<?php echo $section_3_box_text; ?>
				</div>
			</div>

			<div class="about_uterine_text_div">
				<div class="inner_div">
					<?php echo $section_3_content; ?>
				</div>
			</div>
		</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
