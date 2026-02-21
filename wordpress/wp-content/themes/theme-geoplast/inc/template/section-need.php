<?php if (have_rows('section_need')):
?>
	<section class="wrapper about_container" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
		<div class="need_block flex-between gap_20 pt_60 itemc-center reverse_wrap wrap_768">
			<?php while (have_rows('section_need')): the_row(); ?>
				<?php
				?>
				<?php if (get_row_layout() == 'section_image'): ?>
					<div class="animate fade-left show" data-delay="100">
						<?php $img = get_sub_field('editor_image'); //
						if ($img) : ?>
							<picture>
								<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
							</picture>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php
				?>
				<?php if (get_row_layout() == 'section_content'): ?>
					<div class="animate fade-right show" data-delay="100">
						<?php if (have_rows('section_full')):
							while (have_rows('section_full')): the_row(); ?>
								<?php
								?>
								<?php if (get_row_layout() == 'section_title'): ?>
									<h3><?php the_sub_field('editor_title'); ?></h3>
								<?php endif; ?>
								<?php
								?>
								<?php if (get_row_layout() == 'section_text'): ?>
									<p><?php the_sub_field('editor_text'); ?></p>
								<?php endif; ?>
						<?php endwhile;
						endif; ?>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</section>
<?php endif; ?>