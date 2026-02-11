<?php
$info_title = get_field('info_title');
$info_desc  = get_field('info_description');
$info_btn   = get_field('info_btn_text');
$info_img   = get_field('info_img');
?>

<section class="wrapper info_container pt_100" id="info">
	<div class="flex-between wrap_768">

		<div class="dark_mode info_text flex column flex-center animate fade-left" data-delay="100">
			<?php if ($info_title) : ?>
				<h2><?php echo esc_html($info_title); ?></h2>
			<?php endif; ?>

			<?php if ($info_desc) : ?>
				<p><?php echo esc_html($info_desc); ?></p>
			<?php endif; ?>

			<?php if ($info_btn) : ?>
				<a class="cta connect_cta fill_cta" href="#contact">
					<?php echo esc_html($info_btn); ?>
				</a>
			<?php endif; ?>
		</div>

		<div class="image_info animate fade-right" data-delay="300">
			<picture>
				<?php if ($info_img) : ?>
					<img src="<?php echo esc_url($info_img['url']); ?>" alt="<?php echo esc_attr($info_img['alt']); ?>">
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/info.jpg" alt="Geoplast Info">
				<?php endif; ?>
			</picture>
		</div>

	</div>
</section>