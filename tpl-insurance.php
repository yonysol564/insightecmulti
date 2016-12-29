<?php /* Template Name: Insurance */  ?>

<?php get_header();  ?>

	<?php $insurance_bg_img = get_field('insurance_bg_img'); ?>

	<div class="about_bg" style="background-image: url('<?php echo $insurance_bg_img['url']; ?>');">

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



	<section class="insurance_sec">

			<div class="row">

				<div class="large-12 columns insurance_div">

					<?php 

					 $contact_shad_class = 'contact_shad_class'; 

					 ?>

					 <?php if( have_rows('insurance_box') ):

			            while ( have_rows('insurance_box') ) : the_row();

			            $insurance_box_img = get_sub_field('insurance_box_img');

			            $insurance_box_title = get_sub_field('insurance_box_title');

			            $insurance_box_content = get_sub_field('insurance_box_content');

			         ?>   

						<div class="insurance_row">

							<div class="row top_div">

								<div class="large-2 columns">

									<a href="#" title="<?php echo $insurance_box_title; ?>">
										<img src="<?php echo $insurance_box_img['url']; ?>" alt="<?php echo $insurance_box_title; ?>">
									</a>

								</div>

								<div class="large-5 columns end">

									<a href="" title="<?php echo $insurance_box_title; ?>">
										<h3><?php echo $insurance_box_title; ?></h3>
									</a>	

								</div>								

							</div>

							<div class="row bottom_div">

								<div class="large-12 columns">

									<p>

										<?php echo $insurance_box_content; ?>									

									</p>

								</div>	

							</div>

						</div>

			        <?php endwhile; endif; ?>	

				</div>

			</div>

	</section>	

<?php get_sidebar(); ?>

<?php get_footer(); ?>

