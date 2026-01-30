<?php
// ===============================
// 🔗 Related Articles Block
// ===============================

$current_id = get_the_ID();
$categories = wp_get_post_categories($current_id);
$cat_link = get_category_link( $categories[0] );
?>

<?php if ($categories) {
    $args = [
        'category__in'   => $categories,
        'post__not_in'   => [$current_id],
        'posts_per_page' => 4,
        'orderby'        => 'date',
        'order'          => 'DESC'
    ];

    $related_query = new WP_Query($args);

    if ($related_query->have_posts()) : ?>
        <section class="related-articles green-style">
            <div class="container">
                <div class="row wrap-title d-flex align-items-center">
                    <div class="col-12 col-sm">
                        <h2 class="title ts-40 ts-sm-32">Related articles</h2>
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