<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-single single-title text-<?php the_sub_field('text-align'); ?> <?php the_sub_field('font-weight'); ?>">
    <div class="container">
        <?php if ( get_sub_field('title') ) : ?>
        <?php include 'block-title.php'; ?>
        <?php endif; ?>
    </div>
</section>