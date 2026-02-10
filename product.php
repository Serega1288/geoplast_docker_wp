<?php
/*
Template Name: Product
*/
get_header(); ?>

<main class="product_container_page hidden">

	<?php get_template_part('inc/template/product-page/product-main-section'); ?>

	<?php get_template_part('inc/template/product-page/product-table-section'); ?>

	<?php get_template_part('inc/template/product-page/product-product-section'); ?>

	<?php get_template_part('inc/template/product-page/product-slider'); ?>




	<!-- <section class="slider_section animate fade-up" data-delay="100">
		<div class="wrapper">
			<div class="slider_block_main">
				<div class="product_slider slider" id="mySlider">
					<div class="slider_container">
						<div class="slide_group" style="transform: translateX(0px);">
							<picture class="slide_main"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider.png" alt=""></picture>
							<picture class="slide_main"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider.png" alt=""></picture>
							<picture class="slide_main"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider.png" alt=""></picture>
						</div>
					</div><a class="prev disabled" href="#" style="display: block;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="none">
							<circle cx="25" cy="25" r="25" transform="rotate(90 25 25)" fill="#ED6B27"></circle>
							<path d="M29 15L19 25L29 35" stroke="#0F283D" stroke-width="3" stroke-linecap="round"></path>
						</svg></a><a class="next" href="" style="display: block;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="none">
							<circle cx="25" cy="25" r="25" transform="matrix(4.37114e-08 1 1 -4.37114e-08 0 2.18557e-06)" fill="#ED6B27"></circle>
							<path d="M21 15L31 25L21 35" stroke="#0F283D" stroke-width="3" stroke-linecap="round"></path>
						</svg> </a>
					<div class="slide_buttons flex flex-center gap_20" style="display: flex;"><button class="slide_button active"></button><button class="slide_button"></button><button class="slide_button"></button></div>
				</div>
			</div>
		</div>
	</section> -->
</main>


<?php get_footer(); ?>