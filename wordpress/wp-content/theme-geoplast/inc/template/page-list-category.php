<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-page page-list-category">
    <div class="container">
        <div class="row">
            <?php $i=0; while ( have_rows( 'list' ) ) : the_row(); $i++; ?>
                <?php if ( $i == 1 ) : ?>
                <div class="col-12">
                    <a style="background-image: url('<?php echo get_sub_field('image')['url']; ?>')"
                       href="<?php the_sub_field('url'); ?>" class="style-1 proportion">
                        <span class="d-flex align-items-center flex-column justify-content-center h-100">
                            <span class="title ts-40 ts-sm-20">
                                <?php the_sub_field('title'); ?>
                            </span>
                                <span class="btn btn-4">
                                <?php the_sub_field('text_label'); ?>
                            </span>
                        </span>
                    </a>
                </div>
                <?php else : ?>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a  style="background-image: url('<?php echo get_sub_field('image')['url']; ?>')"
                            href="<?php the_sub_field('url'); ?>" class="style-2 proportion">
                            <span>
                                <span class="btn btn-1">
                                    <?php the_sub_field('text_label'); ?>
                                </span>
                                <span class="title link link-2 ts-20 ts-sm-18 d-flex justify-content-between align-items-center">
                                    <span><?php the_sub_field('title'); ?></span>
                                    <span class="btn btn-4">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_258_21427)">
                                            <path d="M8 4L14 10L8 16" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_258_21427">
                                            <rect width="20" height="20" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>

</section>