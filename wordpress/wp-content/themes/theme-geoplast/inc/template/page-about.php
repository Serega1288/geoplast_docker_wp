<section class="wrapper about_container" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>	
	<div class="about_gesplast pt_100">
		<?php
		if (have_rows('content_full')):
			$delay = 200;
			while (have_rows('content_full')): the_row(); ?>
				<?php
				?>
				<?php if (get_row_layout() == 'full_title'): ?>
					<h2><?php the_sub_field('title_editor'); ?></h2> <?php endif; ?>
				<?php
				?>
				<?php if (get_row_layout() == 'subtitle_full'): ?>
					<h3><?php the_sub_field('sub_text_full'); ?></h3> <?php endif; ?>
				<?php
				?>
				<?php if (get_row_layout() == 'new_p'): ?>
					<div class="animate fade-up show" data-delay="<?php echo $delay; ?>">
						<?php the_sub_field('editor_p'); ?> </div>
					<?php $delay += 50; ?>
				<?php endif; ?>
				<?php
				?>
				<?php if (get_row_layout() == 'image_full'): ?>
					<?php
					$image = get_sub_field('image_img');
					if (!empty($image)): ?>
						<div class="img_about">
							<picture>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
							</picture>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>