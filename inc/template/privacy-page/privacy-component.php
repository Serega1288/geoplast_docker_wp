<?php
$custom_title = get_field('privcy_title');
?>

<h1 class="page_h1">
	<?php echo $custom_title ? esc_html($custom_title) : get_the_title(); ?>
</h1>

<?php if (have_rows('privacy_policy_list')): ?>
	<ul>
		<?php while (have_rows('privacy_policy_list')): the_row();
			$text = get_sub_field('policy_item_text');
		?>
			<li>
				<?php echo esc_html($text); ?>
			</li>
		<?php endwhile; ?>
	</ul>
<?php else : ?>
	<p>Текст політики оновлюється...</p>
<?php endif; ?>