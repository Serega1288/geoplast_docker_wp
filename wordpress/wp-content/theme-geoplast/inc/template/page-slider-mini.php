<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-page explore">
    <div class="container">

        <!-- Slider main container -->
        <div class="swiper-look">
            <div class="row wrapper">
                <h2 class="explore__desktop title fw700 ts-24"><?php the_sub_field('title'); ?></h2>
                <div class="explore__title-mob title fw700 ts-24">Subcategories</div>
            </div>
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php while (have_rows('slider')) : the_row(); ?>
                <div class="swiper-slide">
                    <img class="swiper-image" src="<?php echo get_sub_field('image')['url']; ?>" alt="">
                    <div class="swiper-name fw500 ts-16"><?php the_sub_field('title'); ?></div>
                </div>
                <?php endwhile; ?>
            </div>


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

            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

        </div>

    </div>
</section>