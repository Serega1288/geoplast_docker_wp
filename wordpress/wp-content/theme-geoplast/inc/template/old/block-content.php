<?php include 'block-option.php';


$column_left_desc = get_sub_field('column-left-desc');
$column_left_tablet = get_sub_field('column-left-tablet');
$column_left_mobile = get_sub_field('column-left-mobile');
$content_left = get_sub_field('content-left');

$column_right_desc = get_sub_field('column-right-desc');
$column_right_tablet = get_sub_field('column-right-tablet');
$column_right_mobile = get_sub_field('column-right-mobile');
$content_right = get_sub_field('content-right');


$readmore = get_sub_field('readmore');
?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section block-content">
    <div class="container">
        <div class="text <?php if ( $readmore ) : ?>text-readmore anim<?php endif; ?>">
            <div class="row">
                <?php if ( $content_left ) : ?>
                <div class="col-<?php echo $column_left_mobile; ?> col-lg-<?php echo $column_left_tablet; ?> col-xl-<?php echo $column_left_desc; ?>">
                    <div class="wrap-block-left">
                        <?php foreach( $content_left as $row_left ) { ?>

                            <?php if ( $row_left['type'] === 'title' ) :
                            $title = $row_left['title'];
                            $h = $row_left['h'];
                            $style_title = $row_left['style-title'];
                            $size = $row_left['size'];
                            ?>
                                <?php if ($title && $h && $style_title ) : ?>
                                    <<?php echo $h; ?> class="block-title <?php if ($style_title === '1') : echo $size; endif; ?> style-title-<?php echo $style_title; ?>">
                                    <?php echo $title; ?>
                                    </<?php echo $h; ?>>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if ( $row_left['type'] === 'editor' ) : ?>
                                <div class="editor">
                                    <?php echo $row_left['editor']; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( $row_left['type'] === 'quote' ) : ?>
                                <blockquote class="quote">
                                    <?php echo $row_left['quote']; ?>
                                </blockquote>
                            <?php endif; ?>

                        <?php } ?>
                    </div>
                </div>
                <?php endif; ?>

            <?php if ( $content_right ) : ?>
            <div class="col-<?php echo $column_right_mobile; ?> col-lg-<?php echo $column_right_tablet; ?> col-xl-<?php echo $column_right_desc; ?>">
                <div class="wrap-block-right">
                    <?php foreach( $content_right as $row_right ) { ?>

                    <?php if ( $row_right['type'] === 'title' ) :
                    $title = $row_right['title'];
                    $h = $row_right['h'];
                    $style_title = $row_right['style-title'];
                    $size = $row_right['size'];
                    ?>
                    <?php if ($title && $h && $style_title ) : ?>
                    <<?php echo $h; ?> class="block-title <?php if ($style_title === '1') : echo $size; endif; ?> style-title-<?php echo $style_title; ?>">
                    <?php echo $title; ?>
                </<?php echo $h; ?>>
                <?php endif; ?>
                <?php endif; ?>

                <?php if ( $row_right['type'] === 'editor' ) : ?>
                    <div class="editor">
                        <?php echo $row_right['editor']; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $row_right['type'] === 'quote' ) : ?>
                    <div class="quote">
                        <?php echo $row_right['quote']; ?>
                    </div>
                <?php endif; ?>

                <?php } ?>
            </div>
        </div>
        <?php endif; ?>

            </div>
        </div>
        <?php if ( $readmore ) : ?>
            <div class="wrap-btn text-center">
                <span class="btn btn-1 js-readmore">
                    <span class="icon arrow-right"><?php echo esc_html__( 'Читати ще', 'themeluxurydom' ); ?></span>
                </span>
            </div>
        <?php endif; ?>
    </div>
</section>