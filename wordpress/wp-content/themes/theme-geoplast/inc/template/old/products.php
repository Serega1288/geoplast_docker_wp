<?php

$products_title = get_field('products_title');
$p_btn1_text    = get_field('product_button_text_1');
$p_btn1_link    = get_field('product_button_link_1');
$p_btn2_text    = get_field('product_button_text_2');
$p_btn2_link_obj = get_field('product_button_link_2');

$p_btn2_url = '#';
if ($p_btn2_link_obj) {
	$p_btn2_url = get_permalink($p_btn2_link_obj);
}
?>

<section class="products_section wrapper pt_100 " id="products" style="overflow-x: hidden;">
	<?php if ($products_title): ?>
		<h2 class="page_h1 animate fade-up show"
			data-delay="100"
			style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal; line-height: 1.2; display: block; width: 100%;">
			<?php echo esc_html($products_title); ?>
		</h2>
	<?php endif; ?>

	<?php if (have_rows('products_list', $page_id)): ?>
		<div class="grid col_2 gap_20">
			<?php
			$i = 0;
			$auto_delays = [100, 300, 500, 700, 900, 1100];

			while (have_rows('products_list', $page_id)): the_row();
				$img_data = get_sub_field('prod_img');
				$prefix   = get_sub_field('prod_name_prefix');
				$suffix   = get_sub_field('prod_name_suffix');
				$desc     = get_sub_field('prod_description');
				$link_obj = get_sub_field('prod_link');

				$img_url = is_array($img_data) ? $img_data['url'] : $img_data;
				$link = $link_obj ? get_permalink($link_obj) : '#';

				$delay = $auto_delays[$i] ?? ($i * 200);
				$i++;
			?>
				<figure class="animate fade-up show" data-delay="<?php echo esc_attr($delay); ?>" style="width: 100%; min-width: 0;">
					<figcaption style="width: 100%; display: flex; flex-direction: column; height: 100%;">
						<a class="mask_prod" href="<?php echo esc_url($link); ?>"></a>
						<div class="product" style="width: 100%; display: flex; flex-direction: column; height: 100%;">
							<picture style="flex: 1 1 auto;">
								<?php if ($img_url): ?>
									<img src="<?php echo esc_url($img_url); ?>" alt="" style="flex:1 1 auto;max-width: 100%; height: auto; display: block;">
								<?php endif; ?>
							</picture>

							<div class="flex flex-center gap_20 items-center wrap_1024"
								style="display: flex; flex-wrap: nowrap; align-items: center; justify-content: flex-start; width: 100%; gap: 10px; padding-top: 15px;">

								<p class="model flex flex-center items-center gap_10 dark_mode"
									style="flex-shrink: 0; white-space: nowrap; display: flex; margin: 0;">
									<?php if ($prefix): ?><span><?php echo esc_html($prefix); ?></span><?php endif; ?>
									<?php if ($prefix && $suffix): ?>
										<svg width="10" height="10" viewBox="0 0 10 10" fill="none" style="flex-shrink: 0;">
											<circle cx="5" cy="5" r="5" fill="#ED6B27"></circle>
										</svg>
									<?php endif; ?>
									<?php if ($suffix): ?><span><?php echo esc_html($suffix); ?></span><?php endif; ?>
								</p>

								<?php if ($desc): ?>
									<h4 style="margin: 0; text-align: left; line-height: 1.2; flex-grow: 1; min-width: 0; overflow-wrap: break-word; font-size: 14px;">
										<?php echo esc_html($desc); ?>
									</h4>
								<?php endif; ?>
							</div>
						</div>
					</figcaption>
				</figure>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<div class="button_container flex flex-center wrap_768 gap_20 pt_60 animate fade-up show" data-delay="200" style="width: 100%; flex-wrap: wrap;">
		<?php if ($p_btn1_text) : ?>
			<a class="cta connect_cta fill_cta" href="<?php echo $p_btn1_link ? esc_url($p_btn1_link) : '#'; ?>">
				<?php echo esc_html($p_btn1_text); ?>
			</a>
		<?php endif; ?>
		<?php if ($p_btn2_text) : ?>
			<a class="cta transparent_cta dark_text" href="<?php echo esc_url($p_btn2_url); ?>">
				<?php echo esc_html($p_btn2_text); ?>
			</a>
		<?php endif; ?>
	</div>
</section>