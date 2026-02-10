<?php
$btn_text_1 = get_field('services_button_text_1');
$btn_link_1 = get_field('services_button_link_1');

$btn_text_2 = get_field('services_button_text_2');
$btn_link_2_obj = get_field('services_button_link_2');

$btn_link_2 = $btn_link_2_obj ? get_permalink($btn_link_2_obj) : '#';
?>

<div class="button_container flex flex-center wrap_768 gap_20 animate fade-up" data-delay="100">

	<?php if ($btn_text_1) : ?>
		<a class="cta connect_cta fill_cta" href="<?php echo esc_url($btn_link_1); ?>">
			<?php echo esc_html($btn_text_1); ?>
		</a>
	<?php endif; ?>

	<?php if ($btn_text_2) : ?>
		<a class="cta transparent_cta" href="<?php echo esc_url($btn_link_2); ?>">
			<?php echo esc_html($btn_text_2); ?>
		</a>
	<?php endif; ?>

</div>