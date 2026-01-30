<?php include 'block-option.php';
$h = get_sub_field('h');
$title = get_sub_field('title');
$link = get_sub_field('link');
$count = get_sub_field('cont');
$cat = get_sub_field('cat');
?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-blog">
    <div class="container">

        <div class="row wrap-title">
            <div class="order-1 order-sm-1 col-12 col-sm d-flex align-items-center">
                <<?php echo $h; ?> class="block-title">
                <?php echo $title; ?>
                </<?php echo $h; ?>>
            </div>
            <div class="order-3 order-sm-2 col-12 col-sm-auto wrap-blog-btn">
                <?php
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-1" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <span class="icon arrow-right"><?php echo esc_html( $link_title ); ?></span>
                    </a>
                <?php endif; ?>
            </div>
            <div class="order-2 col-12 order-sm-3">
                <div class="wrap-blog">
                    <?php
                    $cat_ids = [];
                    if ( ! empty( $cat ) ) {
                        // Якщо масив об’єктів (return format – Object).
                        if ( is_array( $cat ) && isset( $cat[0]->term_id ) ) {
                            foreach ( $cat as $term ) {
                                $cat_ids[] = (int) $term->term_id;
                            }
                            // Якщо масив / рядок з ID.
                        } else {
                            $cat_ids = is_array( $cat ) ? array_map( 'intval', $cat ) : [ (int) $cat ];
                        }
                    }
                    $query_args = [
                        'post_type'      => 'post',
                        'posts_per_page' => $count ? (int) $count : '3',
                    ];
                    if ( ! empty( $cat_ids ) ) {
                        $query_args['category__in'] = $cat_ids;
                    }
                    $blog_query = new WP_Query( $query_args );
                    if ( $blog_query->have_posts() ) :
                        echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-3 wrap-post">';
                        while ( $blog_query->have_posts() ) :
                            $blog_query->the_post();
                            echo get_template_part('inc/template/posts/post', 'item');
                        endwhile;
                        echo '</div>';  // .row
                    else :
                        echo '<p>' . esc_html__( 'Записів не знайдено.', 'text-domain' ) . '</p>';
                    endif;
                    wp_reset_postdata();
                    ?>
                </div><!-- /.wrap-blog -->
            </div>
        </div>

    </div>
</section>