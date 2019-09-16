<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */
if (!class_exists('Agency_Ecommerce_Newsletter_Widget')) :

    /**
     * Newsletter widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_Newsletter_Widget extends Agency_Ecommerce_Widget_Base
    {

        /**
         * Constructor.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_widget_newsletter',
                'description' => esc_html__('Newsletter Widget', 'agency-ecommerce'),
            );
            parent::__construct('agency-ecommerce-newsletter', esc_html__('AE - Newsletter', 'agency-ecommerce'), $opts);
        }

        function widget_fields()
        {

            $fields = array(

                'title' => array(
                    'name' => 'title',
                    'title' => esc_html__('Widget Title', 'agency-ecommerce'),
                    'type' => 'text',
                ),
                'sub_title' => array(
                    'name' => 'sub_title',
                    'title' => esc_html__('Sub Title', 'agency-ecommerce'),
                    'type' => 'text',
                ),
                'shortcode' => array(
                    'name' => 'shortcode',
                    'title' => esc_html__('Shortcode', 'agency-ecommerce'),
                    'type' => 'text',
                ),
                'background_color' => array(
                    'name' => 'background_color',
                    'title' => esc_html__('Background Color', 'agency-ecommerce'),
                    'type' => 'color',
                    'default' => '#0188cc',
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

            $sub_title = esc_html($valid_widget_instance['sub_title']);

            $shortcode = ($valid_widget_instance['shortcode']);

            $background_color = esc_attr($valid_widget_instance['background_color']);

            $args['before_widget'] = str_replace('class="', 'style="background:' . $background_color . ' " class="', $args['before_widget']);

            echo $args['before_widget'];
            ?>

            <div class="newsletter-content-holder newsletter-widget">

                <?php agency_ecommerce_widget_before($args) ?>

                <div class="content-wrap">

                    <div class="newsletter-wrapper">

                        <?php if (!empty($title) || !empty($sub_title)) { ?>

                            <div class="newsletter-text">

                                <span class="newsletter-icon">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/envelope.png'); ?>"
                                         alt="<?php esc_attr_e('newsletter', 'agency-ecommerce'); ?>">
                                </span>

                                <?php
                                if ($title) {
                                    echo '<h3>' . esc_html($title) . '</h3>';
                                }

                                if ($sub_title) {
                                    ?>

                                    <p><?php echo esc_html($sub_title); ?></p>

                                <?php }
                                ?>

                            </div>

                        <?php } ?>

                        <?php if ($shortcode) { ?>

                            <div class="newsletter-form">

                                <?php echo do_shortcode($shortcode); ?>

                            </div>

                        <?php } ?>

                    </div><!-- .newsletter-wrapper -->

                </div>

                <?php agency_ecommerce_widget_after($args) ?>


            </div><!-- .newsletter-widget -->

            <?php
            echo $args['after_widget'];
        }

    }


endif;