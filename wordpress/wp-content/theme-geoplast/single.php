<?php get_header();

$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
$return_url = get_category_link($category_id);
$tags = get_the_tags();
?>
    <script async src="https://static.addtoany.com/menu/page.js"></script>
    <div class="main page-constructor page-single">
        <div class="main-content">

            <div class="row wrap-start-single">
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

            <h1 class="post-title ts-40 ts-sm-32"><?php the_title(); ?></h1>

            <?php get_template_part( 'inc/box-constructor.php', 'constructor'); ?>

            <div class="meta d-flex align-items-center">
                <strong>Tags:</strong>
                <div class="tags">
                    <?php if ( ! empty( $tags ) ) {
                        foreach ( $tags as $tag ) { ?>
                            <a class="btn btn-5" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
                                <?php echo esc_html( $tag->name ); ?>
                            </a>
                        <?php }
                    } ?>
                </div>
            </div>

            <div class="meta d-flex align-items-center">
                <strong>Copy and Share:</strong>
                <!-- AddToAny BEGIN -->
                <div class="tags a2a_kit a2a_kit_size_32 a2a_default_style"
                     data-a2a-url="<?php the_permalink(); ?>"
                     data-a2a-title="<?php the_title(); ?>">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                </div>
                <!-- AddToAny END -->
            </div>



        </div>
        <?php get_template_part('inc/template/related-articles.php', 'articles'); ?>

    </div>
<?php get_footer();