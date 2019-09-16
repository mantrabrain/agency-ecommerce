<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */

if (!class_exists('Agency_Ecommerce_CTA_Widget')) :

    /**
     * CTA widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_CTA_Widget extends Agency_Ecommerce_Widget_Base
    {

        /**
         * Constructor.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_widget_call_to_action',
                'description' => esc_html__('Call To Action Widget', 'agency-ecommerce'),
            );
            parent::__construct('agency-ecommerce-cta', esc_html__('AE - Call To Action', 'agency-ecommerce'), $opts);
        }


        function widget_fields()
        {

            $content_position = array(
                'left' => esc_html__('Left', 'agency-ecommerce'),
                'right' => esc_html__('Right', 'agency-ecommerce'),
                'center' => esc_html__('Center', 'agency-ecommerce'),
            );

            $content_style = array(
                'style-1' => esc_html__('Style 1', 'agency-ecommerce'),
                'style-2' => esc_html__('Style 2', 'agency-ecommerce'),
                'style-3' => esc_html__('Style 3', 'agency-ecommerce')
            );
            $fields = array(
                'title' => array(
                    'name' => 'title',
                    'title' => esc_html__('Title', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('CTA title', 'agency-ecommerce'),
                ), 'sub_title' => array(
                    'name' => 'sub_title',
                    'title' => esc_html__('Sub Title', 'agency-ecommerce'),
                    'type' => 'text',
                ), 'discount_percent' => array(
                    'name' => 'discount_percent',
                    'title' => esc_html__('Discount', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => '25%',
                ), 'offer_text' => array(
                    'name' => 'offer_text',
                    'title' => esc_html__('Offer Text', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('OFF', 'agency-ecommerce'),
                ), 'content_position' => array(
                    'name' => 'content_position',
                    'title' => esc_html__('Content Position', 'agency-ecommerce'),
                    'type' => 'select',
                    'default' => 'right',
                    'options' => $content_position,
                ), 'content_style' => array(
                    'name' => 'content_style',
                    'title' => esc_html__('Content Style', 'agency-ecommerce'),
                    'type' => 'select',
                    'default' => 'style-2',
                    'options' => $content_style,
                ), 'button_text' => array(
                    'name' => 'button_text',
                    'title' => esc_html__('Button Text', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Buy Now', 'agency-ecommerce'),
                ), 'button_url' => array(
                    'name' => 'button_url',
                    'title' => esc_html__('Button URL', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => '#'
                ), 'background_image' => array(
                    'name' => 'background_image',
                    'title' => esc_html__('Background Image', 'agency-ecommerce'),
                    'type' => 'image',
                ), 'parallax_background' => array(
                    'name' => 'parallax_background',
                    'title' => esc_html__('Parallax Background', 'agency-ecommerce'),
                    'type' => 'checkbox',
                )


            );

            return $fields;

        }

        /**
         * Echo the widget content.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget($args, $instance)
        {

            $valid_widget_instance = Agency_Ecommerce_Widget_Validation::instance()->validate($instance, $this->widget_fields());
            $title = apply_filters('widget_title', empty($valid_widget_instance['title']) ? '' : $valid_widget_instance['title'], $valid_widget_instance, $this->id_base);
            $parallax_background = (boolean)($valid_widget_instance['parallax_background']);
            $parallax_background_class = $parallax_background ? 'mb-parallax' : '';


            if (!empty($valid_widget_instance["background_image"])) {
                $background_style = '';

                $background_style .= ' style="background-image:url(' . esc_url($valid_widget_instance["background_image"]) . ');" ';

                $args['before_widget'] = implode($background_style . ' ' . 'class="bg_enabled ' . $parallax_background_class . ' ', explode('class="', $args['before_widget'], 2));
            } else {

                $args['before_widget'] = implode('class="bg_disabled ', explode('class="', $args['before_widget'], 2));

            }

            echo $args['before_widget']; ?>

            <?php agency_ecommerce_widget_before($args) ?>

            <div class="cta-content-holder cta-widget position-<?php echo esc_attr($valid_widget_instance["content_position"]);

            echo ' ' . esc_attr($valid_widget_instance["content_style"]); ?>">

                <div class="content-wrap">

                    <?php if (!empty($valid_widget_instance["discount_percent"]) || !empty($valid_widget_instance["offer_text"])) { ?>

                        <div class="call-to-action-offer">

                            <div class="call-to-action-offer-inner">

                                <div class="cta-offer-wrap">

                                    <?php

                                    if (!empty($valid_widget_instance["discount_percent"])) {
                                        echo '<span class="discount-percent">' . esc_html($valid_widget_instance["discount_percent"]) . '</span>';
                                    }

                                    if (!empty($valid_widget_instance["offer_text"])) {
                                        echo '<span class="offer-text">' . esc_html($valid_widget_instance["offer_text"]) . '</span>';
                                    } ?>

                                </div>

                            </div>

                        </div><!-- .call-to-action-buttons -->

                    <?php } ?>

                    <div class="call-to-action-wrap">

                        <?php

                        if (!empty($title) || !empty($valid_widget_instance['sub_title'])) { ?>

                            <div class="call-to-action-content">

                                <?php

                                if (!empty($title)) {
                                    echo $args['before_title'] . esc_html($title) . $args['after_title'];
                                }

                                if (!empty($valid_widget_instance['sub_title'])) {
                                    echo '<p>' . esc_html($valid_widget_instance['sub_title']) . '</p>';
                                } ?>

                            </div>

                        <?php } ?>

                        <?php if (!empty($valid_widget_instance["button_text"]) && !empty($valid_widget_instance["button_url"])) { ?>

                            <div class="call-to-action-buttons">

                                <a href="<?php echo esc_url($valid_widget_instance["button_url"]); ?>"
                                   class="button cta-button cta-button-primary"><?php echo esc_html($valid_widget_instance["button_text"]); ?></a>

                            </div><!-- .call-to-action-buttons -->

                        <?php } ?>

                    </div>

                </div>

            </div><!-- .cta-widget -->
            <?php agency_ecommerce_widget_after($args) ?>

            <?php
            echo $args['after_widget'];

        }

    }

endif;