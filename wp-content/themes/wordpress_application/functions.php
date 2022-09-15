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

	wp_register_script('jquery', $themes_uri . '/assets/js/main.js', false, $ver, true);
	wp_enqueue_script('jquery');

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

	wp_add_inline_script('jquery', 'var ajaxData = {"url":'.json_encode(admin_url('admin-ajax.php')).',"protect":'.json_encode(wp_create_nonce('forCustomAjax')).'};', 'before');
}
add_action('wp_enqueue_scripts', 'wordpress_scripts');

add_action('init', 'custom_posts');
function custom_posts() {
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
        'menu_icon' => 'dashicons-format-chat',
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
