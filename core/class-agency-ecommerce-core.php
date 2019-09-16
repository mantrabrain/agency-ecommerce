<?php
/**
 * Agency_Ecommerce Class
 *
 * @package Agency_Ecommerce
 * @since 1.0.0
 */

if (!class_exists('Agency_Ecommerce_Core')) :

    /**
     * Agency_Ecommerce Class
     *
     */
    class Agency_Ecommerce_Core
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
            $this->define_constants();
            $this->init_hooks();
            $this->includes();
        }

        public function define_constants()
        {

        }

        public function init_hooks()
        {
            add_action('after_setup_theme', array($this, 'setup'));
            add_action('after_setup_theme', array($this, 'content_width'), 0);

        }

        public function includes()
        {


            // Theme information
            require AGENCY_ECOMMERCE_THEME_DIR . '/core/info/class-agency-ecommerce-theme-information.php';


            require AGENCY_ECOMMERCE_THEME_DIR . '/core/class-agency-ecommerce-assets.php';

            // Customizer additions.
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/customizer/customizer.php';

            // Load core functions.
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/customizer/core.php';

            // Load helper functions.
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/helper/helper-main.php';

            // Custom template tags for this theme.
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/template-tags.php';

            // Custom functions that act independently of the theme templates.
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/template-functions.php';

            // Load widgets.
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/class-agency-ecommerce-widgets.php';

            // Load hooks.
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/class-agency-ecommerce-hooks.php';

            // Load dynamic css.
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/dynamic.php';


            /**
             * Load TGMPA Configs.
             */
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/tgmpa/class-tgm-plugin-activation.php';
            require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/tgmpa/tgmpa-agency-ecommerce.php';


        }

        function setup()
        {
            /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Agency Ecommerce, use a find and replace
	 * to change 'agency-ecommerce' to the name of your theme in all the template files.
	 */
            load_theme_textdomain('agency-ecommerce', get_template_directory() . '/languages');

            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support('title-tag');

            /*
             * Enable support for custom logo.
             */
            add_theme_support('custom-logo');

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');
            add_image_size('agency-ecommerce-common', 370, 260, true);

            // Register navigation menu locations.
            register_nav_menus(array(
                'top-header-menu' => esc_html__('Top Header Menu', 'agency-ecommerce'),
                'primary-menu' => esc_html__('Primary Menu', 'agency-ecommerce'),
                'special-menu' => esc_html__('Special Menu( Display Beside Primary Menu)', 'agency-ecommerce'),
            ));

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));

            // Set up the WordPress core custom background feature.
            add_theme_support('custom-background', apply_filters('agency_ecommerce_custom_background_args', array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )));

            // Add woocommerce support, gallery zoom, lightbox and thumbnail slider.
            if (class_exists('WooCommerce')) {
                add_theme_support('woocommerce');
                add_theme_support('wc-product-gallery-lightbox');
                add_theme_support('wc-product-gallery-slider');
            }
            $gallery_zoom = agency_ecommerce_get_option('enable_gallery_zoom');

            if (1 == $gallery_zoom) {
                add_theme_support('wc-product-gallery-zoom');
            }

            /* Turn on wide images */
            add_theme_support('align-wide');
        }

        function content_width()
        {
            // This variable is intended to be overruled from themes.
            // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
            // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
            $GLOBALS['content_width'] = apply_filters('agency_ecommerce_content_width', 810);
        }

    }

endif;
