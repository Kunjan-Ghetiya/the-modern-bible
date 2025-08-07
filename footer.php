<?php
/**
 * The template for displaying the footer
 *
 * @package ModernBible
 */
?>

<?php
$theme_settings_id = get_page_by_title('Theme Settings')->ID;
$footer_logo       = get_field('footer_logo', $theme_settings_id);
$copyright_text = get_field('copyright_text', $theme_settings_id);
$quick_links = get_field('quick_links',$theme_settings_id);
?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-wrap d-flex justify-content-between align-items-center">

            <div class="footer-logo-wrap">
                <div class="footer-logo">
                    <?php if ($footer_logo): ?>
                    <a href="<?php echo esc_url(home_url()); ?>" rel="home">
                        <img src="<?php echo esc_url($footer_logo['url']); ?>"
                            alt="<?php echo esc_attr($footer_logo['alt'] ?: get_bloginfo('name')); ?>">
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-navigation-wrap">
                <?php
                if (has_nav_menu('footer_menu')) {
                    wp_nav_menu(array(
                        'theme_location'  => 'footer_menu',
                        'menu'            => 'Footer Menu',
                        'container'       => 'nav',
                        'container_class' => 'footer-nav-wrap, nav-wrap ',
                        'menu_class'      => 'footer-menu d-flex justify-content-center align-items-center',
                    ));
                }
                ?>
            </div>

            <div class="social-links-wrap">
                <?php
                $social_links = new WP_Query(array(
                    'post_type'      => 'social_link',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ));

                if ($social_links->have_posts()) : ?>
                <ul class="social-icons d-flex justify-content-between align-items-center">
                    <?php while ($social_links->have_posts()) : $social_links->the_post();
                            $url        = get_field('link_url');
                            $slug_class = sanitize_title(get_the_title());
                            ?>
                    <li>
                        <a href="<?php echo esc_url($url); ?>" target="_blank"
                            class="social-link <?php echo esc_attr($slug_class); ?>" aria-label="<?php the_title(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>

        </div>
        <div class="footer-bottom-wrap d-flex justify-content-between align-items-center">

            <div class="privacy-content-wrap">
                <?php if (!empty($copyright_text)) : ?>
                <p class="mb-0">
                    <?php echo do_shortcode($copyright_text); ?>

                </p>
                <?php endif; ?>
            </div>

            <div class="quick-link-links-wrap">
                <?php
                if (has_nav_menu('quick_links_menu')) {
                    wp_nav_menu(array(
                        'theme_location'  => 'Quick_links_menu',
                        'menu'            => 'Quick Links',
                        'container'       => 'div',
                        'container_class' => 'quick-links-wrap',
                        'menu_class'      => 'quick-link-menu d-flex justify-content-center align-items-center',
                    ));
                }
                ?>
            </div>

        </div>
    </div>
</footer>

<div class="custom-video-popup" aria-hidden="true">
    <div class="popup-overlay"></div>
    <div class="popup-content" role="dialog" aria-modal="true" aria-label="YouTube Video">
        <button class="popup-close" aria-label="Close popup">×</button>
        <div class="popup-video-wrapper">
            <iframe id="popup-youtube-video" src="" frameborder="0" allowfullscreen loading="lazy"
                allow="autoplay"></iframe>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>

</html>