<section class="wrapper about_container" <?php if (get_sub_field('id_block')) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<div class="about_gesplast pt_100">
		<?php
		$is_reverse = get_sub_field('reverse_block');
		$reverse_class = $is_reverse ? 'flex-row-reverse' : '';
		?>
		<?php if (have_rows('asortment_content')):
			while (have_rows('asortment_content')): the_row(); ?>

				<div class="asortment_list flex-between gap_20 pt_60 items-center wrap_768 <?php echo $reverse_class; ?>">

					<div class="animate fade-in-simple show w-full md:w-1/2" data-delay="100">
						<?php if (have_rows('block_title')): while (have_rows('block_title')): the_row(); ?>
								<h3><?php the_sub_field('title_block'); ?></h3>
								<div class="editor_content">
									<?php the_sub_field('editor_block'); ?>
								</div>

								<?php if (get_sub_field('text_text')): ?>
									<p class="flex items-center gap_20 wrap_1024 pt_20">
										<?php the_sub_field('text_text'); ?>
										<span class="price"><?php the_sub_field('number_text'); ?></span>
									</p>
								<?php endif; ?>
						<?php endwhile;
						endif; ?>
					</div>

					<div class="animate fade-in-simple show w-full md:w-1/2" data-delay="100">
						<?php if ($img = get_sub_field('image_img')): ?>
							<picture>
								<img src="<?php echo esc_url($img['url']); ?>" alt="img" style="width: 100%; height: auto; display: block;">
							</picture>
						<?php endif; ?>
					</div>

				</div>

		<?php endwhile;
		endif; ?>
	</div>
</section>