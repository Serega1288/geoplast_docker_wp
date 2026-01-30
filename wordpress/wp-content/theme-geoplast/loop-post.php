<?php $style = $args['style'];
$categories = get_the_category();
?>

<?php if ($style === 2) : ?>
    <div class="post post-style-<?php echo esc_attr($style); ?>">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="wrap-img">
                    <a class="proportion size-post" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column wrap-text">
                <div class="row">
                    <div class="col">
                        <?php if ( ! empty( $categories ) ) {
                            foreach ($categories as $value) { ?>
                                <a class="btn btn-3" href="<?php echo esc_url( get_category_link( $value->term_id ) ); ?>">
                                    <?php echo esc_html( $value->name ); ?>
                                </a>
                            <?php }
                        } ?>
                    </div>
                    <div class="col-auto">
                        <div class="date">
                            <?php echo get_the_date('M j, Y'); ?>
                        </div>
                    </div>
                </div>
                <a href="<?php the_permalink(); ?>" class="title fw700 ts-24 ts-sm-20">
                    <?php the_title(); ?>
                </a>
                <div class="text ts-14">
                    <?php echo lux_trim_words( get_field('short_description') , 99); ?>
                </div>
                <div class="wrap-btn mt-auto">
                    <a href="<?php the_permalink(); ?>" class="btn btn-4 w100-mobile">
                        <?php _e('Read article', 'theme-hortiqa'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="col">
        <div class="post post-style-<?php echo esc_attr($style); ?>">
            <div class="wrap-img">
                <a class="proportion size-post" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                </a>
            </div>
            <div class="row">
                <div class="col">
                    <?php if ( ! empty( $categories ) ) {
                        foreach ($categories as $value) { ?>
                            <a class="btn btn-3" href="<?php echo esc_url( get_category_link( $value->term_id ) ); ?>">
                                <?php echo esc_html( $value->name ); ?>
                            </a>
                        <?php }
                    } ?>
                </div>
                <div class="col-auto">
                    <div class="date">
                        <?php echo get_the_date('M j, Y'); ?>
                    </div>
                </div>
            </div>
            <a href="<?php the_permalink(); ?>" class="title fw700 ts-20 ts-sm-18 fw-700">
                <?php the_title(); ?>
            </a>
            <div class="text ts-14">
                <?php echo lux_trim_words( get_field('short_description') , 14); ?>
            </div>
            <div class="wrap-btn">
                <a href="<?php the_permalink(); ?>" class="link link-1">
                    <?php _e('Read more', 'theme-hortiqa'); ?>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>