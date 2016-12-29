<?php
	get_header();
	$object = get_the_terms($post->ID, 'category');
	$object = reset($object);
	$page_banner = get_field('category_bg_img','category_'.$object->term_id) ? get_field('category_bg_img','category_'.$object->term_id): '';
	$category_title = get_field('category_title','category_'.$object->term_id) ? get_field('category_title','category_'.$object->term_id): '';
	$category_icon = get_field('category_icon','category_'.$object->term_id) ? get_field('category_icon','category_'.$object->term_id): '';
	$category_name = get_cat_name( $object->term_id );
	$category_link = get_category_link( $object->term_id );
?>

<?php get_template_part("inc/category","bg"); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<section class="single_category_sec">
			<div class="row single_category_row">

				<div class="large-8 columns">
					<div class="h1_div">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
				</div>

				<div class="large-4 columns">
					<div class="icons_div">
   						<div class="img_div">
   							<div class="text-center">
   								<img src="<?php echo $category_icon['url']; ?>" alt="<?php echo $category_name; ?>">
   							</div>
   							<div class="text-center">
   								<a href="<?php echo $category_link; ?>" title="<?php echo $category_name; ?>">
   									<span><?php echo $category_name; ?></span>
   								</a>
   							</div>
   						</div>
   						<div class="date_div">
   							<div class="text-center num_div">
   								<span><?php echo get_the_date('j'); ?> </span>
   							</div>
   							<div class="text-center month_div">
   								<span><?php echo get_the_date('F'); ?> </span>
   							</div>
   						</div>
   					</div>
				</div>
				<div class="large-12 columns">
					<div class="border_div"></div>
				</div>
			</div>


			<div class="row single_category_content">
				<div class="large-12 columns">
					<div class="content_div">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>

		<section class="single_rel_posts">
			<div class="row single_rel_row">
				<div class="large-12 columns">
					<div class="head_div">
						<h3><?php _e('More Articles','insightec'); ?></h3>
					</div>
				</div>
			</div>

			<div class="row single_rel_row">
			<?php
				$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 2, 'post__not_in' => array($post->ID) ) );
				if( $related ) foreach( $related as $post ) {
				setup_postdata($post); ?>
						<div class="large-6 columns">
							<div class="post_box">
								<div class="top_div_content">
			   						<div class="icon_div">
			   							<div class="text-center">
			   								<img src="<?php echo $category_icon['url']; ?>" alt="<?php echo $object->name; ?>">
			   							</div>
			   							<div class="cat_name text-center">
			   								<span><?php echo $object->name; ?></span>
			   							</div>
			   						</div>
									<div class="title_div">
										<h3>
											<?php the_title(); ?>
										</h3>
									</div>
								</div>
								<div class="large-12 columns plus_div">
							 		<a href="<?php the_permalink(); ?>" title="<?php _e('Read More','insightec');?>">
							 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/storyplus.png" alt="<?php _e('Read More','insightec');?>">
							 			<span><?php _e('Read More','insightec');?></span>
							 		</a>
							 	</div>
							</div>
						</div>
				<?php }
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php
 endwhile;
 endif;
?>

<?php get_footer(); ?>
