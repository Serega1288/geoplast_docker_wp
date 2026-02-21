<section class="text_info_container wrapper" <?php echo get_block_options(); ?> <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<?php if (have_rows('section_content')): ?>
		<?php
		while (have_rows('section_content')): the_row(); ?>
			<?php 
			if (get_row_layout() == 'block_title_text'): ?>
				<h2 class="page_h2 animate fade-up show" data-delay="100">
					<?php the_sub_field('editor_title'); ?>
				</h2>
				<p class="animate fade-up show" data-delay="120">
					<?php the_sub_field('editor_text'); ?>
				</p>
			<?php
			elseif (get_row_layout() == 'content_block'): ?>
				<div class="text_block">
					<h3 class="page_h3 animate fade-up show" data-delay="140">
						<?php the_sub_field('editor_title_block'); ?>
					</h3>
					<div class="grid col_2 items-center">
						<div class="img_info animate fade-left show" data-delay="100">
							<picture>
								<?php
								$image = get_sub_field('editor_img');
								if ($image): ?>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
								<?php endif; ?>
							</picture>
						</div>
						<div class="description_info animate fade-right show" data-delay="100">
							<?php the_sub_field('editor_text_block'); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>
</section>