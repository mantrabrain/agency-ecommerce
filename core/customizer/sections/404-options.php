<?php
// Footer Section.
$wp_customize->add_section('section_404',
    array(
        'title' => esc_html__('404 Page Options', 'agency-ecommerce'),
        'priority' => 120,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);
// Setting copyright_text.
$wp_customize->add_setting('agency_ecommerce_theme_options[404_page_title]',
    array(
        'default' => $default['404_page_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[404_page_title]',
    array(
        'label' => esc_html__('404 Page Title', 'agency-ecommerce'),
        'section' => 'section_404',
        'type' => 'text',
        'priority' => 120,
    )
);

// Setting copyright_text.
$wp_customize->add_setting('agency_ecommerce_theme_options[404_page_content]',
    array(
        'default' => $default['404_page_content'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[404_page_content]',
    array(
        'label' => esc_html__('404 Page Content', 'agency-ecommerce'),
        'section' => 'section_404',
        'type' => 'text',
        'priority' => 110,
    )
);
