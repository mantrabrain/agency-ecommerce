<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency_Ecommerce
 */

if (!function_exists('agency_ecommerce_dynamic_options')) :

    function agency_ecommerce_dynamic_options()
    {

        $primary_color = agency_ecommerce_get_option('primary_color');

        $special_menu_max_height = agency_ecommerce_get_option('special_menu_max_height');

        $disable_focus_outline = (boolean)agency_ecommerce_get_option('disable_focus_outline');


        ?>

        <style type="text/css">
            <?php if ('#0188cc' != $primary_color) { ?>
            button,
            .comment-reply-link,
            a.button, input[type="button"],
            input[type="reset"],
            input[type="submit"],
            .main-slider .slider-caption .caption-wrap .button,
            .slick-dots li.slick-active button,
            .agency_ecommerce_widget_call_to_action .cta-widget:before,
            .blog-item .blog-text-wrap .date-header,
            #primary .page-header .page-title:after,
            .woocommerce nav.woocommerce-pagination ul li .page-numbers,
            .error-404.not-found form.search-form input[type="submit"],
            .search-no-results form.search-form input[type="submit"],
            .error-404.not-found form.search-form input[type="submit"]:hover,
            .woocommerce span.onsale,
            .woocommerce .ae-carousel-wrap .product span.onsale,
            li.product .product-thumb-wrap:before,
            #add_payment_method .wc-proceed-to-checkout a.checkout-button,
            .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,
            .woocommerce .cart .button,
            .woocommerce .cart input.button,
            .call-to-action-wrap a.button.cta-button.cta-button-primary,
            .woocommerce #payment #place_order,
            .woocommerce-page #payment #place_order,
            .woocommerce #respond input#submit.alt,
            .woocommerce a.button.alt,
            .woocommerce button.button.alt,
            .woocommerce input.button.alt,
            .woocommerce #review_form #respond .form-submit input,
            .mean-container a.meanmenu-reveal span,
            .mean-container .mean-nav ul li a,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
                background: <?php echo esc_attr( $primary_color ); ?>;
            }

            a:focus, a:active {
                color: <?php echo esc_attr(agency_ecommerce_sass_darken( $primary_color ,10))?>;
            }

            .main-navigation ul li.current-menu-item a,
            .main-navigation ul li a:hover,
            .main-navigation ul li.menu-item-has-children ul.sub-menu li.current-menu-item a,
            .main-navigation ul li.menu-item-has-children ul.sub-menu li a:hover,
            .agency_ecommerce_widget_call_to_action .call-to-action-offer .call-to-action-offer-inner .discount-percent,
            .agency_ecommerce_widget_call_to_action .call-to-action-offer .call-to-action-offer-inner .offer-text,
            #primary .post .entry-title:hover a,
            #primary .page .entry-title:hover a,
            .single-post-meta > span::before,
            .nav-links .nav-previous a:hover,
            .nav-links .nav-next a:hover,
            .comment-navigation .nav-next a:hover:after,
            .comment-navigation .nav-previous a:hover:before,
            .nav-links .nav-previous a:hover:before,
            .nav-links .nav-next a:hover:after,
            #commentform input[type="submit"]:hover,
            .comment-meta .comment-author a.url,
            .comment-meta .comment-metadata a,
            .comment .comment-body .comment-content a,
            .comments-area form#commentform p.logged-in-as a,
            .woocommerce nav.woocommerce-pagination ul li a:focus,
            .woocommerce nav.woocommerce-pagination ul li a:hover,
            .woocommerce nav.woocommerce-pagination ul li span.current,
            .product .price, .woocommerce ul.products li.product .price,
            .product_meta .posted_in a,
            .product_meta .tagged_as a,
            .woocommerce-product-rating a.woocommerce-review-link,
            .woocommerce p.stars a::before,
            .woocommerce-message::before,
            .woocommerce-info::before,
            .shop_table .product-name a,
            .woocommerce-info a.showcoupon,
            .mean-container a.meanmenu-reveal,
            .single-product .yith-wcwl-add-to-wishlist a,
            .entry-meta > span a:hover,
            .single-post-meta > span a:hover,
            .entry-footer > span a:hover,
            .pagination .nav-links .page-numbers.current,
            .posted-on:hover:before, .byline:hover:before, .cat-links:hover:before,
            .nav-links a.page-numbers:hover,
            .ae-sticky-add-to-cart__content-price ins,
            .woocommerce ul.products li.product .ae-woo-catalog .woocommerce-loop-category__title:hover, .ae-woo-catalog .woocommerce-loop-category__title:hover,
            .woocommerce ul.products li.product .ae-woo-catalog mark.count, .ae-woo-catalog mark.count
            {

                color: <?php echo esc_attr( $primary_color ); ?>;
            }

            #home-page-woo-featured-slider .advertisement-widget .advertisement-wrap .advertisement-buttons .button.advertisement-button:hover,
            .ae-homepage-wrap .advertisement-widget .advertisement-wrap .advertisement-buttons .button.advertisement-button:hover,
            .scrollup:hover,
            .woocommerce div.product .woocommerce-tabs ul.tabs li,
            .ae-homepage-wrap .agency_ecommerce_widget_call_to_action .cta-widget-default .call-to-action-button a.button {
                background: <?php echo esc_attr( $primary_color ); ?>;
                border-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            #commentform input[type="submit"],
            .woocommerce nav.woocommerce-pagination ul li .page-numbers,
            .pagination .nav-links .page-numbers,
            .nav-links .page-numbers.current,
            .nav-links a.page-numbers:hover,
            #add_payment_method .wc-proceed-to-checkout a.checkout-button,
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
            .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,
            .woocommerce .cart .button,
            .woocommerce .cart input.button,
            .woocommerce #payment #place_order,
            .woocommerce-page #payment #place_order,
            .woocommerce #respond input#submit.alt,
            .woocommerce a.button.alt,
            .woocommerce button.button.alt,
            .woocommerce input.button.alt,
            .woocommerce #review_form #respond .form-submit input,
            .main-slider .slider-caption .caption-wrap .button {
                border: 1px solid<?php echo esc_attr( $primary_color ); ?>;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs::before {
                border-bottom: 1px solid<?php echo esc_attr( $primary_color ); ?>;
            }

            .woocommerce-message, .woocommerce-info, .blog-item .blog-text-wrap {
                border-top-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            /* Background */
            .top-header,
            .widget_calendar caption,
            .mid-header .ae-cart-wrapper .ae-icon-wrap .cart-value,
            .ae-cart-wrapper .ae-cart-content,
            .mid-header .ae-cart-wrapper:hover,
            .special-menu-container ul.special-menu-wrapper a.special-menu,
            .special-menu-container ul.special-menu-wrapper ul.special-sub-menu li:hover,
            .main-slider-wrap .slider-buttons a,
            .slider-section-right .slider-buttons a,
            .slider-section-right .slick-arrow,
            .main-slider-wrap .slick-arrow,
            .ae-list-grid-switcher a,
            .woocommerce.single-product div.product .single_add_to_cart_button,
            .woocommerce-page.single-product div.product .single_add_to_cart_button,
            .elementor-page.single-product div.product .single_add_to_cart_button,
            .woocommerce.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,
            .woocommerce.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover,
            .woocommerce.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,
            .woocommerce-page.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,
            .woocommerce-page.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover,
            .woocommerce-page.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,
            .elementor-page.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover,
            .elementor-page.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover,
            .elementor-page.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,
            .woocommerce.single-product div.product .woocommerce-tabs ul.tabs li,
            .woocommerce-page.single-product div.product .woocommerce-tabs ul.tabs li,
            .elementor-page.single-product div.product .woocommerce-tabs ul.tabs li,
            .woocommerce .related.products > h2:before,
            .woocommerce-page .related.products > h2:before,
            .elementor-page .related.products > h2:before,
            .primary-sidebar .widget .widget-title:before,
            .woocommerce-account #respond input#submit,
            .woocommerce-account a.button,
            .woocommerce-account button.button,
            .woocommerce-account input.button,
            h1.page-title:before,
            .widget.agency_ecommerce_widget_features .feature-icon,
            .woocommerce #respond input#submit,
            .woocommerce a.button,
            .woocommerce button.button,
            .woocommerce input.button,
            .navigation.post-navigation .nav-links a,
            .pagination .nav-links .page-numbers,
            .mid-header .ae-wishlist-wrapper:hover,
            .mid-header .ae-wishlist-wrapper .wish-value,
            .woocommerce ul.products li.product .yith-wcqv-button:hover, .woocommerce ul.products .product .yith-wcqv-button:hover, .woocommerce .products li.product .yith-wcqv-button:hover, .woocommerce .products .product .yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button:hover, .woocommerce-page ul.products li.product .yith-wcqv-button:hover, .woocommerce-page ul.products .product .yith-wcqv-button:hover, .woocommerce-page .products li.product .yith-wcqv-button:hover, .woocommerce-page .products .product .yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button:hover, .elementor-page ul.products li.product .yith-wcqv-button:hover, .elementor-page ul.products .product .yith-wcqv-button:hover, .elementor-page .products li.product .yith-wcqv-button:hover, .elementor-page .products .product .yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button:hover,
            .woocommerce a.add_to_wishlist:hover, .woocommerce-page a.add_to_wishlist:hover, .elementor-page a.add_to_wishlist:hover,
            .woocommerce.woocommerce-wishlist .shop_table.wishlist_table thead tr,
            .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce-page .cart .button, .woocommerce-page .cart input.button, .elementor-page .cart .button, .elementor-page .cart input.button, .woocommerce .woocommerce .cart .button, .woocommerce .woocommerce .cart input.button,
            .woocommerce.woocommerce-wishlist .shop_table.wishlist_table .add_to_cart_button,
            .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #review_form #respond .form-submit input, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #review_form #respond .form-submit input, .elementor-page #respond input#submit.alt, .elementor-page a.button.alt, .elementor-page button.button.alt, .elementor-page input.button.alt, .elementor-page #review_form #respond .form-submit input, .woocommerce .woocommerce #respond input#submit.alt, .woocommerce .woocommerce a.button.alt, .woocommerce .woocommerce button.button.alt, .woocommerce .woocommerce input.button.alt, .woocommerce .woocommerce #review_form #respond .form-submit input.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #review_form #respond .form-submit input, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #review_form #respond .form-submit input, .elementor-page #respond input#submit.alt, .elementor-page a.button.alt, .elementor-page button.button.alt, .elementor-page input.button.alt, .elementor-page #review_form #respond .form-submit input, .woocommerce .woocommerce #respond input#submit.alt, .woocommerce .woocommerce a.button.alt, .woocommerce .woocommerce button.button.alt, .woocommerce .woocommerce input.button.alt, .woocommerce .woocommerce #review_form #respond .form-submit input,
            .woocommerce ul.products li.product .button.yith-wcqv-button:hover, .woocommerce ul.products li.product .yith-wcqv-button:hover, .woocommerce ul.products .product .button.yith-wcqv-button:hover, .woocommerce ul.products .product .yith-wcqv-button:hover, .woocommerce .products li.product .button.yith-wcqv-button:hover, .woocommerce .products li.product .yith-wcqv-button:hover, .woocommerce .products .product .button.yith-wcqv-button:hover, .woocommerce .products .product .yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .button.yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .button.yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .button.yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .button.yith-wcqv-button:hover, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button:hover, .woocommerce-page ul.products li.product .button.yith-wcqv-button:hover, .woocommerce-page ul.products li.product .yith-wcqv-button:hover, .woocommerce-page ul.products .product .button.yith-wcqv-button:hover, .woocommerce-page ul.products .product .yith-wcqv-button:hover, .woocommerce-page .products li.product .button.yith-wcqv-button:hover, .woocommerce-page .products li.product .yith-wcqv-button:hover, .woocommerce-page .products .product .button.yith-wcqv-button:hover, .woocommerce-page .products .product .yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .button.yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .button.yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .button.yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .button.yith-wcqv-button:hover, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button:hover, .elementor-page ul.products li.product .button.yith-wcqv-button:hover, .elementor-page ul.products li.product .yith-wcqv-button:hover, .elementor-page ul.products .product .button.yith-wcqv-button:hover, .elementor-page ul.products .product .yith-wcqv-button:hover, .elementor-page .products li.product .button.yith-wcqv-button:hover, .elementor-page .products li.product .yith-wcqv-button:hover, .elementor-page .products .product .button.yith-wcqv-button:hover, .elementor-page .products .product .yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .button.yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .button.yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .button.yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .button.yith-wcqv-button:hover, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button:hover, .woocommerce .woocommerce ul.products li.product .button.yith-wcqv-button:hover, .woocommerce .woocommerce ul.products li.product .yith-wcqv-button:hover, .woocommerce .woocommerce ul.products .product .button.yith-wcqv-button:hover, .woocommerce .woocommerce ul.products .product .yith-wcqv-button:hover, .woocommerce .woocommerce .products li.product .button.yith-wcqv-button:hover, .woocommerce .woocommerce .products li.product .yith-wcqv-button:hover, .woocommerce .woocommerce .products .product .button.yith-wcqv-button:hover, .woocommerce .woocommerce .products .product .yith-wcqv-button:hover, .woocommerce .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .button.yith-wcqv-button:hover, .woocommerce .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .button.yith-wcqv-button:hover, .woocommerce .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button:hover, .woocommerce .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .button.yith-wcqv-button:hover, .woocommerce .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button:hover, .woocommerce .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .button.yith-wcqv-button:hover, .woocommerce .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button:hover,
            .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce-page ul.products li.product .onsale, .woocommerce-page span.onsale, .elementor-page ul.products li.product .onsale, .elementor-page span.onsale, .woocommerce .woocommerce ul.products li.product .onsale, .woocommerce .woocommerce span.onsale {
                background-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            /* Font Color */
            .ae-cart-wrapper:hover .ae-cart-content p.woocommerce-mini-cart__buttons.buttons a,
            .woocommerce ul.products li.product .price,
            .woocommerce ul.products .product .price,
            .woocommerce .products li.product .price,
            .woocommerce .products .product .price,
            .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .price,
            .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .price,
            .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .price,
            .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .price,
            .woocommerce-page ul.products li.product .price, .woocommerce-page ul.products .product .price,
            .woocommerce-page .products li.product .price, .woocommerce-page .products .product .price,
            .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .price,
            .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .price,
            .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .price,
            .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .price,
            .elementor-page ul.products li.product .price, .elementor-page ul.products .product .price,
            .elementor-page .products li.product .price, .elementor-page .products .product .price,
            .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .price,
            .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .price,
            .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .price,
            .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .price,
            .widget.woocommerce.widget_products .product_list_widget ins span,
            .widget.woocommerce.widget_recently_viewed_products .product_list_widget ins span,
            .widget.woocommerce.widget_products .product_list_widget a:hover,
            .widget.woocommerce.widget_recently_viewed_products .product_list_widget a:hover,
            .product .woocommerce-loop-product__title:hover,
            .woocommerce ul.products li.product .woocommerce-loop-product__title:hover,
            .agency_ecommerce_widget_woo_categories .product-cat.product .featured-cat-title:hover,
            .woocommerce.single-product div.product p.price,
            .woocommerce.single-product div.product span.price,
            .woocommerce-page.single-product div.product p.price,
            .woocommerce-page.single-product div.product span.price,
            .elementor-page.single-product div.product p.price,
            .elementor-page.single-product div.product span.price,
            .woocommerce.single-product div.product .woocommerce-tabs ul.tabs li.active a,
            .woocommerce-page.single-product div.product .woocommerce-tabs ul.tabs li.active a,
            .elementor-page.single-product div.product .woocommerce-tabs ul.tabs li.active a,
            .primary-sidebar .widget ul li:hover,
            .blog-item .blog-text-wrap h3:hover,
            .blog-item .blog-text-wrap h2:hover,
            .blog-item .blog-text-wrap h3 a:hover,
            .blog-item .blog-text-wrap h2 a:hover,
            #commentform input[type="submit"]:hover, #commentform input[type="submit"]#submit:hover,
            .navigation.post-navigation .nav-links a:hover,
            .breadcrumb-trail li a:hover,
            .woocommerce ul.products li.product .yith-wcqv-button, .woocommerce ul.products .product .yith-wcqv-button, .woocommerce .products li.product .yith-wcqv-button, .woocommerce .products .product .yith-wcqv-button, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button, .woocommerce-page ul.products li.product .yith-wcqv-button, .woocommerce-page ul.products .product .yith-wcqv-button, .woocommerce-page .products li.product .yith-wcqv-button, .woocommerce-page .products .product .yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button, .elementor-page ul.products li.product .yith-wcqv-button, .elementor-page ul.products .product .yith-wcqv-button, .elementor-page .products li.product .yith-wcqv-button, .elementor-page .products .product .yith-wcqv-button, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button,
            .woocommerce.woocommerce-wishlist .product-price span,
            .woocommerce ul.products li.product .button.yith-wcqv-button, .woocommerce ul.products li.product .yith-wcqv-button, .woocommerce ul.products .product .button.yith-wcqv-button, .woocommerce ul.products .product .yith-wcqv-button, .woocommerce .products li.product .button.yith-wcqv-button, .woocommerce .products li.product .yith-wcqv-button, .woocommerce .products .product .button.yith-wcqv-button, .woocommerce .products .product .yith-wcqv-button, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .button.yith-wcqv-button, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .button.yith-wcqv-button, .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .button.yith-wcqv-button, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .button.yith-wcqv-button, .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button, .woocommerce-page ul.products li.product .button.yith-wcqv-button, .woocommerce-page ul.products li.product .yith-wcqv-button, .woocommerce-page ul.products .product .button.yith-wcqv-button, .woocommerce-page ul.products .product .yith-wcqv-button, .woocommerce-page .products li.product .button.yith-wcqv-button, .woocommerce-page .products li.product .yith-wcqv-button, .woocommerce-page .products .product .button.yith-wcqv-button, .woocommerce-page .products .product .yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .button.yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .button.yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .button.yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .button.yith-wcqv-button, .woocommerce-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button, .elementor-page ul.products li.product .button.yith-wcqv-button, .elementor-page ul.products li.product .yith-wcqv-button, .elementor-page ul.products .product .button.yith-wcqv-button, .elementor-page ul.products .product .yith-wcqv-button, .elementor-page .products li.product .button.yith-wcqv-button, .elementor-page .products li.product .yith-wcqv-button, .elementor-page .products .product .button.yith-wcqv-button, .elementor-page .products .product .yith-wcqv-button, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .button.yith-wcqv-button, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .button.yith-wcqv-button, .elementor-page .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .button.yith-wcqv-button, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .button.yith-wcqv-button, .elementor-page .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button, .woocommerce .woocommerce ul.products li.product .button.yith-wcqv-button, .woocommerce .woocommerce ul.products li.product .yith-wcqv-button, .woocommerce .woocommerce ul.products .product .button.yith-wcqv-button, .woocommerce .woocommerce ul.products .product .yith-wcqv-button, .woocommerce .woocommerce .products li.product .button.yith-wcqv-button, .woocommerce .woocommerce .products li.product .yith-wcqv-button, .woocommerce .woocommerce .products .product .button.yith-wcqv-button, .woocommerce .woocommerce .products .product .yith-wcqv-button, .woocommerce .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .button.yith-wcqv-button, .woocommerce .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main li.product .yith-wcqv-button, .woocommerce .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .button.yith-wcqv-button, .woocommerce .woocommerce .widget.agency_ecommerce_woo_products_widget .ae-list-main .product .yith-wcqv-button, .woocommerce .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .button.yith-wcqv-button, .woocommerce .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main li.product .yith-wcqv-button, .woocommerce .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .button.yith-wcqv-button, .woocommerce .woocommerce .widget.agency_ecommerce_widget_woo_categories .ae-list-main .product .yith-wcqv-button,
            a {
                color: <?php echo esc_attr( $primary_color ); ?>;
            }

            .woocommerce.single-product div.product .woocommerce-tabs ul.tabs li,
            .woocommerce-page.single-product div.product .woocommerce-tabs ul.tabs li,
            .elementor-page.single-product div.product .woocommerce-tabs ul.tabs li,
            .woocommerce.single-product div.product .woocommerce-tabs ul.tabs:before,
            .woocommerce-page.single-product div.product .woocommerce-tabs ul.tabs:before,
            .elementor-page.single-product div.product .woocommerce-tabs ul.tabs:before,
            #commentform input[type="submit"], #commentform input[type="submit"]#submit,
            .navigation.post-navigation .nav-links a,
            blockquote,
            .search-box .product-search-wrapper form input[type="text"],
            .search-box .product-search-wrapper form,
            .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce-page .cart .button, .woocommerce-page .cart input.button, .elementor-page .cart .button, .elementor-page .cart input.button, .woocommerce .woocommerce .cart .button, .woocommerce .woocommerce .cart input.button,
            .woocommerce a.add_to_wishlist:hover, .woocommerce-page a.add_to_wishlist:hover, .elementor-page a.add_to_wishlist:hover,
            .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #review_form #respond .form-submit input, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #review_form #respond .form-submit input, .elementor-page #respond input#submit.alt, .elementor-page a.button.alt, .elementor-page button.button.alt, .elementor-page input.button.alt, .elementor-page #review_form #respond .form-submit input, .woocommerce .woocommerce #respond input#submit.alt, .woocommerce .woocommerce a.button.alt, .woocommerce .woocommerce button.button.alt, .woocommerce .woocommerce input.button.alt, .woocommerce .woocommerce #review_form #respond .form-submit input {
                border-color: <?php echo esc_attr( $primary_color ); ?>;

            }

            /* Scroll Bar */
            .special-menu-container ul.special-menu-wrapper ul.special-sub-menu::-webkit-scrollbar-thumb {
                background: <?php echo esc_attr( $primary_color ); ?>;
                background-image: -webkit-gradient(linear,
                left bottom,
                left top,
                color-stop(0.0, <?php echo esc_attr(agency_ecommerce_sass_lighten( $primary_color ,10))?>),
                color-stop(0.50, <?php echo esc_attr( $primary_color ); ?>),
                color-stop(1, <?php echo esc_attr(agency_ecommerce_sass_darken( $primary_color ,20))?>));
            }

            <?php }
            if( (int)$special_menu_max_height != 433 && (int)$special_menu_max_height>=0 && !empty($special_menu_max_height)) { ?>
            .special-menu-container ul.special-menu-wrapper ul.special-sub-menu {
                max-height: <?php echo (int)$special_menu_max_height == 0 ? 'unset;': (int)$special_menu_max_height.'px;'; ?>
            }

            <?php }
            if($disable_focus_outline){
                ?>
            a:focus,
            button:focus,
            input[type="text"]:focus,
            input[type="email"]:focus,
            input[type="url"]:focus,
            input[type="password"]:focus,
            input[type="search"]:focus,
            textarea:focus,
            input[type="button"]:focus,
            input[type="reset"]:focus,
            input[type="submit"]:focus,
            .slick-slider .slick-slide:focus,
            .search-box .product-search-wrapper form select:focus {
                outline: none !important;

            }

            <?php
        }
        ?>

        </style>

        <?php
    }

endif;

add_action('wp_head', 'agency_ecommerce_dynamic_options', 10);

