<?php
/**
 * Customizer settings for Important Link Panel
 *
 * @package Mantrabrain
 * @subpackage Agency Ecommerce
 * @since 1.0.0
 */

add_action('customize_register', 'agency_ecommerce_customizer_upsell');


function agency_ecommerce_customizer_upsell($wp_customize)
{

    // Theme important links started
    class Agency_Ecommerce_Customizer_Upsell extends WP_Customize_Control
    {

        public $type = "agency-ecommerce-important-links";

        public function render_content()
        {
            //Add Theme instruction, Support Forum, Demo Link, Rating Link
            $important_links = array(
                'view-pro' => array(
                    'link' => esc_url(Agency_Ecommerce_Theme_Information::$premium_landing_page_link . '?utm_source=free_customizer&utm_medium=agency_ecommerce_free&utm_campaign=free_customizer'),
                    'text' => esc_html__('View Pro', 'agency-ecommerce'),
                ),
                'theme-info' => array(
                    'link' => esc_url(Agency_Ecommerce_Theme_Information::$theme_landing_page_link . '?utm_source=free_customizer&utm_medium=agency_ecommerce_free&utm_campaign=free_customizer'),
                    'text' => esc_html__('Theme Info', 'agency-ecommerce'),
                ),
                'support' => array(
                    'link' => esc_url(Agency_Ecommerce_Theme_Information::$support_form_link),
                    'text' => esc_html__('Support', 'agency-ecommerce'),
                ),
                'documentation' => array(
                    'link' => esc_url(Agency_Ecommerce_Theme_Information::$documentation_link),
                    'text' => esc_html__('Documentation', 'agency-ecommerce'),
                ),
                'demo' => array(
                    'link' => esc_url(Agency_Ecommerce_Theme_Information::$theme_demo_link),
                    'text' => esc_html__('View Demo', 'agency-ecommerce'),
                ),
                'rating' => array(
                    'link' => esc_url(Agency_Ecommerce_Theme_Information::$rate_theme_link),
                    'text' => esc_html__('Rate this theme', 'agency-ecommerce'),
                ),
            );
            foreach ($important_links as $important_link) {
                echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
            }
        }

    }

    $wp_customize->add_section('agency_ecommerce_important_links', array(
        'priority' => 1,
        'title' => __('Important Links', 'agency-ecommerce'),
    ));

    /**
     * This setting has the dummy Sanitizaition function as it contains no value to be sanitized
     */
    $wp_customize->add_setting('agency_ecommerce_important_links', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control(new Agency_Ecommerce_Customizer_Upsell($wp_customize, 'important_links', array(
        'label' => __('Important Links', 'agency-ecommerce'),
        'section' => 'agency_ecommerce_important_links',
        'settings' => 'agency_ecommerce_important_links',
    )));
    // Theme Important Links Ended

}
