<section class="section section-page page-category-product-title">
    <div class="container">
        <?php breadcrumb('full'); ?>
        <header class="woocommerce-products-header">
            <?php
            if ( apply_filters( 'woocommerce_show_page_title', true ) ) :
                ?>
                <h1 class="woocommerce-products-header__title page-title ts-56 ts-sm-40">
                    <?php woocommerce_page_title(); ?>
                </h1>
            <?php endif; ?>
        </header>

        <?php if ( get_field('shop_page_description', get_the_ID() ) ) : ?>
        <div class="term-description">
            <?php the_field('shop_page_description', get_the_ID()); ?>
        </div>
        <?php else : ?>
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
        <?php endif; ?>


        <section
                <?php if( get_sub_field('id_block') ) : ?>
                    id="<?php the_sub_field('id_block'); ?>"
                <?php else : ?>
                    id="section-<?php echo esc_attr($args); ?>"
                <?php endif; ?>
                class="section page-subcategory">

            <div class="row">
                <div class="col d-flex align-items-center">
                    <div class="block-title ts-24">
                        Subcategories
                    </div>
                </div>
                <div class="wrap-swiper-button col-auto d-flex ">
                    <button class="subcat-swiper-button-prev">
                        <div class="icons size-50 style-4 icon-lite-arrow-green revers-icon"></div>

                    <button class="subcat-swiper-button-next">
                        <div class="icons size-50 style-3 icon-lite-arrow-white"></div>
                    </button>
                </div>
            </div>

            <?php
            if ( function_exists( 'is_woocommerce' ) ) {

                $current_cat_id = 0;

                // Якщо це сторінка категорії — отримаємо її ID
                if ( is_product_category() ) {
                    $current_cat = get_queried_object();
                    if ( isset( $current_cat->term_id ) ) {
                        $current_cat_id = $current_cat->term_id;
                    }
                }

                // Отримуємо категорії (перший рівень або підкатегорії)
                $args = array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                        'parent'     => $current_cat_id,
                        'orderby'    => 'menu_order',
                        'order'      => 'ASC'
                );

                $subcats = get_terms( $args );

                if ( ! empty( $subcats ) && ! is_wp_error( $subcats ) ) :
                    ?>

                    <div class="swiper subcat-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ( $subcats as $cat ) :
                                $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                                $image_url = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src();
                                $link = get_term_link( $cat );
                                ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo esc_url( $link ); ?>" class="wrap-img">
                                        <div class="proportion size-subcategory">
                                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>">
                                        </div>
                                        <div class="cat-name ts-sm-14"><?php echo esc_html( $cat->name ); ?></div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>

                <?php
                endif;
            }
            ?>

        </section>


    </div>
</section>
