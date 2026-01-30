<?php
/**
 * Клас для імпорту товарів з CSV
 */
class ThemeLuxuryDom_Product_Importer {
    /**
     * Slug сторінки в адмінці
     */
    const PAGE_SLUG = 'theme-product-importer';

    /**
     * Назва nonce для безпеки
     */
    const NONCE_NAME = 'theme_product_importer_nonce';

    /**
     * Шлях до CSV файлу
     */
    private $csv_file;

    /**
     * Конструктор класу
     */
    public function __construct() {
        // Шлях до CSV файлу в темі
        $this->csv_file = get_template_directory() . '/importCSV/list.tsv';

        // Реєстрація меню в адмінці
        add_action('admin_menu', array($this, 'add_admin_menu'));

        // Підключення скриптів для адмінки
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));

        // AJAX обробник для відображення CSV даних'
        add_action('wp_ajax_theme_import_display', array($this, 'ajax_display_csv'));

        // AJAX обробник для імпорту товарів
        add_action('wp_ajax_theme_import_products', array($this, 'ajax_import_products'));
    }

    /**
     * Додає пункт меню в адмінку
     */
    public function add_admin_menu() {
        add_submenu_page(
            'edit.php?post_type=product', // Батьківське меню (Товари)
            __('Імпорт CSV', 'themeluxurydom'),
            __('Імпорт CSV', 'themeluxurydom'),
            'manage_woocommerce',
            self::PAGE_SLUG,
            array($this, 'render_admin_page')
        );
    }

    /**
     * Підключає скрипти і стилі для сторінки адмінки
     */
    public function enqueue_admin_scripts($hook) {
        // Перевіряємо, що ми на потрібній сторінці
        if (strpos($hook, self::PAGE_SLUG) === false) {
            return;
        }

        // Стилі
        wp_enqueue_style(
            'theme-product-importer-css',
            get_template_directory_uri() . '/assets/css/admin-product-importer.css',
            array(),
            filemtime(get_template_directory() . '/assets/css/admin-product-importer.css')
        );

        // Скрипти
        wp_enqueue_script(
            'theme-product-importer-js',
            get_template_directory_uri() . '/assets/js/admin-product-importer.js',
            array('jquery'),
            filemtime(get_template_directory() . '/assets/js/admin-product-importer.js'),
            true
        );

        // Передаємо дані для JavaScript
        wp_localize_script(
            'theme-product-importer-js',
            'themeImporter',
            array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce(self::NONCE_NAME),
                'i18n' => array(
                    'loadingText' => __('Завантаження...', 'themeluxurydom'),
                    'noDataText' => __('Немає даних для відображення', 'themeluxurydom'),
                    'errorText' => __('Помилка при завантаженні даних', 'themeluxurydom'),
                    'importingText' => __('Імпортування товарів...', 'themeluxurydom'),
                    'importSuccess' => __('Товари успішно імпортовані', 'themeluxurydom'),
                    'importError' => __('Виникла помилка під час імпорту', 'themeluxurydom'),
                    'confirmImport' => __('Ви впевнені, що хочете імпортувати товари з CSV?', 'themeluxurydom')
                )
            )
        );
    }

    /**
     * Рендерить сторінку адміністратора
     */
    public function render_admin_page() {
        // Перевіряємо наявність CSV файлу
        $file_exists = file_exists($this->csv_file);
        ?>
        <div class="wrap theme-product-importer">
            <h1><?php _e('Імпорт товарів з CSV', 'themeluxurydom'); ?></h1>

            <div class="card">
                <h2><?php _e('Інформація про файл', 'themeluxurydom'); ?></h2>

                <?php if ($file_exists): ?>
                    <p>
                        <strong><?php _e('Файл:', 'themeluxurydom'); ?></strong>
                        <?php echo basename($this->csv_file); ?>
                    </p>
                    <p>
                        <strong><?php _e('Шлях:', 'themeluxurydom'); ?></strong>
                        <?php echo $this->csv_file; ?>
                    </p>
                    <p>
                        <strong><?php _e('Розмір:', 'themeluxurydom'); ?></strong>
                        <?php echo size_format(filesize($this->csv_file)); ?>
                    </p>

                    <div class="form-field">
                        <label for="rows-to-display"><?php _e('Кількість рядків для відображення:', 'themeluxurydom'); ?></label>
                        <input type="number" id="rows-to-display" min="1" max="100" value="10">
                        <button id="display-csv" class="button button-primary"><?php _e('Відобразити дані', 'themeluxurydom'); ?></button>
                        <span id="loading-indicator" class="loading" style="display: none;"><?php _e('Завантаження...', 'themeluxurydom'); ?></span>
                    </div>
                <?php else: ?>
                    <div class="notice notice-error">
                        <p><?php printf(__('CSV файл не знайдено за шляхом: %s', 'themeluxurydom'), $this->csv_file); ?></p>
                        <p><?php _e('Будь ласка, переконайтеся, що файл list.csv існує в папці importCSV вашої теми.', 'themeluxurydom'); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($file_exists): ?>
                <div class="card">
                    <h2><?php _e('Імпорт товарів', 'themeluxurydom'); ?></h2>

                    <div class="import-description">
                        <p><?php _e('Використовуйте цей блок для імпорту товарів з TSV файлу до вашого магазину WooCommerce.', 'themeluxurydom'); ?></p>
                        <p><?php _e('Переконайтеся, що ваш TSV файл містить всі необхідні колонки для імпорту товарів.', 'themeluxurydom'); ?></p>
<!--                        <p class="notice notice-warning" style="padding: 10px;">-->
<!--                            <strong>--><?php //_e('Тестовий режим:', 'themeluxurydom'); ?><!--</strong>-->
<!--                            --><?php //_e('Наразі увімкнено обмеження на 10 товарів для тестування.', 'themeluxurydom'); ?>
<!--                        </p>-->
                    </div>

                    <div class="import-controls">
                        <div class="form-field">
                            <label for="import-mode"><?php _e('Режим імпорту:', 'themeluxurydom'); ?></label>
                            <select id="import-mode">
                                <option value="all"><?php _e('Імпортувати всі товари', 'themeluxurydom'); ?></option>
                                <option value="update"><?php _e('Оновити існуючі товари', 'themeluxurydom'); ?></option>
<!--                                <option value="new">--><?php //_e('Створити лише нові товари', 'themeluxurydom'); ?><!--</option>-->
                            </select>
                        </div>

                        <div class="form-field">
                            <label for="batch-size"><?php _e('Кількість товарів для обробки за раз:', 'themeluxurydom'); ?></label>
                            <input type="number" id="batch-size" min="1" max="50" value="5">
                            <p class="description"><?php _e('Зменште це значення, якщо виникають проблеми з часом виконання. Для тестування рекомендується 1-5 товарів.', 'themeluxurydom'); ?></p>
                        </div>

                        <div class="form-field">
                            <label for="max-products"><?php _e('Максимальна кількість товарів для імпорту (тестовий режим):', 'themeluxurydom'); ?></label>
                            <input type="number" id="max-products" min="1" max="100" value="">
                            <p class="description"><?php _e('Це обмеження для швидкого тестування. Буде імпортовано лише вказану кількість товарів.', 'themeluxurydom'); ?></p>
                        </div>

                        <div class="form-field">
                            <button id="start-import" class="button button-primary"><?php _e('Розпочати імпорт', 'themeluxurydom'); ?></button>
                            <span id="import-status" class="loading" style="display: none;"><?php _e('Імпортування...', 'themeluxurydom'); ?></span>
                        </div>

                        <div id="import-result" class="notice notice-success" style="display: none;"></div>
                        <div id="import-error" class="notice notice-error" style="display: none;"></div>

                        <div id="import-progress">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 0%;"></div>
                            </div>
                            <div class="progress-text">0%</div>
                        </div>
                    </div>
                </div>

                <div class="card" id="csv-preview" style="display: none;">
                    <h2><?php _e('Перегляд CSV даних', 'themeluxurydom'); ?></h2>
                    <div id="csv-data-container"></div>
                </div>

                <div class="card" id="debug-info" style="display: none;">
                    <h2><?php _e('Інформація для налагодження', 'themeluxurydom'); ?></h2>
                    <div id="debug-container"></div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    /**
     * AJAX обробник для відображення CSV даних
     */
    public function ajax_display_csv() {
        // Перевіряємо nonce
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], self::NONCE_NAME)) {
            wp_send_json_error(array('message' => __('Помилка безпеки. Спробуйте оновити сторінку.', 'themeluxurydom')));
        }

        // Перевіряємо права користувача
        if (!current_user_can('manage_woocommerce')) {
            wp_send_json_error(array('message' => __('Недостатньо прав для цієї дії.', 'themeluxurydom')));
        }

        // Отримуємо кількість рядків для відображення
        $limit = isset($_POST['limit']) ? intval($_POST['limit']) : 10;
        if ($limit < 1) {
            $limit = 10;
        }

        // Перевіряємо наявність файлу
        if (!file_exists($this->csv_file)) {
            wp_send_json_error(array('message' => __('CSV файл не знайдено.', 'themeluxurydom')));
        }

        // Читаємо CSV файл
        $result = $this->read_csv($this->csv_file, $limit);

        if (!$result[0]) {
            wp_send_json_error(array('message' => $result[1]));
        }

        // Повертаємо дані
        wp_send_json_success($result[1]);
    }


    /**
     * AJAX обробник для імпорту товарів
     */
    public function ajax_import_products() {
        // Перевіряємо nonce
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], self::NONCE_NAME)) {
            wp_send_json_error(array('message' => __('Помилка безпеки. Спробуйте оновити сторінку.', 'themeluxurydom')));
        }

        // Перевіряємо права користувача
        if (!current_user_can('manage_woocommerce')) {
            wp_send_json_error(array('message' => __('Недостатньо прав для цієї дії.', 'themeluxurydom')));
        }

        // Отримуємо режим імпорту
        $mode = isset($_POST['mode']) ? sanitize_text_field($_POST['mode']) : 'all';
        $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
        $batch_size = isset($_POST['batch_size']) ? intval($_POST['batch_size']) : 10;

        if ($batch_size < 1) $batch_size = 1;
        if ($batch_size > 1000) $batch_size = 1000; // або без ліміту, якщо впевнені в потужності сервера

        // ... зчитування даних з CSV

        try {
            $csv_data = $this->read_csv_part($this->csv_file, $offset, $batch_size);

            if (!$csv_data['success']) {
                wp_send_json_error( array('message' => $csv_data['message']) );
                return;
            }

            $results = array(
                'total' => $csv_data['total_rows'],
                'processed' => $offset + count($csv_data['rows']),
                'success' => 0,
                'errors' => 0,
                'messages' => array(),
                'debug_info' => array(),
                'completed' => false
            );

            foreach ($csv_data['rows'] as $row_index => $row) {
                try {
                    $import_result = $this->import_product($row, $mode);
                    if ($import_result['success']) {
                        $results['success']++;
                        $results['messages'][] = $import_result['message'];
                    } else {
                        $results['errors']++;
                        $results['messages'][] = $import_result['message'];
                    }
                    if (isset($import_result['debug'])) {
                        $results['debug_info'][] = "Рядок #" . ($offset + $row_index + 1) . ": " . $import_result['debug'];
                    }
                } catch (Exception $e) {
                    $results['errors']++;
                    $results['messages'][] = sprintf(
                        __('Помилка при імпорті рядка %d: %s', 'themeluxurydom'),
                        $offset + $row_index + 1,
                        $e->getMessage()
                    );
                    $results['debug_info'][] = "Exception at row #" . ($offset + $row_index + 1) . ": " . $e->getMessage() . "\n" . $e->getTraceAsString();
                }
            }

            // Перевіряємо, чи всі товари оброблені (або просто віддаємо результат без completed)
            if ($results['processed'] >= $csv_data['total_rows']) {
                $results['completed'] = true;
            }

            wp_send_json_success($results);

        } catch (Exception $e) {
            error_log('CSV Import Error: ' . $e->getMessage());
            wp_send_json_error(array(
                'message' => -product - importer . php__('Виникла помилка під час імпорту: ', 'themeluxurydom') . $e->getMessage(),
                'debug' => $e->getTraceAsString()
            ));
        }
    }

    /**
     * Зчитує частину CSV файлу
     *
     * @param string $file Шлях до CSV файлу
     * @param int $offset Початкова позиція (рядок)
     * @param int $limit Кількість рядків для зчитування
     * @return array Результат зчитування
     */
    private function read_csv_part($filename, $offset = 0, $limit = 5) {
        $result = [
            'success' => false,
            'message' => '',
            'rows' => [],
            'total_rows' => 0
        ];
        if (!file_exists($filename)) {
            $result['message'] = 'Файл не знайдено.';
            return $result;
        }

        $fh = fopen($filename, 'r');
        if (!$fh) {
            $result['message'] = 'Не вдалося відкрити файл.';
            return $result;
        }

        // Читаємо заголовки
        $headers = fgetcsv($fh, 0, "\t");
        if (!$headers) {
            fclose($fh);
            $result['message'] = 'Порожній файл чи помилка читання.';
            return $result;
        }

        // Формуємо унікальні заголовки (приклеюємо індекс до дублікатів)
        $header_counts = [];
        $unique_headers = [];
        foreach ($headers as $header) {
            $base = $header;
            if (!isset($header_counts[$base])) $header_counts[$base] = 1;
            else $header_counts[$base]++;
            $count = $header_counts[$base];
            $unique_headers[] = ($count > 1) ? $base . '_' . $count : $base;
        }

        // Пропускаємо offset рядків
        $i = 0;
        while ($i < $offset && !feof($fh)) {
            fgets($fh);
            $i++;
        }

        // Читаємо потрібну кількість рядків
        $rows = [];
        $count = 0;
        while (($row = fgetcsv($fh, 0, "\t")) !== false && $count < $limit) {
            $assoc = [];
            foreach ($unique_headers as $idx => $key) {
                $assoc[$key] = isset($row[$idx]) ? $row[$idx] : '';
            }
            $rows[] = $assoc;
            $count++;
        }

        // Порахувати всі рядки у файлі (для total_rows)
        $total = $offset + $count;
        while (!feof($fh)) {
            if (fgetcsv($fh, 0, "\t") !== false) $total++;
        }
        fclose($fh);

        $result['success'] = true;
        $result['rows'] = $rows;
        $result['total_rows'] = $total;
        return $result;
    }





    /**
     * Імпортує товар з рядка CSV:
     * - якщо товар існує по назві — оновлює лише ціну і наявність,
     * - якщо не існує — створює новий товар (з фото, категоріями і т.д.), дублює на укр мову, прив’язує Polylang
     */
    private function import_product($row_data, $mode = 'all') {
        $debug_info = '';

        // ===== RU PRODUCT =====
        $name_ru = '';
        if (!empty($row_data['Назва_позиції'])) $name_ru = sanitize_text_field($row_data['Назва_позиції']);
        elseif (!empty($row_data['Name'])) $name_ru = sanitize_text_field($row_data['Name']);

        if (empty($name_ru)) {
            return [
                'success' => false,
                'message' => __('Помилка: відсутня назва товару для ru.', 'themeluxurydom'),
                'debug' => 'Empty name_ru'
            ];
        }



        // === Шукаємо RU товар ===
        $existing_ru = get_page_by_title($name_ru, OBJECT, 'product');

        // === UPDATE-режим: тільки оновлюємо, не створюємо ===
        if ($mode === 'update') {
            $updated_count = 0;
            $messages = [];
            $debug = [];

            // Оновлення RU
            if ($existing_ru) {
                $product_ru = wc_get_product($existing_ru->ID);
                $price = 0;
                if (!empty($row_data['Ціна'])) {
                    $price = floatval(str_replace(',', '.', $row_data['Ціна']));
                    $product_ru->set_regular_price($price);
                    $product_ru->set_price($price);
                }
                if (!empty($row_data['Sale_price'])) {
                    $sale = floatval(str_replace(',', '.', $row_data['Sale_price']));
                    $product_ru->set_sale_price($sale);
                    if ($sale < $price) $product_ru->set_price($sale);
                }

                if (!empty($row_data['Наявність']) && trim($row_data['Наявність']) === '+') {
                    $product_ru->set_stock_status('instock');
                } elseif (!empty($row_data['Наявність']) && trim($row_data['Наявність']) === '!') {
                    $product_ru->set_stock_status('instock');
                } else {
                    $product_ru->set_stock_status('outofstock');
                }

                $product_ru->save();

                // Мета-поле
                if (!empty($row_data['ID_групи_різновидів'])) {
                    update_post_meta($product_ru->get_id(), 'id-variable-color', sanitize_text_field($row_data['ID_групи_різновидів']));
                }

                $messages[] = -product - importer . php__('Товар (RU) оновлено: ', 'themeluxurydom') . $name_ru;
                $debug[] = 'Оновлено RU товар';
                $updated_count++;
            } else {
                $messages[] = -product - importer . php__('Товар (RU) не знайдено для оновлення: ', 'themeluxurydom') . $name_ru;
                $debug[] = 'Відсутній RU товар у БД';
            }

            // Оновлення UK
            $name_uk = '';
            if (!empty($row_data['Назва_позиції_укр'])) $name_uk = sanitize_text_field($row_data['Назва_позиції_укр']);
            elseif (!empty($row_data['Name_ukr'])) $name_uk = sanitize_text_field($row_data['Name_ukr']);

            if ($name_uk) {
                $existing_uk = get_page_by_title($name_uk, OBJECT, 'product');
                if ($existing_uk) {
                    $product_uk = wc_get_product($existing_uk->ID);
                    $price_uk = 0;
                    if (!empty($row_data['Ціна'])) {
                        $price_uk = floatval(str_replace(',', '.', $row_data['Ціна']));
                        $product_uk->set_regular_price($price_uk);
                        $product_uk->set_price($price_uk);
                    }
                    if (!empty($row_data['Sale_price'])) {
                        $sale_uk = floatval(str_replace(',', '.', $row_data['Sale_price']));
                        $product_uk->set_sale_price($sale_uk);
                        if ($sale_uk < $price_uk) $product_uk->set_price($sale_uk);
                    }

                    if (!empty($row_data['Наявність']) && trim($row_data['Наявність']) === '+') {
                        $product_uk->set_stock_status('instock');
                    } elseif (!empty($row_data['Наявність']) && trim($row_data['Наявність']) === '!') {
                        $product_uk->set_stock_status('instock');
                    } else {
                        $product_uk->set_stock_status('outofstock');
                    }

                    $product_uk->save();

                    // Мета-поле
                    if (!empty($row_data['ID_групи_різновидів'])) {
                        update_post_meta($product_uk->get_id(), 'id-variable-color', sanitize_text_field($row_data['ID_групи_різновидів']));
                    }

                    $messages[] = -product - importer . php__('Товар (UK) оновлено: ', 'themeluxurydom') . $name_uk;
                    $debug[] = 'Оновлено UK товар';
                    $updated_count++;
                } else {
                    $messages[] = -product - importer . php__('Товар (UK) не знайдено для оновлення: ', 'themeluxurydom') . $name_uk;
                    $debug[] = 'Відсутній UK товар у БД';
                }
            }

            return [
                'success' => $updated_count > 0,
                'message' => implode('<br>', $messages),
                'debug' => implode(' | ', $debug)
            ];
        }




        // ===== UK PRODUCT =====
        $name_uk = '';
        if (!empty($row_data['Назва_позиції_укр'])) $name_uk = sanitize_text_field($row_data['Назва_позиції_укр']);
        elseif (!empty($row_data['Name_ukr'])) $name_uk = sanitize_text_field($row_data['Name_ukr']);

        $lang_ru = 'ru_RU';
        $lang_uk = 'uk';
        $cat_name = !empty($row_data['Назва_групи']) ? trim($row_data['Назва_групи']) : null;
        $cat_ru_id = 0;
        $cat_uk_id = 0;
        if ($cat_name) {
            list($cat_ru_id, $cat_uk_id) = $this->get_or_create_cat_and_translate_meta($cat_name, $lang_ru, $lang_uk);
        }

        // === Бренд ===
        $brand_name = !empty($row_data['Виробник']) ? trim($row_data['Виробник']) : null;
        $brand_ru_id = 0;
        $brand_uk_id = 0;
        if ($brand_name) {
            list($brand_ru_id, $brand_uk_id) = $this->get_or_create_brand_and_translate_meta($brand_name, $lang_ru, $lang_uk);
        }

        // === 1. Перевіряємо чи існує товар по назві (RU) ===
        $existing_ru = get_page_by_title($name_ru, OBJECT, 'product');
        if ($existing_ru) {
            $product_ru = wc_get_product($existing_ru->ID);
            // Оновлюємо лише ціни та наявність
            if (!empty($row_data['Ціна'])) {
                $price = floatval(str_replace(',', '.', $row_data['Ціна']));
                $product_ru->set_regular_price($price);
                $product_ru->set_price($price);
            }
            if (!empty($row_data['Sale_price'])) {
                $sale = floatval(str_replace(',', '.', $row_data['Sale_price']));
                $product_ru->set_sale_price($sale);
                if ($sale < $price) $product_ru->set_price($sale);
            }

            if (!empty($row_data['Наявність']) && trim($row_data['Наявність']) === '+') {
                $product_ru->set_stock_status('instock');
            } elseif (!empty($row_data['Наявність']) && trim($row_data['Наявність']) === '!') {
                $product_ru->set_stock_status('instock');
            } else {
                $product_ru->set_stock_status('outofstock');
            }

            $product_ru->save();

            // === Додаємо/оновлюємо мета-поле "id-variable-color" ===
            if (!empty($row_data['ID_групи_різновидів'])) {
                update_post_meta($product_ru->get_id(), 'id-variable-color', sanitize_text_field($row_data['ID_групи_різновидів']));
            }

            // Встановлюємо мову продукту RU
            if (function_exists('pll_set_post_language')) {
                pll_set_post_language($product_ru->get_id(), $lang_ru);
            }
            // Категорія (оновлення) — тільки RU
            if ($cat_ru_id) wp_set_object_terms($product_ru->get_id(), intval($cat_ru_id), 'product_cat', false);
            // Бренд
            if ($brand_ru_id) wp_set_object_terms($product_ru->get_id(), intval($brand_ru_id), 'product_brand', false);

            return [
                'success' => true,
                'message' => -product - importer . php__('Товар (RU) оновлено: ', 'themeluxurydom') . $name_ru,
                'debug' => 'Оновлено існуючий RU товар'
            ];
        }

        // === 2. Створення товару RU ===
        $product_ru = new WC_Product_Simple();
        $product_ru->set_name($name_ru);
        if (!empty($row_data['Опис'])) $product_ru->set_description(wp_kses_post($row_data['Опис']));
        if (!empty($row_data['Short_description'])) $product_ru->set_short_description(wp_kses_post($row_data['Short_description']));
        $regular_price = (!empty($row_data['Ціна'])) ? floatval(str_replace(',', '.', $row_data['Ціна'])) : 0;
        $product_ru->set_regular_price($regular_price);
        $product_ru->set_price($regular_price);
        if (!empty($row_data['Sale_price'])) {
            $sale = floatval(str_replace(',', '.', $row_data['Sale_price']));
            $product_ru->set_sale_price($sale);
            if ($sale < $regular_price) $product_ru->set_price($sale);
        }
        $stock = 0; $stock_status = 'outofstock';

        if (!empty($row_data['Наявність']) && trim($row_data['Наявність']) === '+') {
            $product_ru->set_stock_status('instock');
        } elseif (!empty($row_data['Наявність']) && trim($row_data['Наявність']) === '!') {
            $product_ru->set_stock_status('instock');
        } else {
            $product_ru->set_stock_status('outofstock');
        }

        // 1. Зберігаємо товар RU (без категорії!)
        $product_ru_id = $product_ru->save();

        // === Додаємо/оновлюємо мета-поле "id-variable-color" ===
        if (!empty($row_data['ID_групи_різновидів'])) {
            update_post_meta($product_ru_id, 'id-variable-color', sanitize_text_field($row_data['ID_групи_різновидів']));
        }

        // 2. Встановлюємо Polylang мову для RU
        if (function_exists('pll_set_post_language')) {
            pll_set_post_language($product_ru_id, $lang_ru);
        }

        // 3. Прив’язуємо RU категорію
        if ($cat_ru_id) {
            wp_set_object_terms($product_ru_id, intval($cat_ru_id), 'product_cat', false);
        }

        // 4. Прив’язуємо RU бренд
        if ($brand_ru_id) {
            wp_set_object_terms($product_ru_id, intval($brand_ru_id), 'product_brand', false);
        }

        // === Фото для RU ===
        $attachment_ids = [];
        if (!empty($row_data['Посилання_зображення'])) {
            $image_urls = preg_split('/[,;|]/', $row_data['Посилання_зображення']);
            foreach ($image_urls as $index => $image_url) {
                $image_url = trim($image_url);
                if (empty($image_url)) continue;
                $existing_id = $this->find_attachment_by_filename($image_url);
                if ($existing_id) {
                    $attachment_ids[] = $existing_id;
                    continue;
                }
                if (!function_exists('download_url')) require_once ABSPATH . 'wp-admin/includes/file.php';
                if (!function_exists('media_handle_sideload')) require_once ABSPATH . 'wp-admin/includes/media.php';
                $tmp = download_url($image_url);
                if (is_wp_error($tmp)) continue;
                $file_array = [ 'name' => basename($image_url), 'tmp_name' => $tmp ];
                $id = media_handle_sideload($file_array, $product_ru_id);
                if (is_wp_error($id)) { @unlink($tmp); continue; }
                $attachment_ids[] = $id;
            }
            if (!empty($attachment_ids)) {
                set_post_thumbnail($product_ru_id, $attachment_ids[0]);
                if (count($attachment_ids) > 1) {
                    update_post_meta($product_ru_id, '_product_image_gallery', implode(',', array_slice($attachment_ids, 1)));
                }
            }
        }

        // === ДУБЛЬ ТОВАРУ ДЛЯ УКРАЇНСЬКОЇ МОВИ ===
        $product_uk_id = 0;
        if (!empty($name_uk)) {
            $product_uk = new WC_Product_Simple();
            $product_uk->set_name($name_uk);
            if (!empty($row_data['Опис_укр'])) $product_uk->set_description(wp_kses_post($row_data['Опис_укр']));
            if (!empty($row_data['Short_description_укр'])) $product_uk->set_short_description(wp_kses_post($row_data['Short_description_укр']));
            $regular_price_uk = (!empty($row_data['Ціна_укр'])) ? floatval(str_replace(',', '.', $row_data['Ціна_укр'])) : $regular_price;
            $product_uk->set_regular_price($regular_price_uk);
            $product_uk->set_price($regular_price_uk);
            if (!empty($row_data['Sale_price_укр'])) {
                $sale_uk = floatval(str_replace(',', '.', $row_data['Sale_price_укр']));
                $product_uk->set_sale_price($sale_uk);
                if ($sale_uk < $regular_price_uk) $product_uk->set_price($sale_uk);
            }
            $stock_uk = $stock; $stock_status_uk = $stock_status;
            if (!empty($row_data['Наявність_укр'])) {
                if (trim($row_data['Наявність_укр']) === '+') {
                    $stock_uk = 10; $stock_status_uk = 'instock';
                }
            }
            $product_uk->set_stock_status($stock_status_uk);

            // 1. Зберігаємо UK товар (без категорії!)
            $product_uk_id = $product_uk->save();

            // === Додаємо/оновлюємо мета-поле "id-variable-color" ===
            if (!empty($row_data['ID_групи_різновидів'])) {
                update_post_meta($product_uk_id, 'id-variable-color', sanitize_text_field($row_data['ID_групи_різновидів']));
            }

            // 2. Встановлюємо Polylang мову для UK
            if (function_exists('pll_set_post_language')) {
                pll_set_post_language($product_uk_id, $lang_uk);
            }

            // 3. Прив’язуємо UK категорію
            if ($cat_uk_id) {
                wp_set_object_terms($product_uk_id, intval($cat_uk_id), 'product_cat', false);
            }

            // 4. Прив’язуємо UK бренд
            if ($brand_uk_id) {
                wp_set_object_terms($product_uk_id, intval($brand_uk_id), 'product_brand', false);
            }

            // Фото дублюємо як у RU
            if (!empty($attachment_ids)) {
                set_post_thumbnail($product_uk_id, $attachment_ids[0]);
                if (count($attachment_ids) > 1) {
                    update_post_meta($product_uk_id, '_product_image_gallery', implode(',', array_slice($attachment_ids, 1)));
                }
            }

            // === Прив’язка через Polylang ===
            if (function_exists('pll_save_post_translations')) {
                pll_save_post_translations([
                    $lang_ru => $product_ru_id,
                    $lang_uk => $product_uk_id,
                ]);
            }
        } else {
            // тільки ru версія (без дубля)
            if (function_exists('pll_set_post_language')) {
                pll_set_post_language($product_ru_id, $lang_ru);
            }
        }

        // === Оновлюємо описи з локальними фото ===
        if (!empty($row_data['Опис'])) {
            $description_ru_updated = $this->import_and_replace_images_in_html($row_data['Опис'], $product_ru_id);
            $product_ru->set_description(wp_kses_post($description_ru_updated));
        }
        if (!empty($row_data['Short_description'])) {
            $short_description_ru_updated = $this->import_and_replace_images_in_html($row_data['Short_description'], $product_ru_id);
            $product_ru->set_short_description(wp_kses_post($short_description_ru_updated));
        }
        $product_ru->save();

        if (!empty($product_uk_id)) {
            if (!empty($row_data['Опис_укр'])) {
                $description_uk_updated = $this->import_and_replace_images_in_html($row_data['Опис_укр'], $product_uk_id);
                $product_uk->set_description(wp_kses_post($description_uk_updated));
            }
            if (!empty($row_data['Short_description_укр'])) {
                $short_description_uk_updated = $this->import_and_replace_images_in_html($row_data['Short_description_укр'], $product_uk_id);
                $product_uk->set_short_description(wp_kses_post($short_description_uk_updated));
            }
            $product_uk->save();
        }

        // === АТРИБУТИ ===
        // 1. Збираємо всі характеристики
        $attributes_arr = [];
        $keys = array_keys($row_data);
        $attribute_groups = [];
        foreach ($keys as $key) {
            if (strpos($key, 'Назва_Характеристики') === 0 && !empty($row_data[$key])) {
                $suffix = ($key === 'Назва_Характеристики') ? '' : substr($key, strlen('Назва_Характеристики'));
                $attribute_groups[] = $suffix;
            }
        }
        foreach ($attribute_groups as $suffix) {
            $attr_name = trim($row_data['Назва_Характеристики' . $suffix]);
            $attr_unit = isset($row_data['Одиниця_виміру_Характеристики' . $suffix]) ? trim($row_data['Одиниця_виміру_Характеристики' . $suffix]) : '';
            $attr_value = isset($row_data['Значення_Характеристики' . $suffix]) ? trim($row_data['Значення_Характеристики' . $suffix]) : '';
            if ($attr_name && $attr_value) {
                $attributes_arr[] = [
                    'name'  => $attr_name,
                    'unit'  => $attr_unit,
                    'value' => $attr_value . ($attr_unit ? ' ' . $attr_unit : '')
                ];
            }
        }

        // 2. Готуємо масив для WooCommerce product attributes
        $product_attributes = [];
        global $wpdb;

        foreach ($attributes_arr as $attr) {
            $attr_name = $attr['name'];
            $attr_value = $attr['value'];
            $slug = wc_sanitize_taxonomy_name($attr_name);

            // --- Створюємо глобальний атрибут, якщо його нема ---
            $exists = $wpdb->get_var($wpdb->prepare(
                "SELECT attribute_id FROM {$wpdb->prefix}woocommerce_attribute_taxonomies WHERE attribute_name = %s",
                $slug
            ));

            if (!$exists) {
                $wpdb->insert(
                    $wpdb->prefix . 'woocommerce_attribute_taxonomies',
                    [
                        'attribute_label'   => $attr_name,
                        'attribute_name'    => $slug,
                        'attribute_type'    => 'select',
                        'attribute_orderby' => 'menu_order',
                        'attribute_public'  => 0,
                    ]
                );
                // Дуже важливо!
                delete_transient('wc_attribute_taxonomies');
                if (function_exists('wc_rebuild_attribute_taxonomies')) {
                    wc_rebuild_attribute_taxonomies();
                }
            }

            $taxonomy = 'pa_' . $slug;

            // --- Опції (значення через |)
            $options = array_map('trim', explode('|', $attr_value));

            // --- Додаємо терміни-опції до глобального атрибута
            foreach ($options as $val) {
                if (!term_exists($val, $taxonomy)) wp_insert_term($val, $taxonomy);
            }

            // --- Формуємо масив WooCommerce attributes
            $product_attributes[$taxonomy] = [
                'name'         => $taxonomy,
                'value'        => '',
                'is_visible'   => 1,
                'is_variation' => 0,
                'is_taxonomy'  => 1,
            ];

            // --- Прив’язуємо опції до товару
            if (isset($product_ru_id)) {
                wp_set_object_terms($product_ru_id, $options, $taxonomy, false);
            }
            if (isset($product_uk_id) && $product_uk_id) {
                wp_set_object_terms($product_uk_id, $options, $taxonomy, false);
            }
        }

        // --- Оновлюємо _product_attributes для товарів
        if (isset($product_ru_id) && !empty($product_attributes)) {
            update_post_meta($product_ru_id, '_product_attributes', $product_attributes);
        }
        if (isset($product_uk_id) && !empty($product_attributes)) {
            update_post_meta($product_uk_id, '_product_attributes', $product_attributes);
        }

        return [
            'success' => true,
            'message' => __('Товар імпортовано двома мовами', 'themeluxurydom'),
            'debug' => $debug_info
        ];
    }

    /**
     * Завантажує всі зовнішні зображення з HTML у медіа та підставляє локальні URL
     */
    private function import_and_replace_images_in_html($html, $post_id = 0) {
        if (empty($html)) return $html;
        if (!preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $html, $matches)) {
            return $html;
        }
        $image_urls = $matches[1];
        foreach ($image_urls as $img_url) {
            // Пропускаємо локальні зображення
            if (strpos($img_url, content_url()) !== false) continue;

            if (!function_exists('media_sideload_image')) require_once ABSPATH . 'wp-admin/includes/media.php';
            if (!function_exists('download_url')) require_once ABSPATH . 'wp-admin/includes/file.php';

            $tmp = download_url($img_url);
            if (is_wp_error($tmp)) continue;

            $file_array = array(
                'name' => basename(parse_url($img_url, PHP_URL_PATH)),
                'tmp_name' => $tmp
            );
            $id = media_handle_sideload($file_array, $post_id);
            if (is_wp_error($id)) { @unlink($tmp); continue; }
            $local_url = wp_get_attachment_url($id);
            $html = str_replace($img_url, $local_url, $html);
        }
        return $html;
    }


    /**
     * Створює/знаходить бренд для двох мов і зв'язує їх через Polylang.
     * @return array [ID RU, ID UK]
     */
    private function get_or_create_brand_and_translate_meta($brand_name, $lang_ru, $lang_uk) {
        $meta_key_ru = 'import_brand_slug_ru';
        $meta_key_uk = 'import_brand_slug_uk';
        $meta_value = sanitize_title($brand_name);

        // RU — Пошук або створення
        $brand_ru_id = 0;
        $brand_ru = get_terms([
            'taxonomy'   => 'product_brand',
            'hide_empty' => false,
            'meta_query' => [
                [
                    'key'   => $meta_key_ru,
                    'value' => $meta_value,
                ]
            ],
            'number' => 1,
            'fields' => 'all',
        ]);
        if (!empty($brand_ru) && !is_wp_error($brand_ru)) {
            $brand_ru_id = $brand_ru[0]->term_id;
        } else {
            $term_name_ru = $brand_name;
            $term_ru = wp_insert_term($term_name_ru, 'product_brand');
            if (!is_wp_error($term_ru)) {
                $brand_ru_id = $term_ru['term_id'];
                add_term_meta($brand_ru_id, $meta_key_ru, $meta_value, true);
            }
        }
        if ($brand_ru_id && function_exists('pll_set_term_language')) pll_set_term_language($brand_ru_id, $lang_ru);

        // UK — Пошук або створення
        $brand_uk_id = 0;
        $brand_uk = get_terms([
            'taxonomy'   => 'product_brand',
            'hide_empty' => false,
            'meta_query' => [
                [
                    'key'   => $meta_key_uk,
                    'value' => $meta_value,
                ]
            ],
            'number' => 1,
            'fields' => 'all',
        ]);
        if (!empty($brand_uk) && !is_wp_error($brand_uk)) {
            $brand_uk_id = $brand_uk[0]->term_id;
        } else {
            $term_name_uk = $brand_name . ' (укр)';
            $term_uk = wp_insert_term($term_name_uk, 'product_brand');
            if (!is_wp_error($term_uk)) {
                $brand_uk_id = $term_uk['term_id'];
                add_term_meta($brand_uk_id, $meta_key_uk, $meta_value, true);
            }
        }
        if ($brand_uk_id && function_exists('pll_set_term_language')) pll_set_term_language($brand_uk_id, $lang_uk);

        // Прив’язка перекладів
        if ($brand_ru_id && $brand_uk_id && function_exists('pll_save_term_translations')) {
            pll_save_term_translations([
                $lang_ru => $brand_ru_id,
                $lang_uk => $brand_uk_id,
            ]);
        }

        return [$brand_ru_id, $brand_uk_id];
    }




    /**
     * Cтворює/шукає категорії для двох мов і зв'язує їх через Polylang + унікальне мета-поле.
     * @return array [ID RU, ID UK]
     */
    /**
     * Cтворює або повертає пари категорій для RU та UK, зв'язує їх Polylang.
     * @param string $base_name Назва групи
     * @param string $lang_ru Код мови RU (наприклад, ru_RU)
     * @param string $lang_uk Код мови UK (наприклад, uk)
     * @return array [term_id_ru, term_id_uk]
     */
    private function get_or_create_cat_and_translate_meta($base_name, $lang_ru, $lang_uk) {
        $meta_key_ru = 'import_group_slug_ru';
        $meta_key_uk = 'import_group_slug_uk';
        $meta_value = sanitize_title($base_name);

        // ===== 1. RU категорія =====
        $cat_ru_id = 0;
        $cat_ru = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'meta_query' => [[ 'key' => $meta_key_ru, 'value' => $meta_value ]],
            'number'     => 1,
            'fields'     => 'all',
        ]);
        if (!empty($cat_ru) && !is_wp_error($cat_ru)) {
            $cat_ru_id = $cat_ru[0]->term_id;
        } else {
            $term_ru = wp_insert_term($base_name, 'product_cat');
            if (!is_wp_error($term_ru)) {
                $cat_ru_id = $term_ru['term_id'];
                add_term_meta($cat_ru_id, $meta_key_ru, $meta_value, true);
            }
        }
        if ($cat_ru_id && function_exists('pll_set_term_language')) pll_set_term_language($cat_ru_id, $lang_ru);

        // ===== 2. UK категорія =====
        $cat_uk_id = 0;
        $cat_uk = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'meta_query' => [[ 'key' => $meta_key_uk, 'value' => $meta_value ]],
            'number'     => 1,
            'fields'     => 'all',
        ]);
        if (!empty($cat_uk) && !is_wp_error($cat_uk)) {
            $cat_uk_id = $cat_uk[0]->term_id;
        } else {
            $term_uk = wp_insert_term($base_name . ' (укр)', 'product_cat');
            if (!is_wp_error($term_uk)) {
                $cat_uk_id = $term_uk['term_id'];
                add_term_meta($cat_uk_id, $meta_key_uk, $meta_value, true);
            }
        }
        if ($cat_uk_id && function_exists('pll_set_term_language')) pll_set_term_language($cat_uk_id, $lang_uk);

        // ===== 3. Прив’язуємо категорії один до одного через Polylang =====
        if ($cat_ru_id && $cat_uk_id && function_exists('pll_save_term_translations')) {
            pll_save_term_translations([
                $lang_ru => $cat_ru_id,
                $lang_uk => $cat_uk_id,
            ]);
        }
