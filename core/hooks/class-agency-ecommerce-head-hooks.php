<?php
/**
 * Agency_Ecommerce_Head_Hooks setup
 *
 * @package Agency_Ecommerce_Head_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_Head_Hooks Class.
 *
 * @class Agency_Ecommerce_Head_Hooks
 */
class Agency_Ecommerce_Head_Hooks
{

/**
 * The single instance of the class.
 *
 * @var Agency_Ecommerce_Head_Hooks
 * @since 1.0.0
 */
protected static $_instance = null;


/**
 * Main Agency_Ecommerce_Head_Hooks Instance.
 *
 * Ensures only one instance of Agency_Ecommerce_Head_Hooks is loaded or can be loaded.
 *
 * @since 1.0.0
 * @static
 * @see mb_ae_addons()
 * @return Agency_Ecommerce_Head_Hooks - Main instance.
 */
public static function instance()
{
    if (is_null(self::$_instance)) {
        self::$_instance = new self();
    }
    self::$_instance->hooks();

    return self::$_instance;
}

public function hooks()
{
    add_action('agency_ecommerce_doctype', array($this, 'agency_ecommerce_doctype_action'), 10);
    add_action('agency_ecommerce_head', array($this, 'agency_ecommerce_head_action'), 10);


}

public function agency_ecommerce_doctype_action()
{

?><!DOCTYPE html>
<html <?php language_attributes(); ?>><?php

}

public function agency_ecommerce_head_action()
{
?>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php
}

}

Agency_Ecommerce_Head_Hooks::instance();