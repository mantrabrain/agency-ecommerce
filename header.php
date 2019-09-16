<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency_Ecommerce
 */

?>
<?php
/**
 * Hook - agency_ecommerce_doctype.
 *
 * @hooked agency_ecommerce_doctype_action - 10
 */
do_action('agency_ecommerce_doctype');
?>
    <head>
        <?php
        /**
         * Hook - agency_ecommerce_head.
         *
         * @hooked agency_ecommerce_head_action - 10
         */
        do_action('agency_ecommerce_head');

        wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<?php
// WordPress Core Hook
do_action('wp_body_open');

?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">
        <?php esc_html_e('Skip to content', 'agency-ecommerce'); ?></a>

<?php

do_action('agency_ecommerce_before_top_header');

do_action('agency_ecommerce_top_header');

do_action('agency_ecommerce_after_top_header');

do_action('agency_ecommerce_before_mid_header');

do_action('agency_ecommerce_mid_header');

do_action('agency_ecommerce_after_mid_header');

do_action('agency_ecommerce_before_bottom_header');

do_action('agency_ecommerce_bottom_header');

do_action('agency_ecommerce_after_bottom_header');

do_action('agency_ecommerce_main_content');

do_action('agency_ecommerce_before_content');