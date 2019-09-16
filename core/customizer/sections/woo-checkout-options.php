<?php
// Footer Section.
$wp_customize->add_section('section_woo_checkout',
    array(
        'title' => esc_html__('Checkout Options', 'agency-ecommerce'),
        'priority' => 90,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);
//Logo Options Setting Starts
$wp_customize->add_setting('agency_ecommerce_theme_options[woo_checkout_template]',
    array(
        'default' => $default['woo_checkout_template'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select'
    )
);

$wp_customize->add_control('agency_ecommerce_theme_options[woo_checkout_template]',
    array(
        'type' => 'radio',
        'label' => esc_html__('Checkout Page Template', 'agency-ecommerce'),
        'section' => 'section_woo_checkout',
        'choices' => array(
            'ae-checkout-basic' => esc_html__('Basic Template', 'agency-ecommerce'),
            'ae-checkout-tmpl-1' => esc_html__('Template One', 'agency-ecommerce'),
        ),
        'priority' => 10,

    )
);

// Setting for sidebars.
$wp_customize->add_setting('agency_ecommerce_theme_options[woo_checkout_sidebar]',
    array(
        'default' => $default['woo_checkout_sidebar'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[woo_checkout_sidebar]',
    array(
        'label' => esc_html__('Checkout Sidebar', 'agency-ecommerce'),
        'section' => 'section_woo_checkout',
        'type' => 'radio',
        'priority' => 20,
        'choices' => array(
            'left-sidebar' => esc_html__('Left Sidebar', 'agency-ecommerce'),
            'right-sidebar' => esc_html__('Right Sidebar', 'agency-ecommerce'),
            'no-sidebar' => esc_html__('No Sidebar', 'agency-ecommerce'),
        ),
    )
);