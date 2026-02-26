<section class="info_product_container">
	<div class="wrapper">
		<div class="description-info">

			<?php // Вкладений цикл для 'content_filled' 
			?>
			<?php if (have_rows('content_filled')) : ?>
				<?php while (have_rows('content_filled')) : the_row(); ?>

					<?php if (get_row_layout() == 'main_block') : ?>
						<div class="info-item animate fade-left show">

							<a class="readmore flex-between items-center" href="#">
								<div>
									<p class="active_span"><?php the_sub_field('block_text'); ?></p>
									<h2 class="head_span"><?php the_sub_field('block_title'); ?></h2>
								</div>
								<span class="svg_btn">
									<svg xmlns="http://www.w3.org/2000/svg" width="42" height="23" viewBox="0 0 42 23" fill="none">
										<path d="M1 1L21 21L41 1" stroke="#BDBDBD" stroke-width="2" stroke-linecap="round"></path>
									</svg>
								</span>
							</a>

							<div class="description-more">
								<div class="grid col_2 gap_100 items-center">
									<div class="prod_info_text">
										<?php the_sub_field('contect_text'); ?>
									</div>

									<?php $img = get_sub_field('content_img'); ?>
									<?php if ($img) : ?>
										<picture>
											<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
										</picture>
									<?php endif; ?>
								</div>

								<?php if (have_rows('section_repeater')) : ?>
									<div class="grid col_3 gap_20 adv_services">
										<?php while (have_rows('section_repeater')) : the_row(); ?>
											<div class="advant_block animate fade-left" data-delay="400">
												<h3><?php the_sub_field('editor_title_card'); ?></h3>
												<?php the_sub_field('editor_text_card'); ?>
											</div>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							</div>

						</div>
					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>