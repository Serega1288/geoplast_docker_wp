<?php
$title = get_sub_field('editor_title') ?: 'Новини компанії';
$button_text = get_sub_field('editor_button') ?: 'Завантажити ще';

$news_query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 12,
    'post_status'    => 'publish'
]);
?>

<div class="wrapper news_container" <?php if( get_sub_field('id_block') ) echo 'id="' . esc_attr(get_sub_field('id_block')) . '"'; ?>>
    <h1 class="page_h1 animate fade-up show" style="color: #ED6B27;" data-delay="100">
        <?php echo esc_html($title); ?>
    </h1>

    <section class="news_cards">
        <div class="grid col_3 gap_20">
            <?php if ($news_query->have_posts()) : while ($news_query->have_posts()) : $news_query->the_post(); ?>

                <figure class="page_news animate fade-up show" data-delay="100">
                    <figcaption>
                        <a class="mask_news" href="<?php the_permalink(); ?>"></a>
                        <picture>
                            <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); 
                            else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/new_page.jpg" alt="">
                            <?php endif; ?>
                        </picture>

                        <div class="flex-between items-center news_text">
                            <p>новини</p>
                            <p class="flex gap_10 items_center">
                                <span class="date"><?php echo get_the_date('d.m.Y'); ?></span>
                            </p>
                        </div>
                        <h2 class="news_title">
                            <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                    </figcaption>
                </figure>

            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>

        <div class="button_container flex flex-center wrap_768 gap_20 animate fade-up" data-delay="100">
            <a class="fill_cta cta" href="#" id="show-more-btn">
                <?php echo esc_html($button_text); ?>
            </a>
        </div>
    </section>
</div>