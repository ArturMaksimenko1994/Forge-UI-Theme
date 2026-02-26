<?php
/**
 * Theme Setup for Forge UI Theme
 */
add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => ['site-title', 'site-description'],
    ]);
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
});

// Подключаем файлы
require_once get_template_directory() . '/inc/layouts.php';
require_once get_template_directory() . '/inc/customize-partials.php';