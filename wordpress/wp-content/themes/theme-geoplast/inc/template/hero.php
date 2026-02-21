<section class="main_section" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<div class="dark_mask">
		<div class="mask"></div>
		<picture>
			<?php $h_bg = get_sub_field('hero_bg'); ?>
			<img src="<?php echo $h_bg ? esc_url($h_bg['url']) : get_template_directory_uri() . '/assets/img/main_bg.jpg'; ?>" alt="bg">
		</picture>
		<video autoplay loop muted playsinline>
			<?php $h_video = get_sub_field('hero_video'); ?>
			<source src="<?php echo $h_video ? esc_url($h_video['url']) : get_template_directory_uri() . '/assets/video/video.mp4'; ?>" type="video/mp4">
		</video>
	</div>
	<div class="main_text flex column items-center flex-center tac wrapper">
		<?php if (have_rows('content')) : ?>
			<?php while (have_rows('content')) : the_row(); ?>

				<?php 
				?>

				<?php if (get_row_layout() == 'title') : ?>
					<h1 class="animate fade-up">
						<?php the_sub_field('herosection_title'); ?>
					</h1>

				<?php elseif (get_row_layout() == 'subtitle') : ?>
					<div class="animate fade-up" data-delay="200">
						<?php the_sub_field('editor'); ?>
					</div>

				<?php elseif (get_row_layout() == 'button') : ?>
					<div class="button_container flex flex-center wrap_768 gap_20 animate fade-up" data-delay="400">
						<?php $b = 0;
						while (have_rows('list_button')) : the_row();
							$b++;
							$link = get_sub_field('button');
							$pop_title = get_sub_field('but1');
							$btn_class = ($b == 1) ? 'fill_cta' : 'transparent_cta';

							if ($link) : ?>
								<a class="cta <?php echo $btn_class; ?>"
									href="<?php echo esc_url($link['url']); ?>"
									target="<?php echo esc_attr($link['target']); ?>">
									<?php echo esc_html($link['title']); ?>
								</a>
							<?php elseif ($pop_title) : ?>
								<a class="cta connect_cta <?php echo $btn_class; ?>" href="javascript:void(0);">
									<?php echo esc_html($pop_title); ?>
								</a>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>