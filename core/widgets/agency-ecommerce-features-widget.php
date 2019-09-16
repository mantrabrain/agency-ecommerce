<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */
if (!class_exists('Agency_Ecommerce_Features_Widget')) :

    /**
     * Features widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_Features_Widget extends Agency_Ecommerce_Widget_Base
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_widget_features',
                'description' => esc_html__('Widget to display features with icon (font awesome) and description.', 'agency-ecommerce'),
            );
            parent::__construct('agency-ecommerce-features', esc_html__('AE - Features', 'agency-ecommerce'), $opts);
        }

        function widget_fields()
        {
            $fields = array(
                'icon_one' => array(
                    'name' => 'icon_one',
                    'title' => esc_html__('Icon One', 'agency-ecommerce'),
                    'type' => 'icon-picker',
                    'default' => 'fa-refresh'
                ),
                'feature_one' => array(
                    'name' => 'feature_one',
                    'title' => esc_html__('Feature One', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('FREE SHIPPING & RETURN', 'agency-ecommerce'),
                ),
                'text_one' => array(
                    'name' => 'text_one',
                    'title' => esc_html__('Description One', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Free shipping on all orders over $99', 'agency-ecommerce'),

                ),
                'icon_two' => array(
                    'name' => 'icon_two',
                    'title' => esc_html__('Icon Two', 'agency-ecommerce'),
                    'type' => 'icon-picker',
                    'default' => 'fa-heart'
                ),
                'feature_two' => array(
                    'name' => 'feature_two',
                    'title' => esc_html__('Feature Two', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('MONEY BACK GUARANTEE', 'agency-ecommerce'),

                ),
                'text_two' => array(
                    'name' => 'text_two',
                    'title' => esc_html__('Description Two', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('100% money back guarantee', 'agency-ecommerce'),

                ),
                'icon_three' => array(
                    'name' => 'icon_three',
                    'title' => esc_html__('Icon Three', 'agency-ecommerce'),
                    'type' => 'icon-picker',
                    'default' => 'fa-money'
                ),
                'feature_three' => array(
                    'name' => 'feature_three',
                    'title' => esc_html__('Feature Three', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('ONLINE SUPPORT 24/7', 'agency-ecommerce'),

                ),
                'text_three' => array(
                    'name' => 'text_three',
                    'title' => esc_html__('Description Three', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Lorem ipsum dolor sit amet.', 'agency-ecommerce'),


                )


            );

            return $fields;

        }

        function widget($args, $instance)
        {

            $valid_widget_instance = Agency_Ecommerce_Widget_Validation::instance()->validate($instance, $this->widget_fields());

            echo $args['before_widget'];
            ?>

            <div class="features-list">

                <?php agency_ecommerce_widget_before($args); ?>


                <div class="features-wrapper">
                    <?php

                    $this->feature_item(1, $valid_widget_instance['icon_one'], $valid_widget_instance['feature_one'], $valid_widget_instance['text_one']);
                    $this->feature_item(2, $valid_widget_instance['icon_two'], $valid_widget_instance['feature_two'], $valid_widget_instance['text_two']);
                    $this->feature_item(3, $valid_widget_instance['icon_three'], $valid_widget_instance['feature_three'], $valid_widget_instance['text_three']);


                    ?>

                </div>
                <?php agency_ecommerce_widget_after($args); ?>

            </div><!-- .features-list -->

            <?php
            echo $args['after_widget'];
        }

        public function feature_item($item_number, $icon, $text, $description)
        {
            ?>
            <div class="feature-item feature-item-<?php echo absint($item_number) ?>">
                <div class="feature-inner">
                    <?php if (!empty($icon)) { ?>
                        <span class="feature-icon">
                                        <span class="fa <?php echo esc_attr($icon); ?>"></span>
                                    </span>
                    <?php }
                    ?>

                    <?php if (!empty($text)) { ?>
                        <div class="feature-text-wrap">
                            <?php if (!empty($text)) { ?>
                                <h4 class="feature-title"><?php echo esc_html($text); ?></h4>
                            <?php }
                            ?>

                            <?php if (!empty($description)) { ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php }
                            ?>

                        </div> <!-- .feature-text-wrap -->
                    <?php }
                    ?>
                </div>
            </div><!-- .feature-item -->
            <?php
        }


    }


endif;