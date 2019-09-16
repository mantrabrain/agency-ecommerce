<?php


class Agency_Ecommerce_Widgets
{
    public function __construct()
    {
        $this->includes();
        add_action('widgets_init', array($this, 'register_sidebar'));
        add_action('widgets_init', array($this, 'init_widgets'));


    }

    public function register_sidebar()
    {
        register_sidebar(array(
            'name' => esc_html__('Blog Sidebar', 'agency-ecommerce'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here to appear in Sidebar.', 'agency-ecommerce'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        if (class_exists('WooCommerce')) {

            register_sidebar(array(
                'name' => esc_html__('Shop Sidebar', 'agency-ecommerce'),
                'id' => 'shop-sidebar',
                'description' => esc_html__('Widgets added here will appear in sidebar of shop pages only.', 'agency-ecommerce'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            ));

        }

        register_sidebar(array(
            'name' => esc_html__('Slider Widget Area', 'agency-ecommerce'),
            'id' => 'woo-featured-slider',
            'description' => esc_html__('Featured slider below navigation', 'agency-ecommerce'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Homepage Full Width (Before HomePage Widget Area)', 'agency-ecommerce'),
            'id' => 'home-page-fullwidth-before-widget-area',
            'description' => esc_html__('Add widgets here to appear (full width )in before Home Page Widget Area. Some Specific widget will support full widget.', 'agency-ecommerce'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Homepage Widget Area', 'agency-ecommerce'),
            'id' => 'home-page-widget-area',
            'description' => esc_html__('Add widgets here to appear in Home Page Widget Area.', 'agency-ecommerce'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Homepage Sidebar Widget Area', 'agency-ecommerce'),
            'id' => 'home-page-sidebar-widget-area',
            'description' => esc_html__('Add widgets here to appear in Home Page Sidebar Widget Area.', 'agency-ecommerce'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Homepage Full Width (After HomePage Sidebar.', 'agency-ecommerce'),
            'id' => 'home-page-fullwidth-after-widget-area',
            'description' => esc_html__('Add widgets here to appear (full width )in after Home Page Sidebar widget area. Some Specific widget will support full widget.', 'agency-ecommerce'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            /* translators: 1: footer id */
            'name' => sprintf(esc_html__('Top Footer %d', 'agency-ecommerce'), 1),
            'id' => 'top-footer-1',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            /* translators: 1: footer id */
            'name' => sprintf(esc_html__('Top Footer %d', 'agency-ecommerce'), 2),
            'id' => 'top-footer-2',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            /* translators: 1: footer id */
            'name' => sprintf(esc_html__('Top Footer %d', 'agency-ecommerce'), 3),
            'id' => 'top-footer-3',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            /* translators: 1: footer id */
            'name' => sprintf(esc_html__('Top Footer %d', 'agency-ecommerce'), 4),
            'id' => 'top-footer-4',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
    }

    public function init_widgets()
    {

        // Latest news.
        register_widget('Agency_Ecommerce_Advance_Posts_Widget');

        // CTA widget.
        register_widget('Agency_Ecommerce_CTA_Widget');

        // Advertisement widget.
        register_widget('Agency_Ecommerce_Advertisement_Widget');

        // Features widget.
        register_widget('Agency_Ecommerce_Features_Widget');

        // Newsletter widget.
        register_widget('Agency_Ecommerce_Newsletter_Widget');

        // Contact widget.
        register_widget('Agency_Ecommerce_Contact_Widget');

        // Featured Slider
        register_widget('Agency_Ecommerce_Featured_Slider_Widget');

        if (class_exists('WooCommerce')) {

            register_widget('Agency_Ecommerce_Woo_Categories_Widget');

            register_widget('Agency_Ecommerce_Woo_Products_Widget');


        }

    }

    public function includes()
    {

        //Widget validation
        require get_template_directory() . '/core/widgets/class-agency-ecommerce-widget-validation.php';

        //Widget Base
        require get_template_directory() . '/core/widgets/class-agency-ecommerce-widget-base.php';


        if (class_exists('WooCommerce')) {

            require get_template_directory() . '/core/widgets/agency-ecommerce-woo-products-widget.php';

            /**
             * Featured Categories Widget
             */
            require get_template_directory() . '/core/widgets/agency-ecommerce-woo-categories-widget.php';
        }


        //Features Widget
        require get_template_directory() . '/core/widgets/agency-ecommerce-features-widget.php';

        //Latest News Widget
        require get_template_directory() . '/core/widgets/agency-ecommerce-advance-posts-widget.php';

        //Call to action Widget
        require get_template_directory() . '/core/widgets/agency-ecommerce-cta-widget.php';

        //Advertisement Widget
        require get_template_directory() . '/core/widgets/agency-ecommerce-advertisement-widget.php';

        //Newsletter Widget
        require get_template_directory() . '/core/widgets/agency-ecommerce-newsletter-widget.php';

        //Contact Widget
        require get_template_directory() . '/core/widgets/agency-ecommerce-contact-widget.php';

        //Featured Slider Widget
        require get_template_directory() . '/core/widgets/agency-ecommerce-featured-slider-widget.php';
    }

}

new Agency_Ecommerce_Widgets();