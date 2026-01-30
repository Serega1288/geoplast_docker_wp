<?php include 'block-option.php';
$img_size = get_sub_field('height');
?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-page page-banner-promo">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 d-flex align-items-center">
                <div class="wrap">
                    <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                        <?php if( get_row_layout() == 'temp-title' ): ?>
                            <?php include 'block-title.php'; ?>
                        <?php elseif( get_row_layout() == 'temp-editor' ): ?>
                            <div class="text">
                                <?php the_sub_field('editor'); ?>
                            </div>
                        <?php elseif( get_row_layout() == 'temp-list' ): ?>
                            <ul class="list">
                                <?php while ( have_rows( 'list' ) ) : the_row(); ?>
                               <li class="d-flex align-items-center">
                                   <span class="icon">
                                       <img src="<?php echo get_sub_field('icon')['url']; ?>" alt="">
                                   </span>
                                   <span class="name"><?php the_sub_field('title'); ?></span>
                               </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php elseif( get_row_layout() == 'temp-list-info' ): ?>
                            <div class="row list-info">
                                <?php $i=0; while ( have_rows( 'list' ) ) : the_row(); $i++; ?>
                                <div class="col-6">
                                    <div class="wrap">
                                        <div class="title ts-24 ts-sm-20 fw700"><?php the_sub_field('title'); ?></div>
                                        <div class="text ts-16 ts-sm-14 fw500 m-0"><?php the_sub_field('text'); ?></div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        <?php elseif( get_row_layout() == 'temp-button' ): ?>
                            <div class="wrap-btn">
                                <?php while ( have_rows( 'btn-list' ) ) : the_row(); ?>
                                    <?php
                                    $link = get_sub_field('btn');
                                    $style = get_sub_field('style');
                                    if( $link ):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a class="btn w100-mobile <?php echo $style; ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-12 col-md-6 pos">
                <div class="wrap-banner proportion <?php if ( $img_size === '2' ) : echo 'adaptive'; else: echo 'size-h100'; endif; ?>">
                    <img src="<?php echo get_sub_field('banner')['url']; ?>" alt="">
                </div>
            </div>
        </div>
    </div>

</section>