<section class="product_main_section">
	<?php if (have_rows('content_full')) :
	?>
		<?php while (have_rows('content_full')) : the_row(); ?>
			<?php
			if (get_row_layout() == 'product_main_section') :
				$top_text = get_sub_field('top_text');
				$main_title = get_sub_field('main_title');
				$model_name = get_sub_field('model_name');
			?>
				<div class="main_product_block wrapper animate fade-up show" data-delay="100">
					<?php if ($top_text) : ?>
						<div class="top_subtitle"><?php echo $top_text; ?></div>
					<?php endif; ?>
					<h1 class="page_h2 dot_svg">
						<?php echo esc_html($main_title); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
							<circle cx="5" cy="5" r="5" fill="#ED6B27"></circle>
						</svg>
						<?php echo esc_html($model_name); ?>
					</h1>
				</div>
			<?php endif; ?>
			<?php
			if (get_row_layout() == 'setting_content') :
				$main_img = get_sub_field('головне_зображення');
			?>
				<div class="description_product items-center gap_100">
					<div class="main_image animate fade-right show" data-delay="100">
						<picture>
							<?php if ($main_img) : ?>
								<img src="<?php echo esc_url($main_img['url']); ?>" alt="<?php echo esc_attr($main_img['alt']); ?>">
							<?php endif; ?>
						</picture>
					</div>
					<div class="wrapper items-center animate fade-left show" data-delay="100">
						<div class="text_descr">
							<div class="grid col_2_product col_2 items-center gap_30">
								<?php if (have_rows('repeater_block')) :
								?>
									<?php while (have_rows('repeater_block')) : the_row();
										$label = get_sub_field('label');
										$value = get_sub_field('value');
									?>
										<p class="text_product"><?php echo esc_html($label); ?></p>
										<p class="descr"><?php echo esc_html($value); ?></p>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
							<div class="button_container flex flex-center wrap_768 gap_20 animate fade-up show" data-delay="100">
								<a class="cta connect_cta fill_cta" href="#">Дізнатися вартість</a>
								<a class="cta transparent_cta" href="#">Скачати брошуру</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php
			if (get_row_layout() == 'block_discription') :
				$full_text = get_sub_field('bottom_text_full');
			?>
				<div class="wrapper animate fade-up show" data-delay="100">
					<h2 class="page_h2 dot_svg">
						<?php
						if ($full_text) {
							// Видаляємо теги <p>, які WYSIWYG додає автоматично
							$clean_text = strip_tags($full_text);
							$dot_svg = ' <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><circle cx="5" cy="5" r="5" fill="#ED6B27"></circle></svg> ';
							if (strpos($clean_text, ':') !== false) {
								$parts = explode(':', $clean_text);
								echo trim($parts[0]) . $dot_svg . '<span class="tiny_text">' . trim($parts[1]) . '</span>';
							} else {
								echo $clean_text;
							}
						}
						?>
					</h2>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>
	<?php endif; ?>
</section>