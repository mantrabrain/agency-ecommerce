<?php
/**
 * Agency Ecommerce functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mantrabrain
 * @subpackage Agency Ecommerce
 * @since 1.0.0
 */

$current_theme = wp_get_theme('agency-ecommerce');

define('AGENCY_ECOMMERCE_THEME_VERSION', $current_theme->get('Version'));
define('AGENCY_ECOMMERCE_THEME_SETTINGS', 'agency-ecommerce-settings');

define('AGENCY_ECOMMERCE_THEME_DIR', trailingslashit(get_template_directory()));
define('AGENCY_ECOMMERCE_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
// Theme Core file init
require_once AGENCY_ECOMMERCE_THEME_DIR . 'core/class-agency-ecommerce-core.php';

function Agency_Ecommerce()
{
    return Agency_Ecommerce_Core::get_instance();
}

Agency_Ecommerce();







