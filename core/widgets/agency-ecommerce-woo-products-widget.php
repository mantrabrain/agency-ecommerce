<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */

if (!class_exists('Agency_Ecommerce_Woo_Products_Widget')) :

    /**
     * Latest Products widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_Woo_Products_Widget extends Agency_Ecommerce_Widget_Base
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_woo_products_widget',
                'description' => esc_html__('Widget to display WooCommerce products with advance options.', 'agency-ecommerce'),
            );

            parent::__construct('agency-ecommerce-advanced-products', esc_html__('AE - WOO Products', 'agency-ecommerce'), $opts);

        }


        function widget_fields()
        {

            $product_type_choices = array(
                'latest' => esc_html__('Latest', 'agency-ecommerce'),
                'featured' => esc_html__('Featured', 'agency-ecommerce'),
            );
            $fields = array(
                'title' => array(
                    'name' => 'title',
                    'title' => esc_html__('Title', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Products', 'agency-ecommerce'),
                ), 'product_category' => array(
                    'name' => 'product_category',
                    'title' => esc_html__('Product Category', 'agency-ecommerce'),
                    'type' => 'dropdown_categories',
                    'args' => array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'orderby' => 'name',
                        'multiple' => true
                    ), 'default' => array(0)
                ), 'product_type' => array(
                    'name' => 'product_type',
                    'title' => esc_html__('Product Type', 'agency-ecommerce'),
                    'type' => 'select',
                    'options' => $product_type_choices,
                    'default' => 'latest'
                ), 'number_of_products' => array(
                    'name' => 'number_of_products',
                    'title' => esc_html__('Number of products ', 'agency-ecommerce'),
                    'type' => 'number',
                    'default' => 6,
                ), 'disable_carousel' => array(
                    'name' => 'disable_carousel',
                    'title' => esc_html__('Disable Carousel', 'agency-ecommerce'),
                    'type' => 'checkbox',
                ), 'background_color' => array(
                    'name' => 'background_color',
                    'title' => esc_html__('Background Color', 'agency-ecommerce'),
                    'type' => 'color',
                    'default' => '#ffffff'
                ), 'show_category_tab' => array(
                    'name' => 'show_category_tab',
                    'title' => esc_html__('Show category tab', 'agency-ecommerce'),
                    'type' => 'checkbox',
                    'description' => esc_html__('This option will work only if you disable carousel for this widget.', 'agency-ecommerce'),

                )


            );

            return $fields;
        }

        function widget($args, $instance)
        {

            $valid_widget_instance = Agency_Ecommerce_Widget_Validation::instance()->validate($instance, $this->widget_fields());

            $title = apply_filters('widget_title', empty($valid_widget_instance['title']) ? '' : $valid_widget_instance['title'], $valid_widget_instance, $this->id_base);

            $disable_carousel = $valid_widget_instance['disable_carousel'];

            $background_color = sanitize_hex_color($valid_widget_instance['background_color']);

            $show_category_tab = (boolean)($valid_widget_instance['show_category_tab']);

            $args['before_widget'] = str_replace('class="', 'style="background:' . $background_color . ' " class="', $args['before_widget']);

            echo $args['before_widget'];

            ?>

            <div class="ae-woo-product-wrapper">

                <?php

                agency_ecommerce_widget_before($args);

                if ($title) {

                    echo $args['before_title'] . esc_html($title) . $args['after_title'];

                }

                $carousel_args = array(
                    'slidesToShow' => 4,
                    'slidesToScroll' => 4,
                    'dots' => true,
                    'arrows' => false,
                    'lazyLoad' => 'ondemand',
                    'responsive' => array(
                        array(
                            'breakpoint' => 1024,
                            'settings' => array(
                                'slidesToShow' => 4,
                            ),
                        ),
                        array(
                            'breakpoint' => 992,
                            'settings' => array(
                                'slidesToShow' => 3,
                                'slidesToScroll' => 3,
                            ),
                        ),
                        array(
                            'breakpoint' => 768,
                            'settings' => array(
                                'slidesToShow' => 2,
                                'slidesToScroll' => 2,
                            ),
                        ),
                        array(
                            'breakpoint' => 479,
                            'settings' => array(
                                'slidesToShow' => 1,
                                'slidesToScroll' => 1,
                            ),
                        ),
                    ),
                );

                $carousel_args_encoded = wp_json_encode($carousel_args);

                $meta_query = WC()->query->get_meta_query();

                $tax_query = WC()->query->get_tax_query();


                if ('featured' == $valid_widget_instance['product_type']) {

                    $tax_query[] = array(
                        'taxonomy' => 'product_visibility',
                        'field' => 'name',
                        'terms' => 'featured',
                        'operator' => 'IN',
                    );

                } else {

                    if (!(count($valid_widget_instance['product_category']) == 1 && $valid_widget_instance['product_category'][0] == 0)) {
                        $tax_query[] = array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $valid_widget_instance['product_category'],
                            'operator' => 'IN',
                        );
                    }

                }

                $query_args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page' => absint($valid_widget_instance['number_of_products']),
                    'meta_query' => $meta_query,
                    'no_found_rows' => true,
                );

                if (!((count($valid_widget_instance['product_category']) == 1 && $valid_widget_instance['product_category'][0] == 0)) || 'featured' == $valid_widget_instance['product_type']) {

                    $query_args['tax_query'] = $tax_query;

                }


                global $woocommerce_loop;


                $woo_products = new WP_Query($query_args);


                if ($woo_products->have_posts()) :?>

                    <div class="ae-inner">

                        <div class="ae-carousel-wrap">

                            <?php
                            if ($show_category_tab && 1 == $disable_carousel) {

                                $this->category_tab($valid_widget_instance, $query_args);
                            }


                            $list_class = (1 != $disable_carousel) ? 'ae-list-items ae-list-main carousel-mode' : 'ae-list-grid ae-list-main grid-mode';
                            ?>
                            <ul class="<?php echo esc_attr($list_class); ?>"
                                <?php echo (1 != $disable_carousel) ? 'data-slick-attr=\'' . $carousel_args_encoded . '\'' : '' ?>>


                                <?php

                                while ($woo_products->have_posts()) :

                                    $woo_products->the_post();

                                    wc_get_template_part('content', 'product');

                                endwhile;

                                wc_reset_loop();

                                wp_reset_postdata(); ?>

                            </ul>

                        </div>

                    </div>

                <?php endif;
                agency_ecommerce_widget_after($args);

                ?>

            </div><!-- .advance-posts-widget -->

            <?php
            echo $args['after_widget'];

        }

        public function category_tab($valid_widget_instance, $query_args)
        {
            $product_category = $valid_widget_instance['product_category'];

            $categories = array();

            if ((count($valid_widget_instance['product_category']) == 1 && $valid_widget_instance['product_category'][0] == 0)) {

                $cat_args = array(
                    'taxonomy' => 'product_cat',
                    'orderby' => 'name',
                    'show_count' => 1,
                    'pad_counts' => 1,
                    'hierarchical' => 0,
                    'title_li' => 1,
                    'hide_empty' => 1,
                );

                $categories = get_categories($cat_args);

            } else {

                foreach ($product_category as $cat_id) {

                    $term = get_term_by('id', $cat_id, 'product_cat');

                    if (count($term) > 0 && is_array($term)) {

                        array_push($categories, $term);
                    }
                }
            }

            if (count($categories) < 1) {

                return;
            }


            echo '<ul class="ae-product-cat-tab">';

            echo '<li data-cat-id="0" class="ae-active"><span>' . esc_html__('All Categories', 'agency-ecommerce') . '</span></li>';

            foreach ($categories as $product_cat) {

                $count = isset($product_cat->count) ? absint($product_cat->count) : 0;

                if ($count >= $valid_widget_instance['number_of_products']) {

                    echo '<li data-cat-id="' . absint($product_cat->term_id) . '">';

                    echo '<a href="' . esc_url(get_term_link($product_cat->term_id, 'product_cat')) . '" target="_blank">';

                    echo esc_html($product_cat->name) . ' (' . absint($product_cat->count) . ')';

                    echo '</a>';

                    echo '</li>';
                }

            }
            echo '</ul>';
        }

    }

endif;