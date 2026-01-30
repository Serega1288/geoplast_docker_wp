<?php include 'block-option.php'; ?>


<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-page block-forms">
    <div class="container">
        <div class="wrap">
            <?php if ( get_sub_field('title') ) : ?>
                <h2 class="block-title ts-40 ts-sm-20">
                    <?php the_sub_field('title'); ?>
                </h2>
            <?php endif;  ?>
            <div class="text">
                <?php echo do_shortcode(get_sub_field('shortcode')); ?>
            </div>
        </div>
    </div>
</section>