<?php if (get_row_layout() == 'section_statistic') : ?>
	<section class="statistic_container dark_mode" <?php if (get_sub_field('id_block')) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
		<div class="wrapper flex-between stats gap_20 wrap_768">
			<?php
			if (have_rows('statistic_content')) :
				$delay = 100;
				while (have_rows('statistic_content')) : the_row();
					if (get_row_layout() == 'statistic_block') : ?>

						<div class="animate fade-up show" data-delay="<?php echo $delay; ?>">
							<p class="border_bottom">
								<?php if (get_sub_field('add_number')) : ?>
									<span class="counter" data-target="<?php the_sub_field('add_number'); ?>">0</span>
								<?php endif; ?>

								<?php if (get_sub_field('add_icon')) : ?>
									<span class="simbol_text"><?php the_sub_field('add_icon'); ?></span>
								<?php endif; ?>

								<?php if (get_sub_field('add_text_up')) : ?>
									<?php the_sub_field('add_text_up'); ?>
								<?php endif; ?>
							</p>

							<?php if (get_sub_field('add_text_down')) : ?>
								<p><?php the_sub_field('add_text_down'); ?></p>
							<?php endif; ?>
						</div>
			<?php
						$delay += 200;
					endif; // кінець statistic_block
				endwhile;
			endif; // кінець statistic_content 
			?>
		</div>
	</section>
<?php endif; ?>