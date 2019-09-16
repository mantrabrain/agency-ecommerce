<?php
// Layout Section.
$wp_customize->add_section('section_layout',
    array(
        'title' => esc_html__('Layout Options', 'agency-ecommerce'),
        'priority' => 50,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);

// Setting enable_sticky_sidebar.
$wp_customize->add_setting('agency_ecommerce_theme_options[enable_sticky_sidebar]',
    array(
        'default' => $default['enable_sticky_sidebar'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[enable_sticky_sidebar]',
    array(
        'label' => esc_html__('Enable Sticky Sidebar', 'agency-ecommerce'),
        'section' => 'section_layout',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

// Setting global_layout.
$wp_customize->add_setting('agency_ecommerce_theme_options[global_layout]',
    array(
        'default' => $default['global_layout'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[global_layout]',
    array(
        'label' => esc_html__('Global Layout', 'agency-ecommerce'),
        'section' => 'section_layout',
        'type' => 'radio',
        'priority' => 20,
        'choices' => array(
            'left-sidebar' => esc_html__('Left Sidebar', 'agency-ecommerce'),
            'right-sidebar' => esc_html__('Right Sidebar', 'agency-ecommerce'),
            'no-sidebar' => esc_html__('No Sidebar', 'agency-ecommerce'),
        ),
    )
);

// Setting excerpt_length.
$wp_customize->add_setting('agency_ecommerce_theme_options[excerpt_length]',
    array(
        'default' => $default['excerpt_length'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_positive_integer',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[excerpt_length]',
    array(
        'label' => esc_html__('Excerpt Length', 'agency-ecommerce'),
        'description' => esc_html__('in words', 'agency-ecommerce'),
        'section' => 'section_layout',
        'type' => 'number',
        'priority' => 30,
        'input_attrs' => array('min' => 1, 'max' => 200, 'style' => 'width: 55px;'),
    )
);

// Setting readmore_text.
$wp_customize->add_setting('agency_ecommerce_theme_options[readmore_text]',
    array(
        'default' => $default['readmore_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[readmore_text]',
    array(
        'label' => esc_html__('Read More Text', 'agency-ecommerce'),
        'section' => 'section_layout',
        'type' => 'text',
        'priority' => 40,
    )
);