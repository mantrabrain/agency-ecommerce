<?php
/**
 * Breadcrumbs.
 *
 * @package Agency_Ecommerce
 */

// Bail if front page.
if (is_front_page() || is_page_template('templates/home-template.php')) {
    return;
}

$breadcrumb_type = agency_ecommerce_get_option('breadcrumb_type');
if ('disable' === $breadcrumb_type) {
    return;
}

if (!function_exists('agency_ecommerce_breadcrumb_trail')) {
    require_once trailingslashit(get_template_directory()) . '/core/vendor/breadcrumbs/breadcrumbs.php';
}
$custom_style = '';

if (agency_ecommerce_is_advance_breadcrumb()) {

    $image_url = esc_url(agency_ecommerce_get_option('breadcrumb_background_image'));


    if (
        (boolean)agency_ecommerce_get_option('override_background_by_featured_image')
        && !is_archive()
        && !is_search()
    ) {

        global $post;

        $id = isset($post->ID) ? $post->ID : '';

        if (!empty($id)) {

            if (has_post_thumbnail($post)) {

                $image_url = wp_get_attachment_url(get_post_thumbnail_id($id));


            }
        }
    }
    if (function_exists('is_product_category')) {

        if (is_product_category()) {

            $woo_cat = get_queried_object();

            $woo_category_id = isset($woo_cat->term_id) ? absint($woo_cat->term_id) : 0;

            $thumbnail_id = get_term_meta($woo_category_id, 'thumbnail_id', true);

            $thumb_url = wp_get_attachment_url($thumbnail_id);

            $image_url = !empty($thumb_url) ? $thumb_url : $image_url;
        }
    }
    $custom_style = !empty($image_url) ? 'style="background-image:url(' . esc_url($image_url) . ')"' : '';
}

$breadcrumb_class = $breadcrumb_type;

$breadcrumb_class .= (boolean)agency_ecommerce_get_option('make_parallax_background_breadcrumb') ? ' mb-parallax' : '';

?>

<div id="breadcrumb" class="<?php echo 'ae-breadcrumb-' . esc_attr($breadcrumb_class); ?>" <?php echo $custom_style; ?>>
    <div class="breadcrumb-content">
        <div class="container">
            <?php

            $breadcrumb_text = agency_ecommerce_get_option('breadcrumb_text');

            $breadcrumb_args = array(
                'container' => 'div',
                'show_browse' => false,

            );
            if (!empty($breadcrumb_text)) {

                $breadcrumb_args['labels']['home'] = esc_html($breadcrumb_text);
            }

            if (agency_ecommerce_is_advance_breadcrumb()) {

                echo '<h1 class="heading-title page-title entry-title">' . wp_kses(agency_ecommerce_get_page_title_for_breadcrumb(), array(

                        'span' => 'class'

                    )) . '</h1>';
            }

            agency_ecommerce_breadcrumb_trail($breadcrumb_args);

            ?>
        </div>
    </div><!-- .container -->
</div><!-- #breadcrumb -->
