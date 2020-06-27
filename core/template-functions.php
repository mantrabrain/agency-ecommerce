<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Agency_Ecommerce
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function agency_ecommerce_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    $current_layout = agency_ecommerce_get_current_layout();

    $classes[] = 'global-layout-' . esc_attr($current_layout);


    if (class_exists('WooCommerce')) {

        if (!in_array('woocommerce', $classes) || is_page_template('templates/home-template.php')) {

            $classes[] = 'woocommerce';
        }

        if (is_checkout()) {

            $woo_checkout_template = agency_ecommerce_get_option('woo_checkout_template');

            if (!empty($woo_checkout_template)) {

                $classes[] = esc_attr($woo_checkout_template);

            }
        }

        if (is_cart()) {

            $woo_cart_template = agency_ecommerce_get_option('woo_cart_template');

            if (!empty($woo_cart_template)) {

                $classes[] = esc_attr($woo_cart_template);

            }
        }

    }

    //Add column class in body for woocommerce
    $product_number = agency_ecommerce_get_option('product_number');

    if (2 === $product_number || 3 === $product_number || 4 === $product_number) {

        $classes[] = 'columns-' . absint($product_number);

    } else {

        $classes[] = 'columns-3';

    }

    $breadcrumb_type = agency_ecommerce_get_option('breadcrumb_type');

    $show_page_title_on_breadcrumb = (boolean)agency_ecommerce_get_option('show_page_title_on_breadcrumb');

    if ($show_page_title_on_breadcrumb && $breadcrumb_type == 'advanced') {

        $classes[] = 'ae-hide-page-title';
    }

    // Add class for sticky sidebar.
    $sticky_sidebar = agency_ecommerce_get_option('enable_sticky_sidebar');

    if (1 == $sticky_sidebar) {

        $classes[] = 'global-sticky-sidebar';

    }

    return $classes;
}

add_filter('body_class', 'agency_ecommerce_body_classes');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function agency_ecommerce_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}

add_action('wp_head', 'agency_ecommerce_pingback_header');

/**
 * Display custom logo
 */
if (!function_exists('agency_ecommerce_the_custom_logo')) :

    /**
     * Displays custom logo.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_the_custom_logo()
    {
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
    }
endif;

/**
 * Add go to top
 */
if (!function_exists('agency_ecommerce_footer_goto_top')) :

    /**
     * Add Go to top.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_footer_goto_top()
    {
        echo '<a href="#page" class="scrollup" id="btn-scrollup"></a>';
    }
endif;
add_action('wp_footer', 'agency_ecommerce_footer_goto_top');

if (!function_exists('agency_ecommerce_implement_excerpt_length')) :

    /**
     * Implement excerpt length.
     *
     * @since 1.0.0
     *
     * @param int $length The number of words.
     * @return int Excerpt length.
     */
    function agency_ecommerce_implement_excerpt_length($length)
    {

        if (is_admin()) {

            return $length;
        }

        $excerpt_length = agency_ecommerce_get_option('excerpt_length');

        if (absint($excerpt_length) > 0) {

            $length = absint($excerpt_length);

        }

        return $length;

    }
endif;

if (!function_exists('agency_ecommerce_content_more_link')) :

    /**
     * Implement read more in content.
     *
     * @since 1.0.0
     *
     * @param string $more_link Read More link element.
     * @param string $more_link_text Read More text.
     * @return string Link.
     */
    function agency_ecommerce_content_more_link($more_link, $more_link_text)
    {

        if (is_admin()) {

            return $more_link;
        }

        $read_more_text = agency_ecommerce_get_option('readmore_text');
        if (!empty($read_more_text)) {
            $more_link = str_replace($more_link_text, esc_html($read_more_text), $more_link);
        }
        return $more_link;

    }

endif;

if (!function_exists('agency_ecommerce_implement_read_more')) :

    /**
     * Implement read more in excerpt.
     *
     * @since 1.0.0
     *
     * @param string $more The string shown within the more link.
     * @return string The excerpt.
     */
    function agency_ecommerce_implement_read_more($more)
    {
        if (is_admin()) {

            return $more;
        }

        $output = $more;

        $read_more_text = agency_ecommerce_get_option('readmore_text');

        if (!empty($read_more_text)) {

            $output = '&hellip;<p><a href="' . esc_url(get_permalink()) . '" class="button btn-continue">' . esc_html($read_more_text) . '</a></p>';

        }

        return $output;

    }
endif;

