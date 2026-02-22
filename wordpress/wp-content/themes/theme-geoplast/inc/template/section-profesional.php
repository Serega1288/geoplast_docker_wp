<section class="text_info_container wrapper" <?php if (get_sub_field('id_block')) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<?php
	$main_title = get_sub_field('головний_заголовок_h2');
	$main_text  = get_sub_field('наповнення_текстом_p');
	?>
	<?php if ($main_title) : ?>
		<h2 class="page_h2 animate fade-up" data-delay="100">
			<?php echo esc_html($main_title); ?>
		</h2>
	<?php endif; ?>
	<?php if ($main_text) : ?>
		<div class="animate fade-up" data-delay="200">
			<?php echo $main_text; ?>
		</div>
	<?php endif; ?>
	<?php
	if (have_rows('section_content')):
		while (have_rows('section_content')): the_row(); ?>
			<?php if (get_row_layout() == 'section_content_block'): ?>
				<div class="text_services_block">
					<div class="grid items-center">
						<h3 class="page_h3 animate fade-left" data-delay="100">
							<?php the_sub_field('editor_title2'); ?>
						</h3>
						<div class="animate fade-up" data-delay="200">
							<?php the_sub_field('editor_text2'); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
	<?php endwhile;
	endif; ?>
</section>