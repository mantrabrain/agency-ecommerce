<?php
/**
 * Agency_Ecommerce_Bottom_Header_Hooks setup
 *
 * @package Agency_Ecommerce_Bottom_Header_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_Bottom_Header_Hooks Class.
 *
 * @class Agency_Ecommerce_Bottom_Header_Hooks
 */
class Agency_Ecommerce_Bottom_Header_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Agency_Ecommerce_Bottom_Header_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Agency_Ecommerce_Bottom_Header_Hooks Instance.
     *
     * Ensures only one instance of Agency_Ecommerce_Bottom_Header_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_ae_addons()
     * @return Agency_Ecommerce_Bottom_Header_Hooks - Main instance.
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
        $show_bottom_header = (boolean)agency_ecommerce_get_option('show_bottom_header');

        if (!$show_bottom_header) {
            return;
        }

        add_action('agency_ecommerce_before_bottom_header', array($this, 'agency_ecommerce_before_bottom_header_action'), 10);
        add_action('agency_ecommerce_bottom_header', array($this, 'agency_ecommerce_bottom_header_action'), 10);
        add_action('agency_ecommerce_after_bottom_header', array($this, 'agency_ecommerce_after_bottom_header_action'), 10);


    }

    public function agency_ecommerce_before_bottom_header_action()
    {
        $special_menu_alignment = agency_ecommerce_get_option('special_menu_alignment');
        ?>
        <header id="masthead" class="site-header <?php echo esc_attr($special_menu_alignment) . '-special-menu' ?>" role="banner">
        <div class="container">
        <?php
    }

    public function agency_ecommerce_bottom_header_action()
    {
        ?>
        <div class="head-wrap">
            <?php
            $site_identity = agency_ecommerce_get_option('site_identity');

            $branding_class = 'site-branding';

            if ('special-menu' == $site_identity) {

                $branding_class = 'special-menu-container';

                $special_menu_show_only_on_hover = (boolean)agency_ecommerce_get_option('special_menu_show_only_on_hover');

                if ($special_menu_show_only_on_hover) {

                    $branding_class .= ' onhover';
                }
            }
            ?>

            <div class="<?php echo esc_attr($branding_class) ?>">
                <?php


                if ('logo-only' == $site_identity) {

                    agency_ecommerce_the_custom_logo();

                } elseif ('logo-desc' == $site_identity) {

                    agency_ecommerce_the_custom_logo();

                    $description = get_bloginfo('description', 'display');

                    if ($description || is_customize_preview()) : ?>

                        <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                    <?php
                    endif;

                } elseif ('special-menu' == $site_identity) {

                    agency_ecommerce_special_menu();

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

            <div id="main-nav" class="clear-fix">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <div class="wrap-menu-content">
                        <?php
                        wp_nav_menu(
                            apply_filters('agency_ecommerce_primary_nav_args', array(
                                'theme_location' => 'primary-menu',
                                'menu_id' => 'primary-menu',
                                'fallback_cb' => 'agency_ecommerce_primary_navigation_fallback',
                            ))
                        );
                        ?>
                    </div><!-- .menu-content -->
                </nav><!-- #site-navigation -->
            </div> <!-- #main-nav -->
        </div>
        <?php
    }

    public function agency_ecommerce_after_bottom_header_action()
    {

        ?></div><!-- .container --></header><!-- #masthead -->
        <?php
    }


}

Agency_Ecommerce_Bottom_Header_Hooks::instance();