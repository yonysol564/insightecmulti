<?php get_header();  ?>
<?php
	$stories_bg = get_field('stories_bg', 'option');
	$stories_title = get_field('stories_title', 'option');
 ?>
	<div class="about_bg" style="background-image: url('<?php echo $stories_bg['url']; ?>');">
		<div class="row">
			<div class="large-6 columns header_col">
			<div class="top_div">
				<h1><?php echo $stories_title; ?></h1>
			</div>
			<div class="bottom_div">
			</div>
			</div>
		</div>
	</div>
	<section class="stories_sec">
		<div class="row stories_row">
			<?php
			if ( have_posts() ) {
				$cnt = 1;
				while ( have_posts() ) { the_post(); ?>
				<?php $quote = get_field('story_quote') ?>
					  <div class="large-6 columns story_box">
						<div class="inner_div_story">
						 	<div class="img_div">
						 		<a data-open="storymodal<?php echo $cnt; ?>" href="#" title="<?php the_title(); ?>">
							 		<div class="opc_div">
							 		</div>

								 	<?php $youtube_id = get_field('youtube_id'); ?>
								 	<?php if ($youtube_id )
								 	{
								 		$youtube_img = getYoutubeThumbUrl($youtube_id);
								 	?>
								 		<img class="img_youtube" src="<?php echo $youtube_img; ?>">

			                            <img class="img_play_abs" src="<?php echo get_template_directory_uri(); ?>/images/play_story.png" alt="">
								 	<?php }else{ ?>
								 		<img src="<?php echo get_template_directory_uri(); ?>/images/storyimg.jpg">
								 	<?php } ?>
								</a>
								<div class="reveal" id="storymodal<?php echo $cnt; ?>" data-reveal>
							  		<iframe src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>" width="471" height="270" frameborder="0" allowfullscreen>
		                            </iframe>
								  	<button class="close-button" data-close aria-label="Close reveal" type="button">
								    	<span aria-hidden="true">&times;</span>
								  	</button>
								</div>
						 	</div>
						 	<div class="inner_div">
						 		<div class="story_title_name">
						 			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4></a>
						 		</div>
						 		<div class="story_quote">
						 			<?php echo $quote; ?>
						 		</div>
						 		<div class="story_excerpt">
						 			<?php the_excerpt(); ?>
						 		</div>
						 	</div>
						 	<div class="plus_div">
						 		<a href="<?php the_permalink(); ?>" title="<?php _e('Read More','insightec');?>">
						 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/headerplus.png">
						 			<span><?php _e('Read More','insightec');?></span>
						 		</a>
						 	</div>
						</div>
					  </div>
				<?php
				$cnt++;
				} // end while
			} // end if
			?>
		</div>
	</section>




<?php get_sidebar(); ?>
<?php get_footer(); ?>
