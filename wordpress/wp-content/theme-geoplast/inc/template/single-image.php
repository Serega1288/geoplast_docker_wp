<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-single single-image">
        <div class="container">
            <img src="<?php echo get_sub_field('img')['url']; ?>">
            <?php if ( get_sub_field('text-img') ) : ?>
            <div class="text-image ts-14 ts-12 fw400">
                <?php the_sub_field('text-img'); ?>
            </div>
            <?php endif; ?>
        </div>
</section>