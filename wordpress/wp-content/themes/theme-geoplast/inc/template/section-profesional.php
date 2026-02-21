<section class="text_info_container wrapper" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<?php while (have_rows('section_content')): the_row(); ?>
		<?php
		if (get_row_layout() == 'section_block'): ?>
			<h2 class="page_h2 animate fade-up show" data-delay="100">
				<?php the_sub_field('editor_title'); ?>
			</h2>
			<?php the_sub_field('editor_text'); ?>
		<?php endif; ?>
		<?php
		if (get_row_layout() == 'section_content_block'): ?>
			<div class="text_services_block">
				<div class="grid items-center">
					<h3 class="page_h3 animate fade-left show" data-delay="100">
						<?php the_sub_field('editor_title2'); ?>
					</h3>
					<?php the_sub_field('editor_text2'); ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
</section>