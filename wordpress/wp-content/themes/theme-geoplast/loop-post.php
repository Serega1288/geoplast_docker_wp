<?php 
// Перевіряємо, чи ми на сторінці "Новини"
$is_news_page = is_page('news') || is_home() || is_archive();
// Отримуємо посилання з ACF
$link_data = get_sub_field('link_one_page'); 
?>

<?php if ($is_news_page) : ?>
    <figure class="page_news animate fade-up show" data-delay="100">
        <figcaption>
            <?php if ($link_data) : ?>
                <a class="mask_news" href="<?php echo esc_url($link_data['url']); ?>"></a>
            <?php endif; ?>

            <picture>
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/new_page.jpg" alt="">
                <?php endif; ?>
            </picture>

            <div class="flex-between items-center news_text">
                <p class="flag">
                    <?php
                    $categories = get_the_category();
                    echo !empty($categories) ? esc_html($categories[0]->name) : 'новини';
                    ?>
                </p>
                <p class="flex gap_10 items_center">
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
                    <span class="date"><?php echo get_the_date('d.m.Y'); ?></span>
                </p>
            </div>
            <h2>
                <?php if ($link_data) : ?>
                    <a href="<?php echo esc_url($link_data['url']); ?>" style="text-decoration: none; color: inherit;">
                        <?php the_title(); ?>
                    </a>
                <?php else : ?>
                    <?php the_title(); ?>
                <?php endif; ?>
            </h2>
        </figcaption>
    </figure>

<?php else : ?>
    <figure class="new_card animate fade-up show" data-delay="100">
        <figcaption>
            <picture>
                <?php if (has_post_thumbnail()) : the_post_thumbnail('full'); else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/new.png" alt="">
                <?php endif; ?>
            </picture>
            <div class="flex gap_20 time_new">
                <time class="dark_mode flex flex-center items-center" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                    <?php echo get_the_date('d.m.Y'); ?>
                </time>
                <p class="flag">новини</p>
            </div>
        </figcaption>
        <h4><?php the_title(); ?></h4>
        <p><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
    </figure>
<?php endif; ?>