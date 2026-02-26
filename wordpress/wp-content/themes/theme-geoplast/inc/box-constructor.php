<?php
$constructor_name = $args ?? 'noargs';
$step_section = 0;

while (have_rows('constructor')) : the_row();
	$args = $step_section++;
	$disable = get_sub_field('disable_block');
?>

	<?php if (get_row_layout() == 'index_main_banner'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/hero');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'page_about'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/page-about');
		} ?>
	<?php endif; ?>
	
	<?php if (get_row_layout() == 'section_list'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-list');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_need'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-need');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_statistic'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-statistic');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'component_product'): ?>	
		<?php if (!$disable) {
			get_template_part('inc/template/component-product');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_button'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-button');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'page_news'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/block-posts');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'contact_info'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-contacts');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_info'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-info');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'block_section_info'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/block-section-info');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_advanteges'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-advanteges');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_key'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-key');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_service'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-service');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_block'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-block');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_profesional'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-profesional');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_privacy'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-privacy');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'news_section'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-news');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_model'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-model');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_description'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-description');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'main_product_block'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/main-product-block');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'section_slider'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/section-slider');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == ''): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == ''): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/');
		} ?>
	<?php endif; ?>

	
<?php endwhile; ?>


<?php if (get_row_layout() == ''): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/');
		} ?>
	<?php endif; ?>