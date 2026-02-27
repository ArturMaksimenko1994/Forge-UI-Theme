<?php
// Подключаем настройки и функции темы
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/layouts.php';
require_once get_template_directory() . '/inc/customize-partials.php';


function mytheme_enqueue_assets() {
    // Подключение стилей темы
    // Корневой style.css
    wp_enqueue_style(
        'forge-ui-style',               // уникальный идентификатор
        get_stylesheet_uri(),           // автоматически style.css в корне темы
        array(),                        // зависимости
        wp_get_theme()->get('Version'), // версия темы для кэш-бастинга
        'all'                           // media
    );

    // Дополнительный CSS-файл
    wp_enqueue_style(
        'forge-ui-extra',                       // уникальный идентификатор
        get_template_directory_uri() . '/assets/scss/styles.css', // путь к CSS
        array('forge-ui-style'),                // зависит от корневого style.css
        wp_get_theme()->get('Version'),         // версия темы
        'all'
    );

    // Дополнительный CSS-файл
    wp_enqueue_style(
        'forge-ui-components',                       // уникальный идентификатор
        get_template_directory_uri() . '/assets/scss/components.css', // путь к CSS
        array('forge-ui-style'),                // зависит от корневого style.css
        wp_get_theme()->get('Version'),         // версия темы
        'all'
    );

    // Подключение скриптов темы
    // wp_enqueue_script(
    //     'mytheme-script', // handle
    //     get_template_directory_uri() . '/js/main.js', // путь к JS
    //     ['jquery'], // зависимости (например, jQuery)
    //     filemtime(get_template_directory() . '/js/main.js'), // версия
    //     true // подключить в футере
    // );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');

// убирает из настроек лишнее 
add_action( 'customize_register', function( $wp_customize ) {

    // Удаляем стандартные секции
    $wp_customize->remove_section( 'title_tagline' );
    $wp_customize->remove_section( 'colors' );
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'custom_css' );

    // Удаляем панель меню
    $wp_customize->remove_panel( 'nav_menus' );

});


function mytheme_add_body_class_theme($classes) {
    // Получаем выбранную тему из настроек WP Customizer (по умолчанию default)
    $theme_preset = get_theme_mod('theme_preset', 'default');

    // Добавляем класс к body
    $classes[] = 'theme-' . $theme_preset;

    return $classes;
}
add_filter('body_class', 'mytheme_add_body_class_theme');

function mytheme_customize_register($wp_customize) {
    $wp_customize->add_section('theme_preset_section', array(
        'title' => __('Выбор цветовой темы', 'mytheme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('theme_preset', array(
        'default' => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('theme_preset_control', array(
        'label' => __('Цветовой пресет', 'mytheme'),
        'section' => 'theme_preset_section',
        'settings' => 'theme_preset',
        'type' => 'radio',
        'choices' => array(
            'default' => __('Default', 'mytheme'),
            'red' => __('Red', 'mytheme'),
            'green' => __('Green', 'mytheme'),
        ),
    ));
}
add_action('customize_register', 'mytheme_customize_register');