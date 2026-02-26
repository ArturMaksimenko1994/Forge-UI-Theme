<?php
// Подключаем настройки и функции темы
require_once get_template_directory() . '/inc/theme-setup.php';
require_once get_template_directory() . '/inc/layouts.php';
require_once get_template_directory() . '/inc/customize-partials.php';

// Подключение стилей
function forge_ui_enqueue_assets() {
    wp_enqueue_style('forge-ui-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'forge_ui_enqueue_assets');

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