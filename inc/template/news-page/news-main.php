<?php
$news_title_page = get_field('news_page_title');
$button_text = get_field('news_sec_button');
?>

<h1 class="page_h1 animate fade-up show" data-delay="100">
	<?php echo esc_html($news_title_page ?: 'Новини компанії'); ?>
</h1>

<section class="news_cards">
	<div class="grid col_3 gap_20">
		<?php
		if (have_rows('news_page_list')):
			while (have_rows('news_page_list')) : the_row();
				$image    = get_sub_field('news_image');
				$category = get_sub_field('news_category');
				$date     = get_sub_field('news_date');
				$title    = get_sub_field('news_title');

				// Отримуємо посилання з об'єкта запису
				$post_object = get_sub_field('news_link');
				$link = $post_object ? get_permalink($post_object) : '#';
		?>
				<figure class="page_news animate fade-up" data-delay="100">
					<figcaption>
						<a class="mask_news" href="<?php echo esc_url($link); ?>"> </a>
						<picture>
							<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
						</picture>
						<div class="flex-between items-center news_text">
							<p><?php echo esc_html($category); ?></p>
							<p class="flex gap_10 items_center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
									<path d="M4.5 0.75V3.15" stroke="#ED6B27" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M10.9004 0.75V3.15" stroke="#ED6B27" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M0.900391 6.422H14.5004" stroke="#ED6B27" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M14.9 5.95001V12.75C14.9 15.15 13.7 16.75 10.9 16.75H4.5C1.7 16.75 0.5 15.15 0.5 12.75V5.95001C0.5 3.55001 1.7 1.95001 4.5 1.95001H10.9C13.7 1.95001 14.9 3.55001 14.9 5.95001Z" stroke="#ED6B27" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M10.6554 10.11H10.6626" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M10.6554 12.51H10.6626" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M7.69541 10.11H7.7026" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M7.69541 12.51H7.7026" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M4.73643 10.11H4.74361" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
									<path d="M4.73643 12.51H4.74361" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
								</svg>
								<span class="date"><?php echo esc_html($date); ?></span>
							</p>
						</div>
						<h2><?php echo esc_html($title); ?></h2>
					</figcaption>
				</figure>
		<?php
			endwhile;
		endif;
		?>
	</div>

	<div class="button_container flex flex-center wrap_768 gap_20 animate fade-up" data-delay="100">
		<a class="fill_cta cta" href="#" id="show-more-btn">
			<?php echo esc_html($button_text ?: 'Завантажити ще'); ?>
		</a>
	</div>
</section>