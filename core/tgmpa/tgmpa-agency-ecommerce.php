<?php
/**
 * This file contains the recommended plugin lists to this theme
 */

add_action('tgmpa_register', 'agency_ecommerce_register_required_plugins');

/**
 * Register the recommended plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function agency_ecommerce_register_required_plugins()
{

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(

		array(
			'name' => esc_html__('WooCommerce', 'agency-ecommerce'),
			'slug' => 'woocommerce',
			'required' => false,
		), array(
			'name' => esc_html__('WooCommerce Wishlist', 'agency-ecommerce'),
			'slug' => 'matrix-wishlist',
			'required' => false,
		), array(
			'name' => esc_html__('WooCommerce Quick View', 'agency-ecommerce'),
			'slug' => 'matrix-quick-view',
			'required' => false,
		), array(
			'name' => esc_html__('Mantrabrain Starter Sites', 'agency-ecommerce'),
			'slug' => 'mantrabrain-starter-sites',
			'required' => false,
		),

	);

	$config = array(
		'id' => 'agency-ecommerce',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu' => 'tgmpa-install-plugins',
		// Menu slug.
		'has_notices' => true,
		// Show admin notices or not.
		'dismissable' => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg' => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,
		// Automatically activate plugins after installation or not.
		'message' => '',
		// Message to output right before the plugins table.

		'strings' => array(
			'page_title' => esc_html__('Install Required Plugins', 'agency-ecommerce'),
			'menu_title' => esc_html__('Install Plugins', 'agency-ecommerce'),
			/* translators: %s: plugin name. */
			'installing' => esc_html__('Installing Plugin: %s', 'agency-ecommerce'),
			/* translators: %s: plugin name. */
			'updating' => esc_html__('Updating Plugin: %s', 'agency-ecommerce'),
			'oops' => esc_html__('Something went wrong with the plugin API.', 'agency-ecommerce'),
			/* translators: 1: plugin name(s). */
			'notice_can_install_required' => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'agency-ecommerce'
			),
			/* translators: 1: plugin name(s). */
			'notice_can_install_recommended' => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'agency-ecommerce'
			),
			/* translators: 1: plugin name(s). */
			'notice_ask_to_update' => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'agency-ecommerce'
			),
			/* translators: 1: plugin name(s). */
			'notice_ask_to_update_maybe' => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'agency-ecommerce'
			),
			/* translators: 1: plugin name(s). */
			'notice_can_activate_required' => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'agency-ecommerce'
			),
			/* translators: 1: plugin name(s). */
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'agency-ecommerce'
			),
			'install_link' => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'agency-ecommerce'
			),
			'update_link' => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'agency-ecommerce'
			),
			'activate_link' => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'agency-ecommerce'
			),
			'return' => esc_html__('Return to Required Plugins Installer', 'agency-ecommerce'),
			'plugin_activated' => esc_html__('Plugin activated successfully.', 'agency-ecommerce'),
			'activated_successfully' => esc_html__('The following plugin was activated successfully:', 'agency-ecommerce'),
			/* translators: 1: plugin name. */
			'plugin_already_active' => esc_html__('No action taken. Plugin %1$s was already active.', 'agency-ecommerce'),
			/* translators: 1: plugin name. */
			'plugin_needs_higher_version' => esc_html__('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'agency-ecommerce'),
			/* translators: 1: dashboard link. */
			'complete' => esc_html__('All plugins installed and activated successfully. %1$s', 'agency-ecommerce'),
			'dismiss' => esc_html__('Dismiss this notice', 'agency-ecommerce'),
			'notice_cannot_install_activate' => esc_html__('There are one or more required or recommended plugins to install, update or activate.', 'agency-ecommerce'),
			'contact_admin' => esc_html__('Please contact the administrator of this site for help.', 'agency-ecommerce'),

			'nag_type' => '',
			// Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),

	);

	tgmpa($plugins, $config);
}
