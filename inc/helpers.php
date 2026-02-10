<?php
/**
 * Допоміжні функції Geoplast (helpers.php)
 */

/* Дозволяємо завантаження SVG (виправлення помилки "cannot be processed") */
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4 );

add_filter( 'upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
} );

/* Хлібні крихти */
function geoplast_breadcrumb($op = '') { 
    if ( function_exists( 'bcn_display' ) ) { ?>
        <div class="wrap-breadcrumb">
            <?php if ( $op !== 'full') : ?><div class="container"><?php endif; ?>
                <div class="breadcrumb">
                    <?php bcn_display(); ?>
                </div>
            <?php if ( $op !== 'full') : ?></div><?php endif; ?>
        </div>
    <?php } 
}

/* Вивід меню у футері */
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
                'theme_location' => $menu_name,
                'container'      => '',
                'menu_class'     => 'menu',
                'items_wrap'     => '%3$s',
                'fallback_cb'    => false,
            ] );
            ?>
        </ul>
    </div>
<?php }

/* Обрізка тексту */
function geoplast_trim_words($text, $limit = 20, $suffix = '…') {
    $text = wp_strip_all_tags( strip_shortcodes( $text ) );
    $words = preg_split('/\s+/', trim($text));
    if ( count($words) > $limit ) {
        $text = implode(' ', array_slice($words, 0, $limit)) . $suffix;
    }
    return $text;
}