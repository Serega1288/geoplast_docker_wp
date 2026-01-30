<?php include 'block-option.php';
$title = get_sub_field('title');
$desc = get_sub_field('desc');
$cols = get_sub_field('cols');
$img = get_sub_field('img');
$style = get_sub_field('style');
$ver_align_img = get_sub_field('ver-align-img');
$h = get_sub_field('h');

$cols_right = 12 - $cols;
?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section info-block">
    <div class="container">
        <div class="wrap-block color-<?php echo $style; ?>">
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-<?php echo $cols; ?>">
                    <div class="wrap-block-left">
                        <?php
                        if ($title) : ?>
                            <<?php echo $h; ?> class="block-title style-3">
                                <?php echo $title; ?>
                            </<?php echo $h; ?>>
                        <?php endif; ?>
                        <?php if ($desc) : ?>
                            <div class="text">
                                <?php echo $desc; ?>
                            </div>
                        <?php endif; ?>
                        <div class="wrap-btn">
                            <?php
                            $link = get_sub_field('link');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="btn btn-5" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <span class="icon arrow-right icon-white"><?php echo esc_html( $link_title ); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-flex col-lg-<?php echo $cols_right; ?> align-items-<?php echo $ver_align_img; ?>">
                    <div class="wrap-img align-items-<?php echo $ver_align_img; ?>">
                        <?php if ($img) : ?>
                            <img class="img" src="<?php echo $img['url']; ?>" alt="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>