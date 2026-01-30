<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-page page-slider-logo">

        <div class="html-title ts-14">
             <?php the_sub_field('html-title'); ?>
        </div>
        <!-- Slider main container -->
        <div class="swiper gallery">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php while( have_rows('gallery') ) : the_row(); ?>
                    <div class="swiper-slide">
                        <?php if ( get_sub_field('url') ) : ?>
                        <a target="_blank" href="<?php echo get_sub_field('url'); ?>" class="wrap-img">
                        <?php else: ?>
                        <div class="wrap-img">
                        <?php endif; ?>
                            <img src="<?php echo get_sub_field('image')['url']; ?>" alt="">
                        <?php if ( get_sub_field('url') ) : ?>
                        </a>
                        <?php else: ?>
                        </div>
                        <?php endif; ?>

                    </div>
                <?php endwhile; ?>
            </div>
        </div>

</section>