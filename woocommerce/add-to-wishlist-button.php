<?php
/**
 * Add to wishlist button template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.9
 */

if (!defined('YITH_WCWL')) {
    exit;
} // Exit if accessed directly

global $product;
?>

<a href="<?php echo esc_url(add_query_arg('add_to_wishlist', $product_id)) ?>" rel="nofollow"
   data-product-id="<?php echo absint($product_id) ?>" data-product-type="<?php echo esc_attr($product_type) ?>"
   class="<?php echo esc_attr($link_classes) ?>"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
<img src="<?php echo esc_url(YITH_WCWL_URL . 'assets/images/wpspin_light.gif') ?>" class="ajax-loading" alt="loading"
     width="16" height="16" style="visibility:hidden"/>