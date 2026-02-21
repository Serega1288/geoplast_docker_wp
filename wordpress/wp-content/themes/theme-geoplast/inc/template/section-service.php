<section class="main_container" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
	<div class="wrapper">
		<?php if (have_rows('service_content')): ?>
			<?php
			$text_content = '';
			$image_content = '';
			while (have_rows('service_content')): the_row();
				if (get_row_layout() == 'service_block'):
					$title = get_sub_field('editor_title');
					$text = get_sub_field('editor_text');
					$text_content .= '<div class="services_main_text">';
					if ($title) {
						$text_content .= '<h1 class="page_h1 animate fade-up show" data-delay="100">' . esc_html($title) . '</h1>';
					}
					if ($text) {
						$text_content .= str_replace('<p>', '<p class="animate fade-up show" data-delay="150">', $text);
					}
					$text_content .= '</div>';
				elseif (get_row_layout() == 'image'):
					$img = get_sub_field('editor_img');
					if ($img):
						$image_content .= '<picture>';
						$image_content .= '<img src="' . esc_url($img['url']) . '" alt="' . esc_attr($img['alt']) . '">';
						$image_content .= '</picture>';
					endif;
				endif;
			endwhile;
			?>
			<div class="grid col_2 gap_100 items-center animate fade-up show" data-delay="100">
				<?php
				echo $text_content;
				echo $image_content;
				?>
			</div>
		<?php endif; ?>
	</div>
</section>