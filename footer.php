<?php
$f_logo    = get_field('footer_logo', 'option');
$f_copy    = get_field('footer_copy', 'option');
$priv_link = get_field('footer_privacy_link', 'option');
?>

<footer class="dark_mode footer">
	<div class="wrapper_header flex-between header items-center wrap_768 gap_20">

		<div class="logo">
			<a href="<?php echo home_url(); ?>">
				<?php if ($f_logo) : ?>
					<?php
					$logo_url = is_array($f_logo) ? $f_logo['url'] : $f_logo;
					?>
					<img src="<?php echo esc_url($logo_url); ?>" alt="Logo">
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Logo">
				<?php endif; ?>
			</a>
		</div>

		<p class="copy">
			<?php
			echo $f_copy ? esc_html($f_copy) : date('Y') . ' © Copyright by Gesplast.';
			?>
		</p>

		<p class="privacy">
			<?php if ($priv_link) : ?>
				<a href="<?php echo esc_url($priv_link['url']); ?>">
					<?php echo esc_html($priv_link['title']); ?>
				</a>
			<?php else : ?>
				<a href="<?php echo home_url('/privacy'); ?>">Політика конфіденційності</a>
			<?php endif; ?>
		</p>

	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>