<?php
// Shop Section.
$wp_customize->add_section('selection_product_single',
    array(
        'title' => esc_html__('Product Single Page Options', 'agency-ecommerce'),
        'priority' => 80,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);

//Setting sticky_add_to_cart.
$wp_customize->add_setting('agency_ecommerce_theme_options[sticky_add_to_cart]',
    array(
        'default' => $default['sticky_add_to_cart'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[sticky_add_to_cart]',
    array(
        'label' => esc_html__('Sticky add to cart', 'agency-ecommerce'),
        'description' => esc_html__('This option allows you to show/hide sticky add to cart on product single page.', 'agency-ecommerce'),
        'section' => 'selection_product_single',
        'type' => 'checkbox',
        'priority' => 100,
    )
);


// Setting shop_layout.
$wp_customize->add_setting('agency_ecommerce_theme_options[sticky_add_to_cart_position]',
    array(
        'default' => $default['sticky_add_to_cart_position'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[sticky_add_to_cart_position]',
    array(
        'label' => esc_html__('Sticky add to cart position', 'agency-ecommerce'),
        'description' => esc_html__('This option allows you to change the sticky add to cart position.', 'agency-ecommerce'),
        'section' => 'selection_product_single',
        'type' => 'radio',
        'priority' => 120,
        'choices' => array(
            'top' => esc_html__('Top', 'agency-ecommerce'),
            'bottom' => esc_html__('Bottom', 'agency-ecommerce'),
        ),
        'active_callback' => 'agency_ecommerce_is_sticky_add_to_cart_enable'
    )
);


// Setting disable_related_products.
$wp_customize->add_setting('agency_ecommerce_theme_options[disable_related_products]',
    array(
        'default' => $default['disable_related_products'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[disable_related_products]',
    array(
        'label' => esc_html__('Disable Related Products at Product Detail Page', 'agency-ecommerce'),
        'section' => 'selection_product_single',
        'type' => 'checkbox',
        'priority' => 130,
    )
);


// Setting enable_gallery_zoom.
$wp_customize->add_setting('agency_ecommerce_theme_options[enable_gallery_zoom]',
    array(
        'default' => $default['enable_gallery_zoom'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[enable_gallery_zoom]',
    array(
        'label' => esc_html__('Enable Image Zoom at Product Detail Page', 'agency-ecommerce'),
        'section' => 'selection_product_single',
        'type' => 'checkbox',
        'priority' => 140,
    )
);




