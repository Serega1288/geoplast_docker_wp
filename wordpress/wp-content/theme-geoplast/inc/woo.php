<?php



/**
 * Функція для відображення останніх відгуків з рейтингом товарів WooCommerce
 *
 * @param int $count Кількість відгуків для відображення
 * @return void
 */
function display_latest_product_reviews( $count = 5, $is_slider = true, $id) {
    // Перевіряємо, чи активований WooCommerce

    // Отримуємо останні відгуки з рейтингом
    $args = array(
            'post_type'    => 'product',
            'status'       => 'approve',
            'number'       => $count,
//            'post_id'      => $id,
            'meta_query'   => array(
                    array(
                            'key'     => 'rating',
                            'value'   => 0,
                            'compare' => '>',
                            'type'    => 'NUMERIC'
                    ),
            ),
    );

    $comments = get_comments($args);

//    var_dump($comments);

    if (empty($comments)) {
        echo '<p>No reviews with rating found</p>';
        return;
    }

    if ( $is_slider ) {
        echo '<div data-id="' . $id . '" data-swiper-reviews=".swiper-product-' . $id . '" class="wrap-reviews latest-product-reviews swiper swiper-product-' . $id . '">';
        echo '<div class="swiper-wrapper">';
    } else {
        echo '<div class="latest-product-reviews wrap-reviews row row-cols-1 row-cols-md-2">';
    }



    foreach ($comments as $comment) {
        $product_id = $comment->comment_post_ID;
        $product = wc_get_product($product_id);

        if (!$product) {
            continue;
        }

        $product_title = $product->get_name();
        $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'thumbnail');
        $product_price = $product->get_price_html();
        $product_permalink = get_permalink($product_id);

        $comment_author = $comment->comment_author;
        $comment_content = $comment->comment_content;
        $comment_date = human_time_diff(strtotime($comment->comment_date), current_time('timestamp')) . ' ago';
        $comment_rating = get_comment_meta($comment->comment_ID, 'rating', true);

        $images = get_comment_meta($comment->comment_ID, 'attached_images', true);
        // Виведення карточки відгуку
        ?>
        <div  class="<?php if ($is_slider) : echo 'swiper-slide'; else : echo 'col'; endif; ?>">
            <div class="product-review-card">

                <div class="row">
                    <div class="col-auto">
                        <div class="product-image">
                            <?php if ($product_image) : ?>
                                <a class="proportion size-h100" href="<?php echo esc_url($product_permalink); ?>">
                                    <img src="<?php echo esc_url($product_image[0]); ?>" alt="<?php echo esc_attr($product_title); ?>">
                                </a>
                            <?php else : ?>
                                <a class="proportion size-h100" href="<?php echo esc_url($product_permalink); ?>">
                                    <img src="<?php echo esc_url(wc_placeholder_img_src()); ?>" alt="<?php echo esc_attr($product_title); ?>">
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col d-flex flex-column align-items-baseline">
                        <div class="review-rating stars-not icon">
                            <span class="stars-ok icon" step="<?php echo $comment_rating; ?>"></span>
                        </div>
                        <h4 class="review-product-title">
                            <a href="<?php echo esc_url($product_permalink); ?>">
                                <?php echo esc_html($product_title); ?>
                            </a>
                        </h4>
                    </div>
                </div>

                <div class="review-text">
                    <?php echo lux_trim_words( wpautop(wp_kses_post($comment_content)) , 24); ?>
                </div>

                <?php if ($images): ?>
                    <div class="review-attached-images d-flex align-content-center">
                        <?php foreach ((array)$images as $img_id): ?>
                            <a class="data-fancybox" data-fancybox="review-attached-<?php echo $comment->comment_ID; ?>"  href="<?php echo wp_get_attachment_url($img_id); ?>" target="_blank">
                                <?php echo wp_get_attachment_image($img_id, 'thumbnail'); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col">
                        <div class="author-name"><?php echo esc_html($comment_author); ?></div>
                    </div>
                    <div class="col-auto">
                        <span class="review-date d-flex align-items-center">
                            <span class="icon icon-min calendar"></span>
                            <?php echo esc_html($comment_date); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    if ( $is_slider ) {
        echo '</div>';
        echo '<div class="swiper-pagination"></div>';
    }
    echo '</div>';
}

