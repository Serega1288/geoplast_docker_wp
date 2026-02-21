<?php

$arrow_type  = get_field('arrow_type');
$bg_color    = get_field('arrow_bg_color') ?: '#ED6B27';
$icon_color  = get_field('arrow_icon_color') ?: '#0F283D';
$prev_custom = get_field('custom_prev_icon');
$next_custom = get_field('custom_next_icon');

if (is_array($prev_custom)) $prev_custom = $prev_custom['url'];
if (is_array($next_custom)) $next_custom = $next_custom['url'];
?>

<section class="slider_section animate fade-up" data-delay="100">
	<div class="wrapper">
		<div class="slider_block_main">
			<div class="product_slider slider" id="mySlider">

				<div class="slider_container">
					<div class="slide_group">
						<?php if (have_rows('slider_items')): ?>
							<?php while (have_rows('slider_items')): the_row();
								$slide_img = get_sub_field('slide_image');
								$img_url = is_array($slide_img) ? $slide_img['url'] : $slide_img;

								if ($img_url): ?>
									<picture class="slide_main">
										<img src="<?php echo esc_url($img_url); ?>" alt="Slide">
									</picture>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php else: ?>
							<p style="color:red; text-align:center;">Додайте слайди в адмінці (поле slider_items)</p>
						<?php endif; ?>
					</div>
				</div>

				<a class="prev" href="#" style="display: flex; align-items: center; justify-content: center;">
					<?php if ($arrow_type == 'custom' && $prev_custom): ?>
						<img src="<?php echo esc_url($prev_custom); ?>" alt="prev">
					<?php else: ?>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50" height="50">
							<circle cx="25" cy="25" r="25" fill="<?php echo $bg_color; ?>"></circle>
							<path d="M29 15L19 25L29 35" stroke="<?php echo $icon_color; ?>" stroke-width="3" stroke-linecap="round" fill="none"></path>
						</svg>
					<?php endif; ?>
				</a>

				<a class="next" href="#" style="display: flex; align-items: center; justify-content: center;">
					<?php if ($arrow_type == 'custom' && $next_custom): ?>
						<img src="<?php echo esc_url($next_custom); ?>" alt="next">
					<?php else: ?>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50" height="50">
							<circle cx="25" cy="25" r="25" fill="<?php echo $bg_color; ?>"></circle>
							<path d="M21 15L31 25L21 35" stroke="<?php echo $icon_color; ?>" stroke-width="3" stroke-linecap="round" fill="none"></path>
						</svg>
					<?php endif; ?>
				</a>

				<div class="slide_buttons flex flex-center gap_20">
					<?php
					$slides_count = get_field('slider_items');
					if ($slides_count):
						foreach ($slides_count as $index => $slide): ?>
							<button class="slide_button <?php echo ($index === 0) ? 'active' : ''; ?>"
								style="--active-dot: <?php echo $bg_color; ?>;">
							</button>
					<?php endforeach;
					endif; ?>
				</div>

			</div>
		</div>
	</div>
</section>