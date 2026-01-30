<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-page page-list-category-2">
    <div class="container">
        <?php include 'block-title.php'; ?>

        <?php while ( have_rows( 'list' ) ) : the_row();
            $link = get_field('link');
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a href="<?php echo esc_url( $link_url ); ?>"
               target="<?php echo esc_attr( $link_target ); ?>"
               class="wrap">
                <span class="row">
                    <span class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <strong class="title ts-24 ts-sm-18">
                            <?php the_sub_field('title'); ?>
                        </strong>
                        <span class="text">
                            <?php the_sub_field('text'); ?>
                        </span>
                        <span class="wrap-btn">
                            <span class="btn btn-6 w100-mobile">
                                Learn more
                            </span>
                        </span>
                    </span>
                    <span class="col-12 col-md-6">
                        <span class="proportion size-post">
                            <img src="<?php echo get_sub_field('image')['url'] ?>">
                        </span>
                    </span>
                </span>
            </a>
        <?php endwhile; ?>
    </div>

</section>