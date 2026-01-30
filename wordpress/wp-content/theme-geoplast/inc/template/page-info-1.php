<?php include 'block-option.php';
$style = get_sub_field('style');
?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-page page-info-1">
    <div class="container">
        <?php if ( get_sub_field('title') ) : ?>
            <h2 class="block-title ts-40 ts-sm-32"><?php echo get_sub_field('title'); ?></h2>
        <?php endif; ?>
        <div class="row justify-content-center">
            <?php $i=0; while ( have_rows( 'list' ) ) : the_row(); $i++; ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="wrap">

                        <?php if( $style == '3' ) : ?>
                            <div class="row-title text-center">
                                <div class="img m-auto">
                                    <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="">
                                </div>
                                <div class="ts-20 ts-sm-18" style="margin-top: 1rem; margin-bottom: 2rem;">
                                    <span class="step"><?php echo $i; ?></span><?php the_sub_field('title'); ?>
                                </div>
                            </div>
                            <div class="text ts-14 text-center">
                                <?php the_sub_field('text'); ?>
                            </div>
                        <?php elseif( $style == '2' ) : ?>
                            <div class="row-title text-center">
                                <div class="img m-auto">
                                    <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="">
                                </div>
                                <div class="ts-20 ts-sm-18" style="margin-top: 1rem; margin-bottom: 2rem;">
                                    <?php the_sub_field('title'); ?>
                                </div>
                            </div>
                            <div class="text ts-14 text-center">
                                <?php the_sub_field('text'); ?>
                            </div>
                        <?php else: ?>
                            <div class="row-title d-flex align-items-center">
                                <div class="img">
                                    <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="">
                                </div>
                                <div class="ts-20 ts-sm-18">
                                    <?php the_sub_field('title'); ?>
                                </div>
                            </div>
                            <div class="text ts-14">
                                <?php the_sub_field('text'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</section>