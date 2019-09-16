<?php
/**
 * Sanitization functions.
 *
 * @package Agency_Ecommerce
 */

if (!function_exists('agency_ecommerce_sanitize_select')) :

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function agency_ecommerce_sanitize_select($input, $setting)
    {

        // Ensure input is clean.
        $input = sanitize_text_field($input);

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);

    }

endif;

if (!function_exists('agency_ecommerce_sanitize_checkbox')) :

    /**
     * Sanitize checkbox.
     *
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function agency_ecommerce_sanitize_checkbox($checked)
    {

        return ((isset($checked) && true === $checked) ? true : false);

    }

endif;


if (!function_exists('agency_ecommerce_sanitize_positive_integer')) :

    /**
     * Sanitize positive integer.
     *
     * @since 1.0.0
     *
     * @param int $input Number to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return int Sanitized number; otherwise, the setting default.
     */
    function agency_ecommerce_sanitize_positive_integer($input, $setting)
    {

        $input = absint($input);

        // If the input is an absolute integer, return it.
        // otherwise, return the default.
        return ($input ? $input : $setting->default);

    }

endif;

