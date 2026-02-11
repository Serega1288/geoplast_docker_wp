<?php
$title = get_field('news_title');

$n_btn_text = get_field('news_button_text');
$n_btn_link_obj = get_field('news_button_link');


$n_btn_url = home_url('/news');
if ($n_btn_link_obj) {
	$n_btn_url = get_permalink($n_btn_link_obj->ID);
}
?>

<section class="news wrapper pt_100" id="news">
	<?php if ($title): ?>
		<h2 class="animate fade-up" data-delay="100"><?php echo esc_html($title); ?></h2>
	<?php endif; ?>

	<?php if (have_rows('news_list')): ?>
		<article class="grid col_3 gap_20">

			<?php
			$i = 0;
			$animations = ['fade-left', 'fade-up', 'fade-right'];

			while (have_rows('news_list')): the_row();
				$img     = get_sub_field('news_img');
				$date    = get_sub_field('news_date');
				$tag     = get_sub_field('news_tag');
				$subject = get_sub_field('news_subject');
				$excerpt = get_sub_field('news_excerpt');
				$link    = get_sub_field('news_link');

				$anim_class = $animations[$i % 3];
				$delay = 100 + (($i % 3) * 200);
				$i++;
			?>
				<figure class="new_card animate <?php echo esc_attr($anim_class); ?>" data-delay="<?php echo esc_attr($delay); ?>">
					<figcaption>
						<picture>
							<?php if ($img): ?>
								<img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($subject); ?>">
							<?php endif; ?>
						</picture>
						<div class="flex gap_20 time_new">
							<?php if ($date): ?>
								<time class="dark_mode flex flex-center items-center" datetime="<?php echo esc_attr($date); ?>">
									<?php echo esc_html($date); ?>
								</time>
							<?php endif; ?>
							<?php if ($tag): ?>
								<p class="flag"><?php echo esc_html($tag); ?></p>
							<?php endif; ?>
						</div>
					</figcaption>

					<h4><?php echo esc_html($subject); ?></h4>
					<p><?php echo esc_html($excerpt); ?></p>

					<?php if ($link): ?>
						<a href="<?php echo esc_url($link); ?>" class="stretched-link"></a>
					<?php endif; ?>
				</figure>
			<?php endwhile; ?>

		</article>
	<?php endif; ?>

	<?php if ($n_btn_text) : ?>
		<div class="button_container flex flex-center gap_20 pt_60 animate fade-up" data-delay="200">
			<a class="cta fill_cta" href="<?php echo esc_url($n_btn_url); ?>">
				<?php echo esc_html($n_btn_text); ?>
			</a>
		</div>
	<?php endif; ?>
</section>