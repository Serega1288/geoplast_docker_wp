<?php
$info_title = get_field('info_sec_title');
$info_p1    = get_field('info_sec_title_p1');
$info_p2    = get_field('info_sec_title_p2');
$info_img   = get_field('info_sec_image');
?>

<section class="main_container">
	<div class="wrapper">
		<div class="grid col_2 gap_100 items-center animate fade-up" data-delay="100">
			<div class="services_main_text">
				<h1 class="page_h1 animate fade-up" data-delay="200">
					<?php echo $info_title ? esc_html($info_title) : 'Сервіс та гарантія'; ?>
				</h1>
				<?php if ($info_p1) : ?>
					<p class="animate fade-up" data-delay="300">
						<?php echo esc_html($info_p1); ?>
					</p>
				<?php endif; ?>
				<?php if ($info_p2) : ?>
					<p class="animate fade-up" data-delay="400">
						<?php echo esc_html($info_p2); ?>
					</p>
				<?php endif; ?>
			</div>
			<picture class="animate fade-left" data-delay="300">
				<?php if ($info_img) : ?>
					<img src="<?php echo esc_url($info_img['url']); ?>"
						alt="<?php echo esc_attr($info_img['alt'] ? $info_img['alt'] : $info_title); ?>">
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/services_page.jpg" alt="Geoplast Service">
				<?php endif; ?>
			</picture>
		</div>
	</div>
</section>