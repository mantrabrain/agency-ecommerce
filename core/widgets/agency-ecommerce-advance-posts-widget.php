<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */
if (!class_exists('Agency_Ecommerce_Advance_Posts_Widget')) :

    /**
     * Latest News widget class.
     *
     * @since 1.0.0
     */
    class Agency_Ecommerce_Advance_Posts_Widget extends Agency_Ecommerce_Widget_Base
    {
        public $excerpt_length;

        function __construct()
        {
            $opts = array(
                'classname' => 'agency_ecommerce_widget_advance_posts',
                'description' => esc_html__('Widget to dispaly posts with thumbnail.', 'agency-ecommerce'),
            );

            parent::__construct('agency-ecommerce-advance-posts', esc_html__('AE - Advance Posts', 'agency-ecommerce'), $opts);
        }

        function widget_fields()
        {

            $fields = array(
                'title' => array(
                    'name' => 'title',
                    'title' => esc_html__('Title', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('Advance Posts', 'agency-ecommerce'),
                ), 'post_category' => array(
                    'name' => 'post_category',
                    'title' => esc_html__('Post Category', 'agency-ecommerce'),
                    'type' => 'dropdown_categories',
                    'args' => array(
                        'taxonomy' => 'category',
                        'hide_empty' => true,
                        'orderby' => 'name',
                    )
                ), 'exclude_categories' => array(
                    'name' => 'exclude_categories',
                    'title' => esc_html__('Exclude Categories', 'agency-ecommerce'),
                    'description' => esc_html__('Enter category id seperated with comma. Posts from these categories will be excluded from latest post listing.', 'agency-ecommerce'),
                    'type' => 'text',
                    'default' => esc_html__('View Details', 'agency-ecommerce')
                ), 'excerpt_length' => array(
                    'name' => 'excerpt_length',
                    'title' => esc_html__('Excerpt Length', 'agency-ecommerce'),
                    'type' => 'number',
                    'default' => 15,
                ), 'disable_date' => array(
                    'name' => 'disable_date',
                    'title' => esc_html__('Disable Date', 'agency-ecommerce'),
                    'type' => 'checkbox',
                )


            );

            return $fields;

        }

        function widget($args, $instance)
        {

            $valid_widget_instance = Agency_Ecommerce_Widget_Validation::instance()->validate($instance, $this->widget_fields());

            $title = apply_filters('widget_title', empty($valid_widget_instance['title']) ? '' : $valid_widget_instance['title'], $valid_widget_instance, $this->id_base);

            echo $args['before_widget'];

            $is_carousel_init = false;

            $class = 'advance-posts-widget ae-advance-posts-section';

            if ($is_carousel_init) {
                $class .= ' ae-slick-init';
            }
            ?>

            <div class="<?php echo esc_attr($class); ?>">
                <?php
                agency_ecommerce_widget_before($args);

                if ($title) {

                    echo $args['before_title'] . esc_html($title) . $args['after_title'];
                }
                ?>

                <div class="blogs-wrapper">

                    <?php
                    $query_args = array(
                        'posts_per_page' => $is_carousel_init ? 3 : 3,
                        'no_found_rows' => true,
                        'post__not_in' => get_option('sticky_posts'),
                        'ignore_sticky_posts' => true,
                    );

                    if (absint($valid_widget_instance['post_category']) > 0) {

                        $query_args['cat'] = absint($valid_widget_instance['post_category']);
                    }

                    if (!empty($valid_widget_instance['exclude_categories'])) {

                        $exclude_ids = explode(',', $valid_widget_instance['exclude_categories']);

                        $query_args['category__not_in'] = $exclude_ids;
                    }

                    $all_posts = new WP_Query($query_args);

                    if ($all_posts->have_posts()) :
                        ?>

                        <div class="ae-inner">

                            <?php
                            $post_count = $all_posts->post_count;

                            while ($all_posts->have_posts()) :

                                $all_posts->the_post();
                                ?>

                                <div class="blog-item">
                                    <div class="blog-inner">


                                        <div class="blog-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('agency-ecommerce-common'); ?>
                                                <?php else:
                                                    $placeholder = get_template_directory_uri() . '/assets/images/placeholder/agency-ecommerce-300-300.png';
                                                    echo '<img src="' . esc_url($placeholder) . '"/>';

                                                endif; ?>
                                            </a>
                                        </div><!-- .blog-thumbnail -->


                                        <div class="blog-text-wrap">

                                            <?php if (1 != $valid_widget_instance['disable_date']) { ?>

                                                <div class="date-header">
                                                    <span class="ae-date"><?php echo esc_html(get_the_date()); ?></span>
                                                </div>

                                            <?php } ?>

                                            <div class="entry-content">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                <?php
                                                $this->excerpt_length = $valid_widget_instance['excerpt_length'];

                                                add_filter('excerpt_length', array($this, 'excerpt_length'), 11);

                                                $content = agency_ecommerce_get_the_excerpt();

                                                echo $content ? wp_kses_post(wpautop($content)) : '';

                                                remove_filter('excerpt_length', array($this, 'excerpt_length'));
                                                ?>
                                            </div>

                                        </div>

                                    </div><!-- .blog-inner -->
                                </div><!-- .blog-item -->

                            <?php
                            endwhile;

                            wp_reset_postdata();
                            ?>

                        </div>

                    <?php endif; ?>

                </div>
                <?php agency_ecommerce_widget_after($args); ?>
            </div><!-- .advance-posts-widget -->

            <?php
            echo $args['after_widget'];
        }

        function excerpt_length($length)
        {

            return $this->excerpt_length;
        }


    }


endif;