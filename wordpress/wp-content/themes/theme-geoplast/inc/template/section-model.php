<section class="table_container" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<div class="wrapper">
		<?php if (have_rows('section_content')): ?>
			<?php while (have_rows('section_content')): the_row(); ?>
				<?php if (get_row_layout() == 'section_title'): ?>
					<?php if ($title = get_sub_field('editor_title')): ?>
						<h2 class="page_h2"><?php echo esc_html($title); ?></h2>
					<?php endif; ?>
				<?php endif; ?>
				<?php if (get_row_layout() == 'block_content'): ?>
					<div class="table_block">
						<table>
							<thead>
								<tr>
									<th><?php the_sub_field('label_model'); ?></th>
									<th><?php the_sub_field('label_clamping'); ?></th>
									<th><?php the_sub_field('label_injection'); ?></th>
									<th><?php the_sub_field('label_spacing'); ?></th>
								</tr>
							</thead>
							<?php if (have_rows('block_repeater')): ?>
								<tbody>
									<?php while (have_rows('block_repeater')): the_row(); ?>
										<tr>
											<td><?php the_sub_field('model_name'); ?></td>
											<td><?php the_sub_field('clamping_force'); ?></td>
											<td><?php the_sub_field('injection_volume'); ?></td>
											<td><?php the_sub_field('tie_bar_spacing'); ?></td>
										</tr>
									<?php endwhile; ?>
								</tbody>
							<?php endif; ?>
						</table>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>