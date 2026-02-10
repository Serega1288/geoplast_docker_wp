<?php

$main_title    = get_field('support_sec_title');
$main_subtitle = get_field('support_sec_subtitle');
?>

<section class="text_info_container wrapper">
	<?php if ($main_title) : ?>
		<h2 class="page_h2 animate fade-up" data-delay="100"><?php echo esc_html($main_title); ?></h2>
	<?php endif; ?>

	<?php if ($main_subtitle) : ?>
		<p class="animate fade-up" data-delay="100"><?php echo esc_html($main_subtitle); ?></p>
	<?php endif; ?>

	<?php
	if (have_rows('support_list')) :
	?>
		<?php
		$i = 0;
		while (have_rows('support_list')) : the_row();
			$s_title = get_sub_field('support_item_title');
			$s_bold  = get_sub_field('support_item_bold');
			$s_desc  = get_sub_field('support_item_text');

			$delay = 100 + ($i * 50);
			$i++;
		?>
			<div class="text_services_block">
				<div class="grid items-center">
					<?php if ($s_title) : ?>
						<h3 class="page_h3 animate fade-left" data-delay="<?php echo $delay; ?>">
							<?php echo esc_html($s_title); ?>
						</h3>
					<?php endif; ?>

					<div class="description_info animate fade-right" data-delay="<?php echo $delay; ?>">
						<?php if ($s_bold) : ?>
							<p><b><?php echo esc_html($s_bold); ?></b></p>
						<?php endif; ?>

						<?php if ($s_desc) : ?>
							<p><?php echo esc_html($s_desc); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</section>