// Використання шорткоду для виведення відгуків
function latest_product_reviews_shortcode($atts) {
    $atts = shortcode_atts(array(
            'count' => 5,
    ), $atts, 'latest_product_reviews');

    ob_start();
    display_latest_product_reviews($atts['count']);
    return ob_get_clean();
}
//add_shortcode('latest_product_reviews', 'latest_product_reviews_shortcode');

//*********************************************************************************************


add_action( 'woocommerce_before_main_content', 'barFilterLeft' , 1 );
function barFilterLeft() {
    /* Не працюємо на сторінці товару */
    if ( is_single() ) {
        return;
    }

    get_template_part('inc/template/category', 'product-title');

    ?>
    <div class="wrap-woo">
    <div class="container">
    <div class="row">
    <div class="col-auto col-md-3 wrap-filter-mobile anim">

        <div class="shadow js-open-filter anim">
            <span class="ts-24"><?php esc_html_e( 'Filter', 'theme-hortiqa' ); ?></span>
            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 4L13 4M13 4C13 5.65686 14.3431 7 16 7C17.6569 7 19 5.65685 19 4C19 2.34315 17.6569 1 16 1C14.3431 1 13 2.34315 13 4ZM7 12L19 12M7 12C7 13.6569 5.65685 15 4 15C2.34315 15 1 13.6569 1 12C1 10.3431 2.34315 9 4 9C5.65685 9 7 10.3431 7 12Z" stroke="#16303D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <div class="wrap-sidebar anim">
            <div class="d-md-none sidebar-title d-flex align-items-center justify-content-end">
                <svg class="js-btn-open-filter" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="1" width="48" height="48" rx="24" stroke="#F4F4F4" stroke-width="2"/>
                    <path d="M19 31L31 19M19 19L31 31" stroke="#16303D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <?php echo do_shortcode( get_field( 'sidebar_content', 'option' ) ); ?>
        </div><!-- /.wrap-sidebar -->
    </div><!-- /.col-auto -->

    <div class="col col-lg col-xl">
<?php };


add_action( 'woocommerce_after_main_content', function (){
    if (is_single()) {return;};

    /* Поточний термін (категорія / сторінка «Магазин») */
    $term    = get_queried_object();
    $is_shop = ( $term->name === 'product' ) ? true : false;

    ?>
    </div><!-- .col -->
    </div><!-- .row -->

    <div class="text">
        <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @since 1.6.2.
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action( 'woocommerce_archive_description' );
        ?>
    </div>
    </div><!-- .container -->

    </div><!-- .wrap-woo -->

    <?php if ( $is_shop ) { ?>
        <?php if( have_rows('shop-group-bottom', 'option' )) : ?>
            <div class="wrap-group-bottom">
                <?php
                while( have_rows('shop-group-bottom', 'option') ): the_row();
                    get_template_part('inc/box', 'constructor');
                endwhile; ?>
            </div>
        <?php endif; ?>
    <?php } else { ?>
        <?php
        $slug = $term->taxonomy . '_' . $term->term_id;
        if( have_rows('group-bottom', $slug) ): ?>
            <div class="wrap-group-bottom">
                <?php
                while( have_rows('group-bottom', $slug) ): the_row();
                    get_template_part('inc/box', 'constructor', 'group-bottom');
                endwhile; ?>
            </div>
        <?php endif; ?>
    <?php } ?>

    <?php
    if( have_rows('global-group-bottom', 'option') ): ?>
        <div class="wrap-group-bottom">
            <?php $constructor_name = 'global-group-bottom';
            while( have_rows('global-group-bottom', 'option') ): the_row();
                get_template_part('inc/box', 'constructor', $constructor_name);
            endwhile; ?>
        </div>
    <?php endif; ?>

<?php }, 21 );




//*********************************************************************************************

remove_theme_support( 'wc-product-gallery-zoom' );
remove_theme_support( 'wc-product-gallery-lightbox' );
remove_theme_support( 'wc-product-gallery-slider' );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

