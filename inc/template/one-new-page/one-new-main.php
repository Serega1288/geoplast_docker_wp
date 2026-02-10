<?php
$news_date  = get_field('one_news_date');
$news_title = get_field('one_news_title');
$news_img   = get_field('one_news_image');
?>

<p class="flex gap_10 items_center animate fade-up" data-delay="50">
	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
		<path d="M4.5 0.75V3.15" stroke="#ED6B27" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M10.9004 0.75V3.15" stroke="#ED6B27" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M0.900391 6.422H14.5004" stroke="#ED6B27" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M14.9 5.95001V12.75C14.9 15.15 13.7 16.75 10.9 16.75H4.5C1.7 16.75 0.5 15.15 0.5 12.75V5.95001C0.5 3.55001 1.7 1.95001 4.5 1.95001H10.9C13.7 1.95001 14.9 3.55001 14.9 5.95001Z" stroke="#ED6B27" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M10.6554 10.11H10.6626" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M10.6554 12.51H10.6626" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M7.69541 10.11H7.7026" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M7.69541 12.51H7.7026" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M4.73643 10.11H4.74361" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
		<path d="M4.73643 12.51H4.74361" stroke="#ED6B27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
	</svg>
	<span class="date"><?php echo esc_html($news_date); ?></span>
</p>

<h1 class="animate fade-up" data-delay="100"><?php echo esc_html($news_title); ?></h1>

<?php if ($news_img) : ?>
	<picture class="animate fade-up" data-delay="150">
		<img src="<?php echo esc_url($news_img); ?>" alt="<?php echo esc_attr($news_title); ?>">
	</picture>
<?php endif; ?>

<div class="description_news">
	<?php
	// 1. Блок контенту
	if (have_rows('one_news_content_1')) :
		while (have_rows('one_news_content_1')) : the_row(); ?>
			<div class="animate fade-left" data-delay="200">
				<p><b><?php echo nl2br(esc_html(get_sub_field('bold_text_1'))); ?></b></p>
				<?php echo get_sub_field('main_content_1'); ?>
			</div>
	<?php endwhile;
	endif; ?>

	<?php
	// 2. Блок з помаранчевим текстом
	if (have_rows('one_news_content_2')) :
		while (have_rows('one_news_content_2')) : the_row(); ?>
			<div class="animate fade-right" data-delay="200">
				<p><b><?php echo nl2br(esc_html(get_sub_field('bold_text_2'))); ?></b></p>
				<div class="news_orange">
					<?php echo get_sub_field('main_content_2'); ?>
				</div>
			</div>
	<?php endwhile;
	endif; ?>

	<?php
	// 3. Блок контенту 
	if (have_rows('one_news_content_3')) :
		while (have_rows('one_news_content_3')) : the_row(); ?>
			<div class="animate fade-left" data-delay="200">
				<p><b><?php echo nl2br(esc_html(get_sub_field('bold_text_3'))); ?></b></p>
				<?php echo get_sub_field('main_content_3'); ?>
			</div>
	<?php endwhile;
	endif; ?>

	<?php
	// 4. Блакитний блок зі списком
	if (have_rows('one_news_content_4')) :
		while (have_rows('one_news_content_4')) : the_row(); ?>
			<div class="info-blue-block animate fade-right" data-delay="200">
				<p><b><?php echo nl2br(esc_html(get_sub_field('bold_text_4'))); ?></b></p>
				<?php if (have_rows('features_main_content_4')) : ?>
					<ul class="features-list">
						<?php while (have_rows('features_main_content_4')) : the_row(); ?>
							<li><?php echo esc_html(get_sub_field('feature_item')); ?></li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<p><?php echo nl2br(esc_html(get_sub_field('one_footer_text'))); ?></p>
			</div>
	<?php endwhile;
	endif; ?>
</div>