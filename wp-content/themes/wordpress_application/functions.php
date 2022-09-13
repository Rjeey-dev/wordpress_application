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

	wp_register_script('jquery', $themes_uri . '/assets/js/production.js', false, $ver, true);
	wp_enqueue_script('jquery');

	wp_add_inline_script('jquery', 'var ajaxData = {"url":'.json_encode(admin_url('admin-ajax.php')).',"protect":'.json_encode(wp_create_nonce('forCustomAjax')).'};', 'before');
}
add_action('wp_enqueue_scripts', 'wordpress_scripts');

add_action('init', 'custom_posts');
function custom_posts() {

}
