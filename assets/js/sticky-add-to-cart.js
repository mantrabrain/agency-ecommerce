/*global ae_sticky_add_to_cart_params */
(function () {
    document.addEventListener('DOMContentLoaded', function () {
        var stickyAddToCart = document.getElementsByClassName('ae-sticky-add-to-cart');

        if (!stickyAddToCart.length) {
            return;
        }

        if (typeof ae_sticky_add_to_cart_params === 'undefined') {
            return;
        }

        var trigger = document.getElementsByClassName(ae_sticky_add_to_cart_params.trigger_class);

        if (trigger.length > 0) {
            var aeStickyAddToCartToggle = function () {
                if ((trigger[0].getBoundingClientRect().top + trigger[0].scrollHeight) < 0) {
                    stickyAddToCart[0].classList.add('ae-sticky-add-to-cart--slideInDown');
                    stickyAddToCart[0].classList.remove('ae-sticky-add-to-cart--slideOutUp');
                } else if (stickyAddToCart[0].classList.contains('ae-sticky-add-to-cart--slideInDown')) {
                    stickyAddToCart[0].classList.add('ae-sticky-add-to-cart--slideOutUp');
                    stickyAddToCart[0].classList.remove('ae-sticky-add-to-cart--slideInDown');
                }
            };

            aeStickyAddToCartToggle();

            window.addEventListener('scroll', function () {
                aeStickyAddToCartToggle();
            });

            // Get product id
            var product_id = null;

            document.body.classList.forEach(function (item) {
                if ('postid-' === item.substring(0, 7)) {
                    product_id = item.replace(/[^0-9]/g, '');
                }
            });
             if (product_id) {
                var product = jQuery('#product-' + product_id);

                 if (product) {
                    if (!product.hasClass('product-type-simple') && !product.hasClass('product-type-external')) {
                        var selectOptions = document.getElementsByClassName('ae-sticky-add-to-cart__content-button');

                        selectOptions[0].addEventListener('click', function (event) {
                            event.preventDefault();
                            document.getElementById('product-' + product_id).scrollIntoView();
                        });
                    }
                }
            }
        }
    });
})();
