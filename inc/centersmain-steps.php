<div class="row steps_div">
	<div class="large-12 columns">
		<input type="hidden" name="post_id" value="<?php echo $post->ID;?>" />
<?php if( have_rows('dynamic_steps_rep') ): ?>
	<?php  $cnt = 1;  ?>
    <?php while ( have_rows('dynamic_steps_rep') ) : the_row();
        $step_type = get_sub_field('dynamic_step_type');

        switch ($step_type) {

        	case 'yesno': ?>
				<div data-step="<?php echo $cnt; ?>" class="row large-up-2 medium-up-2 element_row <?php if($cnt%2 == 0) { echo 'mobile_bg'; } ?>">
					<div class="column">
						<div class="text_column">
							<div class="steps step_1 <?php if($cnt == 1) { echo 'step_done'; }; ?>">
								<div class="num_step">
									<div class="inner_div">
										<span><?php echo $cnt; ?></span>
									</div>
								</div>
								<div class="text_div">
									<?php
										$qu1 = get_sub_field('yes_no_question');
										echo $qu1;
									?>
								</div>
								<div class="vertical_line line_done"></div>
							</div>
						</div>
					</div>
					<div class="column mob_pad">
						<div class="radio_div">
							<ul class="button-group round toggle" data-toggle="buttons-radio">
								<?php
								$counter = 1;
								?>
								<?php if( have_rows('yes_no_rep') ):
						            while ( have_rows('yes_no_rep') ) : the_row();
						            $yes_no_ans_label = get_sub_field('yes_no_ans_label');
						            $yes_or_no_ans = get_sub_field('yes_or_no_ans');
						        ?>
							      <li>

							        <input data-id="<?php if($yes_or_no_ans) { echo '1'; }else{ echo '0'; } ?>"
							        data-value="<?php echo $yes_no_ans_label; ?>"
							        class="radio_yes_no" value="<?php if($yes_or_no_ans) { echo '1'; }else{ echo '0'; } ?>"
							        type="radio" id="r<?php echo $counter.'_'.$cnt; ?>"
							        name="answer_one<?php echo $cnt; ?>" <?php if($yes_or_no_ans){ echo 'checked="checked"'; } ?> data-toggle="button">

							        <label class="button" for="r<?php echo $counter.'_'.$cnt; ?>"><?php echo $yes_no_ans_label; ?></label>
							      </li>
						        <?php $counter++; endwhile; endif; ?>
						    </ul>
						</div>
					</div>
				</div>
        	<?php
        	break;

        	case 'dropdown': ?>
		        <div data-step="<?php echo $cnt; ?>" class="row large-up-2 medium-up-2 element_row <?php if($cnt%2 == 0) { echo 'mobile_bg'; } ?>">
					<div class="column">
						<div class="text_column">
							<div class="steps step_2">
								<div class="num_step">
									<div class="inner_div">
										<span><?php echo $cnt; ?></span>
									</div>
								</div>
								<?php $qu2 = get_sub_field('dropdown_question' ); ?>
								<?php if($qu2): ?>
									<div class="text_div">
										<?php echo $qu2; ?>
									</div>
								<?php endif; ?>
								<div class="vertical_line line_done"></div>
							</div>
						</div>
					</div>
					<div class="column mob_pad">
						<div class="select_div">
						 <?php $multi = get_sub_field('dropdown_multiselect');  ?>
							<select id="select_opt-<?php echo $cnt; ?>"
							<?php
								if ($multi) {
									echo 'class="chosen-select" multiple data-placeholder="Pick one or more answers"';
								} else {
									echo 'class="step_select_element"';
								} ?>>
								<?php if( have_rows('dropdown_rep') ):
						            while ( have_rows('dropdown_rep') ) : the_row();
						            $step_two_answer_label = get_sub_field('dropdown_answer_label');
						            $step_two_answer = get_sub_field('dropdown_answer');
						        ?>
										<option data-id="<?php if($step_two_answer) { echo '1'; }else{ echo '0'; } ?>"  value="<?php echo $step_two_answer_label; ?>"><?php echo $step_two_answer_label; ?></option>
						        <?php endwhile; endif; ?>
						  	</select>
						</div>
					</div>
				</div>
        	<?php
        	break;

        	case 'slider': ?>
				<div data-step="<?php echo $cnt; ?>" class="row large-up-2 medium-up-2 element_row <?php if($cnt%2 == 0) { echo 'mobile_bg'; } ?>">
					<div class="column">
						<div class="text_column">
							<div class="steps step_3">
								<div class="num_step">
									<div class="inner_div">
										<span><?php echo $cnt; ?></span>
									</div>
								</div>
								<?php $qu3 = get_sub_field('dropdown_question' ); ?>
								<?php if($qu3): ?>
									<div class="text_div">
										<?php echo $qu3; ?>
									</div>
								<?php endif; ?>
								<div class="vertical_line line_done"></div>
							</div>
						</div>
					</div>
					<div class="column mob_pad">
						<div class="range_wrapper">

						  <div id="range_slide" class="slider" data-slider data-decimal="0" data-start="0" data-initial-start="18" data-end="55" data-step="1">
						    <span class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2">
						    	<div class="input_wrap"><input class="sliderOutput" id="sliderOutput2"></div>
						    </span>
						    <span class="slider-fill" data-slider-fill></span>

						  </div>


						  <div class="numbers_range">
						  	<div class="div_18">
							  	18
							  </div>
							<div class="div_55">
							  	55+
							</div>
						  </div>

						</div>
					</div>
				</div>
        	<?php
        	break;

        	default:break;
        }
        ?>


    <?php $cnt++; endwhile; ?>
<?php endif;?>


		<!--====================== Step 4 ======================-->
		<div  data-step="<?php echo $cnt; ?>"  class="row large-up-2 medium-up-2  element_row last_element_row">
			<div class="column">
				<div class="text_column">
					<div class="steps step_4">
						<div class="wraper_div_mob">
							<div class="num_step">
								<div class="inner_div">
									<span><?php echo $cnt; ?></span>
								</div>
							</div>
						</div>
						<div class="text_div text_div_last">
							<?php $firstname = get_field('last_step_firstname' ); ?>
							<label>
								<?php echo $firstname; ?>
								<input name="center_firstname" type="text" placeholder="">
							</label>
						</div>
						<div class="vertical_line line_done"></div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="text_div">
					<?php $lastname = get_field('last_step_lastname' );?>
					<label>
						<?php echo $lastname; ?>
						<input name="center_lastname" type="text" placeholder="">
					</label>
				</div>
			</div>
			<div class="column">
				<div class="text_div">
					<?php $email = get_field('last_step_email' );?>
					<label>
						<?php echo $email; ?><span class="form_ast">*</span><span class="email_err"><?php _e('Fill Email Address','insightec');?></span>
						<input name="center_email" type="email" placeholder="">
					</label>
				</div>
			</div>
		</div>








		<div class="row">
			<div class="large-12 column">
				<div class="done_steps_loader">
					<img src="<?php echo get_template_directory_uri(); ?>/images/loadersteps.gif" title="" alt="loader">
				</div>
			</div>
		</div>
	</div>
</div>
