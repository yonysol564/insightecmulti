<?php
	$object = get_queried_object();
	$step1text = get_field('center_step1_text' , 'option') ? get_field('center_step1_text' , 'option') : get_field('center_step1_text');
	$step1link = get_field('center_step1_link' , 'option') ? get_field('center_step1_link' , 'option') : get_field('center_step1_link');
	$step2text = get_field('center_step2_text' , 'option') ? get_field('center_step2_text' , 'option') : get_field('center_step2_text');
	$step2link = get_field('center_step2_link' , 'option') ? get_field('center_step2_link' , 'option') : get_field('center_step2_link');
	$step_active = 'step_active';
	$page_name = isset($_GET['page_name']) ? sanitize_text_field($_GET['page_name']) : '';

	$background_image_2 = get_field("step_2_background_image");
	$background_image_1 = get_field("step_1_background_image");
?>

<div class="row centers_steps_row">
	<div class="large-6 small-6 columns step_col">
		<div class="step_wrapper step1_div <?php if($page_name == 'tab-1' ){ echo $step_active; } ?>" <?php if($background_image_1):?> style="background:url(<?php echo $background_image_1;?>)" <?php endif;?>>
			<?php
				$page_link1 = add_query_arg( "page_name" , 'tab-1' , $step1link);
			?>
			<a href="<?php echo $page_link1; ?>" title="<?php _e('Local Centers','insightec');?>">
				<div class="inner_wrap">
					<div class="text_div">
						<?php echo $step1text; ?>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="large-6 small-6 columns step_col">
		<div class="step_wrapper step2_div <?php if($page_name == 'tab-2' ){ echo $step_active; } ?>" <?php if($background_image_2):?> style="background:url(<?php echo $background_image_2;?>)" <?php endif;?>>
			<?php
				$page_link2 = add_query_arg( "page_name" , 'tab-2' , $step2link);
			?>
			<a href="<?php echo $page_link2; ?>" title="<?php _e('Worldwide Centers','insightec'); ?>">
				<div class="inner_wrap">
					<div class="text_div">
						<?php echo $step2text; ?>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>
