<?php
// Footer Section.
$wp_customize->add_section('section_accessibility',
    array(
        'title' => esc_html__('Accessibility Options', 'agency-ecommerce'),
        'priority' => 130,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);
// Setting copyright_text.
$wp_customize->add_setting('agency_ecommerce_theme_options[disable_focus_outline]',
    array(
        'default' => $default['disable_focus_outline'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[disable_focus_outline]',
    array(
        'label' => esc_html__('Disable focus outline', 'agency-ecommerce'),
        'section' => 'section_accessibility',
        'type' => 'checkbox',
        'priority' => 120,
    )
);