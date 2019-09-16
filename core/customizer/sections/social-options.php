<?php
// Footer Section.
$wp_customize->add_section('section_social',
    array(
        'title' => esc_html__('Social Options', 'agency-ecommerce'),
        'priority' => 110,
        'panel' => 'agency_ecommerce_theme_option_panel',
    )
);

$number_of_icon = agency_ecommerce_number_of_social_icon();

for ($num = 1; $num <= $number_of_icon; $num++) {

    $link_option = 'social_icon_link_' . $num;
    $icon = 'social_icon_' . $num;

    // Icon Link
    $wp_customize->add_setting('agency_ecommerce_theme_options[' . $link_option . ']',
        array(
            'default' => $default[$link_option],
            'sanitize_callback' => 'sanitize_url',
        )
    );
    $wp_customize->add_control('agency_ecommerce_theme_options[' . $link_option . ']',
        array(
            /* translators: 1: Social icon link id*/
            'label' => sprintf(esc_html__('Social Icon Link - %d', 'agency-ecommerce'), $num),
            'section' => 'section_social',
            'type' => 'url',
            'priority' => 10 + $num,
        )

    );

    $wp_customize->add_setting('agency_ecommerce_theme_options[' . $icon . ']',
        array(
            'default' => $default[$icon],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control('agency_ecommerce_theme_options[' . $icon . ']',
        array(
            /* translators: 1: Icon text id */
            'label' => sprintf(esc_html__('Icon Text - %d', 'agency-ecommerce'), $num),
            'section' => 'section_social',
            'description' => esc_html__('Please enter font awesome icon text here.', 'agency-ecommerce'),
            'type' => 'text',
            'priority' => 10 + $num,
        )

    );
}