<?php
/*
Template Name: Index
*/
get_header(); ?>

<main>
	<?php get_template_part('inc/template/index-page/hero'); ?>

	<?php get_template_part('inc/template/index-page/about-company'); ?>

	<?php get_template_part('inc/template/index-page/statistics'); ?>

	<?php get_template_part('inc/template/index-page/products'); ?>

	<?php get_template_part('inc/template/index-page/news'); ?>

	<?php get_template_part('inc/template/index-page/info'); ?>

	<?php get_template_part('inc/template/index-page/contacts-info'); ?>
</main>

<?php get_footer(); ?>