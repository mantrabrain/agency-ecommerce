<?php
/**
 * Helper functions.
 *
 * @package Agency_Ecommerce
 */
require_once AGENCY_ECOMMERCE_THEME_DIR . '/core/helper/font-awesome-list.php';


if (!function_exists('agency_ecommerce_get_the_excerpt')) :

	/**
	 * Returns post excerpt.
	 *
	 * @param int $length Excerpt length in words.
	 * @param WP_Post $post_object The post object.
	 * @return string Post excerpt.
	 * @since 1.0.0
	 *
	 */
	function agency_ecommerce_get_the_excerpt()
	{
		$agency_excerpt = get_the_excerpt();

		return apply_filters('agency_ecommerce_excerpt', $agency_excerpt);

	}

endif;

if (!function_exists('agency_ecommerce_fonts_url')) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function agency_ecommerce_fonts_url()
	{
		$fonts_url = '';
		$fonts = array();
		$subsets = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Open Sans font: on or off', 'agency-ecommerce')) {
			$fonts[] = 'Open Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i';
		}

		/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== _x('on', 'Playfair Display font: on or off', 'agency-ecommerce')) {
			$fonts[] = 'Playfair Display:400,400i,700,700i,900,900i';
		}

		if ($fonts) {
			$fonts_url = add_query_arg(array(
				'family' => urlencode(implode('|', $fonts)),
				'subset' => urlencode($subsets),
			), '//fonts.googleapis.com/css');
		}
		return $fonts_url;
	}
}

if (!function_exists('agency_ecommerce_get_woocommerce_pages')) :

	/**
	 * Returns WooCommerce pages.
	 *
	 * @return array Pages details.
	 * @since 1.0.0
	 *
	 */
	function agency_ecommerce_get_woocommerce_pages()
	{
		// WC pages to check against.
		$check_pages = array(
			esc_html_x('Shop base', 'page setting', 'agency-ecommerce') => array(
				'option' => 'woocommerce_shop_page_id',
				'shortcode' => '',
			),
			esc_html_x('Cart', 'page setting', 'agency-ecommerce') => array(
				'option' => 'woocommerce_cart_page_id',
				'shortcode' => '[' . apply_filters('woocommerce_cart_shortcode_tag', 'woocommerce_cart') . ']',
			),
			esc_html_x('Checkout', 'page setting', 'agency-ecommerce') => array(
				'option' => 'woocommerce_checkout_page_id',
				'shortcode' => '[' . apply_filters('woocommerce_checkout_shortcode_tag', 'woocommerce_checkout') . ']',
			),
			esc_html_x('My account', 'page setting', 'agency-ecommerce') => array(
				'option' => 'woocommerce_myaccount_page_id',
				'shortcode' => '[' . apply_filters('woocommerce_my_account_shortcode_tag', 'woocommerce_my_account') . ']',
			),
		);

		$pages_output = array();
		foreach ($check_pages as $page_name => $values) {
			$page_id = get_option($values['option']);
			$page_set = $page_exists = $page_visible = false;
			$shortcode_present = $shortcode_required = false;

			// Page checks.
			if ($page_id) {
				$page_set = true;
			}
			if (get_post($page_id)) {
				$page_exists = true;
			}
			if ('publish' === get_post_status($page_id)) {
				$page_visible = true;
			}

			// Shortcode checks.
			if ($values['shortcode'] && get_post($page_id)) {
				$shortcode_required = true;
				$page = get_post($page_id);
				if (strstr($page->post_content, $values['shortcode'])) {
					$shortcode_present = true;
				}
			}

			// Wrap up our findings into an output array.
			$pages_output[] = array(
				'page_name' => $page_name,
				'page_id' => $page_id,
				'page_set' => $page_set,
				'page_exists' => $page_exists,
				'page_visible' => $page_visible,
				'shortcode' => $values['shortcode'],
				'shortcode_required' => $shortcode_required,
				'shortcode_present' => $shortcode_present,
			);
		} // End foreach().

		return $pages_output;
	}

endif;

