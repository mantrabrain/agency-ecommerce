<?php
/**
 * Agency_Ecommerce_Top_Header_Hooks setup
 *
 * @package Agency_Ecommerce_Top_Header_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_Top_Header_Hooks Class.
 *
 * @class Agency_Ecommerce_Top_Header_Hooks
 */
class Agency_Ecommerce_Top_Header_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Agency_Ecommerce_Top_Header_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Agency_Ecommerce_Top_Header_Hooks Instance.
     *
     * Ensures only one instance of Agency_Ecommerce_Top_Header_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_ae_addons()
     * @return Agency_Ecommerce_Top_Header_Hooks - Main instance.
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
        $show_top_header = (boolean)agency_ecommerce_get_option('show_top_header');
        if (!$show_top_header) {
            return;
        }
        add_action('agency_ecommerce_top_header', array($this, 'agency_ecommerce_top_header_action'), 10);
        add_action('agency_ecommerce_top_header_store_information', array($this, 'agency_ecommerce_top_header_store_information_action'), 10);
        add_action('agency_ecommerce_top_header_menu', array($this, 'agency_ecommerce_top_header_menu_action'), 10);
        add_action('agency_ecommerce_top_header_current_date', array($this, 'agency_ecommerce_top_header_current_date_action'), 10);


    }

    public function agency_ecommerce_top_header_action()
    {

        ?>

        <div id="top-bar" class="top-header">
            <div class="container">
                <div class="top-left">

                    <?php


                    // Top Left type.
                    $top_left_type = agency_ecommerce_get_option('top_left_type');

                    if ('current-date' === $top_left_type) {

                        do_action('agency_ecommerce_top_header_current_date');

                    } elseif ('menu' === $top_left_type) {

                        do_action('agency_ecommerce_top_header_menu');

                    } else {

                        do_action('agency_ecommerce_top_header_store_information');

                    } ?>

                </div>

                <div class="top-right">
                    <?php

                    $show_social_icons = (boolean)agency_ecommerce_get_option('show_social_icons');

                    if (true === $show_social_icons) {

                        ?>
                        <div class="top-header-social-icons">

                            <?php
                            $number_of_social_icon = agency_ecommerce_number_of_social_icon();
                            echo '<ul>';
                            for ($num_icon = 1; $num_icon <= $number_of_social_icon; $num_icon++) {
                                $icon_link = agency_ecommerce_get_option('social_icon_link_' . $num_icon);
                                $icon = agency_ecommerce_get_option('social_icon_' . $num_icon);
                                $icon = trim(str_replace('fa ', '', $icon));
                                echo '<li><a href="' . esc_url($icon_link) . '" target="_blank">';
                                echo '<i class="fa ' . esc_attr($icon) . '"></i>';
                                echo '</a></li>';
                            }
                            echo '</ul>';
                            ?>

                        </div>
                        <?php
                    }

                    // Login/Register
                    $show_login_logout = agency_ecommerce_get_option('show_login_logout');
                    $login_icon = agency_ecommerce_get_option('login_icon');

                    if (true == $show_login_logout) {

                        if (is_user_logged_in()) { ?>

                            <div class="top-account-wrapper logged-in">
                                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                    <i class="fa <?php echo esc_attr($login_icon); ?>" aria-hidden="true"></i>
                                    <span class="top-log-out"><?php esc_html_e('Log Out', 'agency-ecommerce'); ?></span>
                                </a>
                            </div>

                            <?php
                        } else {

                            $login_text = agency_ecommerce_get_option('login_text');

                            ?>

                            <div class="top-account-wrapper logged-out">
                                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                    <i class="fa <?php echo esc_attr($login_icon); ?>" aria-hidden="true"></i>
                                    <span class="top-log-in"><?php echo esc_html($login_text); ?></span>
                                </a>
                            </div>

                            <?php

                        }
                    } // Login/Register ends

                    // Wishlist details
                    $show_wishlist = agency_ecommerce_get_option('show_wishlist');
                    $wishlist_icon = agency_ecommerce_get_option('wishlist_icon');

                    if (true == $show_wishlist && !empty($wishlist_icon) && class_exists('YITH_WCWL')) {

                        $wishlist_config = array(
                            'icon' => $wishlist_icon
                        );
                        agency_ecommerce_wishlist($wishlist_config);
                    }

                    // Cart details
                    $show_cart = agency_ecommerce_get_option('show_cart');
                    $cart_icon = agency_ecommerce_get_option('cart_icon');

                    if (true == $show_cart && !empty($cart_icon) && class_exists('WooCommerce')) {

                        $cart_config = array(
                            'icon' => $cart_icon
                        );
                        agency_ecommerce_cart($cart_config);
                    }

                    $show_top_search = agency_ecommerce_get_option('show_top_search');

                    if (true === $show_top_search && class_exists('WooCommerce')) { ?>

                        <div class="search-holder">

                            <a href="#" class="search-btn"><i class="fa fa-search"></i></a>

                            <?php
                            $options = array(//'css' => 'visibility:hidden;'
                            );
                            agency_ecommerce_product_searchbox($options); ?>
                        </div><!-- .search-holder -->
                        <?php
                    } ?>
                </div>

            </div>
        </div>
        <?php
    }

    public function agency_ecommerce_top_header_store_information_action()
    {

        $top_address = agency_ecommerce_get_option('top_address');
        $top_phone = agency_ecommerce_get_option('top_phone');
        $top_email = agency_ecommerce_get_option('top_email');
        if (!empty($top_address) || !empty($top_phone) || !empty($top_email)) { ?>
            <div class="top-left-inner">
            <?php if (!empty($top_address)) { ?>
                <span class="address"><i class="fa fa-map-marker"
                                         aria-hidden="true"></i> <?php echo esc_html($top_address); ?></span>
            <?php } ?>

            <?php if (!empty($top_phone)) { ?>
                <span class="phone"><i class="fa fa-phone"
                                       aria-hidden="true"></i> <?php echo esc_html($top_phone); ?></span>
            <?php } ?>

            <?php if (!empty($top_email)) { ?>
                <span class="fax"><i class="fa fa-envelope-o"
                                     aria-hidden="true"></i> <?php echo esc_html($top_email); ?></span>
            <?php } ?>

            </div><?php
        }
    }

    public function agency_ecommerce_top_header_menu_action()
    {
        ?>
        <div class="top-menu-holder">
            <?php
            if (has_nav_menu('top-header-menu')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'top-header-menu',
                        'menu_id' => 'top-menu',
                        'depth' => 1,
                    )
                );
            } ?>
        </div>
        <?php
    }

    public function agency_ecommerce_top_header_current_date_action()
    {
        ?>

        <div class="top-date-holder"><span><?php echo esc_html(date_i18n(get_option('date_format'))); ?></span></div>

        <?php
    }


}

Agency_Ecommerce_Top_Header_Hooks::instance();