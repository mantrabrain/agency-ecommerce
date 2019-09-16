<?php
// Footer Section.
$wp_customize->add_section('section_footer',
    array(
        'title' => esc_html__('Footer Options', 'agency-ecommerce'),
        'priority' => 140,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);
// Setting copyright_text.
$wp_customize->add_setting('agency_ecommerce_theme_options[copyright_text]',
    array(
        'default' => $default['copyright_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[copyright_text]',
    array(
        'label' => esc_html__('Copyright Text', 'agency-ecommerce'),
        'section' => 'section_footer',
        'type' => 'text',
        'priority' => 100,
    )
);