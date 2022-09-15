<?php
defined('ABSPATH') OR exit('No direct script access allowed');

if ( wp_doing_ajax() ) {
    require_once(get_template_directory().'/../../mu-plugins/plugins.php');
    sap_get_theme_option();
}

include_once(get_template_directory().'/inc/other.php');
include_once(get_template_directory().'/inc/menu-field.php');
include_once(get_template_directory().'/inc/advanced-options.php');
include_once(get_template_directory().'/inc/elements.php');
include_once(get_template_directory().'/inc/shortcodes.php');
include_once(get_template_directory().'/inc/acf.php');

/**
 * Enqueue scripts and styles.
 *
 * wp_register_style('style', $themes_uri . '/assets/css/style.css', false, $ver);
 * wp_enqueue_style('style');
 *
 * wp_register_script('jquery', $themes_uri . '/assets/js/production.js', false, $ver, true);
 * wp_enqueue_script('jquery');
 * wp_enqueue_script('gmaps', '//maps.googleapis.com/maps/api/js?sensor=false', false, '', true);
 *
 */
function wordpress_scripts() {
    $ver = 1;
    $themes_uri = get_template_directory_uri();

    wp_register_style('style', $themes_uri . '/assets/css/style.css', false, $ver);
    wp_enqueue_style('style');

    wp_register_style('bootstrap', $themes_uri . '/assets/vendor/bootstrap/css/bootstrap.min.css', false, $ver);
    wp_enqueue_style('bootstrap');

    wp_register_style('bootstrap-icons', $themes_uri . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', false, $ver);
    wp_enqueue_style('bootstrap-icons');

    wp_register_style('boxicons', $themes_uri . '/assets/vendor/boxicons/css/boxicons.min.css', false, $ver);
    wp_enqueue_style('boxicons');

    wp_register_style('glightbox', $themes_uri . '/assets/vendor/glightbox/css/glightbox.min.css', false, $ver);
    wp_enqueue_style('glightbox');

    wp_register_style('swiper-bundle', $themes_uri . '/assets/vendor/swiper/swiper-bundle.min.css', false, $ver);
    wp_enqueue_style('swiper-bundle');


    wp_deregister_script('jquery');
    wp_deregister_script('wp-embed');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');

    wp_register_script('main', $themes_uri . '/assets/js/main.js', false, $ver, true);
    wp_enqueue_script('main');

    wp_register_script('aos', $themes_uri . '/assets/vendor/aos/aos.js', false, $ver, true);
    wp_enqueue_script('aos');

    wp_register_script('bootstrap', $themes_uri . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', false, $ver, true);
    wp_enqueue_script('bootstrap');

    wp_register_script('glightbox', $themes_uri . '/assets/vendor/glightbox/js/glightbox.min.js', false, $ver, true);
    wp_enqueue_script('glightbox');

    wp_register_script('isotope', $themes_uri . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', false, $ver, true);
    wp_enqueue_script('isotope');

    wp_register_script('swiper', $themes_uri . '/assets/vendor/swiper/swiper-bundle.min.js', false, $ver, true);
    wp_enqueue_script('swiper');

    wp_register_script('jquery', $themes_uri . '/assets/js/production.js', false, $ver, true);
    wp_enqueue_script('jquery');

    wp_add_inline_script('jquery', 'var ajaxData = {"url":'.json_encode(admin_url('admin-ajax.php')).',"protect":'.json_encode(wp_create_nonce('forCustomAjax')).'};', 'before');
}
add_action('wp_enqueue_scripts', 'wordpress_scripts');

add_action('init', 'custom_posts');
function custom_posts() {
    register_post_type('portfolio', [
        'label' => NULL,
        'labels' => [
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
            'add_new' => 'Добавить запись',
            'add_new_item' => 'Добавить запись',
            'edit_item' => 'Редактировать запись',
            'new_item' => 'Новая запись',
            'view_item' => 'Просмотреть запись',
            'search_items' => 'Искать запись',
            'not_found' => 'Запись не найдена',
            'not_found_in_trash' => 'Запись не найдена',
            'parent_item_colon' => '',
            'menu_name' => 'Portfolio',
        ],
        'description' => '',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => TRUE,
        'show_ui' => TRUE,
        'show_in_menu' => NULL,
        'menu_position' => NULL,
        'menu_icon' => 'dashicons-screenoptions',
        'capability_type' => 'post',
        'hierarchical' => FALSE,
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => [],
        'has_archive' => FALSE,
        'rewrite' => ['slug' => 'portfolio'],
        'query_var' => TRUE,
        'show_in_nav_menus' => NULL,
    ]);

    register_post_type('faq', [
        'label' => NULL,
        'labels' => [
            'name' => 'FAQ',
            'singular_name' => 'FAQ',
            'add_new' => 'Добавить запись',
            'add_new_item' => 'Добавить запись',
            'edit_item' => 'Редактировать запись',
            'new_item' => 'Новая запись',
            'view_item' => 'Просмотреть запись',
            'search_items' => 'Искать запись',
            'not_found' => 'Запись не найдена',
            'not_found_in_trash' => 'Запись не найдена',
            'parent_item_colon' => '',
            'menu_name' => 'FAQ',
        ],
        'description' => '',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => TRUE,
        'show_ui' => TRUE,
        'show_in_menu' => NULL,
        'menu_position' => NULL,
        'menu_icon' => 'dashicons-screenoptions',
        'capability_type' => 'post',
        'hierarchical' => FALSE,
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => [],
        'has_archive' => FALSE,
        'rewrite' => ['slug' => 'faq'],
        'query_var' => TRUE,
        'show_in_nav_menus' => NULL,
    ]);
}

add_filter('upload_mimes', 'svg_upload_allow');
function svg_upload_allow($mimes)
{
    $mimes['svg']  = 'image/svg+xml';
    return $mimes;
}

add_action( 'the_content', 'wpse_260756_the_content', 1, 1 );
function wpse_260756_the_content($content) {
    return str_replace(['<table', '</table>'], ['<div class="table-responsive"><table', '</table></div>'], $content);
}

add_action('wp_ajax_nopriv_form-send', 'custom_ajax_form_send');
add_action('wp_ajax_form-send', 'custom_ajax_form_send');
function custom_ajax_form_send() {
    if ( ! wp_verify_nonce($_POST['nonce'], 'forCustomAjax') ) {
        header("HTTP/1.0 404 Not Found");
        exit;
    }

    parse_str($_POST['post'], $post_data);

    $content = '';
    if ( isset($post_data['cf-name']) ) {
        $name = trim(strip_tags($post_data['cf-name']));
        $content .= "<p>Имя: {$name}</p>";
    }
    if ( isset($post_data['cf-email']) ) {
        $email = trim(strip_tags($post_data['cf-email']));
        $content .= "<p>E-mail: {$email}</p>";
    }
    if ( isset($post_data['cf-phone']) ) {
        $phone = trim(strip_tags($post_data['cf-phone']));
        $content .= "<p>Телефон: +{$phone}</p>";
    }
    if ( isset($post_data['cf-text']) ) {
        $text = trim(strip_tags($post_data['cf-text']));
        $content .= "<p>Сообщение:</p>".wpautop($text);
    }
    if ( isset($post_data['cf-message']) ) {
        $text = trim(strip_tags($post_data['cf-message']));
        $content .= "<p>Сообщение:</p>".wpautop($text);
    }

    $status = send_email(get_field('email-to', 'option'), 'Заявка с сайта fjord-d3.ru', $content);

    if ( ! $status ) {
        wp_send_json([
            'status' => FALSE,
            'errCode' => 1,
        ]);
    } else {
        wp_send_json([
            'status' => TRUE,
            'message' => wpautop('Сообщение успешно отправлено.'),
        ]);
    }

    exit();
}

function send_email($email, $title, $content) {
    $email_template = get_field('email-template', 'option');
    $email_default = get_field('email-default-send', 'option');
    $name_default = get_field('email-default-name', 'option');

    $email_template = str_replace(['%%title%%', '%%content%%', '%%theme_uri%%'], [$title, $content, get_template_directory_uri()], $email_template);

    add_filter('wp_mail_content_type', 'set_html_content_type');

    $email_status = wp_mail($email, $title, $email_template, [
        'from' => "$name_default <{$email_default}>",
        'content-type' => 'text/html',
        'reply-to' => $email_default,
    ]);

    remove_filter('wp_mail_content_type', 'set_html_content_type');

    return (bool) $email_status;
}

function set_html_content_type() {
    return 'text/html';
}
