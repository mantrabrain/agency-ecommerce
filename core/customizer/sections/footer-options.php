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

// Setting theme_layout_option.
$wp_customize->add_setting('agency_ecommerce_theme_options[footer_payment_image]',
    array(
        'default' => $default['footer_payment_image'],
        'sanitize_callback' => 'esc_url',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'agency_ecommerce_theme_options[footer_payment_image]',
        array(
            'priority' => 101,
            'label' => esc_html__('Payment image for footer', 'agency-ecommerce'),
            'description' => esc_html__('Payment image for footer. ', 'agency-ecommerce'),
            'section' => 'section_footer',
        )
    )
);
