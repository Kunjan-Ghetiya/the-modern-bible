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
    wp_enqueue_style('fancybox-css', get_template_directory_uri() . '/assets/css/fancybox.css', array(), null);
    wp_enqueue_style('the-modern-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // Enqueue Scripts
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'));
    wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/assets/js/fancybox.umd.js', array(), null, true);
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

//Add Custom Color In Gutenberg
function my_custom_gutenberg_colors() {
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Dark Gray', 'yourtheme'),
            'slug'  => 'dark-gray',
            'color' => '#1D1D1D',
        ),
        array(
            'name'  => __('Navy Blue', 'yourtheme'),
            'slug'  => 'navy-blue',
            'color' => '#0C111F',
        ),
        array(
            'name'  => __('Light Gray', 'yourtheme'),
            'slug'  => 'light-gray',
            'color' => '#F9FAF9',
        ),
        array(
            'name'  => __('White', 'yourtheme'),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ),
        array(
            'name'  => __('Gradient Start', 'yourtheme'),
            'slug'  => 'gradient-start',
            'color' => '#FF512F',
        ),
        array(
            'name'  => __('Gradient End', 'yourtheme'),
            'slug'  => 'gradient-end',
            'color' => '#DD2476',
        ),
        array(
            'name'  => __('Dark Gray 60%', 'yourtheme'),
            'slug'  => 'dark-gray-60',
            'color' => 'rgba(29, 29, 29, 0.6)',
        ),
    ));
}
add_action('after_setup_theme', 'my_custom_gutenberg_colors');