//        error_log('Твій текст або масив: ' . $cat_ru_id . ' -- ' . $cat_uk_id);

        // ===== 4. Повертаємо строго розділені ID =====
        return [$cat_ru_id, $cat_uk_id];
    }





    /**
     * Шукає вкладення по basename (щоб не дублювати фото)
     */
    private function find_attachment_by_filename($url) {
        global $wpdb;
        $filename = wp_basename($url);
        if (!$filename) return null;
        $sql = "
        SELECT p.ID FROM {$wpdb->posts} p
        INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
        WHERE p.post_type = 'attachment'
          AND pm.meta_key = '_wp_attached_file'
          AND pm.meta_value LIKE %s
        LIMIT 1
    ";
        $like = '%' . $wpdb->esc_like($filename);
        $id = $wpdb->get_var($wpdb->prepare($sql, $like));
        return $id ? (int) $id : null;
    }

    /**
     * Читає CSV файл і повертає його вміст
     *
     * @param string $file Шлях до CSV файлу
     * @param int|null $limit Максимальна кількість рядків для зчитування
     * @return array Масив з результатом [success, data]
     */
    private function read_csv($file, $limit = null) {
        if (!file_exists($file)) {
            return [false, __("Файл не знайдено:", 'themeluxurydom') . " class-product-importer.php" . $file];
        }

        $sample = file_get_contents($file, false, null, 0, 1000);
        $delimiter = ',';
        if (substr_count($sample, ';') > substr_count($sample, ',')) {
            $delimiter = ';';
        } elseif (substr_count($sample, "\t") > substr_count($sample, ',')) {
            $delimiter = "\t";
        }

        $handle = fopen($file, 'r');
        if (!$handle) {
            return [false, __("Не вдалося відкрити файл:", 'themeluxurydom') . " class-product-importer.php" . $file];
        }

        $header = fgetcsv($handle, 0, $delimiter);
        if (!$header) {
            fclose($handle);
            return [false, __("Не вдалося прочитати заголовок CSV файлу", 'themeluxurydom')];
        }

        $rows = [];
        $count = 0;

        while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
            if (count($row) !== count($header)) {
                continue;
            }

            $rows[] = array_combine($header, $row);
            $count++;

            if ($limit && $count >= $limit) {
                break;
            }
        }

        // Отримуємо загальну кількість рядків
        fseek($handle, 0);
        $total_rows = -1; // Не рахуємо заголовок
        while (fgetcsv($handle, 0, $delimiter) !== false) {
            $total_rows++;
        }

        fclose($handle);
        return [true, [
            'header' => $header,
            'rows' => $rows,
            'delimiter' => $delimiter,
            'total_rows' => $total_rows
        ]];
    }
}

// Ініціалізуємо клас при завантаженні файлу
new ThemeLuxuryDom_Product_Importer();