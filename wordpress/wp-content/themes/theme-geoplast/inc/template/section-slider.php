<?php
// Отримуємо дані з полів
$img1 = get_sub_field('slide_img_1');
$img2 = get_sub_field('slide_img_2');
$img3 = get_sub_field('slide_img_3');

// Масив для зручного перебору в циклі
$slides = [$img1, $img2, $img3];
?>

<section class="slider_section animate fade-up show" data-delay="100">
	<div class="wrapper">
		<div class="slider_block_main">
			<div class="product_slider slider" id="mySlider">
				<div class="slider_container">
					<div class="slide_group">

						<?php foreach ($slides as $image): ?>
							<?php if ($image): ?>
								<picture class="slide_main">
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
								</picture>
							<?php endif; ?>
						<?php endforeach; ?>

					</div>
				</div>

				<a class="prev disabled" href="#">
					<svg viewBox="0 0 50 50" fill="none">
						<circle cx="25" cy="25" r="25" fill="#ED6B27" />
						<path d="M29 15L19 25L29 35" stroke="#0F283D" stroke-width="3" stroke-linecap="round" />
					</svg>
				</a>
				<a class="next" href="#">
					<svg viewBox="0 0 50 50" fill="none">
						<circle cx="25" cy="25" r="25" fill="#ED6B27" />
						<path d="M21 15L31 25L21 35" stroke="#0F283D" stroke-width="3" stroke-linecap="round" />
					</svg>
				</a>

				<div class="slide_buttons flex flex-center gap_20">
					<button class="slide_button active"></button>
					<button class="slide_button"></button>
					<button class="slide_button"></button>
				</div>
			</div>
		</div>
	</div>
</section>