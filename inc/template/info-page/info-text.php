<section class="text_info_container wrapper">

	<h2 class="page_h2 animate fade-up" data-delay="100">
		<?php echo esc_html(get_field('solutions_title') ?: 'Рішення під ключ'); ?>
	</h2>

	<p class="animate fade-up" data-delay="120">
		<?php echo esc_html(get_field('solutions_description') ?: 'Для масштабних і технічно складних проєктів, де необхідно не лише забезпечити постачання обладнання, а й організувати усі процеси виробництва, ми пропонуємо широкий комплекс рішень та додаткових послуг.'); ?>
	</p>	

	<?php if (have_rows('solutions_list')) : ?>
		<?php while (have_rows('solutions_list')) : the_row();
			$title = get_sub_field('item_title');
			$img   = get_sub_field('item_img');
		?>

			<div class="text_block">

				<?php if ($title) : ?>
					<h3 class="page_h3 animate fade-up" data-delay="140">
						<?php echo esc_html($title); ?>
					</h3>
				<?php endif; ?>

				<div class="grid col_2 items-center">

					<div class="img_info animate fade-left" data-delay="100">
						<picture>
							<?php if ($img && is_array($img)) : ?>
								<img src="<?php echo esc_url($img['url']); ?>"
									alt="<?php echo esc_attr($img['alt'] ?: $title); ?>"
									loading="lazy">
							<?php else : ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.webp"
									alt="Geoplast"
									loading="lazy">
							<?php endif; ?>
						</picture>
					</div>

					<div class="description_info animate fade-right" data-delay="160">
						<?php if (have_rows('item_text')) : ?>
							<?php while (have_rows('item_text')) : the_row(); ?>
								<?php
								$bold  = get_sub_field('item_text_bold');
								$main  = get_sub_field('item_text_main');
								$extra = get_sub_field('item_text_extra');
								?>

								<?php if ($bold) : ?>
									<p class="text-bold"><b><?php echo wp_kses_post($bold); ?></b></p>
								<?php endif; ?>

								<?php if ($main) : ?>
									<p class="text-main"><?php echo wp_kses_post($main); ?></p>
								<?php endif; ?>

								<?php if ($extra) : ?>
									<p class="text-extra"><?php echo wp_kses_post($extra); ?></p>
								<?php endif; ?>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>

				</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>

</section>