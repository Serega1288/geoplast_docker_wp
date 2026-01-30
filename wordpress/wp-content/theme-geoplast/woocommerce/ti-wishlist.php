<?php
/**
 * The Template for displaying wishlist if a current user is owner.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/ti-wishlist.php.
 *
 * @version             2.3.3
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
wp_enqueue_script( 'tinvwl' );
?>
<div class="tinv-wishlist woocommerce tinv-wishlist-clear wrap-table style-1">
    <?php do_action( 'tinvwl_before_wishlist', $wishlist ); ?>
    <?php if ( function_exists( 'wc_print_notices' ) && isset( WC()->session ) ) {
        wc_print_notices();
    } ?>
    <?php $form_url = tinv_url_wishlist( $wishlist['share_key'], $wl_paged, true ); ?>

    <form action="<?php echo esc_url( $form_url ); ?>" method="post" autocomplete="off"
          data-tinvwl_paged="<?php echo $wl_paged; ?>" data-tinvwl_per_page="<?php echo $wl_per_page; ?>"
          data-tinvwl_sharekey="<?php echo $wishlist['share_key'] ?>">
        <?php do_action( 'tinvwl_before_wishlist_table', $wishlist ); ?>

        <ul class="products products-custom row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
            <?php do_action( 'tinvwl_wishlist_contents_before' ); ?>

            <?php

            global $product, $post;
            // store global product data.
            $_product_tmp = $product;
            // store global post data.
            $_post_tmp = $post;

            foreach ( $products as $wl_product ) :
                if ( empty( $wl_product['data'] ) ) {
                    continue;
                }

                // override global product data.
                $product = apply_filters( 'tinvwl_wishlist_item', $wl_product['data'] );
                // override global post data.
                $post = get_post( $product->get_id() );

//                $GLOBALS['product'] = $wl_product;
//                $post_object        = get_post( $wl_product->get_id() );
//                setup_postdata( $post_object );
                wc_get_template_part( 'content', 'product' );
            endforeach;
            wp_reset_postdata();

            ?>
            <?php do_action( 'tinvwl_wishlist_contents_after' ); ?>
        </ul>


    </form>
    <?php do_action( 'tinvwl_after_wishlist', $wishlist ); ?>
    <div class="tinv-lists-nav tinv-wishlist-clear">
        <?php do_action( 'tinvwl_pagenation_wishlist', $wishlist ); ?>
    </div>
</div>
