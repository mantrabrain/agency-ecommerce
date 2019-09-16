<?php
/**
 * Home widgets
 *
 * @package Agency_Ecommerce
 */

// Bail if not home page.
if (!is_page_template('templates/home-template.php')) {
    return;
}
?>

<div class="ae-homepage-wrap widget-area">
    <?php
    $site_identity = agency_ecommerce_get_option('site_identity');

    $show_bottom_header = (boolean)agency_ecommerce_get_option('show_bottom_header');

    $class = 'feature-slider-widget-area';

    $special_menu_show_only_on_hover = (boolean)agency_ecommerce_get_option('special_menu_show_only_on_hover');

    $special_menu_alignment = agency_ecommerce_get_option('special_menu_alignment');

    $special_menu_alignment_class = $special_menu_alignment . '-alignment';

    $class .= 'special-menu' == $site_identity && $show_bottom_header && !$special_menu_show_only_on_hover ? ' has-special-menu ' . $special_menu_alignment_class : '';
    ?>
    <div class="<?php echo esc_attr($class); ?>">
        <div class="container">
            <?php if (is_active_sidebar('woo-featured-slider')) {
                dynamic_sidebar('woo-featured-slider');
            } else {
                agency_ecommerce_widget_not_found_message(esc_html__('No widgets found. Please add feature slider widget to Featured Slider Widget Area.', 'agency-ecommerce'));

            } ?>
        </div>
    </div>
    <?php
    $homepage_main_class = is_active_sidebar('home-page-sidebar-widget-area') ? 'mb-homepage-main has-sidebar' : 'mb-homepage-main';
    ?>

    <?php
    if (is_active_sidebar('home-page-fullwidth-before-widget-area')) {

        echo '<div class="homepage-fullwidth-widget-area homepage-fullwidth-before">';

        dynamic_sidebar('home-page-fullwidth-before-widget-area');

        echo '</div>';

    }
    ?>

    <div class="<?php echo esc_attr($homepage_main_class); ?>">

        <div class="container">

            <?php

            // Home Page Widget Area
            if (is_active_sidebar('home-page-widget-area')) {

                echo '<div class="homepage-widgets">';

                dynamic_sidebar('home-page-widget-area');

                echo '</div>';
            } else {
                if (is_admin()) {
                    agency_ecommerce_widget_not_found_message(esc_html__('No widgets found. Please add widgets to Home Page Widget Area.', 'agency-ecommerce'));
                }
            }

            // HomePage Sidebar
            if (is_active_sidebar('home-page-sidebar-widget-area')) {

                echo '<div class="homepage-sidebar">';

                dynamic_sidebar('home-page-sidebar-widget-area');

                echo '</div>';
            }


            ?>
        </div>
    </div>

    <?php
    if (is_active_sidebar('home-page-fullwidth-after-widget-area')) {

        echo '<div class="homepage-fullwidth-widget-area homepage-fullwidth-after">';

        dynamic_sidebar('home-page-fullwidth-after-widget-area');

        echo '</div>';
    }
    ?>


</div><!-- .ae-homepage-wrap -->

