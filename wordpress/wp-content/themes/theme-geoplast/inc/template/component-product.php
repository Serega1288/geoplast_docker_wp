<section class="products_section wrapper pt_100" id="<?php echo get_sub_field('id_block') ?: 'products'; ?>">
	<?php
	$choise = get_sub_field('choise_block');
	$h2_title = get_sub_field('product_editor') ?: get_the_title();
	$current_id = get_the_ID();
	?>
	<h2 class="animate fade-up show" data-delay="100">
		<?php echo esc_html($h2_title); ?>
	</h2>
	<div class="grid col_2 gap_20">
		<?php
		if ($choise === '2') :
			$query = new WP_Query(array(
				'post_type'      => 'page',
				'post_parent'    => $current_id,
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC'
			));
			if ($query->have_posts()) :
				while ($query->have_posts()) : $query->the_post();
					$img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
					if ($img_url) : ?>
						<figure>
							<figcaption>
								<a class="mask_prod" href="<?php the_permalink(); ?>"></a>
								<div class="product">
									<picture>
										<img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">
									</picture>
									<div class="flex flex-center gap_20 items-center wrap_1024">
										<p class="model flex flex-center items-center gap_10 dark_mode">
											<span><?php the_title(); ?></span>
										</p>
										<h4>Детальніше</h4>
									</div>
								</div>
							</figcaption>
						</figure>
					<?php endif;
				endwhile;
				wp_reset_postdata();
			endif;
		else :
			if (have_rows('product_block')) :
				while (have_rows('product_block')) : the_row();
					$img = get_sub_field('block_image');
					$name = get_sub_field('name_model');
					$prefix = get_sub_field('model_prefix');
					$link_data = get_sub_field('link_block');
					if ($img) : ?>
						<figure>
							<figcaption>
								<a class="mask_prod" href="<?php echo esc_url($link_data['url'] ?? '#'); ?>"></a>
								<div class="product">
									<picture>
										<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
									</picture>
									<div class="flex flex-center gap_20 items-center wrap_1024">
										<p class="model flex flex-center items-center gap_10 dark_mode">
											<span><?php echo esc_html($name); ?></span>
											<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
												<circle cx="5" cy="5" r="5" fill="#ED6B27"></circle>
											</svg>
											<span><?php echo esc_html($prefix); ?></span>
										</p>
										<h4>
											<?php
											if (!empty($link_data['title'])) {
												echo esc_html($link_data['title']);
											} else {
												echo 'Детальніше';
											}
											?>
										</h4>
									</div>
								</div>
							</figcaption>
						</figure>
		<?php endif;
				endwhile;
			endif;
		endif; ?>
	</div>
</section>