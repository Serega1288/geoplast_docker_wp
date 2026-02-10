<?php
$sub_title    = get_field('sub_title');
$main_title   = get_field('main_product_title');
$image        = get_field('product_image');
$button_cost  = get_field('button_cost');
$button_page  = get_field('button_broshur');
$bottom_title = get_field('bottom_title');

$dot_html = '<span class="orange-dot"></span>';
?>

<style>
	.orange-dot {
		display: inline-block;
		width: 10px;
		height: 10px;
		background-color: #ED6B27;
		border-radius: 50%;
		margin: 0 0.25em;
		vertical-align: middle;
		position: relative;
		top: -0.07em;
	}

	.page_h2.dot_svg {
		display: block;
		line-height: 1.3;
	}
</style>

<section class="product_main_section">
	<div class="main_product_block wrapper animate fade-up" data-delay="100">
		<?php if ($sub_title): ?>
			<p><?php echo esc_html($sub_title); ?></p>
		<?php endif; ?>

		<?php if ($main_title): ?>
			<h1 class="page_h2 dot_svg">
				<?php
				$title = trim($main_title);
				if (str_ends_with($title, ' T')) {
					echo substr($title, 0, -1) . $dot_html . 'T';
				} else {
					echo esc_html($title) . $dot_html;
				}
				?>
			</h1>
		<?php endif; ?>
	</div>

	<div class="description_product items-center gap_100">
		<div class="main_image animate fade-right" data-delay="100">
			<?php if ($image): ?>
				<picture>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
				</picture>
			<?php endif; ?>
		</div>

		<div class="wrapper items-center animate fade-left" data-delay="100">
			<div class="text_descr">
				<?php if (have_rows('product_specs')): ?>
					<div class="grid col_2_product col_2 items-center gap_30">
						<?php while (have_rows('product_specs')): the_row(); ?>
							<p class="text_product"><?php the_sub_field('spec_label'); ?></p>
							<p class="descr">
								<?php the_sub_field('spec_value'); ?>
								<?php
								// Виводимо "Відстань", якщо воно заповнене
								$dist = get_sub_field('spec_distans');
								if ($dist) echo ' — ' . esc_html($dist);
								?>
							</p>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<div class="button_container flex flex-center wrap_768 gap_20 animate fade-up" data-delay="100">
					<?php if ($button_cost): ?>
						<a class="cta connect_cta fill_cta" href="#">
							<?php echo esc_html($button_cost); ?>
						</a>
					<?php endif; ?>

					<?php if ($button_page): ?>
						<a class="cta transparent_cta" href="<?php echo get_permalink($button_page->ID); ?>">
							Скачати брошуру
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php if ($bottom_title): ?>
		<div class="wrapper animate fade-up" data-delay="100">
			<h2 class="page_h2 dot_svg">
				<?php
				$text = trim($bottom_title);


				if (strpos($text, ' NEO T') !== false) {
					echo str_replace(' NEO T', ' NEO <span class="orange-dot"></span> T', $text);
				} else {
					echo esc_html($text) . ' <span class="orange-dot"></span>';
				}
				?>
			</h2>
		</div>
	<?php endif; ?>
</section>