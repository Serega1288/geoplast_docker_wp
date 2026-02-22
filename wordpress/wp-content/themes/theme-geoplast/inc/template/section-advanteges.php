<section class="advantages_container wrapper animate fade-up" data-delay="200" <?php if (get_sub_field('id_block')) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<?php
	$main_title = get_sub_field('editor_title');
	if ($main_title) : ?>
		<h2 class="page_h2"><?php echo esc_html($main_title); ?></h2>
	<?php endif; ?>
	<div class="grid col_4 gap_30">
		<?php
		if (have_rows('section_content')):
			$count = 0;
			while (have_rows('section_content')): the_row();
				if (get_row_layout() == 'section_block'):
					$icon_array = get_sub_field('section_icon');
					$text = get_sub_field('section_text');
					$current_delay = 250 + ($count * 150);
		?>
					<div class="advant_block animate fade-up" data-delay="<?php echo $current_delay; ?>">
						<?php if ($icon_array): ?>
							<div class="advant_icon">
								<img src="<?php echo esc_url($icon_array['url']); ?>"
									alt="<?php echo esc_attr($icon_array['alt'] ?: 'icon'); ?>"
									width="64" height="64">
							</div>
						<?php endif; ?>
						<?php if ($text): ?>
							<p><?php echo esc_html($text); ?></p>
						<?php endif; ?>
					</div>
		<?php
					$count++;
				endif;
			endwhile;
		endif;
		?>
	</div>
</section>