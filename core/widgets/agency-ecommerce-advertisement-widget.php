<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */

if (!class_exists('Agency_Ecommerce_Advertisement_Widget')) :

    /**
     * Advertisement widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_Advertisement_Widget extends Agency_Ecommerce_Widget_Base
    {

        /**
         * Constructor.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_widget_advertisement',
                'description' => esc_html__('Widget to display advertisement.', 'agency-ecommerce'),
            );
            parent::__construct('agency-ecommerce-advertisement', esc_html__('AE - Advertisement', 'agency-ecommerce'), $opts);
        }


        function widget_fields()
        {
            $fields = array(
                'title_one' => array(
                    'name' => 'title_one',
                    'title' => esc_html__('Title One', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Title One', 'agency-ecommerce'),
                ),
                'background_image_one' => array(
                    'name' => 'background_image_one',
                    'title' => esc_html__('Image One', 'agency-ecommerce'),
                    'type' => 'image',
                ),
                'link_one' => array(
                    'name' => 'link_one',
                    'title' => esc_html__('Link One', 'agency-ecommerce'),
                    'type' => 'text',
                ),
                'title_two' => array(
                    'name' => 'title_two',
                    'title' => esc_html__('Title Two', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Title Two', 'agency-ecommerce'),
                ),
                'background_image_two' => array(
                    'name' => 'background_image_two',
                    'title' => esc_html__('Image Two', 'agency-ecommerce'),
                    'type' => 'image',
                ),
                'link_two' => array(
                    'name' => 'link_two',
                    'title' => esc_html__('Link Two', 'agency-ecommerce'),
                    'type' => 'text',
                ),
                'title_three' => array(
                    'name' => 'title_three',
                    'title' => esc_html__('Title Three', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Title Three', 'agency-ecommerce'),
                ),
                'background_image_three' => array(
                    'name' => 'background_image_three',
                    'title' => esc_html__('Image Three', 'agency-ecommerce'),
                    'type' => 'image',
                ), 'link_three' => array(
                    'name' => 'link_three',
                    'title' => esc_html__('Link Three', 'agency-ecommerce'),
                    'type' => 'text',
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

            echo $args['before_widget'];


            ?>

            <div class="advertisement-content-holder advertisement-widget">

                <?php agency_ecommerce_widget_before($args); ?>


                <div class="advertisement-text-wrap">
                    <?php

                    $this->thumb_block($valid_widget_instance['background_image_one'], $valid_widget_instance['link_one'], $valid_widget_instance['title_one']);

                    $this->thumb_block($valid_widget_instance['background_image_two'], $valid_widget_instance['link_two'], $valid_widget_instance['title_two']);

                    $this->thumb_block($valid_widget_instance['background_image_three'], $valid_widget_instance['link_three'], $valid_widget_instance['title_three']);

                    ?>

                </div>

                <?php agency_ecommerce_widget_after($args); ?>


            </div><!-- .advertisement-widget -->

            <?php
            echo $args['after_widget'];

        }

        public function thumb_block($background_image, $link, $title)
        {
            $fallback_image = get_template_directory_uri() . '/assets/images/placeholder/agency-ecommerce-300-300.png';

            $background_image = empty($background_image) ? $fallback_image: $background_image;
            ?>
            <div class="advertisement-thumb-block">
                <a href="<?php echo esc_url($link); ?>">
                    <figure class="thumb-img">
                        <img src="<?php echo esc_url($background_image); ?>"
                             alt="<?php echo esc_attr($title) ?>"></figure>
                    <span class="thumb-hover">
							<span class="thumb-title-wrapper">
								<span class="thumb-title"><?php echo esc_html($title) ?></span>
 							</span>
						</span> <!-- thumb-hover end -->
                </a>
            </div>
            <?php
        }


    }

endif;