<?php


if (!function_exists('agency_ecommerce_is_top_header_active')) :

    /**
     * Check if featured slider is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_top_header_active($control)
    {

        if (true == $control->manager->get_setting('agency_ecommerce_theme_options[show_top_header]')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('agency_ecommerce_is_top_header_information_active')) :

    /**
     * Check if top header is active and store information is selected slider is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_top_header_information_active($control)
    {

        if (true == $control->manager->get_setting('agency_ecommerce_theme_options[show_top_header]')->value() && $control->manager->get_setting('agency_ecommerce_theme_options[top_left_type]')->value() == 'store-info') {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('agency_ecommerce_is_top_login_logout_active')) :

    /**
     * Check if login/register option is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_top_login_logout_active($control)
    {

        if (true == $control->manager->get_setting('agency_ecommerce_theme_options[show_top_header]')->value() && true == $control->manager->get_setting('agency_ecommerce_theme_options[show_login_logout]')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('agency_ecommerce_is_top_cart_active')) :

    /**
     * Check if cart option is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_top_cart_active($control)
    {

        if (true == $control->manager->get_setting('agency_ecommerce_theme_options[show_top_header]')->value() && true == $control->manager->get_setting('agency_ecommerce_theme_options[show_cart]')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('agency_ecommerce_is_top_wishlist_active')) :

    /**
     * Check if wishlist option is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_top_wishlist_active($control)
    {

        if (true == $control->manager->get_setting('agency_ecommerce_theme_options[show_top_header]')->value() && true == $control->manager->get_setting('agency_ecommerce_theme_options[show_wishlist]')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('agency_ecommerce_is_top_product_search_active')) :

    /**
     * Check if show product search at top header option is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_top_product_search_active($control)
    {

        if (true == $control->manager->get_setting('agency_ecommerce_theme_options[show_top_search]')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

if (!function_exists('agency_ecommerce_is_breadcrumb_active')) :

    /**
     * Check if breadcrumb is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_breadcrumb_active($control)
    {

        if ('disable' != $control->manager->get_setting('agency_ecommerce_theme_options[breadcrumb_type]')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


if (!function_exists('agency_ecommerce_is_special_menu_enabled')) :

    /**
     * Check if special menu is enabled
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_special_menu_enabled($control)
    {

        if ('special-menu' == $control->manager->get_setting('agency_ecommerce_theme_options[site_identity]')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;


if (!function_exists('agency_ecommerce_is_show_product_excerpt_on_shop')) :

    /**
     * Check show/hide product excerpt on shop page
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_show_product_excerpt_on_shop($control)
    {

        return (boolean)$control->manager->get_setting('agency_ecommerce_theme_options[show_product_excerpt]')->value();

    }

endif;


if (!function_exists('agency_ecommerce_is_sticky_add_to_cart_enable')) :

    /**
     * Check show/hide sticky add to cart on single product page
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_sticky_add_to_cart_enable($control)
    {

        return (boolean)$control->manager->get_setting('agency_ecommerce_theme_options[sticky_add_to_cart]')->value();

    }

endif;


if (!function_exists('agency_ecommerce_is_advance_breadcrumb_active')) :

    /**
     * Check if advance breadcrumb enable/disable
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function agency_ecommerce_is_advance_breadcrumb_active($control)
    {

        return 'advanced' == $control->manager->get_setting('agency_ecommerce_theme_options[breadcrumb_type]')->value();

    }

endif;
