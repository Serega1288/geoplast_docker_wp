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
	<?php if (get_row_layout() == 'geoplast_grup_and_tederic'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/about-company');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'about-asortment'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/about-asortment');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'statistic_block'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/statistics');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'product_block'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/products');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'news_block'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/news');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'info_block'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/info');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'contact-info_block'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/contacts-info');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'info_main_section'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/info-main-container');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'info_advantages'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/info-advanteges');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'page_text_info'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/info-text');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'button_section'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/info-button');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'services_main_banner'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/services-main');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'services_adv_top'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/services-advanteges');
		} ?>
	<?php endif; ?>
	<?php if (get_row_layout() == 'services_professional_support'): ?>
		<?php if (!$disable) {
			get_template_part('inc/template/services-text-info');
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


