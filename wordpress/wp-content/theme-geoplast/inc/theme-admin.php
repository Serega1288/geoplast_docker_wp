<?php

add_action( 'after_setup_theme', 'hortiqa_theme_setup', 5 );
function hortiqa_theme_setup() : void {
    /* 1. Підтримка перекладів */
    load_theme_textdomain(
            'theme-hortiqa',                         // має збігатися з Text Domain
            get_template_directory() . '/languages'   // той самий каталог, що й у style.css
    );
    add_theme_support( 'woocommerce' );
}


add_action( 'woocommerce_before_main_content', 'barFilterLeft' , 1 );

// ініціалізація динамісних слав пееркладу (фільтр)
__('popularity', 'theme-hortiqa');
__('rating', 'theme-hortiqa');
__('price', 'theme-hortiqa');
__('price-desc', 'theme-hortiqa');

function remove_wp_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'remove_wp_logo' );
add_theme_support('align-wide');
add_theme_support( 'menus' );
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu-1' => 'header menu top',
            'footer-menu-1' => 'footer menu 1',
            'footer-menu-2' => 'footer menu 2',
            'footer-menu-3' => 'footer menu 3',
            'footer-menu-4' => 'footer menu 4',
            'footer-menu-end' => 'footer menu end',
//            'header-menu-catalog' => 'header menu catalog',
//            'header-menu-mobile' => 'header menu mobile',
//            'category-menu' => 'page menu category',
        )
    );
}
add_action( 'init', 'register_my_menus' );


function true_remove_default_widget() {
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
}
add_action( 'widgets_init', 'true_remove_default_widget', 20 );

function breadcrumb($op = '')
{ if ( function_exists( 'bcn_display' ) ) { ?>
    <div class="wrap-breadcrumb">
        <?php if ( $op !== 'full') : ?>
        <div class="container">
        <?php endif; ?>
            <div class="breadcrumb">
                <?php echo bcn_display(
                        $return = false, $linked = true, $reverse = false, $force = false
                ); ?>
            </div>
        <?php if ( $op !== 'full') : ?>
        </div>
        <?php endif; ?>
    </div>
<?php } }




function WrapFooterMenus($n) {
    $menu_name = 'footer-menu-' . $n;
    $locations = get_nav_menu_locations();
    $menu_id   = isset( $locations[ $menu_name ] ) ? $locations[ $menu_name ] : null;
    $menu      = $menu_id ? wp_get_nav_menu_object( $menu_id ) : null;
    ?>
    <div class="wrap-menu">
        <?php if ( $menu ) : ?>
            <h2 class="menu-title"><?php echo esc_html( $menu->name ); ?></h2>
        <?php endif; ?>
        <ul class="menu menu-2">
            <?php
            wp_nav_menu( [
                    'theme_location'  => $menu_name,
                    'container'       => '',
                    'menu_class'      => 'menu',
                    'items_wrap'      => '%3$s', // без <ul>
                    'fallback_cb'     => false,
            ] );
            ?>
        </ul>
    </div>
<?php }



function lux_trim_words($text, $limit = 20, $suffix = '…') {
    // Повністю очищає текст від HTML і коротких кодів
    $text = wp_strip_all_tags( strip_shortcodes( $text ) );

    // Розбиваємо по словах
    $words = preg_split('/\s+/', trim($text));

    // Якщо більше ніж потрібно — обрізаємо
    if ( count($words) > $limit ) {
        $text = theme - admin . phpimplode(' ', array_slice($words, 0, $limit)) . $suffix;
    }

    return $text;
}
