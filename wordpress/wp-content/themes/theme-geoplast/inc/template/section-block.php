<?php
$main_title = get_sub_field('editor_title');
?>
<section class="advantages_container wrapper animate fade-up" data-delay="100" <?php if (get_sub_field('id_block')) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<?php if ($main_title) : ?>
		<h2 class="page_h2"><?php echo esc_html($main_title); ?></h2>
	<?php endif; ?>
	<div class="grid col_3 gap_30 adv_services">
		<?php
		if (have_rows('section_content')):
			$count = 0;
			while (have_rows('section_content')): the_row();
				if (get_row_layout() == 'block_content'):
					$block_title = get_sub_field('editor_block_title');
					$block_text  = get_sub_field('editor_block_text');
					$delay = 150 + ($count * 100);
		?>
					<div class="advant_block animate fade-up" data-delay="<?php echo $delay; ?>">
						<?php if ($block_title) : ?>
							<h3><?php echo esc_html($block_title); ?></h3>
						<?php endif; ?>
						<?php if ($block_text) : ?>
							<div class="block_description">
								<?php echo wpautop($block_text); ?>
							</div>
						<?php endif; ?>
					</div>
		<?php
					$count++;
				endif;
			endwhile;
		endif;
		?>
	</div>
</section>