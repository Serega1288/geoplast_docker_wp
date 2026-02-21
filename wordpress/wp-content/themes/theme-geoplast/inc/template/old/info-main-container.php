<?php
$sec_title = get_field('main_sec_title');
$sec_img   = get_field('main_sec_img');
?>

<section class="main_container">
	<div class="wrapper">
		<div class="grid col_2 items-center animate fade-up show" data-delay="100">
			<h1 class="page_h1">
				<?php
				echo $sec_title ? esc_html($sec_title) : get_the_title();
				?>
			</h1>
			<picture>
				<?php if ($sec_img) : ?>
					<img src="<?php echo esc_url($sec_img); ?>" alt="<?php echo esc_attr($sec_title ?: get_the_title()); ?>">
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/info_page.jpg" alt="Geoplast">
				<?php endif; ?>
			</picture>
		</div>
	</div>
</section>