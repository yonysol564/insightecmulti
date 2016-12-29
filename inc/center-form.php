<?php
   // $fullname      = get_field('pop_up_form_fullname','option');
    $firstname     = get_field('pop_up_form_firstname','option');
    $lastname      = get_field('pop_up_form_lastname','option');
    $phone         = get_field('pop_up_form_phone','option');
    $email         = get_field('pop_up_form_email','option');
    $comment_title = get_field('pop_up_form_comment_title','option');
    $comment_place = get_field('pop_up_form_comment_placeholder','option');
    $select_title = get_field('pop_up_form_select_title','option');
?>

<div id="test-popup" class="center_form_popup white-popup mfp-hide">
  	<form name="center_form" data-pid="">
		<div class="top_div"><?php _e('Submit a Request for','insightec');?>&nbsp;<span class="change_title"></span>
		</div>
	  	<div class="top_detailes">
			<div class="row collapse">
			    <div class="large-6 columns">
			      <label><?php echo $firstname; ?> *
			      	<input name="c_firstname" class="c_firstname" id="c_firstname" type="text" placeholder="<?php echo $firstname; ?>">
			      </label>
			    </div>
			    <div class="large-6 columns">
			      <label><?php echo $lastname; ?> *
			      	<input name="c_lastname" class="c_lastname" id="c_lastname" type="text" placeholder="<?php echo $lastname; ?>">
			      </label>
			    </div>
			</div>
			<div class="row collapse">
			    <div class="large-6 columns">
			      <label><?php echo $phone; ?> *
			      	<input name="c_phone" class="c_phone" id="c_phone" type="text" placeholder="<?php echo $phone; ?>">
			      </label>
			    </div>
			    <div class="large-6 columns">
			      <label><?php echo $email; ?> *
			     	 <input name="c_email" class="c_email" id="c_email" type="email" placeholder="<?php echo $email; ?>">
			      </label>
			    </div>
			</div>
	  	</div>
	  	<div class="bottom_detailes">
			<div class="row collapse">
			    <div class="large-6 columns">
			      	<label><?php echo $select_title?>
		      			<select id="select_sort2">
							<option value="" disabled selected><?php _e('All','insightec');?></option>
								<option data-url="" value="News"></option>
					  	</select>
				  	</label>
			    </div>
			</div>
			<div class="row collapse">
			    <div class="large-12 columns">
					<label><?php echo $comment_title; ?>
						<textarea name="c_comment"  class="c_comment" id="c_comment" placeholder="<?php echo $comment_place; ?>"></textarea>
					</label>
			    </div>
			</div>

			<div class="row collapse">
			    <div class="large-12 columns col_rel">

					<div class="done_form_center_loader">
						<img src="<?php echo get_template_directory_uri(); ?>/images/loadersteps.gif" title="" alt="loader">
					</div>

					<div class="center_form_sent">
						Request Sent Thank you!
					</div>

			    </div>
			</div>

			<div class="row collapse">
			    <div class="large-12 columns text-center">
			    	<div class="btn_div">
			    		<input type="submit" class="button" value="<?php _e('Submit a Request','insightec');?>">
			    	</div>
			    </div>
			</div>
	  	</div>
	</form>
</div>
