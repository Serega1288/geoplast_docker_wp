<footer class="dark_mode footer">
	<div class="wrapper_header flex-between header items-center wrap_768 gap_20">
		<?php
		$f_logo = get_field('footer_logo', 'option');
		if ($f_logo): ?>
			<div class="logo">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo esc_url($f_logo['url']); ?>" alt="Logo">
				</a>
			</div>
		<?php endif; ?>
		<?php
		$f_copyright = get_field('footer_copyright', 'option');
		if ($f_copyright): ?>
			<p class="copy"><?php echo esc_html($f_copyright); ?></p>
		<?php endif; ?>
		<nav class="privacy">
			<?php
			wp_nav_menu([
				'theme_location' => 'footer-menu-end', //
				'container'      => false,
				'items_wrap'     => '%3$s',
			]);
			?>
		</nav>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>