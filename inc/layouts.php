<?php
/**
 * Customizer settings: Header/Footer layouts
 */
function forge_ui_layouts_customizer($wp_customize) {
    $wp_customize->add_section('forge_ui_layout_section', [
        'title'    => 'Layouts',
        'priority' => 30,
    ]);

    // Header
    $wp_customize->add_setting('forge_ui_header_layout', [
        'default'   => 'header-1',
        'transport' => 'postMessage', // PostMessage нужно, чтобы карандашик работал
    ]);
    $wp_customize->add_control('forge_ui_header_layout', [
        'label'   => 'Header Layout',
        'section' => 'forge_ui_layout_section',
        'type'    => 'select',
        'choices' => [
            'header-1' => 'Header 1',
            'header-2' => 'Header 2',
            'header-3' => 'Header 3',
        ],
    ]);

    // Footer
    $wp_customize->add_setting('forge_ui_footer_layout', [
        'default'   => 'footer-1',
        'transport' => 'postMessage',
    ]);
    $wp_customize->add_control('forge_ui_footer_layout', [
        'label'   => 'Footer Layout',
        'section' => 'forge_ui_layout_section',
        'type'    => 'select',
        'choices' => [
            'footer-1' => 'Footer 1',
            'footer-2' => 'Footer 2',
            'footer-3' => 'Footer 3',
        ],
    ]);
}
add_action('customize_register', 'forge_ui_layouts_customizer');