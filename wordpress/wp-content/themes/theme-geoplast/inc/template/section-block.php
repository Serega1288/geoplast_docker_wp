<section class="advantages_container wrapper animate fade-up show" data-delay="100" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>

	<?php while (have_rows('section_content')): the_row(); ?>

		<?php if (get_row_layout() == 'section_title'): ?>
			<h2 class="page_h2"><?php the_sub_field('editor_title'); ?></h2>
			<div class="grid col_3 gap_30 adv_services"> <?php endif; ?>

			<?php if (get_row_layout() == 'block_content'): ?>
				<div class="advant_block animate fade-up show" data-delay="150">
					<h3><?php the_sub_field('editor_block_title'); ?></h3>
					<?php
					$text = get_sub_field('editor_block_text');
					echo wpautop($text);
					?>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>

			</div>
</section>