//*********************************************************************************************


add_filter('woocommerce_add_to_cart_fragments', 'woocommerceframework_header_add_to_cart_fragment');
function woocommerceframework_header_add_to_cart_fragment( $fragments ) {
    ob_start(); ?>
    <span class="counter_number"
          number="<?php echo WC()->cart->get_cart_contents_count(); ?>">
			<?php echo WC()->cart->get_cart_contents_count(); ?>
	</span>
    <?php
    $fragments['span.counter_number'] = ob_get_clean();

    return $fragments;
}


//*********************************************************************************************

// Глобальний inline-CSS у всій адмінці (без окремих файлів)
add_action('admin_head', function () { ?>
    <style id="nsd-admin-inline">
        /* базове правило */
        #edittag { max-width: 100% !important; }

        /* додавай свої стилі нижче */
        /* .example { outline: 1px solid red; } */
    </style>
<?php });

//*********************************************************************************************

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );



/**
 * Hook: woocommerce_before_shop_loop.
 *
 * @hooked woocommerce_output_all_notices - 10
 * @hooked woocommerce_result_count - 20
 * @hooked woocommerce_catalog_ordering - 30
 */
//do_action( 'woocommerce_before_shop_loop' );


add_action( 'woocommerce_before_shop_loop', function () { ?>
        <div class="wrap-sorting">
            <div class="row">
                <div class="col-6 col-md">
                    <span class="btn-open-filter js-btn-open-filter btn btn-4 w-100 w100-mobile">
                        <svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.777832 3.889L10.1112 3.889M10.1112 3.889C10.1112 5.17766 11.1558 6.22233 12.4445 6.22233C13.7332 6.22233 14.7778 5.17766 14.7778 3.889C14.7778 2.60033 13.7332 1.55566 12.4445 1.55566C11.1558 1.55566 10.1112 2.60033 10.1112 3.889ZM5.4445 10.1112L14.7778 10.1112M5.4445 10.1112C5.4445 11.3999 4.39983 12.4446 3.11117 12.4446C1.8225 12.4446 0.777832 11.3999 0.777832 10.1112C0.777832 8.82255 1.8225 7.77789 3.11117 7.77789C4.39983 7.77789 5.4445 8.82255 5.4445 10.1112Z" stroke="white" stroke-width="1.55556" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Filter
                    </span>
<?php }, 19 );
add_action( 'woocommerce_before_shop_loop', function () { ?>
                </div><!-- col -->
                <div class="col-6 col-md-auto d-flex align-items-center">
                    <span class="name">Sort by:</span>
<?php }, 21 );

add_action( 'woocommerce_before_shop_loop', function () { ?>
                </div><!-- col -->
            </div>
        </div><!-- wrap-sorting -->
<?php }, 31 );


//*********************************************************************************************


/**
 * Hook: woocommerce_after_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 */

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close' , 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close' , 15  );

//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
//add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );




add_action( 'woocommerce_shop_loop_item_title', function () { ?>
    <div class="cart-content">
<?php }, 1 );
add_action( 'woocommerce_after_shop_loop_item', function () { ?>
    </div><!-- cart-content -->
<?php }, 15 );


/**
 * Hook: woocommerce_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_product_title - 10
 */

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_shop_loop_item_title', function (){ ?>
    <div class="wrap-rating">
<?php }, 7 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 8 );
add_action( 'woocommerce_shop_loop_item_title', function (){ ?>
    </div><!-- wrap-rating -->
<?php }, 9 );


add_action( 'woocommerce_shop_loop_item_title', function (){ ?>
    <a class="wrap-title" href="<?php the_permalink(); ?>">
<?php }, 9 );

add_action( 'woocommerce_shop_loop_item_title', function (){ ?>
    </a>
<?php }, 11 );




add_action( 'woocommerce_after_shop_loop_item_title', function (){ ?>
    <div class="d-flex align-items-center justify-content-between  flex-column flex-sm-row wrap-buy">
<?php }, 6);
add_action( 'woocommerce_after_shop_loop_item', function (){ ?>
    </div><!-- end -->
<?php }, 11 );