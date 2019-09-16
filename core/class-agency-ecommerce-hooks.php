<?php
/**
 * Agency_Ecommerce_Hooks setup
 *
 * @package Agency_Ecommerce_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_Hooks Class.
 *
 * @class Agency_Ecommerce_Hooks
 */
final class Agency_Ecommerce_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Agency_Ecommerce_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Agency_Ecommerce_Hooks Instance.
     *
     * Ensures only one instance of Agency_Ecommerce_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_ae_addons()
     * @return Agency_Ecommerce_Hooks - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        self::$_instance->includes();

        return self::$_instance;
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes()
    {
        include_once AGENCY_ECOMMERCE_THEME_DIR . 'core/hooks/class-agency-ecommerce-head-hooks.php';
        include_once AGENCY_ECOMMERCE_THEME_DIR . 'core/hooks/class-agency-ecommerce-top-header-hooks.php';
        include_once AGENCY_ECOMMERCE_THEME_DIR . 'core/hooks/class-agency-ecommerce-mid-header-hooks.php';
        include_once AGENCY_ECOMMERCE_THEME_DIR . 'core/hooks/class-agency-ecommerce-bottom-header-hooks.php';
        include_once AGENCY_ECOMMERCE_THEME_DIR . 'core/hooks/class-agency-ecommerce-woocommerce-hooks.php';
        include_once AGENCY_ECOMMERCE_THEME_DIR . 'core/hooks/class-agency-ecommerce-miscellaneous-hooks.php';


    }


}

Agency_Ecommerce_Hooks::instance();