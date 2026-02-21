<section class="info_product_container">
	<div class="wrapper">
		<div class="description-info">

			<?php
			// 1. Головний репітер акордеонів (product_info_accordion)
			if (have_rows('product_info_accordion')):
				$delay = 200;
				while (have_rows('product_info_accordion')) : the_row();

					// Отримуємо основні дані
					$sub_title         = get_sub_field('sub_title');
					$main_title        = get_sub_field('main_title');
					$main_description  = get_sub_field('main_description');
					$text_main_product = get_sub_field('text_main_product');
					$image             = get_sub_field('main_image');
			?>

					<div class="info-item animate fade-left" data-delay="<?php echo $delay; ?>">
						<a class="readmore flex-between items-center" href="#">
							<div>
								<p class="active_span"><?php echo esc_html($sub_title); ?></p>
								<h2 class="head_span"><?php echo esc_html($main_title); ?></h2>
							</div>
							<span class="svg_btn">
								<svg xmlns="http://www.w3.org/2000/svg" width="42rem" height="23rem" viewBox="0 0 42 23" fill="none">
									<path d="M1 1L21 21L41 1" stroke="#BDBDBD" stroke-width="2" stroke-linecap="round"></path>
								</svg>
							</span>
						</a>

						<div class="description-more">
							<div class="grid col_2 gap_100 items-center">
								<div class="prod_info_text">
									<?php
									if ($main_description) echo wpautop($main_description);
									if ($text_main_product) echo wpautop($text_main_product);

									// Список параграфів (репітер subtext_main_product)
									if (have_rows('subtext_main_product')):
										while (have_rows('subtext_main_product')) : the_row();
											$sub_line = get_sub_field('subtext_main_product');
											if ($sub_line) echo wpautop($sub_line);
										endwhile;
									endif;
									?>
								</div>

								<?php if ($image): ?>
									<picture>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
									</picture>
								<?php endif; ?>
							</div>

							<div class="grid col_3 gap_20 adv_services flex-center">
								<?php
								// Виводимо ВСІ картки з одного репітера (features_repeater)
								if (have_rows('features_repeater')):
									while (have_rows('features_repeater')) : the_row();
										$f_title = get_sub_field('feature_title'); //
										$f_text  = get_sub_field('feature_text');  //
								?>
										<div class="advant_block animate fade-left" data-delay="400">
											<h3><?php echo esc_html($f_title); ?></h3>
											<p><?php echo esc_html($f_text); ?></p>
										</div>
								<?php
									endwhile;
								endif;
								?>
							</div>
						</div>
					</div>

			<?php
					$delay += 200;
				endwhile;
			endif;
			?>

		</div>
	</div>
</section>