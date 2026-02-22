<section class="products_section wrapper pt_100"
	id="<?php echo get_sub_field('id_block') ?: 'products'; ?>">

	<?php if (have_rows('product_block')) : ?>
		<?php
		while (have_rows('product_block')) : the_row();
			if (get_row_layout() == 'product_title') : ?>
				<h2 class="animate fade-up show" data-delay="100">
					<?php the_sub_field('product_editor'); ?>
				</h2>
		<?php
			endif;
		endwhile;
		?>
		<div class="grid col_2 gap_20">
			<?php
			while (have_rows('product_block')) : the_row();
				if (get_row_layout() == 'block_product') :
					$link = get_sub_field('link_block');
					$url   = $link['url'] ?? '#';
					$title = $link['title'] ?? '';
					$img   = get_sub_field('block_image');
			?>
					<figure>
						<figcaption>
							<a class="mask_prod" href="<?php echo esc_url($url); ?>"></a>
							<div class="product">
								<picture>
									<?php if ($img) : ?>
										<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
									<?php endif; ?>
								</picture>
								<div class="flex flex-center gap_20 items-center wrap_1024">
									<p class="model flex flex-center items-center gap_10 dark_mode">
										<span><?php the_sub_field('model_prefix'); ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
											<circle cx="5" cy="5" r="5" fill="#ED6B27"></circle>
										</svg>
										<span><?php the_sub_field('name_model'); ?></span>
									</p>

									<?php if ($title) : ?>
										<h4><?php echo esc_html($title); ?></h4>
									<?php endif; ?>
								</div>
							</div>
						</figcaption>
					</figure>
			<?php
				endif;
			endwhile;
			?>
		</div>
	<?php endif; ?>
</section>