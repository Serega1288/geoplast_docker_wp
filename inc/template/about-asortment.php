<?php
$list_content = get_sub_field('list_content');
$force_label  = get_sub_field('force_label');
$force_value  = get_sub_field('force_value');
$about_title  = get_sub_field('about_title');
$need_title   = get_sub_field('need_title');
$need_txt     = get_sub_field('need_txt');
$need_img     = get_sub_field('need_img');
?>

<section class="wrapper about_container">
	<div class="asortment_list flex-between gap_20 pt_60 items-center wrap_768">
		<div class="animate fade-left show" data-delay="100">
			<h3><?php echo $about_title; ?></h3>

			<?php echo $list_content; ?>

			<p class="flex items-center gap_20 wrap_1024">
				<?php echo $force_label; ?>
				<span class="price"><?php echo $force_value; ?></span>
			</p>
		</div>

		<div class="animate fade-right show" data-delay="100">
			<?php if ($need_img): ?>
				<picture>
					<img src="<?php echo esc_url($need_img['url']); ?>" alt="<?php echo esc_attr($need_img['alt']); ?>">
				</picture>
			<?php endif; ?>
		</div>
	</div>

	<div class="need_block flex-between gap_20 pt_60 items-center reverse_wrap wrap_768">
		<div class="animate fade-left show" data-delay="100">
			<?php if ($need_img): ?>
				<picture>
					<img src="<?php echo esc_url($need_img['url']); ?>" alt="<?php echo esc_attr($need_img['alt']); ?>">
				</picture>
			<?php endif; ?>
		</div>
		<div class="animate fade-right show" data-delay="100">
			<h3><?php echo $need_title; ?></h3>
			<p><?php echo $need_txt; ?></p>
		</div>
	</div>
</section>