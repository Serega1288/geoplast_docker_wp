<?php if (have_rows('section_content')): ?>
	<section class="privacy_section wrapper_section" data-delay="150"<?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
		<?php while (have_rows('section_content')): the_row(); ?>

			<?php if (get_row_layout() == 'section_block'): ?>

				<?php if ($title = get_sub_field('editor_title')): ?>
					<h1 class="page_h1"><?php echo esc_html($title); ?></h1>
				<?php endif; ?>

				<?php
				$list_content = get_sub_field('editor_list'); // WYSIWYG Editor
				if ($list_content) {
					echo $list_content;
				}
				?>

			<?php endif; ?>

		<?php endwhile; ?>
	</section>
<?php endif; ?>