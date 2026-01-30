<?php
include 'block-option.php';

$tabs = get_sub_field( 'tabs' );

//if ( ! $tabs ) { return; }

// ID секції
//$section_id = get_sub_field( 'id_block' ) ?: 'section-' . wp_unique_id();
//$title      = get_sub_field( 'title' );

// Хелпер формує аргументи WP_Query під тип вкладки
if ( ! function_exists( 'lux_get_tab_query_args' ) ) {
    function lux_get_tab_query_args( array $tab, int $per_page, int $page = 1 ): array {

        switch ( $tab['source'] ) {
            case 'sale':
                return [
                    'post_type'      => 'product',
                    'posts_per_page' => $per_page,
                    'paged'          => $page,
                    'meta_query'     => [
                        [
                            'key'     => '_sale_price',
                            'value'   => 0,
                            'compare' => '>',
                            'type'    => 'NUMERIC',
                        ],
                    ],
                ];

            case 'bestsellers':
                return [
                    'post_type'      => 'product',
                    'posts_per_page' => $per_page,
                    'paged'          => $page,
                    'meta_key'       => 'total_sales',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'DESC',
                ];

            case 'new':
                return [
                    'post_type'      => 'product',
                    'posts_per_page' => $per_page,
                    'paged'          => $page,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ];

            case 'category':
                return [
                    'post_type'      => 'product',
                    'posts_per_page' => $per_page,
                    'paged'          => $page,
                    'tax_query'      => [
                        [
                            'taxonomy' => 'product_cat',
                            'field'    => 'id',
                            'terms'    => $tab['category'],
                        ],
                    ],
                ];

            case 'manual':
                return [
                    'post_type'      => 'product',
                    'posts_per_page' => $per_page,
                    'paged'          => $page,
                    'post__in'       => wp_list_pluck( $tab['products'], 'ID' ),
                    'orderby'        => 'post__in',
                ];
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

<!--        --><?php //if ( $title ) : ?>
<!--            <div class="block-title style-3">--><?php //echo esc_html( $title ); ?><!--</div>-->
<!--        --><?php //endif; ?>

        <!-- Навігація вкладок -->
        <ul class="nav nav-tabs d-flex align-items-center justify-content-start justify-content-md-center">
            <?php foreach ( $tabs as $i => $tab ) : ?>
                <li class="nav-item">
                    <button
                        class="btn btn-2 wAuto <?php echo 0 === $i ? ' active' : ''; ?>"
                        data-bs-target="#tp-<?php echo $i . $args; ?>"
                        type="button"
                        role="tab">
                        <?php echo esc_html( $tab['title'] ); ?>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Контент вкладок -->
        <div class="tab-content">
            <?php foreach ( $tabs as $i => $tab ) :

                $per_page   = absint( $tab['per_page'] ? : 4 );
                $query_args = lux_get_tab_query_args( $tab, $per_page, 1 );
                $query      = new WP_Query( $query_args );
                ?>
                <div
                    class="tab-pane fade<?php echo 0 === $i ? ' show active' : ''; ?>"
                    id="tp-<?php echo $i . $args; ?>"
                    >

                    <?php if ( $query->have_posts() ) : ?>

                        <ul
                            class="products products-custom row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-xl-4"
                            data-tab-index="<?php echo $i; ?>"
                            data-args='<?php echo wp_json_encode( $query_args ); ?>'>
                            <?php while ( $query->have_posts() ) :
                                $query->the_post();
                                wc_get_template_part( 'content', 'product' );
                            endwhile; ?>
                        </ul>

                        <?php if ( $query->max_num_pages > 1 ) : ?>
                            <div class="wrap-btn text-center">
                                <span
                                    class="btn btn-1 js-load-more"
                                    data-tab="<?php echo $i; ?>"
                                    data-page="1"
                                    data-max="<?php echo $query->max_num_pages; ?>">
                                    <span class="icon reload">
                                        <?php esc_html_e( 'Load more', 'themeluxurydom' ); ?>
                                    </span>
                                </span>
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <p><?php esc_html_e( 'There are no products.', 'themeluxurydom' ); ?></p>
                    <?php endif;
                    if ( is_page() ) {
                        wp_reset_postdata();
                    }
                    ?>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>