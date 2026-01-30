<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-single single-title-editor">
    <div class="container">
        <?php include 'block-title.php'; ?>
        <div class="text">
            <?php the_sub_field('editor'); ?>
        </div>
    </div>
</section>