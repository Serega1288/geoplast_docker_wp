<section class="news wrapper pt_100" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<?php
	$dynamic_title = '';
	$dynamic_button = null;
	if (have_rows('block_news')) :
		while (have_rows('block_news')) : the_row();
			if (get_row_layout() == 'title_news') :
				$dynamic_title = get_sub_field('editor_title');
			endif;
			if (get_row_layout() == 'button_news') :
				$dynamic_button = get_sub_field('editor_button');
			endif;

		endwhile;
	endif;
	?>
	<h2 class="animate fade-up show" data-delay="100">
		<?php echo $dynamic_title ? esc_html($dynamic_title) : 'Останні новини'; ?>
	</h2>
	<article class="grid col_3 gap_20">
		<?php
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 3,
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		$news_query = new WP_Query($args);
		if ($news_query->have_posts()) :
			$count = 0;
			while ($news_query->have_posts()) : $news_query->the_post();
				$count++;
				$animation = ($count == 1) ? 'fade-left' : (($count == 3) ? 'fade-right' : 'fade-up');
		?>
				<figure class="new_card animate <?php echo $animation; ?> show" data-delay="100">
					<figcaption>
						<a href="<?php the_permalink(); ?>">
							<picture>
								<?php if (has_post_thumbnail()) : the_post_thumbnail('large');
								else : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/img/new.png" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</picture>
						</a>
						<div class="flex gap_20 time_new">
							<time class="dark_mode flex flex-center items-center" datetime="<?php echo get_the_date('Y-m-d'); ?>">
								<?php echo get_the_date('d.m.Y'); ?>
							</time>
							<p class="flag">новини</p>
						</div>
					</figcaption>
					<h4><a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;"><?php the_title(); ?></a></h4>
					<p><?php echo wp_trim_words(get_the_excerpt(), 45, '...'); ?></p>
				</figure>
			<?php endwhile;
			wp_reset_postdata(); ?>
		<?php endif; ?>
	</article>
	<div class="button_container flex flex-center gap_20 pt_60">
		<?php if ($dynamic_button) : ?>
			<a class="cta fill_cta" href="<?php echo esc_url($dynamic_button['url']); ?>" target="<?php echo esc_attr($dynamic_button['target'] ?: '_self'); ?>">
				<?php echo esc_html($dynamic_button['title']); ?>
			</a>
		<?php else : ?>
			<a class="cta fill_cta" href="<?php echo get_post_type_archive_link('post'); ?>">Усі новини</a>
		<?php endif; ?>
	</div>
</section>