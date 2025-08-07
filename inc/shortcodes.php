<?php

// Get current year
function shortcode_year() {
    return '&copy; ' . date('Y');
}
add_shortcode('year', 'shortcode_year');

// Testimonial listing
function custom_testimonials_shortcode() {
    ob_start();

    $args = array(
        'post_type'      => 'testimonial',
        'posts_per_page' => -1
    );

    $testimonials = new WP_Query($args);

    if ($testimonials->have_posts()) :
        ?>
    <div class="testimonial-slider-wrapper">
        <div class="testimonial-slider-wrap">
        <div class="testimonial-slider">
            <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
            <div class="testimonial-card">
                <div class="testimonial-inner">

                    <div class="testimonial-meta-data d-flex align-items-center">
                        <?php if (has_post_thumbnail()) { ?>
                        <div class="testimonial-avatar">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </div>
                        <div class="testimonial-content-wrap">
                            <h3 class="testimonial-name heading-4 mb-0"><?php the_title(); ?></h3>
                            <p class="testimonial-role mb-0 has-dark-gray-60-color">
                                <?php echo get_field('testimonials_author_designation'); ?>
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-text has-dark-gray-60-color">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
    </div>
<?php
    else :
        echo '<p>No testimonials found.</p>';
    endif;

    return ob_get_clean();
}
add_shortcode('testimonials_slider', 'custom_testimonials_shortcode');

function fancybox_video_button_shortcode($atts) {

    $atts = shortcode_atts(array(
        'url' => '',
        'label' => 'Watch Video'
    ), $atts, 'fancybox_video_button');

    if (empty($atts['url'])) {
        return '';
    }

    ob_start();
    ?>
    <div class="wp-block-button watch-video-button open-video-popup">
        <a 
            class="wp-block-button__link wp-element-button" 
            href="<?php echo esc_url($atts['url']); ?>" 
            data-fancybox
        >
            <?php echo esc_html($atts['label']); ?>
        </a>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('fancybox_video_button', 'fancybox_video_button_shortcode');

?>