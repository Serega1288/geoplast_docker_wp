<?php
/**
 * Підключення ресурсів теми Geoplast (enqueue.php)
 */

// 1. Підключення та очищення стилів
function geoplast_enqueue_styles() {
    // Відключаємо "важкі" або непотрібні стилі плагінів для прискорення завантаження
    wp_dequeue_style('wc-blocks-vendors-style');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('yith-wcwl-main');
    wp_dequeue_style('yith-wcwl-font-awesome');
    wp_dequeue_style('jquery-selectBox');
    wp_dequeue_style('thickbox');
    wp_dequeue_style('woocommerce_prettyPhoto_css');
    wp_dequeue_style('hint');
    wp_dequeue_style('wpcvs-frontend');
    wp_dequeue_style('berocket_aapf_widget-style');

    // Шрифти (Ubuntu Sans, які ти згадував раніше)
    wp_enqueue_style('geoplast-fonts', 'https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap', [], null);

    // Сторонні бібліотеки (Swiper)
    wp_enqueue_style('swiper-bundle-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', [], '1.0.0');
    
    // Основний файл стилів із автоматичною версією
    wp_enqueue_style(
        'geoplast-main-style',
        get_template_directory_uri() . '/assets/css/styles.css',
        [],
        filemtime(get_template_directory() . '/assets/css/styles.css')
    );
}
add_action('wp_enqueue_scripts', 'geoplast_enqueue_styles', 9999);

// 2. Підключення скриптів
function geoplast_enqueue_scripts() {
    // Підключаємо Swiper (залежність від jQuery, якщо потрібно)
    wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', ['jquery'], null, true);
    
    // Головний файл скриптів
    wp_enqueue_script(
        'geoplast-main-js', 
        get_template_directory_uri() . '/assets/js/scripts.js', 
        ['jquery'], 
        filemtime(get_template_directory() . '/assets/js/scripts.js'), 
        true
    );

    // Передача даних для AJAX у JS (використовуй об'єкт themeData у своєму scripts.js)
    wp_localize_script('geoplast-main-js', 'themeData', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('geoplast_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'geoplast_enqueue_scripts', 9999);

// Прибираємо фільтри плагінів, які заважають кастомізації
remove_filter('berocket_aapf_widget_style', 'filter_berocket_aapf_widget_style', 10);