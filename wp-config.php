<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress_bd' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'R{n@f I!@`v5s{,ZVb#`:#Gld^qc#plsLI`hB+Soqx;RHep+Wv~Sx.]u,,k>kO4R' );
define( 'SECURE_AUTH_KEY',  'lfY!a#n!hIo]D`eaBVRra|@n;wb;jIWh-v^p4A1?{6WIib;nAn~9hgRKVL;7X;lt' );
define( 'LOGGED_IN_KEY',    'U=[dBy>W*l~oHx/ob[^Hrx#`a/FcUq8#Fo;2Y+?+10&r<Au=6MaZq*SihN<~Ixp.' );
define( 'NONCE_KEY',        '4C:p`P-eQ<M`~m[(-W_$vD#Sla;_q$vJR}!IU`+->^*ohkaBqwIw.XNny&5W&Q|E' );
define( 'AUTH_SALT',        ')[,d:*k701AS`416Roz$m`#hmK+#fwU5Kh>{>QY!Tip)Hh3Y MlV*$~7+KsXB##t' );
define( 'SECURE_AUTH_SALT', 'K2#L~^VkI:@H#TbA|8`kofG0$?i/CP:u;qjx}4O5;Z?P?n]%KneGmV+MR:6*[IgJ' );
define( 'LOGGED_IN_SALT',   'mQ-cUbB?vRbW.({<,a8EuO[fQSv33=&O%;xha}c>zObe[[rsO+J4@h6B^E;I#}5D' );
define( 'NONCE_SALT',       '0k,@&vTkgw[?c^14rQ|3gs3Py--tRHz>6H~;gyK,V==|Nvcsp;agzrc&r[U,UXr_' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
