<?php include 'block-option.php';
$title = get_sub_field('title');
$count = get_sub_field('count');
$h = get_sub_field('h');
$is_slider = get_sub_field('is_slider');
?>


<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section new-reviews">
    <div class="container">

        <?php if ( $title ) : ?>
            <div class="wrap-block-title style-3">
                <div class="row">
                    <div class="col-8 col-sm d-flex align-items-center">
                        <<?php echo esc_html( $h ); ?> class="block-title">
                            <?php echo $title; ?>
                        </<?php echo esc_html( $h ); ?>>
                    </div>
                    <?php if ( $is_slider ) : ?>
                    <div class="col-4 col-sm-auto">
                        <div class="swiper-buttons d-flex buttons-<?php echo $args; ?>">
                            <div class="swiper-button-next btn btn-icon icon arrow-right"> </div>
                            <div class="swiper-button-prev btn btn-icon icon arrow-right"> </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (function_exists('display_latest_product_reviews')) {
            display_latest_product_reviews($count, $is_slider, $args ); // виведе 5 останніх відгуків
        } ?>

        <div class="wrap-btn">
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

    </div>
</section>