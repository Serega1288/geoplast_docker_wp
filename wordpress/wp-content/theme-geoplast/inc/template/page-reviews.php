<?php
$count = get_sub_field('count');
?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section new-reviews">
        <div class="container">
            <div class="wrap-block-title style-3">
                <div class="row">
                     <div class="col-8 col-sm d-flex align-items-center">
                         <?php include 'block-title.php'; ?>
                     </div>
                    <div class="col-4 col-sm-auto">
<!--                        <div class="swiper-buttons d-flex buttons---><?php //echo $args; ?><!--">-->
<!--                            <div class="swiper-button-next icon arrow-right">-->
<!--                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                    <path d="M50 25C50 11.1929 38.8071 0 25 0C11.1929 0 0 11.1929 0 25C0 38.8071 11.1929 50 25 50C38.8071 50 50 38.8071 50 25Z" fill="#E6F4E4"/>-->
<!--                                    <g clip-path="url(#clip0_258_11576)">-->
<!--                                        <path d="M27 19L21 25L27 31" stroke="#71A66C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                    </g>-->
<!--                                    <defs>-->
<!--                                        <clipPath id="clip0_258_11576">-->
<!--                                            <rect width="20" height="20" fill="white" transform="matrix(-1 0 0 1 35 15)"/>-->
<!--                                        </clipPath>-->
<!--                                    </defs>-->
<!--                                </svg>-->
<!--                            </div>-->
<!--                            <div class="swiper-button-prev icon arrow-right">-->
<!--                                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                    <rect width="50" height="50" rx="25" fill="#71A66C"/>-->
<!--                                    <g clip-path="url(#clip0_258_11580)">-->
<!--                                        <path d="M23 19L29 25L23 31" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                    </g>-->
<!--                                    <defs>-->
<!--                                        <clipPath id="clip0_258_11580">-->
<!--                                            <rect width="20" height="20" fill="white" transform="translate(15 15)"/>-->
<!--                                        </clipPath>-->
<!--                                    </defs>-->
<!--                                </svg>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
            <?php if (function_exists('display_latest_product_reviews')) {
                display_latest_product_reviews($count, $is_slider = true, $args );
            } ?>
        </div>
</section>
