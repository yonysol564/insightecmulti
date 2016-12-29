<?php /* Template Name: Centers Step1  */
	get_header();
?>

	<?php get_template_part('inc/centers','bg'); ?>
	<section class="centers_sec">
		<?php get_template_part('inc/centers','steps'); ?>
		<div class="steps_wrap">
			<!--=======       M E S S A G E   B E F O R E     ========-->
			<div class="row centers_row">
				<div class="centers_message">
				<?php $title_m = get_field('center_page_message_title'); ?>
				<?php $con_m = get_field('center_page_message_content'); ?>
					<h4><?php echo $title_m; ?></h4>
					<p class="p_sec">
						<?php echo $con_m; ?>
					</p>
					<img src="<?php echo get_template_directory_uri(); ?>/images/physiciantriangle.png" alt="tri">
				</div>
			</div>
			<div class="main_content">
				<?php get_template_part('inc/centersmain','steps'); ?>
				<div class="row checkout_row">
				    <div class="input_button">
				      <button id="checkout_out_btn" class="search-submit" type="submit" role="button"><?php _e('Submit','insightec');?></button>
				    </div>
				</div>

			</div> <!-- Main Content -->
		</div> <!-- Step Wrap -->
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
