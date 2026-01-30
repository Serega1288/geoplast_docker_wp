<?php get_header(); ?>

<div class="main page-category">
    <section class="category-starter">
        <div class="container">
            <?php breadcrumb('full'); ?>
            <h1 class="fs-56 post-title"><?php single_cat_title(); ?></h1>
            <div class="filter">
                <div class="row">
                    <div class="col">
                        <ul class="category-list">
                            <?php
                            $current_cat = get_queried_object_id(); // поточна категорія
                            $categories = get_categories([
                                'hide_empty' => false,
                                'orderby' => 'name',
                                'order' => 'ASC'
                            ]);
                            foreach ( $categories as $cat ) {
                                $active = ( $cat->term_id === $current_cat ) ? 'active' : '';
                                $link = get_category_link( $cat->term_id );
                                echo '<li>';
                                echo '<a class="btn btn-2 ' . esc_attr($active) . '" href="' . esc_url($link) . '">' . esc_html($cat->name) . '</a>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <!-- тут можна вставити фільтри -->
                    </div>
                </div>
            </div>

            <div class="posts">
                <?php $i = 0; while (have_posts()) : the_post();
                    $i++;
                    if ($i === 1) {
                        get_template_part('loop-post.php', 'post', ['i' => $i, 'style' => 2]);
                    }
                endwhile; ?>
            </div>

        </div>
    </section>

    <section>
        <div class="container">
            <div class="row posts row-cols-1 row-cols-sm-2 row-cols-md-4">
                <?php $i = 0; while (have_posts()) : the_post();
                    $i++;
                    if ($i > 1) {
                        get_template_part('loop-post.php', 'post', ['i' => $i, 'style' => 1]);
                    }
                endwhile; ?>
            </div>
            <?php
            the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '',
                    'next_text' => '',
            ));
            ?>
            <input type="hidden" value="<?php echo get_query_var('cat') ?>" id="categoryId">
        </div>
    </section>

</div>

<?php get_footer(); ?>