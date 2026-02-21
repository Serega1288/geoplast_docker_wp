<section class="advantages_container wrapper animate fade-up show" data-delay="200" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<?php
	if (have_rows('section_content')):
		while (have_rows('section_content')): the_row();
			if (get_row_layout() == 'advanteges_title'): ?>
				<h2 class="page_h2"><?php the_sub_field('editor_title'); ?></h2>
	<?php endif;
		endwhile;
	endif;
	?>
	<div class="grid col_4 gap_30">
		<?php
		if (have_rows('section_content')):
			while (have_rows('section_content')): the_row();
				if (get_row_layout() == 'section_block'): ?>
					<div class="advant_block animate fade-up show" data-delay="250">
						<?php
						$icon_code = get_sub_field('section_icon');
						if ($icon_code): echo $icon_code;
						endif;
						?>
						<p><?php the_sub_field('section_text');
							?></p>
					</div>
		<?php endif;
			endwhile;
		endif;
		?>
	</div>
</section>