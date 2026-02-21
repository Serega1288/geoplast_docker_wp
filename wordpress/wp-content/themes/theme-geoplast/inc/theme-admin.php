<?php
/**
 * Налаштування адмін-панелі Geoplast (theme-admin.php)
 */

/* Видалення логотипу WordPress */
add_action( 'wp_before_admin_bar_render', function() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
} );

/* Видалення стандартних віджетів */
add_action( 'widgets_init', function() {
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Nav_Menu_Widget');
}, 20 );