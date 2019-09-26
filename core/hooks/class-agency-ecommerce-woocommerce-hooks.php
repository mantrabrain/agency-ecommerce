<?php
/**
 * Agency_Ecommerce_WooCommerce_Hooks setup
 *
 * @package Agency_Ecommerce_WooCommerce_Hooks
 * @since   1.0.0
 */

/**
 * Main Agency_Ecommerce_WooCommerce_Hooks Class.
 *
 * @class Agency_Ecommerce_WooCommerce_Hooks
 */
class Agency_Ecommerce_WooCommerce_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Agency_Ecommerce_WooCommerce_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Agency_Ecommerce_WooCommerce_Hooks Instance.
     *
     * Ensures only one instance of Agency_Ecommerce_WooCommerce_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see mb_ae_addons()
     * @return Agency_Ecommerce_WooCommerce_Hooks - Main instance.
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

        // Remove actions
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
        // Remove sorting option
        $hide_product_sorting = agency_ecommerce_get_option('hide_product_sorting');
        if (true === $hide_product_sorting) {
            remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
        }
        // Disable Related Products
        $disable_related_products = agency_ecommerce_get_option('disable_related_products');
        if (true === $disable_related_products) {
            remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
        }


        add_filter('loop_shop_columns', array($this, 'product_columns'));
        add_filter('woocommerce_output_related_products_args', array($this, 'related_products_args'));
        add_action('woocommerce_after_single_product_summary', array($this, 'output_upsells'), 15);
        add_action('woocommerce_shop_loop_item_title', array($this, 'woocommerce_template_loop_product_title'), 10);
        add_action('woocommerce_sidebar', array($this, 'woocommerce_sidebar'), 10);
        add_filter('loop_shop_per_page', array($this, 'new_loop_shop_per_page'), 20);
        add_filter('woocommerce_add_to_cart_fragments', array($this, 'header_add_to_cart_fragment'));
        add_filter('woocommerce_cross_sells_columns', array($this, 'woocommerce_cross_sells_columns'));


        $hide_list_grid_view = (boolean)agency_ecommerce_get_option('hide_list_grid_view');


        // Shop List View and Grid View
        if (!$hide_list_grid_view) {
            add_action('woocommerce_before_shop_loop', array($this, 'before_shop_loop'), 35);
        }

        $show_product_excerpt = (boolean)agency_ecommerce_get_option('show_product_excerpt');

        // Show excerpt or not
        if (!$hide_list_grid_view || $show_product_excerpt) {

            add_action('woocommerce_after_shop_loop_item', array($this, 'after_shop_loop_item'), 15);

        }

        $is_sticky_add_to_cart = (boolean)agency_ecommerce_get_option('sticky_add_to_cart');

        if ($is_sticky_add_to_cart) {
            add_action('agency_ecommerce_after_footer', array($this, 'sticky_single_add_to_cart'), 15);

        }

        add_action('woocommerce_proceed_to_checkout', array($this, 'woocommerce_continue_shopping'), 25);

        // Category Listig Wrapper

        add_action('woocommerce_before_subcategory', array($this, 'before_subcategory'), 1);
        add_action('woocommerce_after_subcategory', array($this, 'after_subcategory'), 25);


    }

    public function before_subcategory()
    {

        echo '<div class="ae-woo-block-wrap ae-woo-catalog">';
    }

    public function after_subcategory()
    {

        echo '</div>';
    }

    public function woocommerce_cross_sells_columns()
    {
        return 3;
    }

    public function woocommerce_continue_shopping()
    {
        $woo_continue_shopping_text = agency_ecommerce_get_option('woo_continue_shopping_text');

        if (!empty($woo_continue_shopping_text)) {

            $shop_page_url = get_permalink(wc_get_page_id('shop'));

            echo '<a href="' . esc_url($shop_page_url) . '" class="button continue-shopping">';

            echo esc_html($woo_continue_shopping_text);

            echo '</a>';
        }
    }

    public function product_columns()
    {

        $product_number = agency_ecommerce_get_option('product_number');

        return absint($product_number); // number of products per row
    }

    public function related_products_args($args)
    {

        $product_number = agency_ecommerce_get_option('product_number');

        $args['columns'] = absint($product_number);

        $args['posts_per_page'] = absint($product_number); // number of related products

        return $args;
    }

    public function output_upsells()
    {

        $product_number = agency_ecommerce_get_option('product_number');

        woocommerce_upsell_display(absint($product_number), absint($product_number)); // Display 3 products in rows of 3

    }

    public function woocommerce_template_loop_product_title()
    {
        echo '<h2 class="woocommerce-loop-product__title">' . esc_html(get_the_title()) . '</h2>';
        echo '</a>';
    }

    public function woocommerce_sidebar()
    {

        $shop_layout = agency_ecommerce_get_option('shop_layout');

        $shop_layout = apply_filters('agency_ecommerce_filter_theme_global_layout', $shop_layout);

        // Include sidebar.
        if ('no-sidebar' !== $shop_layout) {
            get_sidebar();
        }
    }

    public function new_loop_shop_per_page($cols)
    {

        $product_per_page = agency_ecommerce_get_option('product_per_page');

        $cols = absint($product_per_page);

        return $cols;
    }

    public function header_add_to_cart_fragment($fragments)
    {

        global $woocommerce;

        ob_start(); ?>

        <span class="cart-value ae-cart-fragment"> <?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span>

        <?php

        $fragments['span.ae-cart-fragment'] = ob_get_clean();

        return $fragments;

    }

    public function before_shop_loop()
    {
        echo '<div class="ae-list-grid-switcher">';

        echo '<a title="' . esc_attr__('Grid View', 'agency-ecommerce') . '" href="#" data-type="grid" class="ae-grid-view selected"><i class="fa fa-th"></i></a>';

        echo '<a title="' . esc_attr__('List View', 'agency-ecommerce') . '" href="#" data-type="list" class="ae-list-view"><i class="fa fa-bars"></i></a>';

        echo '</div>';

    }


    public function after_shop_loop_item()
    {

        if (is_shop()) {

            $show_product_excerpt = (boolean)agency_ecommerce_get_option('show_product_excerpt');

            $woo_shop_excerpt_length = (int)agency_ecommerce_get_option('woo_shop_excerpt_length');

            $style = 'style="display:none;"';

            if ($show_product_excerpt) {

                $style = '';
            }

            $excerpt = wp_trim_words(agency_ecommerce_get_the_excerpt(), $woo_shop_excerpt_length);

            echo '<div class="ae-product-excerpt" ' . $style . '><p>' . esc_html($excerpt) . '</p></div>';


        }

    }

    function sticky_single_add_to_cart()
    {
        global $product;

        if (!class_exists('WooCommerce')) {
            return;
        }

        if (!is_product()) {
            return;
        }

        $show = false;

        if ($product->is_purchasable() && $product->is_in_stock()) {
            $show = true;
        } else if ($product->is_type('external')) {
            $show = true;
        }

        if (!$show) {
            return;
        }

        $params = apply_filters(
            'ae_sticky_add_to_cart_params', array(
                'trigger_class' => 'entry-summary',
            )
        );

        wp_localize_script('ae-sticky-add-to-cart', 'ae_sticky_add_to_cart_params', $params);

        wp_enqueue_script('ae-sticky-add-to-cart');

        $sticky_add_to_cart_position = agency_ecommerce_get_option('sticky_add_to_cart_position');

        ?>
        <section class="ae-sticky-add-to-cart <?php echo esc_attr($sticky_add_to_cart_position) ?>">
            <div class="container">
                <div class="ae-sticky-add-to-cart__content">
                    <?php echo wp_kses_post(woocommerce_get_product_thumbnail()); ?>
                    <div class="ae-sticky-add-to-cart__content-product-info">
                        <span class="ae-sticky-add-to-cart__content-title"><?php esc_html_e('You&rsquo; re viewing:', 'agency-ecommerce'); ?>
                            <strong><?php the_title(); ?></strong></span>
                        <span class="ae-sticky-add-to-cart__content-price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                        <?php echo wp_kses_post(wc_get_rating_html($product->get_average_rating())); ?>
                    </div>
                    <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                       class="ae-sticky-add-to-cart__content-button button alt">
                        <?php echo esc_html($product->add_to_cart_text()); ?>
                    </a>
                </div>
            </div>
        </section><!-- .ae-sticky-add-to-cart -->
        <?php
    }


}

Agency_Ecommerce_WooCommerce_Hooks::instance();