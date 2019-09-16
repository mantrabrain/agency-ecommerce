<?php

// Setting site primary color.
$wp_customize->add_setting('agency_ecommerce_theme_options[primary_color]',
    array(
        'default' => $default['primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'agency_ecommerce_theme_options[primary_color]',
        array(
            'label' => esc_html__('Primary Color', 'agency-ecommerce'),
            'description' => esc_html__('Applied to main color of site.', 'agency-ecommerce'),
            'section' => 'colors',
        )
    )
);

