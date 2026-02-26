<?php
/**
 * Selective Refresh и Edit Shortcut для header/footer
 */

// Render callbacks
function forge_ui_render_header() {
    $header_name = get_theme_mod('forge_ui_header_layout', 'header-1');
    get_template_part('parts/header/' . $header_name);
}

function forge_ui_render_footer() {
    $footer_name = get_theme_mod('forge_ui_footer_layout', 'footer-1');
    get_template_part('parts/footer/' . $footer_name);
}

// Selective Refresh Partials
function forge_ui_customizer_partials($wp_customize) {
    if ( isset($wp_customize->selective_refresh) ) {
        $wp_customize->selective_refresh->add_partial('forge_ui_header_layout', [
            'selector'            => '#masthead',
            'settings'            => ['forge_ui_header_layout'],
            'render_callback'     => 'forge_ui_render_header',
            'container_inclusive' => true,
        ]);

        $wp_customize->selective_refresh->add_partial('forge_ui_footer_layout', [
            'selector'            => '#colophon',
            'settings'            => ['forge_ui_footer_layout'],
            'render_callback'     => 'forge_ui_render_footer',
            'container_inclusive' => true,
        ]);
    }
}
add_action('customize_register', 'forge_ui_customizer_partials');

// Динамическое подключение header/footer
function forge_ui_get_header() {
    $header_name = get_theme_mod('forge_ui_header_layout', 'header-1');
    get_template_part('parts/header/' . $header_name);
}

function forge_ui_get_footer() {
    $footer_name = get_theme_mod('forge_ui_footer_layout', 'footer-1');
    get_template_part('parts/footer/' . $footer_name);
}