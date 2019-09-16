<?php
/**
 * Agency_Ecommerce Class
 *
 * @package Agency_Ecommerce
 * @since 1.0.0
 */

if (!class_exists('Agency_Ecommerce_Assets')) :

    class Agency_Ecommerce_Assets
    {

        /**
         * Instance
         *
         * @since 1.0.0
         *
         * @access private
         * @var object Class object.
         */
        private static $instance;

        /**
         * Initiator
         *
         * @since 1.0.0
         *
         * @return object initialized object of class.
         */
        public static function get_instance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self;
            }
            self::$instance->init();
            return self::$instance;
        }

        /**
         * Initialize the theme
         *
         * @since 1.0.0
         */
        public function init()
        {
            $this->init_hooks();
        }


        public function init_hooks()
        {
            add_filter('wp_enqueue_scripts', array($this, 'scripts'));
            add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));


        }

        function admin_scripts($hook)
        {

            if (is_admin()) {
                wp_enqueue_style('wp-color-picker');
                wp_enqueue_script('wp-color-picker');
            }
            if ('widgets.php' === $hook) {

                wp_enqueue_script('underscore');

                wp_enqueue_style('agency-ecommerce-admin', get_template_directory_uri() . '/assets/admin/css/admin.css', array(), AGENCY_ECOMMERCE_THEME_VERSION);

                wp_enqueue_style('agency-ecommerce-admin-font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome.css', array(), AGENCY_ECOMMERCE_THEME_VERSION);

                wp_enqueue_media();

                wp_enqueue_script('agency-ecommerce-admin', get_template_directory_uri() . '/assets/admin/js/admin.js', array('jquery'), AGENCY_ECOMMERCE_THEME_VERSION);

            }


        }

        function scripts()
        {
            wp_enqueue_style('agency-ecommerce-fonts', agency_ecommerce_fonts_url(), array(), null);

            wp_enqueue_style('jquery-meanmenu', get_template_directory_uri() . '/assets/lib/meanmenu/meanmenu.css');

            wp_enqueue_style('jquery-slick', get_template_directory_uri() . '/assets/lib/slick/slick.css', '', '1.6.0');

            wp_enqueue_style('agency-ecommerce-icons', get_template_directory_uri() . '/assets/lib/et-line/css/icons.css', '', AGENCY_ECOMMERCE_THEME_VERSION);

            wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome.min.css', '', '4.7.0');

            wp_enqueue_style('agency-ecommerce-main-style', get_template_directory_uri() . '/assets/css/agency-ecommerce.css', '', AGENCY_ECOMMERCE_THEME_VERSION);

            wp_enqueue_style('agency-ecommerce-style', get_stylesheet_uri());

            wp_enqueue_script('agency-ecommerce-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true);

            wp_enqueue_script('agency-ecommerce-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);

            wp_enqueue_script('jquery-meanmenu', get_template_directory_uri() . '/assets/lib/meanmenu/jquery.meanmenu.js', array('jquery'), '2.0.2', true);

            wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/assets/lib/slick/slick.js', array('jquery'), '1.6.0', true);

            $is_sticky_add_to_cart = (boolean)agency_ecommerce_get_option('sticky_add_to_cart');

            if (class_exists('WooCommerce') && $is_sticky_add_to_cart) {
                if (is_product()) {

                    wp_register_script('ae-sticky-add-to-cart', get_template_directory_uri() . '/assets/js/sticky-add-to-cart.js', array(), AGENCY_ECOMMERCE_THEME_VERSION, true);
                }
            }

            // Add script for sticky sidebar.
            $sticky_sidebar = agency_ecommerce_get_option('enable_sticky_sidebar');

            if (1 == $sticky_sidebar) {

                wp_enqueue_script('jquery-theia-sticky-sidebar', get_template_directory_uri() . '/assets/lib/theia-sticky-sidebar/theia-sticky-sidebar.min.js', array('jquery'), '1.0.7', true);

            }

            wp_enqueue_script('agency-ecommerce-main', get_template_directory_uri() . '/assets/js/agency-ecommerce.js', array('jquery'), AGENCY_ECOMMERCE_THEME_VERSION, true);

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }

        }
    }

endif;
Agency_Ecommerce_Assets::get_instance();