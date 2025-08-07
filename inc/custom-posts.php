<?php 
// Social Media Links
function register_social_links_cpt() {
    $labels = array(
        'name'               => 'Social Links',
        'singular_name'      => 'Social Link',
        'menu_name'          => 'Social Links',
        'name_admin_bar'     => 'Social Link',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Social Link',
        'new_item'           => 'New Social Link',
        'edit_item'          => 'Edit Social Link',
        'view_item'          => 'View Social Link',
        'all_items'          => 'All Social Links',
        'search_items'       => 'Search Social Links',
        'not_found'          => 'No social links found.',
        'not_found_in_trash' => 'No social links found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'social-link'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-share',
        'supports' => array('title', 'page-attributes', 'thumbnail'), // Use 'page-attributes' for menu order sorting
    );

    register_post_type('social_link', $args);
}
add_action('init', 'register_social_links_cpt');

// Register Custom Post Type: Testimonials
function register_testimonials_cpt() {

    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'menu_name'          => 'Testimonials',
        'name_admin_bar'     => 'Testimonial',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Testimonial',
        'new_item'           => 'New Testimonial',
        'edit_item'          => 'Edit Testimonial',
        'view_item'          => 'View Testimonial',
        'all_items'          => 'All Testimonials',
        'search_items'       => 'Search Testimonials',
        'not_found'          => 'No testimonials found',
        'not_found_in_trash' => 'No testimonials found in Trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-format-quote',
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'testimonials'),
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'register_testimonials_cpt');

?>