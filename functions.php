<?php

/**
 * Theme Geoplast functions and definitions
 */

// Підключаємо всі модулі з папки inc/

require_once get_template_directory() . '/inc/enqueue.php';      // Стилі та скрипти
require_once get_template_directory() . '/inc/theme-setup.php';  // Налаштування теми та підтримка функцій
require_once get_template_directory() . '/inc/theme-admin.php';
// require_once get_template_directory() . '/inc/woo.php';          // Налаштування WooCommerce

// За потреби розкоментуй ці файли, коли вони будуть готові:
require_once get_template_directory() . '/inc/acf.php';
require_once get_template_directory() . '/inc/helpers.php';
