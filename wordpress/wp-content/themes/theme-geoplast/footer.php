<footer class="dark_mode footer">
	<div class="wrapper_header flex-between header items-center wrap_768 gap_20">
		<?php
		$f_logo = get_field('footer_logo', 'options');
		if ($f_logo): ?>
			<div class="logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo esc_url($f_logo['url']); ?>" alt="Logo">
				</a>
			</div>
		<?php endif; ?>
		<?php
		$f_copyright = get_field('footer_copyright', 'options');
		if ($f_copyright): ?>
			<p class="copy"><?php echo esc_html($f_copyright); ?></p>
		<?php endif; ?>
		<?php
		$f_link = get_field('footer_link', 'options');
		if ($f_link): ?>
			<p class="privacy">
				<a href="<?php echo esc_url($f_link['url']); ?>" target="<?php echo esc_attr($f_link['target'] ?: '_self'); ?>">
					<?php echo esc_html($f_link['title']); ?>
				</a>
			</p>
		<?php endif; ?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>