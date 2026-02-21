<section class="wrapper info_container pt_100" id="info" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<div class="flex-between wrap_768">
		<?php
		if (have_rows('info_content')) :
			while (have_rows('info_content')) : the_row();
				if (get_row_layout() == 'info_block') :
					$title = get_sub_field('info_title');
					$text = get_sub_field('info_text');
					$btn_text = get_sub_field('info_button');
		?>
					<div class="dark_mode info_text flex column flex-center animate fade-left" data-delay="100">
						<?php if ($title) : ?>
							<h2><?php echo esc_html($title); ?></h2>
						<?php endif; ?>

						<?php if ($text) : ?>
							<div class="info_wysiwyg">
								<?php echo $text;
								?>
							</div>
						<?php endif; ?>

						<?php if ($btn_text) : ?>
							<a class="cta connect_cta fill_cta" href="#">
								<?php echo esc_html($btn_text); ?>
							</a>
						<?php endif; ?>
					</div>
				<?php
				elseif (get_row_layout() == 'info_image') :
					$img = get_sub_field('editor_img');
				?>
					<div class="image_info animate fade-right" data-delay="100">
						<?php if ($img) : ?>
							<picture>
								<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
							</picture>
						<?php endif; ?>
					</div>

				<?php endif; ?>

			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>