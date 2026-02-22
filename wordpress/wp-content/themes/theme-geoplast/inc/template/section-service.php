<section class="main_container" <?php if (get_sub_field('id_block')) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<div class="wrapper">
		<?php if (get_row_layout() == 'section_service'):
			$title   = get_sub_field('editor_title');
			$text    = get_sub_field('editor_text');
			$img     = get_sub_field('editor_img');
			$reverse = get_sub_field('reverse_block'); 
			$reverse_class = $reverse ? 'grid-reverse' : '';
		?>
			<div class="grid col_2 gap_100 items-center animate fade-up show <?php echo $reverse_class; ?>" data-delay="100">
				<div class="services_main_text">
					<?php if ($title): ?>
						<h1 class="page_h1 animate fade-up show" data-delay="100">
							<?php echo esc_html($title); ?>
						</h1>
					<?php endif; ?>
					<?php if ($text):
						echo str_replace('<p>', '<p class="animate fade-up show" data-delay="150">', $text);
					endif; ?>
				</div>
				<?php if ($img): ?>
					<picture class="animate fade-left show" data-delay="200">
						<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt'] ?: get_the_title()); ?>">
					</picture>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>