if (!function_exists('agency_ecommerce_woocommerce_pages_status')) :

	/**
	 * Returns WooCommerce pages status.
	 *
	 * @return bool Page status.
	 * @since 1.0.0
	 *
	 */
	function agency_ecommerce_woocommerce_pages_status()
	{
		$output = true;

		$pages = agency_ecommerce_get_woocommerce_pages();
		foreach ($pages as $page) {
			if (true === $page['page_set']) {
				if (true === $page['shortcode_required'] && true !== $page['shortcode_present']) {
					$output = false;
					break;
				}
			} else {
				$output = false;
				break;
			}
		}

		return $output;
	}

endif;

if (!function_exists('agency_ecommerce_woocommerce_pages_status_message')) :

	/**
	 * Returns WooCommerce pages status message.
	 *
	 * @return string Message.
	 * @since 1.0.0
	 *
	 */
	function agency_ecommerce_woocommerce_pages_status_message()
	{
		$output = '';

		$pages = agency_ecommerce_get_woocommerce_pages();

		foreach ($pages as $page) {
			if (true === $page['page_set']) {
				if (true === $page['shortcode_required'] && true !== $page['shortcode_present']) {

					/* translators: 1: page name, 2: shortcode */

					$output .= '<li>' . sprintf(esc_html__('%1$s page does not contain %2$s shortcode.', 'agency-ecommerce'), $page['page_name'], $page['shortcode']) . '</li>';
				}
			} else {
				/* translators: 1: page name */

				$output .= '<li>' . sprintf(esc_html__('%s page is not set.', 'agency-ecommerce'), $page['page_name']) . '</li>';
			}
		}

		if (!empty($output)) {
			$output = '<ul>' . $output . '</ul>';
		}

		return $output;
	}

endif;

if (!function_exists('agency_ecommerce_product_searchbox')) {

	function agency_ecommerce_product_searchbox($search_options = array())
	{
		$options_default = array(
			'css' => '',
			'class' => ''
		);
		$options = wp_parse_args($search_options, $options_default);
		?>
	<div class="search-box<?php echo !empty($options['class']) ? ' ' . esc_attr($options['class']) : ''; ?>"
		 style="<?php echo esc_attr($options['css']) ?>">

		<?php

		if (class_exists('WooCommerce')) {

			// For search products placeholder text
			$search_products_text = agency_ecommerce_get_option('search_products_text');

			if (!empty($search_products_text)) {

				$product_search_text = esc_attr($search_products_text);

			} else {

				$product_search_text = esc_attr_x('Search Products &hellip;', 'placeholder', 'agency-ecommerce');
			}

			// For select category text
			$select_category_text = agency_ecommerce_get_option('select_category_text');

			if (!empty($select_category_text)) {

				$product_category_text = esc_html($select_category_text);

			} else {

				$product_category_text = esc_html__('Select Category', 'agency-ecommerce');
			}

			?>

			<div class="product-search-wrapper">

				<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
					<input type="hidden" name="post_type" value="product"/>
					<select class="product-cat" name="product_cat">

						<option value=""><?php echo $product_category_text; ?></option>

						<?php

						$categories = get_categories('taxonomy=product_cat');

						foreach ($categories as $category) {

							$option = '<option value="' . esc_attr($category->category_nicename) . '"' . agency_ecommerce_selected_category($category->category_nicename) . '>';

							$option .= esc_html($category->cat_name);

							$option .= ' (' . absint($category->category_count) . ')';

							$option .= '</option>';

							echo $option;

						} ?>

					</select>

					<input type="text" class="search-field products-search"
						   placeholder="<?php echo $product_search_text; ?>"
						   value="<?php echo get_search_query(); ?>" name="s"/>


					<button type="submit" class="search-submit"><span
							class="screen-reader-text"><?php echo esc_html_x('Search', 'submit button', 'agency-ecommerce'); ?></span><i
							class="fa fa-search" aria-hidden="true"></i></button>
				</form>


			</div> <!-- .product-search-wrapper -->
		<?php } ?>

		</div><?php
	}
}


