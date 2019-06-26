<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'bgufk');

/** Имя пользователя MySQL */
define('DB_USER', 'work');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'tyty7878');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0}B;q6YE/qhvE}Ns9Yv`EsPQa`EKO@kDVoiw5+Q+Kfo!dRNYB+jk<Y)3fwIUt*KC');
define('SECURE_AUTH_KEY',  'x/+Nt{Cc&kE>-aCrY~UHJXgP.jrY~eof-$$uT0F3uIrIGX3/:PCpYG._%@5Wm6jf');
define('LOGGED_IN_KEY',    'xQSvgt]Hs61s611.XqYjR1XbNN}ta*Fe}7bZ({o_^m}ZsfCcld8A$|kCzFgsqRPC');
define('NONCE_KEY',        '(M.]NMzyz3Hz+-61RTq?(vB`-<oCDOAVg3uV/qH!hopS.|N)gh*6SAsOp@sG9q5G');
define('AUTH_SALT',        '}0NPcy!2OS)|Sw+)}<!#M}o|n>.IpmMB6x(Y9wKKQWG^P]gJJqX%xf~d]rfxG-5*');
define('SECURE_AUTH_SALT', '^|XQ+*mYE4#9t-m}i9s%Pwk(7>Dw%HDI }|.c~|( T%L.bPu.w?G#!9[]*XfaK0E');
define('LOGGED_IN_SALT',   '[=>p~TqT1|v:el58K/.N^FPf?wF|i2gA44,Ub%qIM:YH+*6lu }/6]P|yL!(.KzV');
define('NONCE_SALT',       '>`brKLpC. HKZao.Edm(,|0!Do4<<vBDeUI,p1$[Sb)Bb<H_f9D%&-gvo9|EL^RQ');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', true);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
