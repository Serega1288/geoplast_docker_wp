<?php
$h_title      = get_field('herosection_title');
$h_subtitle   = get_field('herosection_subtitle');
$h_bg         = get_field('hero_bg');
$h_video      = get_field('hero_video');

$btn_1_text   = get_field('btn_1_text');
$btn_1_link   = get_field('btn_1_link');
$btn_2_text   = get_field('btn_2_text');
$btn_2_link_obj = get_field('btn_2_link'); 


$btn_2_url = home_url('/catalogue'); 
if ($btn_2_link_obj) {
	$btn_2_url = get_permalink($btn_2_link_obj->ID);
}
?>

<section class="main_section">
	<div class="dark_mask">
		<div class="mask"></div>

		<picture>
			<?php if ($h_bg) : ?>
				<img src="<?php echo esc_url($h_bg['url']); ?>" alt="<?php echo esc_attr($h_bg['alt']); ?>">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/main_bg.jpg" alt="Geoplast Group">
			<?php endif; ?>
		</picture>

		<video autoplay loop muted playsinline style="opacity: 0; transition: opacity 0.5s ease;">
			<?php if ($h_video) : ?>
				<source src="<?php echo esc_url($h_video['url']); ?>" type="video/mp4">
			<?php else : ?>
				<source src="<?php echo get_template_directory_uri(); ?>/assets/video/video.mp4" type="video/mp4">
			<?php endif; ?>
		</video>
	</div>

	<div class="main_text flex column items-center flex-center tac wrapper">
		<h1 class="animate fade-up">
			<?php echo $h_title ? esc_html($h_title) : 'Tederic – інноваційні рішення для лиття пластмас під тиском'; ?>
		</h1>
		<p class="animate fade-up" data-delay="200">
			<?php echo $h_subtitle ? esc_html($h_subtitle) : 'Ми пропонуємо комплексні рішення для лиття пластмас: від консультацій та підбору обладнання до введення у експлуатацію та сервісного обслуговування.'; ?>
		</p>

		<div class="button_container flex flex-center wrap_768 gap_20 animate fade-up" data-delay="400">

			<?php if ($btn_1_text) : ?>
				<a class="cta connect_cta fill_cta" href="#">
					<?php echo esc_html($btn_1_text); ?>
				</a>
			<?php endif; ?>

			<?php if ($btn_2_text) : ?>
				<a class="cta transparent_cta" href="<?php echo esc_url($btn_2_url); ?>">
					<?php echo esc_html($btn_2_text); ?>
				</a>
			<?php endif; ?>

		</div>
	</div>
</section>