<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section wrap-items-icon-title-text">
    <div class="container">
        <div class="row list justify-content-center text-center">
            <?php while( have_rows('list') ) : the_row(); ?>
                <div class="col-6 col-sm-4 col-lg-3">
                    <div class="item">
                        <div class="wrap-img">
                            <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="">
                        </div>
                        <div class="title"><?php the_sub_field('title'); ?></div>
                        <div class="text"><?php the_sub_field('text'); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>