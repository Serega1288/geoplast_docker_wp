<?php
$constructor_name = $args;
$step_section = 0; while ( have_rows( 'constructor' ) ) : the_row(); $args = $step_section++;
    $disable = get_sub_field('disable_block');
    ?>


    <?php  //if( get_row_layout() == 'banner-slider' ): ?>

    <?php //get_template_part( 'inc/template/banner', 'slider'); ?>

    <?php if( get_row_layout() == 'template-single-image' ): ?>

        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/single', 'image', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-single-editor' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/single', 'editor', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-single-title' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/single', 'title', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-single-product' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/single', 'product', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-single-quotation' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/single', 'quotation', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-single-download' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/single', 'download', $args . '-' . $constructor_name );
        } ?>


    <?php elseif( get_row_layout() == 'template-page-banner-promo' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'banner-promo', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-slider-logo' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'slider-logo', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-categories-product' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'categories-product', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-info-1' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'info-1', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-list-category' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'list-category', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-list-category-2' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'list-category-2', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-related-articles' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'related-articles', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-reviews' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'reviews', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-seo-text-scroll' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'seo-text-scroll', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-portfolio' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'portfolio', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-slider-mini' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'slider-mini', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-tabs-accordion' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'tabs-accordion', $args . '-' . $constructor_name );
        } ?>

    <?php elseif( get_row_layout() == 'template-page-forms' ): ?>
        <?php if( $disable == true ) {} else {
            get_template_part( 'inc/template/page', 'forms', $args . '-' . $constructor_name );
        } ?>



    <?php endif; endwhile; ?>



