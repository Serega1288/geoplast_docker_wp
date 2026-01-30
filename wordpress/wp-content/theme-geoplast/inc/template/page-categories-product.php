<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-page page-categories-product">

    <div class="container">
        <?php include 'block-title.php'; ?>
        <div class="row">
            <?php while ( have_rows( 'list_category' ) ) : the_row(); ?>
                <div class="col-12 col-md-6">
                    <a href="<?php the_sub_field('url'); ?>" class="wrap">
                        <span class="icon">
                            <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="">
                        </span>
                        <span class="img proportion size-post">
                             <img src="<?php echo get_sub_field('image')['url']; ?>" alt="">
                        </span>
                        <span class="title ts-24 ts-sm-20">
                            <?php the_sub_field('title'); ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 6L15 12L9 18" stroke="#16303D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</section>