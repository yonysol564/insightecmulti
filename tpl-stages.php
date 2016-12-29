<?php /* Template Name: Stages */  ?>
<?php get_header();  ?>
<?php 
	$treatment_stages_bg = get_field('treatment_stages_bg'); 
?>
		<div class="about_bg" style="background-image: url('<?php echo $treatment_stages_bg['url']; ?>');">
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
		
		<section class="stage_sec">
			<div class="row">

				<div class="large-12 columns h2_div">
				<?php $treatment_stages_sub_title = get_field('treatment_stages_sub_title'); ?>
					<h2>
						<?php echo $treatment_stages_sub_title; ?>
					</h2>
				</div>

				<div class="large-12 columns accordion_div">
					<div class="main">
						<div class="accordion">
							<?php 
							$counter = 1;
							$contact_shad_class = 'contact_shad_class'; 
							?>
							<?php if( have_rows('stages_box') ):
					            while ( have_rows('stages_box') ) : the_row();
					            $stages_box_title = get_sub_field('stages_box_title');
					            $stages_box_content = get_sub_field('stages_box_content');
					        ?>   
								<div class="accordion-section">
									<div class="accordion_head">
										<?php echo $counter; ?>. <?php echo $stages_box_title; ?>
									</div>
									<a class="accordion-section-title" href="#accordion-<?php echo $counter; ?>" title="<?php _e('Read More','insightec');?>">
										<?php _e('Read More','insightec');?>
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
<?php get_sidebar(); ?>
<?php get_footer(); ?>
