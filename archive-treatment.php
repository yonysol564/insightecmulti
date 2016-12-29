<?php
	get_header();
	$treatment_options_bg = get_field('treatment_options_bg', 'option');
	$treatment_options_bg_title = get_field('treatment_options_bg_title', 'option');
	$treatment_options_title = get_field('treatment_options_title', 'option');
	$treatment_options_description = get_field('treatment_options_description', 'option');
	$treatments = get_terms('options_cat', array('hide_empty'=>false));

	if( is_tax('options_cat') ) {
		$object = get_queried_object();
		$this_page_id = $object->term_id;
	} else {
		$this_page_id = '';
	}
?>

	<div class="about_bg" style="background-image: url('<?php echo $treatment_options_bg['url']; ?>');">
		<div class="row">
			<div class="large-6 columns header_col">
			<div class="top_div">
				<h1><?php echo $treatment_options_bg_title; ?></h1>
			</div>
			<div class="bottom_div">

			</div>
			</div>
		</div>
	</div>

	<section class="treatments_options_top">
		<div class="row">
			<?php if($treatment_options_title): ?>
				<div>
					<h2><?php echo $treatment_options_title; ?></h2>
				</div>
			<?php endif; ?>

			<?php if( $treatment_options_description ): ?>
				<div class="treatment_desc">
					<?php echo $treatment_options_description; ?>
				</div>
			<?php endif;?>

			<?php if(false && $treatments): ?>
				<div class="treatments_div">
					<ul class="vertical medium-horizontal menu">
						<?php foreach($treatments as $term) : ?>
							<li>
								<a class="<?php echo selected($this_page_id, $term->term_id, false) ? 'act_ops_treat' : ''; ?>" href="<?php echo get_term_link($term); ?>" title="<?php echo $term->name; ?>">
									<?php echo $term->name; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php if( have_posts() ): ?>
		<section class="treatments_options_main">
			<div class="row">
				<div class="large-12 columns accordion_div">
					<div class="main">
						<div class="accordion">
	 						<?php $counter = 1; ?>
							<?php while(have_posts()): the_post(); ?>


							<div class="accordion-section">
								<div class="accordion_head">
									<?php the_title(); ?>
								</div>
								<a class="accordion-section-title" href="#accordion-<?php echo $counter; ?>" title="<?php _e('Read More','insightec');?>">
									<?php _e('Read More','insightec');?>
								</a>
								<div id="accordion-<?php echo $counter; ?>" class="accordion-section-content">
									<?php the_content(); ?>
								</div>
							</div>
							<?php $counter++;  endwhile; ?>
						</div><!--end .accordion-->
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php get_footer(); ?>
