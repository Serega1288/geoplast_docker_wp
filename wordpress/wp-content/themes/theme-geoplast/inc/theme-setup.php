<?php
/**
 * Основні налаштування теми Geoplast (theme-setup.php)
 */

add_action( 'after_setup_theme', function() {
    /* Підтримка перекладів */
    load_theme_textdomain( 'theme-geoplast', get_template_directory() . '/languages' );
    
    /* Підтримка функцій */
    add_theme_support( 'woocommerce' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
}, 5 );

/* Реєстрація меню */
add_action( 'init', function() {
    register_nav_menus( array(
        'header-menu-1'   => 'Header menu top',
        'footer-menu-1'   => 'Footer menu 1',
        'footer-menu-2'   => 'Footer menu 2',
        'footer-menu-3'   => 'Footer menu 3',
        'footer-menu-4'   => 'Footer menu 4',
        'footer-menu-end' => 'Footer menu end',
    ) );
} );

/* Хуки для WooCommerce */
add_action( 'woocommerce_before_main_content', 'barFilterLeft' , 1 );

/* Ініціалізація слів перекладу */
__('popularity', 'theme-geoplast');
__('rating', 'theme-geoplast');
__('price', 'theme-geoplast');
__('price-desc', 'theme-geoplast');