<?php /* Template Name: Archive posts */  ?>
<?php
	get_header();
	$object = get_queried_object();
	$page_banner = get_field('treatment_options_bg','option');
?>

	<div class="about_bg" style="background-image: url('<?php echo $page_banner['url']; ?>');">
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

	<section class="category_sec">
		<form class="sort_cat_form" method="get" action="">
			<div class="row">
				<div class="large-2 columns sort_col">
					<div class="input_div">
				    	<?php _e('Sort By','insightec');?>
				    </div>
				</div>
				<div class="large-10 select_col columns">
				    <div class="input_div">
						<div class="select_div">

							<select name="cat" id="select_sort">
								<option class="all_opt" value="0" disabled selected><?php _e('All','insightec');?></option>
								<!-- <option class="opt_hidden" hidden value="<?php //echo $category_name; ?>"></option> -->
								<?php $categories = get_categories( array(
									    'orderby' => 'name'
									) );
									foreach ( $categories as $category ) {
										$cat_link = get_category_link($category->term_id );
										//$cat_link_new = add_query_arg("catName" ,$category_name, $cat_link );
										//echo $cat_link_new;
										if($object->term_id == $category->term_id){
											$selected =  'selected="selected"';
										}else { $selected = '';}
									?>
	 									<option data-url="<?php echo $cat_link; ?>" value="<?php echo $category->term_id; ?>" <?php echo $selected; ?>>
	 									<?php echo esc_html( $category->name ); ?></option>
									<?php
									}
								 ?>
						  	</select>
						</div>
				    </div>
				</div>
			</div>
		</form>
	</section>

	<section class="category_sec_results">
		<div class="row wrap_row">
		<?php $archive_query = new WP_Query(array('post_type'=>'post','posts_per_page'=>-1));?>
	    <?php if ($archive_query->have_posts()) : while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
	    	<?php
	    	$post_cats = get_the_terms($post->ID,'category');
	    	if($post_cats){
	    		$cat = reset($post_cats);
	    	}
			$category_title = get_field('category_title','category_'.$cat->term_id) ? get_field('category_title','category_'.$cat->term_id): '';
			$category_icon = get_field('category_icon','category_'.$cat->term_id) ? get_field('category_icon','category_'.$cat->term_id): '';
	    	?>
			 <div class="category_row row">
			 <?php
			 	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '');
			 	if ($url) { ?>
				 	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	   					<div class="img_col" style="background-image: url('<?php echo $url[0]; ?>');"></div>
	   				</a>
			 	<?php }
			  ?>
   				<div class="content_col <?php if($url) { echo 'with_img'; } ?>">
   					<div class="inner_top_content">
	   					<div class="h3_div">
	   						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3><?php the_title(); ?></h3></a>
	   					</div>
	   					<div class="icons_div">
	   						<div class="img_div">
	   							<div class="text-center">
	   								<img src="<?php echo $category_icon['url']; ?>" alt="<?php _e('Read More','insightec');?>">
	   							</div>
	   							<div class="text-center">
	   								<span><?php echo $cat->name; ?></span>
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
   					<div class="inner_bottom_content">
   						<div class="text_div">
	   						<?php the_content(); ?>
	   					</div>
   					</div>
   				</div>
			 	<div class="large-12 columns plus_div">
			 		<a href="<?php the_permalink(); ?>" title="<?php _e('Read More','insightec');?>">
			 			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/storyplus.png" alt="">
			 			<span><?php _e('Read More','insightec');?></span>
			 		</a>
			 	</div>
   			</div>
	    <?php endwhile; wp_reset_query(); ?>
	    <?php endif; ?>
		</div>
	</section>



<?php get_sidebar(); ?>
<?php get_footer(); ?>
