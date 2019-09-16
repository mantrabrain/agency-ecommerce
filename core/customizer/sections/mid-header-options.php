<?php


// Header Section.
$wp_customize->add_section('section_mid_header',
    array(
        'title' => esc_html__('Mid Header Options', 'agency-ecommerce'),
        'priority' => 20,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);


// Setting show_mid_header.
$wp_customize->add_setting('agency_ecommerce_theme_options[show_mid_header]',
    array(
        'default' => $default['show_mid_header'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[show_mid_header]',
    array(
        'label' => esc_html__('Show Mid Header', 'agency-ecommerce'),
        'section' => 'section_mid_header',
        'type' => 'checkbox',
        'priority' => 10,
    )
);

//Logo Options Setting Starts
$wp_customize->add_setting('agency_ecommerce_theme_options[mid_header_site_identity]',
    array(
        'default' => $default['mid_header_site_identity'],
        'sanitize_callback' => 'agency_ecommerce_sanitize_select'
    )
);

$wp_customize->add_control('agency_ecommerce_theme_options[mid_header_site_identity]',
    array(
        'type' => 'radio',
        'label' => esc_html__('Mid Header Branding Options', 'agency-ecommerce'),
        'section' => 'section_mid_header',
        'choices' => array(
            'logo-only' => esc_html__('Logo Only', 'agency-ecommerce'),
            'title-text' => esc_html__('Title + Tagline', 'agency-ecommerce'),
            'logo-desc' => esc_html__('Logo + Tagline', 'agency-ecommerce')
        ),
        'priority' => 20,

    )
);


if (class_exists('WooCommerce')) {

    // Setting show_mid_header_cart.
    $wp_customize->add_setting('agency_ecommerce_theme_options[show_mid_header_cart]',
        array(
            'default' => $default['show_mid_header_cart'],
            'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('agency_ecommerce_theme_options[show_mid_header_cart]',
        array(
            'label' => esc_html__('Show Cart Icon', 'agency-ecommerce'),
            'section' => 'section_mid_header',
            'type' => 'checkbox',
            'priority' => 30,
            'active_callback' => 'agency_ecommerce_is_top_header_active',
        )
    );

    // Setting cart text.
    $wp_customize->add_setting('agency_ecommerce_theme_options[mid_header_cart_icon]',
        array(
            'default' => $default['mid_header_cart_icon'],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('agency_ecommerce_theme_options[mid_header_cart_icon]',
        array(
            'label' => esc_html__('Cart Icon', 'agency-ecommerce'),
            'description' => esc_html__('Fontawesome icons are only supported.', 'agency-ecommerce'),
            'section' => 'section_mid_header',
            'type' => 'text',
            'priority' => 40,
            'active_callback' => 'agency_ecommerce_is_top_cart_active',
        )
    );

    // Setting show_mid_header_wishlist.
    $wp_customize->add_setting('agency_ecommerce_theme_options[show_mid_header_wishlist]',
        array(
            'default' => $default['show_mid_header_wishlist'],
            'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('agency_ecommerce_theme_options[show_mid_header_wishlist]',
        array(
            'label' => esc_html__('Show Wishlist Icon (Works if YITH Wishlist plugin is activated)', 'agency-ecommerce'),
            'section' => 'section_mid_header',
            'type' => 'checkbox',
            'priority' => 50,
            'active_callback' => 'agency_ecommerce_is_top_header_active',
        )
    );

    // Setting wishlist icon.
    $wp_customize->add_setting('agency_ecommerce_theme_options[mid_header_wishlist_icon]',
        array(
            'default' => $default['mid_header_wishlist_icon'],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('agency_ecommerce_theme_options[mid_header_wishlist_icon]',
        array(
            'label' => esc_html__('Wishlist Icon', 'agency-ecommerce'),
            'description' => esc_html__('Fontawesome icons are only supported.', 'agency-ecommerce'),
            'section' => 'section_mid_header',
            'type' => 'text',
            'priority' => 60,
            'active_callback' => 'agency_ecommerce_is_top_wishlist_active',
        )
    );

    // Setting show_top_search.
    $wp_customize->add_setting('agency_ecommerce_theme_options[show_mid_search]',
        array(
            'default' => $default['show_mid_search'],
            'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('agency_ecommerce_theme_options[show_mid_search]',
        array(
            'label' => esc_html__('Show Product Search', 'agency-ecommerce'),
            'description' => esc_html__('You can change search text from Customizing ▸ Theme Options ▸Search Text Options', 'agency-ecommerce'),
            'section' => 'section_mid_header',
            'type' => 'checkbox',
            'priority' => 70,

        )
    );


}