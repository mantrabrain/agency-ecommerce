<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */

if (!class_exists('Agency_Ecommerce_Contact_Widget')) :

    /**
     * Contact widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_Contact_Widget extends Agency_Ecommerce_Widget_Base
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_widget_contact',
                'description' => esc_html__('Widget to display contact informations. This widgets is for footer or sidebar only', 'agency-ecommerce'),
            );
            parent::__construct('agency-ecommerce-contact', esc_html__('AE - Contact', 'agency-ecommerce'), $opts);
        }

        function widget_fields()
        {
            $fields = array(
                'title' => array(
                    'name' => 'title',
                    'title' => esc_html__('Title', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Contact Us', 'agency-ecommerce'),

                ), 'icon_one' => array(
                    'name' => 'icon_one',
                    'title' => esc_html__('Icon one', 'agency-ecommerce'),
                    'type' => 'icon-picker',
                    'default' => 'fa-map',
                ), 'text_one' => array(
                    'name' => 'text_one',
                    'title' => esc_html__('Text one', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Your contact location', 'agency-ecommerce'),
                ), 'icon_two' => array(
                    'name' => 'icon_two',
                    'title' => esc_html__('Icon two', 'agency-ecommerce'),
                    'type' => 'icon-picker',
                    'default' => 'fa-envelope',
                ), 'text_two' => array(
                    'name' => 'text_two',
                    'title' => esc_html__('Text two', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => 'contact@yourdomain.com',
                ), 'icon_three' => array(
                    'name' => 'icon_three',
                    'title' => esc_html__('Icon three', 'agency-ecommerce'),
                    'type' => 'icon-picker',
                    'default' => 'fa-mobile',
                ), 'text_three' => array(
                    'name' => 'text_three',
                    'title' => esc_html__('Text three', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => '0123456789'
                ), 'icon_four' => array(
                    'name' => 'icon_four',
                    'title' => esc_html__('Icon four', 'agency-ecommerce'),
                    'type' => 'icon-picker',
                    'default' => 'fa-star',
                ), 'text_four' => array(
                    'name' => 'text_four',
                    'title' => esc_html__('Text four', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Your text four here.', 'agency-ecommerce'),
                )


            );

            return $fields;
        }

        function widget($args, $instance)
        {


            $valid_widget_instance = Agency_Ecommerce_Widget_Validation::instance()->validate($instance, $this->widget_fields());

            $title = apply_filters('widget_title', empty($valid_widget_instance['title']) ? '' : $valid_widget_instance['title'], $valid_widget_instance, $this->id_base);

            $icon_one = $valid_widget_instance['icon_one'];
            $text_one = $valid_widget_instance['text_one'];

            $icon_two = $valid_widget_instance['icon_two'];
            $text_two = $valid_widget_instance['text_two'];

            $icon_three = $valid_widget_instance['icon_three'];
            $text_three = $valid_widget_instance['text_three'];

            $icon_four = $valid_widget_instance['icon_four'];
            $text_four = $valid_widget_instance['text_four'];


            echo $args['before_widget']; ?>

            <div class="contact-list">

                <?php agency_ecommerce_widget_before($args); ?>

                <?php

                if ($title) {

                    echo $args['before_title'] . esc_html($title) . $args['after_title'];

                } ?>

                <div class="contact-wrapper">
                    <?php if (!empty($icon_one) || !empty($text_one)) { ?>
                        <div class="contact-item">
                            <div class="contact-inner">
                                <?php
                                if (!empty($icon_one)) { ?>
                                    <span class="contact-icon">
										<span class="fa <?php echo esc_attr($icon_one); ?>"></span>
									</span>
                                    <?php
                                } ?>

                                <?php
                                if (!empty($text_one)) { ?>
                                    <div class="contact-text-wrap">
                                        <p><?php echo esc_html($text_one); ?></p>
                                    </div> <!-- .contact-text-wrap -->
                                    <?php
                                } ?>
                            </div>
                        </div><!-- .contact-item -->
                    <?php } ?>

                    <?php if (!empty($icon_two) || !empty($text_two)) { ?>
                        <div class="contact-item">
                            <div class="contact-inner">
                                <?php
                                if (!empty($icon_two)) { ?>
                                    <span class="contact-icon">
										<span class="fa <?php echo esc_attr($icon_two); ?>"></span>
									</span>
                                    <?php
                                } ?>

                                <?php
                                if (!empty($text_two)) { ?>
                                    <div class="contact-text-wrap">
                                        <p><?php echo esc_html($text_two); ?></p>
                                    </div> <!-- .contact-text-wrap -->
                                    <?php
                                } ?>
                            </div>
                        </div><!-- .contact-item -->
                    <?php } ?>

                    <?php if (!empty($icon_three) || !empty($text_three)) { ?>
                        <div class="contact-item">
                            <div class="contact-inner">
                                <?php
                                if (!empty($icon_three)) { ?>
                                    <span class="contact-icon">
										<span class="fa <?php echo esc_attr($icon_three); ?>"></span>
									</span>
                                    <?php
                                } ?>

                                <?php
                                if (!empty($text_three)) { ?>
                                    <div class="contact-text-wrap">
                                        <p><?php echo esc_html($text_three); ?></p>
                                    </div> <!-- .contact-text-wrap -->
                                    <?php
                                } ?>
                            </div>
                        </div><!-- .contact-item -->
                    <?php } ?>

                    <?php if (!empty($icon_four) || !empty($text_four)) { ?>
                        <div class="contact-item">
                            <div class="contact-inner">
                                <?php
                                if (!empty($icon_four)) { ?>
                                    <span class="contact-icon">
										<span class="fa <?php echo esc_attr($icon_four); ?>"></span>
									</span>
                                    <?php
                                } ?>

                                <?php
                                if (!empty($text_four)) { ?>
                                    <div class="contact-text-wrap">
                                        <p><?php echo esc_html($text_four); ?></p>
                                    </div> <!-- .contact-text-wrap -->
                                    <?php
                                } ?>
                            </div>
                        </div><!-- .contact-item -->
                    <?php } ?>

                </div>

                <?php agency_ecommerce_widget_after($args); ?>


            </div><!-- .features-list -->

            <?php

            echo $args['after_widget'];

        }


    }

endif;