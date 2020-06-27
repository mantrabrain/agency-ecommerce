<?php


// Header Section.
$wp_customize->add_section('section_bottom_header',
	array(
		'title' => esc_html__('Bottom Header Options', 'agency-ecommerce'),
		'priority' => 30,
		'panel' => 'agency_ecommerce_theme_option_panel',
	)
);


// Setting show_mid_header.
$wp_customize->add_setting('agency_ecommerce_theme_options[show_bottom_header]',
	array(
		'default' => $default['show_bottom_header'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
	)
);
$wp_customize->add_control('agency_ecommerce_theme_options[show_bottom_header]',
	array(
		'label' => esc_html__('Show Bottom Header', 'agency-ecommerce'),
		'section' => 'section_bottom_header',
		'type' => 'checkbox',
		'priority' => 10,
	)
);

//Logo Options Setting Starts
$wp_customize->add_setting('agency_ecommerce_theme_options[site_identity]',
	array(
		'default' => $default['site_identity'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_select'
	)
);

$wp_customize->add_control('agency_ecommerce_theme_options[site_identity]',
	array(
		'type' => 'radio',
		'label' => esc_html__('Logo Options', 'agency-ecommerce'),
		'description' => esc_html__('This options works for bottom header section.', 'agency-ecommerce'),
		'section' => 'section_bottom_header',
		'choices' => array(
			'logo-only' => esc_html__('Logo Only', 'agency-ecommerce'),
			'title-text' => esc_html__('Title + Tagline', 'agency-ecommerce'),
			'logo-desc' => esc_html__('Logo + Tagline', 'agency-ecommerce'),
			'special-menu' => esc_html__('Special Menu', 'agency-ecommerce')
		),
		'priority' => 20,

	)
);

// special_menu_text
$wp_customize->add_setting('agency_ecommerce_theme_options[special_menu_alignment]',
	array(
		'default' => $default['special_menu_alignment'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('agency_ecommerce_theme_options[special_menu_alignment]',
	array(
		'label' => esc_html__('Special Menu alignment', 'agency-ecommerce'),
		'description' => esc_html__('Special menu alignment', 'agency-ecommerce'),
		'section' => 'section_bottom_header',
		'type' => 'radio',
		'choices' => array(
			'left' => esc_html__('Left', 'agency-ecommerce'),
			'right' => esc_html__('Right', 'agency-ecommerce'),
		),
		'default' => $default['special_menu_alignment'],
		'priority' => 30,
		'active_callback' => 'agency_ecommerce_is_special_menu_enabled'
	)
);


// special_menu_text
$wp_customize->add_setting('agency_ecommerce_theme_options[special_menu_text]',
	array(
		'default' => $default['special_menu_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control('agency_ecommerce_theme_options[special_menu_text]',
	array(
		'label' => esc_html__('Special Menu Text', 'agency-ecommerce'),
		'description' => esc_html__('Special menu text', 'agency-ecommerce'),
		'section' => 'section_bottom_header',
		'type' => 'text',
		'default' => $default['special_menu_text'],
		'priority' => 40,
		'active_callback' => 'agency_ecommerce_is_special_menu_enabled'
	)
);


// special_menu_max_height
$wp_customize->add_setting('agency_ecommerce_theme_options[special_menu_max_height]',
	array(
		'default' => $default['special_menu_max_height'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control('agency_ecommerce_theme_options[special_menu_max_height]',
	array(
		'label' => esc_html__('Special Menu Max Height (px)', 'agency-ecommerce'),
		'description' => esc_html__('Maximum height for special menu. Default: 433 and 0 for auto height.)', 'agency-ecommerce'),
		'section' => 'section_bottom_header',
		'type' => 'number',
		'default' => $default['special_menu_max_height'],
		'priority' => 50,
		'active_callback' => 'agency_ecommerce_is_special_menu_enabled'
	)
);

// special_menu_show_only_on_hover
$wp_customize->add_setting('agency_ecommerce_theme_options[special_menu_show_only_on_hover]',
	array(
		'default' => $default['special_menu_show_only_on_hover'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
	)
);
$wp_customize->add_control('agency_ecommerce_theme_options[special_menu_show_only_on_hover]',
	array(
		'label' => esc_html__('Show Special Menu only on hover on homepage.', 'agency-ecommerce'),
		'description' => esc_html__('Show only on hover on homepage. If you uncheck this, special menu will show always on homepage.', 'agency-ecommerce'),
		'section' => 'section_bottom_header',
		'type' => 'checkbox',
		'default' => $default['special_menu_show_only_on_hover'],
		'priority' => 60,
		'active_callback' => 'agency_ecommerce_is_special_menu_enabled'
	)
);

// Enable Dropdown menu for special menu
$wp_customize->add_setting('agency_ecommerce_theme_options[special_menu_dropdown_enable]',
	array(
		'default' => $default['special_menu_dropdown_enable'],
		'sanitize_callback' => 'agency_ecommerce_sanitize_checkbox',
	)
);
$wp_customize->add_control('agency_ecommerce_theme_options[special_menu_dropdown_enable]',
	array(
		'label' => esc_html__('Enable Dropdown ( For Special Menu )', 'agency-ecommerce'),
		'description' => esc_html__('If you enable dropdown option for special menu, max height will not work.', 'agency-ecommerce'),
		'section' => 'section_bottom_header',
		'type' => 'checkbox',
		'priority' => 61,


	)
);