if (!function_exists('agency_ecommerce_cart')) {

	function agency_ecommerce_cart($cart_config = array())
	{

		$cart_config_default = array(
			'icon' => 'shopping-cart' # font awesome cart icon
		);
		$cart_options = wp_parse_args($cart_config, $cart_config_default);
		?>
		<div class="ae-cart-wrapper">
			<div class="ae-icon-wrap">
				<a href="<?php echo esc_url(wc_get_cart_url()); ?>">
					<i class="fa <?php echo esc_attr($cart_options['icon']); ?>" aria-hidden="true"></i>
					<span
						class="cart-value ae-cart-fragment"> <?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span>
				</a>
			</div>
			<div class="ae-cart-content">
				<?php the_widget('WC_Widget_Cart', ''); ?>
			</div>
		</div>

	<?php }
}

if (!function_exists('agency_ecommerce_wishlist')) {

	function agency_ecommerce_wishlist($wishlist_config = array())
	{
		$wishlist_config_default = array(
			'icon' => 'fa-heart' # font awesome wishlist icon
		);
		$wishlist_options = wp_parse_args($wishlist_config, $wishlist_config_default);

		$wishlist_page_id = yith_wcwl_object_id(get_option('yith_wcwl_wishlist_page_id'));

		if (absint($wishlist_page_id) > 0) : ?>
			<div class="ae-wishlist-wrapper">
				<div class="ae-icon-wrap">
					<a class="wishlist-btn"
					   href="<?php echo esc_url(get_permalink($wishlist_page_id)); ?>"><i
							class="fa <?php echo esc_attr($wishlist_options['icon']); ?>"
							aria-hidden="true"></i><span
							class="wish-value"><?php echo absint(yith_wcwl_count_products()); ?></span></a>
				</div>
			</div>
		<?php endif; ?>
	<?php }
}

if (!function_exists('agency_ecommerce_special_menu')) {

	function agency_ecommerce_special_menu()
	{
		$special_menu_text = agency_ecommerce_get_option('special_menu_text');

		$special_menu_dropdown_enable = (boolean)agency_ecommerce_get_option('special_menu_dropdown_enable');

		$special_menu_wrapper_class = 'menu special-menu-wrapper';


		if ($special_menu_dropdown_enable) {
			$special_menu_wrapper_class .= ' dropdown-enable';
		}

		?>
		<ul class="<?php echo esc_attr($special_menu_wrapper_class); ?>">
			<li class="menu-item menu-item-has-children">
				<i class="fa fa-angle-down angle-down"></i>
				<a href="javascript:void(0)" class="special-menu">
					<i class="fa fa-navicon toggle"></i><?php echo esc_html($special_menu_text); ?>
				</a>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'special-menu',
					'menu_class' => 'sub-menu special-sub-menu',
					'container' => false,
					'fallback_cb' => 'agency_ecommerce_special_navigation_fallback'
				));

				?>
				<div class="responsive-special-sub-menu clearfix"></div>
			</li>
		</ul>
		<?php

	}
}
if (!function_exists('agency_ecommerce_widget_not_found_message')) {

	function agency_ecommerce_widget_not_found_message($not_found_message = '')
	{
		$not_found_message = empty($not_found_message) ? esc_html__('No widgets found. Please add widgets to this widget area.', 'agency-ecommerce') : $not_found_message;

		echo '<div class="ae-empty-content">';

		if (current_user_can('edit_theme_options')) { ?>
			<p><?php
				echo esc_html($not_found_message);
				printf(
					wp_kses(
					/* translators: 1: link to WP admin new post page. */
						__('<a href="%1$s">Get started here</a>.', 'agency-ecommerce'),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url(admin_url('widgets.php'))
				);
				?></p>
			<?php
		} else { ?>

			<p><?php echo esc_html($not_found_message); ?></p>

			<?php

		}
		echo '</div>';
	}
}
if (!function_exists('agency_ecommerce_number_of_social_icon')) :

	function agency_ecommerce_number_of_social_icon()
	{
		return apply_filters('agency_ecommerce_number_of_social_icon', 5);
	}

endif;
