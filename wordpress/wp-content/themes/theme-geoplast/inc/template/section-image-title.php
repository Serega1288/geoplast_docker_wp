<section class="main_container" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<div class="wrapper">
		<div class="grid col_2 items-center animate fade-up show" data-delay="100">

			<?php if (have_rows('section_content')): ?>
				<?php while (have_rows('section_content')): the_row(); ?>

					<?php
					if (get_row_layout() == 'section_title'):
						$title = get_sub_field('editor_title');
					?>
						<h1 class="page_h1"><?php echo esc_html($title); ?></h1>

						<?php
					elseif (get_row_layout() == 'section_image'):
						$image = get_sub_field('editor_image');
						if ($image):
						?>
							<picture>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
							</picture>
					<?php
						endif;
					endif;
					?>

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
	</div>
</section>