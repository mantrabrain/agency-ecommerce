<?php

// Breadcrumb Section.
$wp_customize->add_section('section_breadcrumb',
    array(
        'title' => esc_html__('Breadcrumb Options', 'agency-ecommerce'),
        'priority' => 40,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);

// Setting breadcrumb_type.
$wp_customize->add_setting('agency_ecommerce_theme_options[breadcrumb_type]',
    array(
        'default' => $default['breadcrumb_type'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[breadcrumb_type]',
    array(
        'label' => esc_html__('Breadcrumb Type', 'agency-ecommerce'),
        'section' => 'section_breadcrumb',
        'type' => 'radio',
        'priority' => 10,
        'choices' => array(
            'disable' => esc_html__('Disable', 'agency-ecommerce'),
            'simple' => esc_html__('Simple', 'agency-ecommerce'),
            'advanced' => esc_html__('Advanced', 'agency-ecommerce'),
        ),
    )
);

// Setting breadcrumb_text.
$wp_customize->add_setting('agency_ecommerce_theme_options[breadcrumb_text]',
    array(
        'default' => $default['breadcrumb_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[breadcrumb_text]',
    array(
        'label' => esc_html__('Breadcrumb Home Text', 'agency-ecommerce'),
        'section' => 'section_breadcrumb',
        'type' => 'text',
        'priority' => 20,
        'active_callback' => 'agency_ecommerce_is_breadcrumb_active'
    )
);

// Setting show_mid_header.
$wp_customize->add_setting('agency_ecommerce_theme_options[show_page_title_on_breadcrumb]',
    array(
        'default' => $default['show_page_title_on_breadcrumb'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[show_page_title_on_breadcrumb]',
    array(
        'label' => esc_html__('Show page title on Breadcrumb', 'agency-ecommerce'),
        'section' => 'section_breadcrumb',
        'type' => 'checkbox',
        'priority' => 30,
        'active_callback' => 'agency_ecommerce_is_advance_breadcrumb_active'

    )
);
/// Background Image
$wp_customize->add_setting('agency_ecommerce_theme_options[breadcrumb_background_image]',
    array(
        'default' => $default['breadcrumb_background_image'],
        'sanitize_callback' => 'esc_url',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'agency_ecommerce_theme_options[breadcrumb_background_image]',
        array(
            'priority' => 40,
            'label' => esc_html__('Background image for breadcrumb', 'agency-ecommerce'),
            'section' => 'section_breadcrumb',
            'description' => esc_html__('Background image for breadcrumb.', 'agency-ecommerce'),
            'active_callback' => 'agency_ecommerce_is_advance_breadcrumb_active'

        )
    )
);

// Setting override_background_by_featured_image

$wp_customize->add_setting('agency_ecommerce_theme_options[override_background_by_featured_image]',
    array(
        'default' => $default['override_background_by_featured_image'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[override_background_by_featured_image]',
    array(
        'label' => esc_html__('Override background by featured image', 'agency-ecommerce'),
        'description' => esc_html__('This option allows you to override above background image by featured image ( if available ).', 'agency-ecommerce'),
        'section' => 'section_breadcrumb',
        'type' => 'checkbox',
        'priority' => 50,
        'active_callback' => 'agency_ecommerce_is_advance_breadcrumb_active'

    )
);

// Make Parallax Background
$wp_customize->add_setting('agency_ecommerce_theme_options[make_parallax_background_breadcrumb]',
    array(
        'default' => $default['make_parallax_background_breadcrumb'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[make_parallax_background_breadcrumb]',
    array(
        'label' => esc_html__('Enable parallax background', 'agency-ecommerce'),
        'description' => esc_html__('Enable/disable parallax background', 'agency-ecommerce'),
        'section' => 'section_breadcrumb',
        'type' => 'checkbox',
        'priority' => 60,
        'active_callback' => 'agency_ecommerce_is_advance_breadcrumb_active'

    )
);
