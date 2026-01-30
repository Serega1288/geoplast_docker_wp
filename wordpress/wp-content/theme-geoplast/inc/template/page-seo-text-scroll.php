<section id="<?php the_sub_field('id_block'); ?>" class="seo-text">
    <div class="container">
        <?php if (get_sub_field('title')) : ?>
            <h2 class="block-title line">
                <span><?php the_sub_field('title'); ?></span>
            </h2>
        <?php endif; ?>

        <div class="WrapContentSeo">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="WrapScroll">
                        <div class="WrapMenuScroll">
                            <?php
                            $i = 0;
                            while (have_rows('list_seo_block')) : the_row();
                                $i++; ?>
                                <div scroll="h2-item-<?php echo $i; ?>" class="tab-item item fw500 ts-16 ">
                                    <?php the_sub_field('title'); ?>
                                    <svg class="solution__svg">
                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/image/svg/arrow-solution.svg#arrow"></use>
                                    </svg>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="WrapContent">

                        <?php $i = 0;
                        while (have_rows('list_seo_block')) : the_row();
                            $i++; ?>
                            <div class="subject-wrapper">
                                <h2 id="h2-item-<?php echo $i; ?>" class="subject h2 fw500 ts-20 active">
									<span class="plus"> <svg class="solution__svg">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/image/svg/arrow-solution.svg#arrow"></use>
										</svg></span> <strong><?php the_sub_field('title'); ?></strong>
                                </h2>
                                <div class="block-text WrapContentItem fw500 ts-14">
                                    <?php
                                    $editor_content = get_sub_field('editor');
                                    if ($editor_content) {
                                        $editor_content = str_replace('<p>', '<p class="tabs-text">', $editor_content);
                                        echo $editor_content;
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php endwhile; ?>

                    </div>
                </div>
            </div>
            <?php /*endif;*/ ?>


        </div>
    </div>
</section>

<!---->
<!--<script>-->
<!--    window.addEventListener('load', () => {-->
<!--        const subjects = document.querySelectorAll('.subject');-->
<!--        const contents = document.querySelectorAll('.WrapContentItem');-->
<!--        const testScroll = document.querySelectorAll('.tab-item');-->
<!---->
<!--        if (subjects.length === 0 || contents.length === 0 || testScroll.length === 0) return;-->
<!---->
<!---->
<!--        subjects.forEach(item => item.classList.add('active'));-->
<!--        contents.forEach(item => {-->
<!--            item.classList.remove('active');-->
<!--            item.style.display = 'none';-->
<!--        });-->
<!---->
<!--        subjects[0].classList.remove('active');-->
<!--        contents[0].classList.add('active');-->
<!--        contents[0].style.display = 'block';-->
<!---->
<!---->
<!--        testScroll.forEach((item, indx) => {-->
<!--            item.addEventListener('click', () => {-->
<!---->
<!--                testScroll.forEach(tab => tab.classList.remove('active'));-->
<!---->
<!--                item.classList.add('active');-->
<!---->
<!---->
<!--                if (!subjects[indx] || !contents[indx]) return;-->
<!---->
<!---->
<!--                subjects.forEach(sub => sub.classList.add('active'));-->
<!--                contents.forEach(cont => {-->
<!--                    cont.classList.remove('active');-->
<!--                    cont.style.display = 'none';-->
<!--                });-->
<!---->
<!---->
<!--                subjects[indx].classList.remove('active');-->
<!--                contents[indx].classList.add('active');-->
<!--                contents[indx].style.display = 'block';-->
<!--            });-->
<!--        });-->
<!---->
<!--    });-->
<!--</script> -->