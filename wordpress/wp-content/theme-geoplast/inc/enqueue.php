<?php

//function enqueue_styles() {
//    wp_enqueue_style(
//        'themeluxurydom-style',
//        get_template_directory_uri() . '/assets/css/main.css',
//        [],
//        filemtime(get_template_directory() . '/assets/css/main.css')
//    );
//}
//add_action('wp_enqueue_scripts', 'enqueue_styles');


function enqueue_styles()
{
    wp_dequeue_style('wc-blocks-vendors-style');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('wp-block-library');

//    wp_dequeue_style('wp-loyalty-rules-wlr-font');
//    wp_dequeue_style('wp-loyalty-rules-main-front');
//    wp_dequeue_style('wp-loyalty-rules-alertify-front');

    wp_dequeue_style('yith-wcwl-main');
    wp_dequeue_style('yith-wcwl-font-awesome');
    wp_dequeue_style('jquery-selectBox');

    wp_dequeue_style('thickbox');
    wp_dequeue_style('woocommerce_prettyPhoto_css');

    wp_dequeue_style('hint');
    wp_dequeue_style('wpcvs-frontend');

//    wp_dequeue_style('aioseo/css/css/Caret.be535beb.css');
//    wp_dequeue_style('aioseo/css/css/Caret.be535beb.css-css');
//
//
//    wp_dequeue_style('aioseo/css/css/Tabs.fb196b90.css');
//    wp_dequeue_style('aioseo/css/css/Index.239248de.css');
//    wp_dequeue_style('aioseo/css/css/FacebookPreview.da1d7ac0.css');
//    wp_dequeue_style('aioseo/css/css/GoogleSearchPreview.c6958fc6.css');
//    wp_dequeue_style('aioseo/css/css/TwitterPreview.dfa7e10d.css');
//    wp_dequeue_style('aioseo/css/css/main.8f833d43.css');
//    wp_dequeue_style('aioseo/css/css/main.57ff254a.css');
//    wp_dequeue_style('');


    wp_dequeue_style('berocket_aapf_widget-style'); // this not working, need -> remove plugin link - main.php - 465: plugins_url( ( self::$concat_enqueue_files ? 'assets/frontend/css/main.min.css' : 'assets/frontend/css/widget.css'), __FILE__ ),


//    wp_enqueue_style('fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.min.css', false);
    //wp_enqueue_style('carousel-style', get_template_directory_uri() . '/css/owl.carousel.min.css', false);
//    wp_enqueue_style('lazy-load-css', get_template_directory_uri() . '/lazy-load-css.css', false);
//    wp_enqueue_style('style', get_template_directory_uri() . '/swiper-bundle.min.css', false);

    wp_enqueue_style('swiper-bundle-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', false);
    wp_enqueue_style(
        'hostiqa-style',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        filemtime(get_template_directory() . '/assets/css/main.css')
    );
}

add_action('wp_enqueue_scripts', 'enqueue_styles', 9999999);


remove_filter('berocket_aapf_widget_style', 'filter_berocket_aapf_widget_style', 10, 1);

function enqueue_scripts()
{


//    wp_dequeue_script('prettyPhoto');
//    wp_dequeue_script('prettyPhoto-init');
//    wp_dequeue_script('jquery-selectBox');  // this not working, need -> remove plugin link - class.yith-wcwl-frontend.php - 304: wp_register_script( 'jquery-selectBox', YITH_WCWL_URL . 'assets/js/jquery.selectBox.min.js', array( 'jquery' ), '1.2.0', true );

    //wp_deregister_script('jquery-core');
    //wp_register_script( 'jquery-core', get_site_url() . '/wp-includes/js/jquery/jquery.min.js', false, null,true  );


    if (!is_admin()) {

        wp_localize_script(
            'jquery',                 // ← головна зміна
            'resetAddAjaxData',
            [
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'nonce'    => wp_create_nonce( 'reset_add_nonce' ),
            ]
        );
//        wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/fancybox.umd.js', array('jquery'), null, true);
        wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), null, true);
        wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);

//        remove_action('wp_head', 'wp_print_scripts');
//        remove_action('wp_head', 'wp_print_head_scripts', 9);
//        remove_action('wp_head', 'wp_enqueue_scripts', 1);
//
//        add_action('wp_footer', 'wp_print_scripts', 5);
//        add_action('wp_footer', 'wp_enqueue_scripts', 5);
//        add_action('wp_footer', 'wp_print_head_scripts', 5);


//        wp_deregister_script('jquery-core');
//        wp_register_script('jquery-core', ( get_site_url() . '/wp-includes/js/jquery/jquery.min.js' ), false, '1.3.2', true);
//        wp_enqueue_script('jquery-core');
    }


}

add_action('wp_enqueue_scripts', 'enqueue_scripts', 9999999);


remove_filter('berocket_aapf_widget_style', 'filter_berocket_aapf_widget_style', 10, 1);

