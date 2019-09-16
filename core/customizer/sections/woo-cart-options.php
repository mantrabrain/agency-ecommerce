<?php
// Footer Section.
$wp_customize->add_section('section_woo_cart',
    array(
        'title' => esc_html__('Cart Options', 'agency-ecommerce'),
        'priority' => 100,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);
//woo cart template
$wp_customize->add_setting('agency_ecommerce_theme_options[woo_cart_template]',
    array(
        'default' => $default['woo_cart_template'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select'
    )
);

$wp_customize->add_control('agency_ecommerce_theme_options[woo_cart_template]',
    array(
        'type' => 'radio',
        'label' => esc_html__('Cart Page Template', 'agency-ecommerce'),
        'section' => 'section_woo_cart',
        'choices' => array(
            'ae-cart-basic' => esc_html__('Basic Template', 'agency-ecommerce'),
            'ae-cart-tmpl-1' => esc_html__('Template One', 'agency-ecommerce'),
        ),
        'priority' => 10,

    )
);

//woo continue shopping text
$wp_customize->add_setting('agency_ecommerce_theme_options[woo_continue_shopping_text]',
    array(
        'default' => $default['woo_continue_shopping_text'],
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control('agency_ecommerce_theme_options[woo_continue_shopping_text]',
    array(
        'type' => 'text',
        'label' => esc_html__('Continue Shopping text', 'agency-ecommerce'),
        'section' => 'section_woo_cart',
        'priority' => 20,


    )
);

// Setting for sidebars.
$wp_customize->add_setting('agency_ecommerce_theme_options[woo_cart_sidebar]',
    array(
        'default' => $default['woo_cart_sidebar'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[woo_cart_sidebar]',
    array(
        'label' => esc_html__('Cart Sidebar', 'agency-ecommerce'),
        'section' => 'section_woo_cart',
        'type' => 'radio',
        'priority' => 30,
        'choices' => array(
            'left-sidebar' => esc_html__('Left Sidebar', 'agency-ecommerce'),
            'right-sidebar' => esc_html__('Right Sidebar', 'agency-ecommerce'),
            'no-sidebar' => esc_html__('No Sidebar', 'agency-ecommerce'),
        ),
    )
);