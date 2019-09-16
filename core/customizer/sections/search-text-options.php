<?php // Show product search section.
$wp_customize->add_section('section_product_search_texts',
    array(
        'title' => esc_html__('Search Text Options', 'agency-ecommerce'),
        'priority' => 60,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);


// Setting search product text.
$wp_customize->add_setting('agency_ecommerce_theme_options[search_products_text]',
    array(
        'default' => $default['search_products_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[search_products_text]',
    array(
        'label' => esc_html__('Search Products Text', 'agency-ecommerce'),
        'section' => 'section_product_search_texts',
        'type' => 'text',
        'priority' => 20,
        'active_callback' => 'agency_ecommerce_is_top_product_search_active',
    )
);

// Setting select category text.
$wp_customize->add_setting('agency_ecommerce_theme_options[select_category_text]',
    array(
        'default' => $default['select_category_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('agency_ecommerce_theme_options[select_category_text]',
    array(
        'label' => esc_html__('Select Category Text', 'agency-ecommerce'),
        'section' => 'section_product_search_texts',
        'type' => 'text',
        'priority' => 30,
        'active_callback' => 'agency_ecommerce_is_top_product_search_active',
    )
);