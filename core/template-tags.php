<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Agency_Ecommerce
 */

if (!function_exists('agency_ecommerce_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function agency_ecommerce_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            '%s',
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
            '%s',
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html_x(', ', 'list item separator', 'agency-ecommerce'));

            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">%s</span>', $categories_list); // WPCS: XSS OK.
            }

        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'agency-ecommerce'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

    }
endif;

if (!function_exists('agency_ecommerce_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function agency_ecommerce_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type() && is_single()) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'agency-ecommerce'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">%s</span>', $tags_list); // WPCS: XSS OK.
            }

            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'agency-ecommerce'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );

        }
    }
endif;

if (!function_exists('agency_ecommerce_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function agency_ecommerce_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (agency_ecommerce_is_advance_breadcrumb() && (boolean)agency_ecommerce_get_option('override_background_by_featured_image') && is_single()) {
            return;
        }
        if (is_singular()) :
            ?>

            <div class="featured-thumb post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>
            <div class="featured-thumb post-thumbnail">
                <a class="post-thumbnail-img" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php
                    the_post_thumbnail('post-thumbnail', array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                    ?>
                </a>
            </div>

        <?php endif; // End is_singular().
    }
endif;
if (!function_exists('agency_ecommerce_get_page_title_for_breadcrumb')) {

    function agency_ecommerce_get_page_title_for_breadcrumb($is_remove_filter = true)
    {
        $title = get_the_title();

        if (is_archive()) {

            $title = get_the_archive_title();
        }

        if (function_exists('is_shop') && class_exists('WooCommerce')) {

            if (is_shop()) {

                $title = woocommerce_page_title(false);

                if (empty($title)) {

                    $title = get_the_archive_title();
                }

            }

        }

        if ($is_remove_filter) {

            add_filter('woocommerce_show_page_title', '__return_false');

            if (is_single()) {
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
            }

        }
        if (is_404()) {

            $title = esc_html(agency_ecommerce_404_page_title());
        }
        if (is_search()) {

            $title = 'Search results for: ' . get_search_query();
        }


        return $title;

    }
}

if (!function_exists('agency_ecommerce_fullwidth_widget_areas')) {

    function agency_ecommerce_fullwidth_widget_areas()
    {
        return apply_filters(
            'agency_ecommerce_fullwidth_widget_areas', array(

                'home-page-fullwidth-before-widget-area',
                'home-page-fullwidth-after-widget-area'

            )
        );

    }
}
if (!function_exists('agency_ecommerce_widget_before')) {

    function agency_ecommerce_widget_before($args)
    {
        $widget_area_id = isset($args['id']) ? $args['id'] : '';

        $fullwidth_widget_areas = agency_ecommerce_fullwidth_widget_areas();

        if (in_array($widget_area_id, $fullwidth_widget_areas)) {

            echo '<div class="container">';
        }

    }
}

if (!function_exists('agency_ecommerce_widget_after')) {

    function agency_ecommerce_widget_after($args)
    {
        $widget_area_id = isset($args['id']) ? $args['id'] : '';

        $fullwidth_widget_areas = agency_ecommerce_fullwidth_widget_areas();

        if (in_array($widget_area_id, $fullwidth_widget_areas)) {

            echo '</div>';
        }
    }
}