<?php

$section_id = isset($args) ? $args : 'about-' . uniqid();

$ges_title    = get_sub_field('ges_title');
$ges_subtitle = get_sub_field('ges_subtitle');
$ges_txt_1    = get_sub_field('ges_txt_1');
$ges_txt_2    = get_sub_field('ges_txt_2');
$ges_txt_3    = get_sub_field('ges_txt_3');
$ges_img      = get_sub_field('ges_img');

$ted_title    = get_sub_field('ted_title');
$ted_subtitle = get_sub_field('ted_subtitle');
$ted_txt_1    = get_sub_field('ted_txt_1');
$ted_txt_2    = get_sub_field('ted_txt_2');
$ted_img      = get_sub_field('ted_img');

$list_content = get_sub_field('list_content');
$list_img     = get_sub_field('list_img');
$force_label  = get_sub_field('force_label');
$force_value  = get_sub_field('force_value');

$need_title   = get_sub_field('need_title');
$need_txt     = get_sub_field('need_txt');
$need_img     = get_sub_field('need_img');
?>

<section class="wrapper about_container">
	<div class="about_gesplast pt_100">
		<h2 class="animate fade-up" data-delay="100"><?php echo esc_html($ges_title); ?></h2>
		<h3 class="animate fade-up" data-delay="200"><?php echo esc_html($ges_subtitle); ?></h3>

		<?php if ($ges_txt_1): ?><p class="animate fade-up" data-delay="300"><?php echo esc_html($ges_txt_1); ?></p><?php endif; ?>
		<?php if ($ges_txt_2): ?><p class="animate fade-up" data-delay="400"><?php echo esc_html($ges_txt_2); ?></p><?php endif; ?>
		<?php if ($ges_txt_3): ?><p class="animate fade-up" data-delay="500"><?php echo esc_html($ges_txt_3); ?></p><?php endif; ?>

		<div class="img_about animate fade-up" data-delay="600">
			<picture>
				<?php if ($ges_img): ?>
					<img src="<?php echo esc_url($ges_img['url']); ?>" alt="<?php echo esc_attr($ges_img['alt']); ?>">
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/gesplast.jpg" alt="Геспласт Груп">
				<?php endif; ?>
			</picture>
		</div>
	</div>
	<div class="about_tederic pt_100">
		<h2 class="animate fade-up" data-delay="100"><?php echo esc_html($ted_title); ?></h2>
		<h3 class="animate fade-up" data-delay="200"><?php echo esc_html($ted_subtitle); ?></h3>

		<?php if ($ted_txt_1): ?><p class="animate fade-up" data-delay="300"><?php echo esc_html($ted_txt_1); ?></p><?php endif; ?>
		<?php if ($ted_txt_2): ?><p class="animate fade-up" data-delay="400"><?php echo esc_html($ted_txt_2); ?></p><?php endif; ?>

		<div class="img_about animate fade-up" data-delay="500">
			<picture>
				<?php if ($ted_img): ?>
					<img src="<?php echo esc_url($ted_img['url']); ?>" alt="<?php echo esc_attr($ted_img['alt']); ?>">
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/tederic.jpg" alt="Tederic Machinery">
				<?php endif; ?>
			</picture>
		</div>
	</div>
</section>