<div class="col">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href="<?php the_permalink(); ?>" class="post-thumb">
            <span class="wrap-img proportion size-image-item-post">
                <?php the_post_thumbnail( 'medium_large' ); ?>
            </span>
            <h3 class="post-title">
                <?php the_title(); ?>
            </h3>
        </a>
        <div class="post-text">
            <?php
            $excerpt = wp_strip_all_tags(get_the_excerpt(), true);
            $excerpt = wp_trim_words($excerpt, 20, '...');
            echo $excerpt;
            ?>
        </div>
        <div class="post-wrap-btn row">
            <div class="col col-lg-7 col-xl-7">
                <a class="btn btn-1 wAuto w100" href="<?php echo get_the_permalink(); ?>">
                   <span class="icon arrow-right">
                    <?php esc_html_e( 'Readmore', 'theme-hortiqa' ); ?>
                   </span>
                </a>
            </div>
            <div class="col-auto col-lg-5 col-xl-5 d-flex align-items-center justify-content-end">
                <span class="icon calendar"></span>
                <time style="margin-left: 1rem" class="post-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                    <?php echo get_the_date(); ?>
                </time>
            </div>
        </div>
    </article>
</div>