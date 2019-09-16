<?php
/**
 * Options.
 *
 * @package Agency_Ecommerce
 */

$default = agency_ecommerce_get_default_theme_options();

// Load custom controls
require_once trailingslashit(get_template_directory()) . '/core/customizer/controls/custom-controls.php';

#============== Theme Option Panel =================
// Add Theme Options Panel.
$wp_customize->add_panel('agency_ecommerce_theme_option_panel',
    array(
        'title' => esc_html__('Theme Options', 'agency-ecommerce'),
        'priority' => 100,
    )
);
#============= Theme Option Panel ==================


require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/top-header-options.php';

require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/mid-header-options.php';

require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/bottom-header-options.php';

require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/breadcrumb-options.php';

require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/layout-options.php';

if (class_exists('WooCommerce')) {

    require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/search-text-options.php';

    require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/shop-page-options.php';

    require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/product-single-page-options.php';

    require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/woo-checkout-options.php';

    require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/woo-cart-options.php';
}
require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/social-options.php';

require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/404-options.php';

require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/accessibility-options.php';

require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/footer-options.php';

require_once trailingslashit(get_template_directory()) . '/core/customizer/sections/other-extra-options.php';