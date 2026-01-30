<?php
include 'block-option.php';

$h     = get_sub_field( 'h' );
$title = get_sub_field( 'title' );
$is_slider = get_sub_field( 'is_active_slider' );
$tab   = get_sub_field( 'tabs' );

//if ( ! $tab ) { return; }

/**
 * Повертає масив об’єктів WC_Product згідно з налаштуваннями вкладки.
 */
if ( ! function_exists( 'lux_get_products_by_tab' ) ) {
    function lux_get_products_by_tab( array $tab, int $limit = 4 ): array {

        $args_common = [
            'status' => 'publish',
            'limit'  => $limit,
        ];

        switch ( $tab['source'] ) {
            case 'sale':
                return wc_get_products(
                    array_merge(
                        $args_common,
                        [
                            'meta_query' => [
                                [
                                    'key'     => '_sale_price',
                                    'value'   => 0,
                                    'compare' => '>',
                                    'type'    => 'NUMERIC',
                                ],
                            ],
                        ]
                    )
                );

            case 'bestsellers':
                return wc_get_products(
                    array_merge(
                        $args_common,
                        [
                            'orderby'  => 'meta_value_num',
                            'order'    => 'DESC',
                            'meta_key' => 'total_sales',
                        ]
                    )
                );

            case 'new':
                return wc_get_products(
                    array_merge(
                        $args_common,
                        [
                            'orderby' => 'date',
                            'order'   => 'DESC',
                        ]
                    )
                );

            case 'category':
                return wc_get_products(
                    array_merge(
                        $args_common,
                        [
                            'category_ids' => is_array( $tab['category'] )
                                ? array_map( 'intval', $tab['category'] )
                                : [ intval( $tab['category'] ) ],
                        ]
                    )
                );

            case 'manual':
                return wc_get_products(
                    array_merge(
                        $args_common,
                        [
                            'include' => wp_list_pluck( $tab['products'], 'ID' ),
                            'orderby' => 'post__in',
                        ]
                    )
                );

            case 'last':
                $viewed = ! empty( $_COOKIE['lux_recently_viewed'] )
                    ? array_filter( array_map( 'absint', explode( '|', wp_unslash( $_COOKIE['lux_recently_viewed'] ) ) ) )
                    : [];

                // показуємо нові товари, якщо cookie порожнє
                if ( empty( $viewed ) ) {
                    return wc_get_products(
                        array_merge(
                            $args_common,
                            [ 'orderby' => 'date', 'order' => 'DESC' ]
                        )
                    );
                }

                return wc_get_products(
                    array_merge(
                        $args_common,
                        [
                            'include' => $viewed,
                            'orderby' => 'post__in', // порядок = порядок у cookie
                        ]
                    )
                );
        }

        return [];
    }
}
?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section tabs-product-more">

    <div class="container">

        <?php if ( $title ) : ?>
        <div class="wrap-block-title style-3">
            <div class="row">
                <div class="col-8 col-sm d-flex align-items-center">
                    <<?php echo esc_html( $h ); ?> class="block-title">
                        <?php echo $title; ?>
                    </<?php echo esc_html( $h ); ?>>
                </div>
                <div class="col-4 col-sm-auto d-flex align-items-center justify-content-end">

                        <?php if( $is_slider) : ?>
                            <div class="swiper-buttons buttons-<?php echo $args; ?>">
                                <div class="swiper-button-next btn btn-icon icon arrow-right"> </div>
                                <div class="swiper-button-prev btn btn-icon icon arrow-right"> </div>
                            </div>
                        <?php else : ?>
                            <div class="d-none d-md-flex">
                            <?php
                            $link = get_sub_field('link');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="btn btn-1" href="<?php echo esc_url( $link_url ); ?>"
                                   target="<?php echo esc_attr( $link_target ); ?>">
                                    <span class="icon arrow-right"><?php echo esc_html( $link_title ); ?></span>
                                </a>

                            <?php endif; ?>
                            </div>
                        <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <div
        <?php if( $is_slider) : ?>
        data-swiper=".swiper-product-<?php echo $args; ?>"
        data-id="<?php echo $args; ?>"
        <?php endif; ?>
        class="<?php if( $is_slider) : ?>swiper swiper-product-<?php echo $args; ?><?php else : ?>wrap<?php endif; ?>
">
            <?php
            foreach ( [0] as $i ) :

                $limit    = absint( $tab['per_page'] ?: 4 );
                $products = lux_get_products_by_tab( $tab, $limit );
                ?>

                <?php if ( $products ) : ?>
                <ul class="<?php if( $is_slider) : ?>products swiper-wrapper<?php else : ?>products products-custom row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-xl-4<?php endif; ?>">

                    <?php
                    foreach ( $products as $product ) :
//                        echo '<pre>';
//                        var_dump($product->get_id());
//                        echo '</pre>';

                        $GLOBALS['product'] = $product;
                        $post_object        = get_post( $product->get_id() );
                        setup_postdata( $post_object );
                            if( $is_slider) :
                                echo '<div class="swiper-slide">';
                            endif;
                            wc_get_template_part( 'content', 'product' );
                            if( $is_slider) :
                                echo '</div>';
                            endif;
                    endforeach;

                    if ( is_page() ) {
                        wp_reset_postdata();
                    }
                    ?>
                </ul>
            <?php else : ?>
                <p><?php esc_html_e( 'There are no products.', 'themeluxurydom' ); ?></p>
            <?php endif; ?>

            <?php endforeach; ?>
        </div>

        <div class="d-block d-md-none">
            <?php if( $is_slider) : ?>
            <?php else : ?>
                <?php
                $link = get_sub_field('link');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-1" href="<?php echo esc_url( $link_url ); ?>"
                       target="<?php echo esc_attr( $link_target ); ?>">
                        <span class="icon arrow-right"><?php echo esc_html( $link_title ); ?></span>
                    </a>

                <?php endif; ?>

            <?php endif; ?>
        </div>

    </div>
</section>