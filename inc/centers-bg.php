<?php
	global $center_page_bg;
	$center_page_bg = get_field('center_page_bg') ? get_field('center_page_bg') : get_field('center_page_bg','option');
?>
<div class="about_bg" style="background-image: url('<?php echo $center_page_bg['url']; ?>');">
	<div class="row">
		<div class="large-6 columns header_col">
			<div class="top_div">
				<h1><?php echo the_title(); ?></h1>
			</div>
			<div class="bottom_div">

			</div>
		</div>
	</div>
</div>
