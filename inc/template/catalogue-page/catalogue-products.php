<?php
// Основні поля
$products_title = get_field('catalogue_sec_title');

$p_btn1_text = get_field('catalogue_button_text_1');
$p_btn1_link = get_field('catalogue_button_link_1'); // URL

$p_btn2_text = get_field('catalogue_button_text_2');
$p_btn2_link_obj = get_field('catalogue_button_link_2'); // Post Object

$p_btn2_url = home_url('/catalogue');

// Кнопка 2 (Post Object -> URL)
if ($p_btn2_link_obj && is_object($p_btn2_link_obj)) {
	$p_btn2_url = get_permalink($p_btn2_link_obj->ID);
}
?>

<section class="products_section wrapper pt_100" id="products">
	<?php if ($products_title): ?>
		<h2 class="animate fade-up" data-delay="100"><?php echo esc_html($products_title); ?></h2>
	<?php endif; ?>

	<?php if (have_rows('catalogue_sec_list')): ?>
		<div class="grid col_2 gap_20">

			<?php
			$i = 0;
			$auto_delays = [100, 300, 500, 700, 900, 1100];

			while (have_rows('catalogue_sec_list')): the_row();

				$img_data = get_sub_field('catalogue_sec_image'); // image
				$prefix   = get_sub_field('first_catalogue_item');
				$suffix   = get_sub_field('second_catalogue_item');
				$desc     = get_sub_field('catalogue_description');

				$link_obj = get_sub_field('catalogue_link'); // Post Object

				/* IMAGE */
				$img_url = '';
				if (is_array($img_data) && isset($img_data['url'])) {
					$img_url = $img_data['url']; // array
				} elseif (is_numeric($img_data)) {
					$img_url = wp_get_attachment_url($img_data); // ID
				} elseif (is_string($img_data)) {
					$img_url = $img_data; // URL
				}

				/* LINK (Post Object -> URL) */
				$link = '';
				if ($link_obj && is_object($link_obj)) {
					$link = get_permalink($link_obj->ID);
				}

				$delay = $auto_delays[$i] ?? ($i * 200);
				$i++;
			?>
				<figure class="animate fade-up" data-delay="<?php echo esc_attr($delay); ?>">
					<figcaption>

						<?php if ($link): ?>
							<a class="mask_prod" href="<?php echo esc_url($link); ?>"></a>
						<?php endif; ?>

						<div class="product">
							<picture>
								<?php if ($img_url): ?>
									<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr(trim($prefix . ' ' . $suffix)); ?>">
								<?php endif; ?>
							</picture>

							<div class="flex flex-center gap_20 items-center wrap_1024">
								<p class="model flex flex-center items-center gap_10 dark_mode">
									<?php if ($prefix): ?>
										<span><?php echo esc_html($prefix); ?> </span>
									<?php endif; ?>

									<?php if ($prefix && $suffix): ?>
										<svg width="10" height="10" viewBox="0 0 10 10" fill="none">
											<circle cx="5" cy="5" r="5" fill="#ED6B27"></circle>
										</svg>
									<?php endif; ?>

									<?php if ($suffix): ?>
										<span><?php echo esc_html($suffix); ?></span>
									<?php endif; ?>
								</p>

								<?php if ($desc): ?>
									<h4><?php echo esc_html($desc); ?></h4>
								<?php endif; ?>
							</div>
						</div>

					</figcaption>
				</figure>
			<?php endwhile; ?>

		</div>
	<?php endif; ?>

	<div class="button_container flex flex-center wrap_768 gap_20 pt_60 animate fade-up" data-delay="200">

		<?php if ($p_btn1_text) : ?>
			<a class="cta connect_cta fill_cta"
				href="<?php echo $p_btn1_link ? esc_url($p_btn1_link) : '#'; ?>">
				<?php echo esc_html($p_btn1_text); ?>
			</a>
		<?php endif; ?>

		<?php if ($p_btn2_text) : ?>
			<a class="cta transparent_cta dark_text"
				href="<?php echo esc_url($p_btn2_url); ?>">
				<?php echo esc_html($p_btn2_text); ?>
			</a>
		<?php endif; ?>

	</div>
</section>