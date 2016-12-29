<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="single_category_sec">
		<div class="row single_category_content">
			<div class="large-12 columns">
                <h1 class="single_page_title"><?php the_title(); ?></h1>
				<div class="content_div">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
