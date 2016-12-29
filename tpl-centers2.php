<?php /* Template Name: Centers Step2  */ 
	get_header();
?>

	<?php get_template_part('inc/centers','bg');  ?>
	<section class="centers_sec">
		<?php get_template_part('inc/centers','steps'); ?>
		<div class="steps_wrap">		
			<div class="main_content">
				<div class="form_div_step2">
					<div class="row">
				
						<div class="tabs_for_desktop">
							<?php get_template_part('inc/tabs','desktop'); ?>
						</div>

						<div class="tabs_for_mobile">
							<?php get_template_part('inc/tabs','mobile'); ?>
						</div>

					</div>
				</div>
			</div>	
		</div>
	</section>
	<?php get_template_part('inc/center','form'); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>


