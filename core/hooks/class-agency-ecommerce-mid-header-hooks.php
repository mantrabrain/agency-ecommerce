<?php
/**
 * Agency_Ecommerce_Mid_Header_Hooks setup
 *
 * @package Agency_Ecommerce_Mid_Header_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_Mid_Header_Hooks Class.
 *
 * @class Agency_Ecommerce_Mid_Header_Hooks
 */
class Agency_Ecommerce_Mid_Header_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Agency_Ecommerce_Mid_Header_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Agency_Ecommerce_Mid_Header_Hooks Instance.
     *
     * Ensures only one instance of Agency_Ecommerce_Mid_Header_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_ae_addons()
     * @return Agency_Ecommerce_Mid_Header_Hooks - Main instance.
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
  // Top header status.
        $show_mid_header = (boolean)agency_ecommerce_get_option('show_mid_header');
        if (!$show_mid_header) {
            return;
        }
        add_action('agency_ecommerce_before_mid_header', array($this, 'agency_ecommerce_before_mid_header_action'), 10);
        add_action('agency_ecommerce_after_mid_header', array($this, 'agency_ecommerce_after_mid_header_action'), 10);
        add_action('agency_ecommerce_mid_header', array($this, 'agency_ecommerce_mid_header_action'), 10);


    }
    public function agency_ecommerce_before_mid_header_action(){
        ?>
    <div class="mid-header">
        <div class="container">
            <?php
    }
    public function agency_ecommerce_after_mid_header_action(){
        echo '</div>'; #Container close
        echo '</div>'; # Mid Header Div Close
    }

    public function agency_ecommerce_mid_header_action()
    {
        ?>
        <div class="site-branding">
                    <?php

                    $site_identity = agency_ecommerce_get_option('mid_header_site_identity');

                    if ('logo-only' == $site_identity) {

                        agency_ecommerce_the_custom_logo();

                    } elseif ('logo-desc' == $site_identity) {

                        agency_ecommerce_the_custom_logo();

                        $description = get_bloginfo('description', 'display');

                        if ($description || is_customize_preview()) : ?>

                            <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                        <?php
                        endif;

                    } else { ?>

                        <h2 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a></h2>

                        <?php
                        $description = get_bloginfo('description', 'display');

                        if ($description || is_customize_preview()) : ?>

                            <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                        <?php
                        endif;
                    } ?>
                </div><!-- .site-branding -->

        <div class="ae-search-holder">
            <?php
            $show_mid_search = (boolean)agency_ecommerce_get_option('show_mid_search');
            if($show_mid_search){
                agency_ecommerce_product_searchbox();
            }
            ?>
        </div>
        <div class="ae-cart-wishlist">
            <?php

            // Cart details
            $show_cart = agency_ecommerce_get_option('show_mid_header_cart');
            $cart_icon = agency_ecommerce_get_option('mid_header_cart_icon');

            if (true == $show_cart && !empty($cart_icon) && class_exists('WooCommerce')) {

                $cart_config = array(
                    'icon' => $cart_icon
                );
                agency_ecommerce_cart($cart_config);
            }

              // Wishlist details
            $show_wishlist = agency_ecommerce_get_option('show_mid_header_wishlist');
            $wishlist_icon = agency_ecommerce_get_option('mid_header_wishlist_icon');

            if (true == $show_wishlist && !empty($wishlist_icon) && class_exists('YITH_WCWL')) {

                $wishlist_config = array(
                    'icon' => $wishlist_icon
                );
                agency_ecommerce_wishlist($wishlist_config);
            }
            ?>
        </div>
        <?php
    }

}

Agency_Ecommerce_Mid_Header_Hooks::instance();