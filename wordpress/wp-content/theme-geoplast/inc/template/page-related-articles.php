<?php
// ===============================
// 🔗 Related Articles Block
// ===============================

$get_cat = get_sub_field('category');
$get_count = get_sub_field('count');
$get_title = get_sub_field('title');

$categories = $get_cat->term_id;
$taxonomy = 'category'; // або 'post_tag', або будь-яка інша
$cat_link = get_term_link( (int) $categories, $taxonomy );
?>

<?php if ($categories) {
    $args = [
        'category__in'   => $categories,
        'posts_per_page' => $get_count,
        'orderby'        => 'date',
        'order'          => 'DESC'
    ]; 

    $related_query = new WP_Query($args);

    if ($related_query->have_posts()) : ?>
        <section class="related-articles">
            <div class="container">
                <div class="row wrap-title d-flex align-items-center">
                    <div class="col-12 col-sm">
                        <h2 class="title ts-40 ts-sm-32"><?php echo $get_title; ?></h2>
                    </div>
                    <div class="col-12 col-sm-auto">
                        <a href="<?php echo $cat_link; ?>" class="link link-1">All articles</a>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-4">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <?php get_template_part('loop', 'post'); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php
    else :
        // якщо немає схожих статей
        echo '<div class="no-related">No related articles found.</div>';
    endif;

    wp_reset_postdata();
}
?>