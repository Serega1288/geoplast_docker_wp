<?php include 'block-option.php'; ?>

<section
    <?php if( get_sub_field('id_block') ) : ?>
        id="<?php the_sub_field('id_block'); ?>"
    <?php else : ?>
        id="section-<?php echo $args; ?>"
    <?php endif; ?>
    class="section section-single single-download">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-center">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="60" height="60" rx="30" fill="white"/>
                        <path d="M25 30L30 35M30 35L35 30M30 35V25M42.5 30C42.5 36.9036 36.9036 42.5 30 42.5C23.0964 42.5 17.5 36.9036 17.5 30C17.5 23.0964 23.0964 17.5 30 17.5C36.9036 17.5 42.5 23.0964 42.5 30Z" stroke="#71A66C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="title ts-20 ts-sm-16">
                        <?php the_sub_field('title'); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-auto d-flex align-items-center">
                <a download class="btn btn-4 w100-mobile" href="<?php echo get_sub_field('file')['url']; ?>">Download File</a>
            </div>
        </div>
    </div>
</section>