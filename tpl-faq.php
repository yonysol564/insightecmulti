<?php /* Template Name: FAQ */  ?>
<?php get_header();  ?>
<?php 
	$treatment_faq_bg = get_field('treatment_faq_bg'); 
?>
		<div class="about_bg" style="background-image: url('<?php echo $treatment_faq_bg['url']; ?>');">
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
		
		<section class="faq_sec">
			<div class="row">
				<div class="large-12 columns accordion_div">
					<div class="main">
						<div class="accordion">
							<?php 
							$counter = 1;
							$contact_shad_class = 'contact_shad_class'; 
							?>
							<?php if( have_rows('faq_box') ):
					            while ( have_rows('faq_box') ) : the_row();
					            $padit = '';
					            $faq_box_title = get_sub_field('faq_box_title');
					            $faq_box_content = get_sub_field('faq_box_content');
					            $faq_box_title_len = strlen($faq_box_title);
					            if($faq_box_title_len > 84){ $padit = 'padit_faq'; } 
					        ?>   
								<div class="accordion-section">
									<div class="accordion_head <?php echo $padit; ?>">
										<span><?php echo $counter; ?>. <?php echo $faq_box_title; ?></span>
									</div>
									<a class="accordion-section-title" href="#accordion-<?php echo $counter; ?>" title="<?php _e('Read More','insightec');?>">
										<?php _e('Read More','insightec');?>
									</a>
									<div id="accordion-<?php echo $counter; ?>" class="accordion-section-content">
										<p><?php echo $faq_box_content; ?></p>
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