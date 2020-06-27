<?php
/**
 * Core functions.
 *
 * @package Agency_Ecommerce
 */

if (!function_exists('agency_ecommerce_get_option')) :

	/**
	 * Get theme option.
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 * @since 1.0.0
	 *
	 */
	function agency_ecommerce_get_option($key)
	{

		if (empty($key)) {

			return;

		}

		$agency_ecommerce_default = agency_ecommerce_get_default_theme_options();

		$default = (isset($agency_ecommerce_default[$key])) ? $agency_ecommerce_default[$key] : '';
		$theme_options = get_theme_mod('agency_ecommerce_theme_options', $agency_ecommerce_default);
		$theme_options = array_merge($agency_ecommerce_default, $theme_options);
		$value = '';

		if (isset($theme_options[$key])) {
			$value = $theme_options[$key];
		}

		return $value;

	}

endif;

if (!function_exists('agency_ecommerce_get_default_theme_options')) :

	/**
	 * Get default theme options.
	 *
	 * @return array Default theme options.
	 * @since 1.0.0
	 *
	 */
	function agency_ecommerce_get_default_theme_options()
	{

		$defaults = array();

		//primary color
		$defaults['primary_color'] = '#0188cc';

		// Header.
		$defaults['site_identity'] = 'special-menu';
		$defaults['show_top_header'] = true;
		$defaults['top_left_type'] = 'store-info';
		$defaults['show_social_icons'] = true;
		$defaults['show_login_logout'] = true;
		$defaults['login_text'] = esc_html__('Login / Register', 'agency-ecommerce');
		$defaults['login_icon'] = 'fa-user-o';
		$defaults['show_cart'] = true;
		$defaults['cart_icon'] = 'fa-shopping-cart';
		$defaults['show_wishlist'] = false;
		$defaults['wishlist_icon'] = 'fa-heart';
		$defaults['show_top_search'] = true;
		$defaults['search_products_text'] = esc_html__('Search Products', 'agency-ecommerce');
		$defaults['select_category_text'] = esc_html__('Select Category', 'agency-ecommerce');

		// Mid Header

		$defaults['show_mid_header'] = true;
		$defaults['show_mid_header_cart'] = true;
		$defaults['mid_header_cart_icon'] = 'fa-shopping-cart';
		$defaults['show_mid_header_wishlist'] = true;
		$defaults['mid_header_wishlist_icon'] = 'fa-heart';
		$defaults['mid_header_site_identity'] = 'title-text';
		$defaults['show_mid_search'] = true;

		// Bottom Header
		$defaults['show_bottom_header'] = true;
		$defaults['special_menu_max_height'] = 433;
		$defaults['special_menu_show_only_on_hover'] = false;
		$defaults['special_menu_alignment'] = 'left';
		$defaults['special_menu_dropdown_enable'] = false;
		$defaults['special_menu_text'] = esc_html__('Special Menu', 'agency-ecommerce');
		// Layout.
		$defaults['enable_sticky_sidebar'] = true;
		$defaults['global_layout'] = 'right-sidebar';
		$defaults['excerpt_length'] = 40;
		$defaults['readmore_text'] = esc_html__('Read More', 'agency-ecommerce');

		// Shop page
		$defaults['shop_layout'] = 'right-sidebar';
		$defaults['product_per_page'] = 9;
		$defaults['product_number'] = 3;
		$defaults['hide_product_sorting'] = false;
		$defaults['enable_gallery_zoom'] = false;
		$defaults['disable_related_products'] = false;
		$defaults['show_product_excerpt'] = false;
		$defaults['woo_shop_excerpt_length'] = 40;
		$defaults['hide_list_grid_view'] = false;


		// Product Single
		$defaults['sticky_add_to_cart'] = true;
		$defaults['sticky_add_to_cart_position'] = 'top';

		// Checkout options
		$defaults['woo_checkout_template'] = 'ae-checkout-tmpl-1';
		$defaults['woo_checkout_sidebar'] = 'no-sidebar';


		// Cart options
		$defaults['woo_cart_template'] = 'ae-cart-tmpl-1';
		$defaults['woo_cart_sidebar'] = 'no-sidebar';
		$defaults['woo_continue_shopping_text'] = esc_html__('Continue Shopping', 'agency-ecommerce');

		// Footer.
		$defaults['copyright_text'] = esc_html__('Copyright &copy; All rights reserved.', 'agency-ecommerce');

		// Breadcrumb.
		$defaults['breadcrumb_type'] = 'advanced';
		$defaults['show_page_title_on_breadcrumb'] = true;
		$defaults['breadcrumb_text'] = esc_html__('Home', 'agency-ecommerce');
		$defaults['breadcrumb_background_image'] = '';
		$defaults['override_background_by_featured_image'] = true;
		$defaults['make_parallax_background_breadcrumb'] = true;


		// 404

		$defaults['404_page_title'] = esc_html__('Oops! That page can&rsquo;t be found.', 'agency-ecommerce');

		$defaults['404_page_content'] = esc_html__('It looks like nothing was found at this location. Maybe try a search?', 'agency-ecommerce');

		// accessiblity options


		$defaults['disable_focus_outline'] = false;
		$defaults['footer_payment_image'] = '';


		$font_awesome_icons = array_keys(agency_ecommerce_font_awesome_icon_list());

		$number_of_social_icon = agency_ecommerce_number_of_social_icon();
		// Social Options //
		for ($num_icon = 1; $num_icon <= $number_of_social_icon; $num_icon++) {

			$defaults['social_icon_link_' . $num_icon] = "";

			$defaults['social_icon_' . $num_icon] = $font_awesome_icons[$num_icon];
		}

		// End of social optiosn

		return apply_filters('agency_ecommerce_default_theme_options', $defaults);
	}

endif;

//=============================================================
// Get all options in array
//=============================================================
if (!function_exists('agency_ecommerce_get_options')) :

	/**
	 * Get all theme options in array.
	 *
	 * @return array Theme options.
	 * @since 1.0.0
	 *
	 */
	function agency_ecommerce_get_options()
	{

		$value = array();

		$value = get_theme_mods();

		return $value;

	}

endif;
