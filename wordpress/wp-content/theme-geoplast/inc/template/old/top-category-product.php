<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section top-category-product">
    <div class="container">
        <?php
        $title = get_sub_field('title');
        $h = get_sub_field('h');
        if ($title) : ?>
         <<?php echo $h; ?> class="block-title style-3">
             <?php echo $title; ?>
         </<?php echo $h; ?>>
        <?php endif; ?>
        <div class="row list">
            <?php while( have_rows('list') ) : the_row();
                $cat_id = get_sub_field('category');

                $term = get_term( $cat_id, 'product_cat' );
                if ( ! $term || is_wp_error( $term ) ) {
                    return;
                }
                $thumbnail_id = get_term_meta( $cat_id, 'thumbnail_id', true );
                $image_url    = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : '';
                $term_link = get_term_link( $term );
                ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="item proportion size-9x10">
                        <a href="<?php echo $term_link; ?>"  class="wrap-img">
                            <img src="<?php echo $image_url; ?>" alt="">
                            <span class="title btn btn-2"><span class="icon arrow-right"><?php echo $term->name; ?></span></span>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="wrap-btn text-center">
            <?php
            $link = get_sub_field('link');
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
    </div>
</section>