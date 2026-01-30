<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section wrap-banners">
    <div class="container">
        <div class="row">
            <?php
            $img1 = get_sub_field('image-1');
            $url_1 = get_sub_field('url-1');

            $img2 = get_sub_field('image-2');
            $img3 = get_sub_field('image-3');
            $url_2 = get_sub_field('url-2');
            $url_3 = get_sub_field('url-3');
            $title = get_sub_field('title');
            ?>
            <div class="<?php if(!$img2 && !$img3) : ?>col-12<?php else: ?>col-12 col-md-8<?php endif; ?> banner-left">
                <?php if ($title) : ?>
                    <h1 class="block-title style-3"><?php echo $title; ?></h1>
                <?php endif; ?>
                <<?php if ($url_1) { echo 'a href="'.$url_1['url'].'"'; } else { echo 'div'; } ?>
                        class="banner proportion size-43x20">
                    <img src="<?php echo get_sub_field('image-1')['url'] ?>" alt="">
                </<?php if ($url_1) { echo 'a'; } else { echo 'div'; } ?>>
            </div>
            <?php if ( $img2 || $img3 ) : ?>
            <div class="col">
                <div class="banners h100 d-flex flex-md-column">
                    <?php if ($img2) : ?>
                    <div class="banner-1">
                        <<?php if ($url_2) { echo 'a href="'.$url_2['url'].'"'; } else { echo 'div'; } ?>
                        class="proportion">
                            <img src="<?php echo $img2['url'] ?>" alt="">
                        </<?php if ($url_2) { echo 'a'; } else { echo 'div'; } ?>>
                    </div>
                    <?php endif; ?>
                    <?php if ($img3) : ?>
                    <div class="banner-2">
                        <<?php if ($url_3) { echo 'a href="'.$url_3['url'].'"'; } else { echo 'div'; } ?>
                        class="proportion">
                            <img src="<?php echo $img3['url'] ?>" alt="">
                        </<?php if ($url_3) { echo 'a'; } else { echo 'div'; } ?>>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
</section>