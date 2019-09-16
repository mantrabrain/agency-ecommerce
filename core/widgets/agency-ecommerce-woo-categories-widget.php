<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */

if (!class_exists('Agency_Ecommerce_Woo_Categories_Widget')) :

    /**
     * Featured Categories widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_Woo_Categories_Widget extends Agency_Ecommerce_Widget_Base
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_widget_woo_categories',
                'description' => esc_html__('Widget to display categories of WooCommerce.', 'agency-ecommerce'),
            );

            parent::__construct('agency-ecommerce-woo-categories', esc_html__('AE - WOO Categories', 'agency-ecommerce'), $opts);


        }


        function widget_fields()
        {

            $fields = array(
                'title' => array(
                    'name' => 'title',
                    'title' => esc_html__('Title', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Product Category', 'agency-ecommerce'),
                ), 'product_category' => array(
                    'name' => 'product_category',
                    'title' => esc_html__('Product Category', 'agency-ecommerce'),
                    'type' => 'dropdown_categories',
                    'args' => array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'orderby' => 'name',
                        'multiple' => true
                    ),
                    'default' => array(0)
                ), 'view_details' => array(
                    'name' => 'view_details',
                    'title' => esc_html__('View Details Text', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('View Details', 'agency-ecommerce')
                ), 'show_counts' => array(
                    'name' => 'show_counts',
                    'title' => esc_html__('Show Counts', 'agency-ecommerce'),
                    'type' => 'checkbox',
                ), 'disable_carousel' => array(
                    'name' => 'disable_carousel',
                    'title' => esc_html__('Disable Carousel', 'agency-ecommerce'),
                    'type' => 'checkbox',
                ), 'background_color' => array(
                    'name' => 'background_color',
                    'title' => esc_html__('Background Color', 'agency-ecommerce'),
                    'type' => 'color',
                    'default' => '#ffffff'
                )


            );

            return $fields;

        }

        function widget($args, $instance)
        {

            $valid_widget_instance = Agency_Ecommerce_Widget_Validation::instance()->validate($instance, $this->widget_fields());

            $title = apply_filters('widget_title', empty($valid_widget_instance['title']) ? '' : $valid_widget_instance['title'], $valid_widget_instance, $this->id_base);

            $product_category = $valid_widget_instance['product_category'];

            if (count($product_category) == 1 && $product_category[0] == 0) {

                $product_category = array();

                $cat_args = array(
                    'taxonomy' => 'product_cat',
                    'orderby' => 'name',
                    'hide_empty' => true
                );
                $all_categories = get_categories($cat_args);

                $product_category = count($all_categories) > 0 ? wp_list_pluck($all_categories, 'term_id') : array();


            }

            $disable_carousel = $valid_widget_instance['disable_carousel'];

            $background_color = $valid_widget_instance['background_color'];

            $args['before_widget'] = str_replace('class="', 'style="background:' . esc_attr($background_color) . ' " class="', $args['before_widget']);

            echo $args['before_widget']; ?>

            <div class="ae-woo-product-wrapper ae-advance-categories-wrapper">

                <?php agency_ecommerce_widget_before($args); ?>

                <?php

                if ($title) {

                    echo $args['before_title'] . esc_html($title) . $args['after_title'];

                }

                $carousel_args = array(
                    'slidesToShow' => 4,
                    'slidesToScroll' => 4,
                    'dots' => true,
                    'arrows' => false,
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

                ?>

                <div class="ae-inner">

                    <div class="ae-carousel-wrap">

                        <?php
                        $list_class = (1 != $disable_carousel) ? 'ae-list-items ae-list-main carousel-mode' : 'ae-list-grid ae-list-main grid-mode';
                        ?>
                        <ul class="<?php echo esc_attr($list_class); ?>"
                            <?php echo (1 != $disable_carousel) ? 'data-slick-attr=\'' . $carousel_args_encoded . '\'' : '' ?>>
                            <?php

                            foreach ($product_category as $term_id) {

                                $taxonomy = 'product_cat';

                                $term_details = get_term_by('id', $term_id, $taxonomy);

                                if (!empty($term_details)) {

                                    $term_title = $term_details->name;

                                    $term_link = get_term_link($term_id, $taxonomy);

                                    $thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);

                                    $image_url = wp_get_attachment_image_src($thumbnail_id, 'shop_catalog');

                                    if (!empty($image_url)) {

                                        $cat_image = $image_url[0];

                                    } else {

                                        $cat_image = wc_placeholder_img_src();

                                    }

                                    $lazy_image = get_template_directory_uri() . '/assets/images/placeholder/agency-ecommerce-300-300.png';

                                    if ($disable_carousel) {
                                        $lazy_image = $cat_image;
                                    }
                                    ?>

                                    <li class="product-cat product">
                                        <div class="ae-woo-block-wrap">
                                            <div class="product-thumb-wrap">
                                                <img src="<?php echo esc_url($lazy_image) ?>"
                                                    <?php echo (1 != $disable_carousel) ? 'data-lazy="' . esc_url($cat_image) . '"' : ''; ?>
                                                     alt="<?php echo esc_attr($term_title); ?>">


                                            </div>
                                            <div class="product-info-wrap">
                                                <a href="<?php echo esc_url($term_link); ?>"><h4
                                                            class="featured-cat-title"><?php echo esc_html($term_title); ?><?php if (1 == $valid_widget_instance['show_counts']) { ?>
                                                            <span class="count"><?php echo ' (' . absint($term_details->count) . ')'; ?></span><?php } ?>
                                                    </h4></a>
                                                <?php if (!empty($valid_widget_instance['view_details'])) { ?>
                                                    <div class="view-details-wrap">
                                                        <a href="<?php echo esc_url($term_link); ?>"
                                                           class="button btn-view-details"><?php echo esc_html($valid_widget_instance['view_details']) ?></a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </li>

                                    <?php
                                }

                            } ?>

                        </ul>

                    </div>

                </div>

                <?php agency_ecommerce_widget_after($args); ?>

            </div><!-- .advance-posts-widget -->

            <?php
            echo $args['after_widget'];

        }


    }

endif;