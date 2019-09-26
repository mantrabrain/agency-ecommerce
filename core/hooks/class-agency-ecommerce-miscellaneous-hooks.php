<?php
/**
 * Agency_Ecommerce_Miscellaneous_Hooks setup
 *
 * @package Agency_Ecommerce_Miscellaneous_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_Miscellaneous_Hooks Class.
 *
 * @class Agency_Ecommerce_Miscellaneous_Hooks
 */
class Agency_Ecommerce_Miscellaneous_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Agency_Ecommerce_Miscellaneous_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Agency_Ecommerce_Miscellaneous_Hooks Instance.
     *
     * Ensures only one instance of Agency_Ecommerce_Miscellaneous_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_ae_addons()
     * @return Agency_Ecommerce_Miscellaneous_Hooks - Main instance.
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

        add_action('agency_ecommerce_main_content', array($this, 'agency_ecommerce_breadcrumb'));
        add_action('agency_ecommerce_main_content', array($this, 'agency_ecommerce_home_widgets'));
        add_action('agency_ecommerce_before_content', array($this, 'agency_ecommerce_before_content'));
        add_action('agency_ecommerce_after_content', array($this, 'agency_ecommerce_after_content'));
        add_action('agency_ecommerce_credit', array($this, 'agency_ecommerce_credit'));
        $footer_payment_image = agency_ecommerce_get_option('footer_payment_image');
        if(!empty($footer_payment_image)) {
            add_action('agency_ecommerce_credit', array($this, 'agency_ecommerce_payment_option'));
        }
    }


    public function agency_ecommerce_breadcrumb()
    {
        get_template_part('template-parts/breadcrumbs');
    }

    public function agency_ecommerce_home_widgets()
    {
        get_template_part('template-parts/home-widgets');
    }

    public function agency_ecommerce_before_content()
    {
        ?><div id="content" class="site-content"><div class="container"><div class="ae-inner"><?php
    }

    public function agency_ecommerce_after_content()
    {
        ?></div><!-- .ae-inner --></div><!-- .container --></div><!-- #content --><?php
    }

    public function agency_ecommerce_credit()
    {
        ?>

        <div class="site-info">
            <?php
            /* translators: 1: theme name, 2: author link*/
            printf(esc_html__('%1$s by %2$s', 'agency-ecommerce'), 'Agency Ecommerce', '<a href="https://www.mantrabrain.com/" rel="designer">mantrabrain</a>'); ?>
        </div><!-- .site-info -->

        <?php

    }

    public function agency_ecommerce_payment_option()
    {
        $footer_payment_image = agency_ecommerce_get_option('footer_payment_image');
        ?>
        <div class="payment-image">
            <img src="<?php echo esc_attr($footer_payment_image); ?>"/>
        </div>
        <?php
    }


}

Agency_Ecommerce_Miscellaneous_Hooks::instance();
