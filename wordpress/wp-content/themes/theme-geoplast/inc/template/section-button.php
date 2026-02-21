<?php if (get_row_layout() == 'section_button'): ?>
	<div class="button_container flex flex-center wrap_768 gap_20 pt_60" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
		<?php if (have_rows('list_button')): ?>
			<?php while (have_rows('list_button')): the_row();
				$type_value = get_sub_field('type-button');
				$map = [
					'1' => 'connect_cta fill_cta',
					'2' => 'transparent_cta dark_text',
				];
				$type_classes = $map[$type_value] ?? '';
				$link = get_sub_field('button_bl');      
				$title_text = get_sub_field('title_button'); 
				if ($link):
					$url    = $link['url'];
					$title  = $link['title'];
					$target = $link['target'] ? $link['target'] : '_self';
			?>
					<a class="cta <?php echo esc_attr($type_classes); ?>"
						href="<?php echo esc_url($url); ?>"
						target="<?php echo esc_attr($target); ?>">
						<?php echo esc_html($title); ?>
					</a>

				<?php
				elseif ($title_text): ?>
					<a class="cta <?php echo esc_attr($type_classes); ?>" href="#">
						<?php echo esc_html($title_text); ?>
					</a>
				<?php endif; ?>

			<?php endwhile; ?>
		<?php endif; ?>

	</div>
<?php endif; ?>