if (!function_exists('agency_ecommerce_hook_read_more_filters')) :

    /**
     * Hook read more and excerpt length filters.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_hook_read_more_filters()
    {

        if (is_home() || is_category() || is_tag() || is_author() || is_date() || is_search()) {

            add_filter('excerpt_length', 'agency_ecommerce_implement_excerpt_length', 10);
            add_filter('the_content_more_link', 'agency_ecommerce_content_more_link', 10, 2);
            add_filter('excerpt_more', 'agency_ecommerce_implement_read_more');

        }
    }
endif;
add_action('wp', 'agency_ecommerce_hook_read_more_filters');

if (!function_exists('agency_ecommerce_add_sidebar')) :

    /**
     * Add sidebar.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_add_sidebar()
    {

        $current_layout = agency_ecommerce_get_current_layout();

        // Include sidebar.
        if ('no-sidebar' !== $current_layout) {
            get_sidebar();
        }

    }
endif;
add_action('agency_ecommerce_action_sidebar', 'agency_ecommerce_add_sidebar');

//=============================================================
// Check selected category on product search
//=============================================================
if (!function_exists('agency_ecommerce_selected_category')) {

    function agency_ecommerce_selected_category($catname)
    {

        $q_var = (isset($_GET['product_cat'])) ? esc_html(wp_unslash($_GET['product_cat'])) : '';

        if ($q_var === $catname) {

            return 'selected="selected"';
        }

        return false;
    }

}

// Fallback Main Menu

if (!function_exists('agency_ecommerce_primary_navigation_fallback')) {
    function agency_ecommerce_primary_navigation_fallback()
    {

        $home_url = esc_url(home_url('/'));
        $fallback_menu = '<ul id="main-menu" class="menu">';
        $fallback_menu .= '<li><a href="' . $home_url . '" rel="home">' . esc_html__('Home', 'agency-ecommerce') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="demo">' . esc_html__('Demo', 'agency-ecommerce') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="docs">' . esc_html__('Docs', 'agency-ecommerce') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="support">' . esc_html__('Support', 'agency-ecommerce') . '</a></li>';
        $fallback_menu .= '</ul>';

        echo $fallback_menu;

    }

}

// Fallback Main Menu

if (!function_exists('agency_ecommerce_special_navigation_fallback')) {
    function agency_ecommerce_special_navigation_fallback()
    {

        $home_url = esc_url(home_url('/'));
        $fallback_menu = '<ul id="special-menu" class="sub-menu special-sub-menu">';
        $fallback_menu .= '<li><a href="' . $home_url . '" rel="home">' . esc_html__('Home', 'agency-ecommerce') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="demo">' . esc_html__('Demo', 'agency-ecommerce') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="docs">' . esc_html__('Docs', 'agency-ecommerce') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="support">' . esc_html__('Support', 'agency-ecommerce') . '</a></li>';
        $fallback_menu .= '</ul>';

        echo $fallback_menu;


    }

}

if (!function_exists('agency_ecommerce_sass_darken')) :
    function agency_ecommerce_sass_darken($hex, $percent)
    {
        preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors);
        str_replace('%', '', $percent);
        $color = "#";
        for ($i = 1; $i <= 3; $i++) {
            $rgb = hexdec($primary_colors[$i]);
            $calculated_color = round($rgb * (100 - ($percent * 2)) / 100);
            $calculated_color = $calculated_color < 0 ? 0 : $calculated_color;
            $color .= str_pad(dechex($calculated_color), 2, '0', STR_PAD_LEFT);
        }

        return $color;
    }
endif;
if (!function_exists('agency_ecommerce_sass_lighten')) :
    function agency_ecommerce_sass_lighten($hex, $percent)
    {
        if (!$hex) {
            return;
        }
        preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors);
        str_replace('%', '', $percent);
        $color = "#";
        for ($i = 1; $i <= 3; $i++) {
            $rgb = hexdec($primary_colors[$i]);
            $calculated_color = round((int)$rgb * (100 + (int)$percent) / 100);
            $calculated_color = $calculated_color > 254 ? 255 : $calculated_color;
            $color .= str_pad(dechex($calculated_color), 2, '0', STR_PAD_LEFT);
        }

        return $color;
    }

endif;


if (!function_exists('agency_ecommerce_is_advance_breadcrumb')) :

    function agency_ecommerce_is_advance_breadcrumb()
    {
        $show_page_title_on_breadcrumb = (boolean)agency_ecommerce_get_option('show_page_title_on_breadcrumb');

        $breadcrumb_type = agency_ecommerce_get_option('breadcrumb_type');

        if ($show_page_title_on_breadcrumb && $breadcrumb_type == 'advanced') {


            return true;
        }

        return false;
    }

endif;


if (!function_exists('agency_ecommerce_404_page_title')) :

    function agency_ecommerce_404_page_title()
    {
        return agency_ecommerce_get_option('404_page_title');
    }

endif;

if (!function_exists('agency_ecommerce_404_page_content')) :

    function agency_ecommerce_404_page_content()
    {
        return agency_ecommerce_get_option('404_page_content');
    }

endif;

if (!function_exists('agency_ecommerce_get_current_layout')) :

    /**
     * Add sidebar.
     *
     * @since 1.0.0
     */
    function agency_ecommerce_get_current_layout()
    {

        $current_layout = agency_ecommerce_get_option('global_layout');

        $current_layout = apply_filters('agency_ecommerce_filter_theme_global_layout', $current_layout);

        if (class_exists('WooCommerce')) {

            $woo_cart_sidebar = agency_ecommerce_get_option('woo_cart_sidebar');

            if (function_exists('is_cart') && is_cart()) {

                $current_layout = $woo_cart_sidebar;
            }

            $woo_checkout_sidebar = agency_ecommerce_get_option('woo_checkout_sidebar');

            if (function_exists('is_checkout') && is_checkout()) {

                $current_layout = $woo_checkout_sidebar;
            }

            $shop_layout = agency_ecommerce_get_option('shop_layout');

            if (function_exists('is_shop') && is_shop()) {

                $current_layout = $shop_layout;
            }
        }

        return apply_filters('agency_ecommerce_filter_current_layout', $current_layout);


    }
endif;
