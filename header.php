<?php
/**
 * The header for the theme.
 *
 * @package ModernBible
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php echo wp_get_document_title(); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="backdrop"></div>
    <?php
        $theme_settings_id = get_page_by_title('Theme Settings')->ID;

        $header_logo     = get_field('header_logo', $theme_settings_id);
        $login_button    = get_field('login_button', $theme_settings_id);
        $sign_up_button  = get_field('sign_up_button', $theme_settings_id);

    ?>

    <header class="header">
        <div class="container">
            <div class="header-wrap d-flex justify-content-between align-items-center">
                <div class="header-left-column header-column">
                    <?php if ($header_logo): ?>
                    <div class="site-logo">
                        <a href="<?php echo esc_url(home_url()); ?>" rel="home">
                            <img src="<?php echo esc_url($header_logo['url']); ?>"
                                alt="<?php echo esc_attr($header_logo['alt'] ?: get_bloginfo('name')); ?>">
                        </a>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="header-right-column header-column">
                    <div class="header-right-wrap d-flex justify-content-between align-items-center">
                        <div class="navigation-block">
                            <div class="close-button-wrapper">
                                <button class="close-button">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="close-icon" aria-hidden="true"
                                        focusable="false">
                                        <line x1="4.5" y1="4.5" x2="19.5" y2="19.5" stroke="#FF4A39" stroke-width="2"
                                            stroke-linecap="round" />
                                        <line x1="19.5" y1="4.5" x2="4.5" y2="19.5" stroke="#FF4A39" stroke-width="2"
                                            stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>

                            <div class="navigation-wrap" role="navigation" aria-label="Main Menu">
                                <?php
                                    if (has_nav_menu('primary_menu')) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'primary_menu',
                                            'menu'            => 'Header Menu',
                                            'container'       => 'nav',
                                            'container_class' => 'nav-wrap',
                                            'menu_class'     => 'header-menu d-flex justify-content-between align-items-center',
                                        ));
                                    }
                                ?>

                            </div>
                            <?php if ($login_button || $sign_up_button): ?>
                            <div class="header-btn-groups-wrap mobile-block">
                                <ul class="header-btn-groups d-flex justify-content-between align-items-center">
                                    <?php if ($login_button): ?>
                                    <li>
                                        <a class="common-btn" href="<?php echo esc_url($login_button['url']); ?>"
                                            target="<?php echo esc_attr($login_button['target']); ?>">
                                            <?php echo esc_html($login_button['title']); ?>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if ($sign_up_button): ?>
                                    <li>
                                        <a class="transparent-btn" href="<?php echo esc_url($sign_up_button['url']); ?>"
                                            target="<?php echo esc_attr($sign_up_button['target']); ?>">
                                            <?php echo esc_html($sign_up_button['title']); ?>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($login_button || $sign_up_button): ?>
                        <div class="header-btn-groups-wrap desktop-block">
                            <ul class="header-btn-groups d-flex justify-content-between align-items-center">
                                <?php if ($login_button): ?>
                                <li>
                                    <a class="common-btn" href="<?php echo esc_url($login_button['url']); ?>"
                                        target="<?php echo esc_attr($login_button['target']); ?>">
                                        <?php echo esc_html($login_button['title']); ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if ($sign_up_button): ?>
                                <li>
                                    <a class="transparent-btn" href="<?php echo esc_url($sign_up_button['url']); ?>"
                                        target="<?php echo esc_attr($sign_up_button['target']); ?>">
                                        <?php echo esc_html($sign_up_button['title']); ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <div class="navbar-toggler-wrapper">
                            <button class="navbar-toggler">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                    <rect y="4" width="24" height="2" fill="#FF4A39" />
                                    <rect y="11" width="24" height="2" fill="#FF4A39" />
                                    <rect y="18" width="24" height="2" fill="#FF4A39" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>