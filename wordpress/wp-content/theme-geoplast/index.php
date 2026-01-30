<?php
get_header(); ?>
    <div class="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="container">
                <div class="wrap-block-title style-3">
                    <h1 class="ts-40"><?php the_title(); ?></h1>
                </div>

                <div class="text ts-14">
                    <?php the_content(); ?>
                </div>
        </div>
        <?php endwhile; ?>
    </div>
<?php get_footer();