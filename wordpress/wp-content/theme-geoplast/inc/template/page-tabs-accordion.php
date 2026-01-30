<?php include 'block-option.php'; ?>



<section class="section solution page-tabs-accordion">
    <div class="container">
        <div class="row">
            <h2 class="title fw700 ts-40 ts-sm-32"><?php the_sub_field('title') ?></h2>
        </div>
        <div class="row">
            <div class="col col-3">
                <ul class="solution__items">
                    <?php while (have_rows('list')) : the_row(); ?>
                    <li class="solution__item active">
                        <div class="solution__wrapper">
                            <div class="solution__content fw500 ts-16"><?php the_sub_field('title') ?></div>
                            <svg class="solution__svg">
                                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/image/svg/arrow-solution.svg#arrow"></use>
                            </svg>
                        </div>
                        <ul class="solution__items-info solution__mobile">
                            <li class="solution__item-mobile solution__text-mobile fw500 ts-14">
                                <?php the_sub_field('editor') ?>
                            </li>
                        </ul>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <div class="col solution__info">
                <ul class="solution__items-info">
                    <?php $i=0; while (have_rows('list')) : the_row(); $i++; ?>
                    <li class="solution__item-info <?php if($i==1) echo 'active' ?>">
                        <p class="solution__text-info fw500 ts-14">
                            <?php the_sub_field('editor') ?>
                        </p>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
