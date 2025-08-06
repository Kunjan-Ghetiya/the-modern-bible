<?php
/**
 * Theme Functions File
 * Description: Core functions for your custom WordPress theme.
 */


include('inc/custom-posts.php');
include('inc/shortcodes.php');

add_theme_support('post-thumbnails');


// Enqueue Assets
function modern_bible_enqueue_assets() {
    // Enqueue Styles
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.min.css', array());
    wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/assets/css/slick-theme.min.css', array('slick-css'));
    wp_enqueue_style('the-modern-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // Enqueue Scripts
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'));
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery', 'slick-js'));
}
add_action('wp_enqueue_scripts', 'modern_bible_enqueue_assets');

// Allow SVG upload in WordPress
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

//Register Menus
function modern_bible_register_menus() {
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'modern-bible'),
        'footer_menu'  => __('Footer Menu', 'modern-bible'),
        'quick_links_menu'  => __('Quick Links Menu', 'modern-bible'),
    ));
}
add_action('after_setup_theme', 'modern_bible_register_menus');
?>