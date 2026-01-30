<?php include 'block-option.php';
$title = get_sub_field('title');
?>



<section class="section section-page portfolio">
    <div class="container">
        <?php if (  $title ) : ?>
        <h2 class="block-title fw700 ts-40 ts-sm-32">
            <?php echo $title; ?>
        </h2>
        <?php endif; ?>

        <!-- Slider main container -->
        <div class="swiper-portfolio">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php $i=0; while ( have_rows( 'slider' ) ) : the_row(); $i++; ?>
                <div class="swiper-slide">
                    <img class="swiper-image" src="<?php echo get_sub_field('after_image')['url']; ?>" alt="">
                    <img class="swiper-image" src="<?php echo get_sub_field('before_image')['url']; ?>" alt="">
                </div>
                <?php endwhile; ?>

            </div>
            <div class="swiper-slide__wrapper">

                <div class="swiper-button-next">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_258_21427)">
                            <path d="M8 4L14 10L8 16" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_258_21427">
                                <rect width="20" height="20" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="swiper-button-prev">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_258_21427)">
                            <path d="M8 4L14 10L8 16" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_258_21427">
                                <rect width="20" height="20" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <!-- If we need navigation buttons -->
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>




        </div>

    </div>
</section>