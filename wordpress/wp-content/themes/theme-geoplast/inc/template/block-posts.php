<?php
$get_title = get_sub_field('title_block');
$get_count = get_sub_field('count_block') ?: 3;
$get_cat   = get_sub_field('category_block');
$id_block  = get_sub_field('id_block') ?: 'news';

$cat_id = $get_cat ? $get_cat->term_id : null;
$cat_link = $cat_id ? get_term_link($cat_id) : '#';

$args = [
	'post_type'      => 'post',
	'posts_per_page' => (int)$get_count,
	'orderby'        => 'date',
	'order'          => 'DESC',
];

if ($cat_id) {
	$args['category__in'] = array($cat_id);
}

$related_query = new WP_Query($args);

if ($related_query->have_posts()) : ?>
	<section class="news wrapper pt_100" id="<?php echo esc_attr($id_block); ?>">
		<?php if ($get_title) : ?>
			<h2 class="animate fade-up show" data-delay="100"><?php echo esc_html($get_title); ?></h2>
		<?php endif; ?>

		<article class="grid col_3 gap_20">
			<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
				<?php get_template_part('loop', 'post'); ?>
			<?php endwhile; ?>
		</article>

		<?php
		if (!is_page('news') && !is_home() && !is_archive()) : ?>
			<div class="button_container flex flex-center gap_20 pt_60">
				<a class="cta fill_cta" href="<?php echo esc_url($cat_link); ?>">Усі новини</a>
			</div>
		<?php endif; ?>
	</section>
<?php
	wp_reset_postdata();
endif; ?>