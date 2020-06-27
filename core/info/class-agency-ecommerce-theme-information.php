<?php
if (!function_exists('agency_ecommerce_get_recommanded_plugins')) {

	function agency_ecommerce_get_recommanded_plugins()
	{
		$plugins = array(

			array(
				'name' => esc_html__('Mantra Brain Starter Sites', 'agency-ecommerce'),
				'slug' => 'mantrabrain-starter-sites',
				'required' => false,
			),


		);

		return apply_filters('agency_ecommerce_get_recommanded_plugins', $plugins);
	}
}


if (!class_exists('Agency_Ecommerce_Theme_Information')) {

	class Agency_Ecommerce_Theme_Information
	{
		public static $theme_landing_page_link = 'https://mantrabrain.com/downloads/agency-ecommerce-wordpress-woocommerce-theme/';

		public static $premium_landing_page_link = 'https://mantrabrain.com/downloads/agency-ecommerce-addons/';

		public static $support_form_link = 'https://mantrabrain.com/support-forum/';

		public static $documentation_link = 'https://docs.mantrabrain.com/agency-ecommerce/';

		public static $theme_demo_link = 'https://demo.mantrabrain.com/agency-ecommerce/';

		public static $premium_demo_link = 'https://demo.mantrabrain.com/agency-ecommerce-pro/';

		public static $rate_theme_link = 'https://wordpress.org/support/theme/agency-ecommerce/reviews/?filter=5';

		public static $video_tutorial_link = '';


	}

}


include_once 'about/class-agency-ecommerce-about.php';
include_once 'about/class-agency-ecommerce-customizer-upsell.php';


