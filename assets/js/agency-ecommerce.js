(function ($) {

	var AgencyEcommerceThemeLib = {

		init: function () {
			this.bindEvents();
		},
		bindEvents: function () {
			var $this = this;
			$(document).ready(function ($) {
				$this.initAccessibility();
				$.each($('.main-slider'), function () {
					var isDisabled = $(this).attr('data-disable');
					if (isDisabled != 1) {
						$(this).slick({
							prevArrow: '<i class="prev fa fa-angle-left"></i>',
							nextArrow: '<i class="next fa fa-angle-right"></i>',
							autoplay: true,

						});
					}
				});

				$.each($('.verticle-slider'), function () {

					var number_of_slide = $(this).attr('data-rows');

					var isDisabled = $(this).attr('data-disable');
					if (isDisabled != 1) {
						$(this).slick({
							slidesToShow: number_of_slide,
							slidesToScroll: 1,
							autoplay: true,
							vertical: true,
							verticalSwiping: true,
							arrows: true,
							prevArrow: '<i class="prev fa fa-angle-up"></i>',
							nextArrow: '<i class="next fa fa-angle-down"></i>',
							adaptiveHeight: true
						});
					}
				});

				$.each($('.ae-list-items'), function () {
					var $this_element = $(this);
					if ($this_element.attr('data-slick-attr') !== undefined) {
						var attr = $this_element.attr("data-slick-attr");
						var attr_json = JSON.parse(attr);

						if (
							$(this).closest('.primary-sidebar').length > 0 ||

							$(this).closest('#footer-widgets').length > 0 ||

							$(this).closest('.homepage-sidebar').length > 0

						) {

							attr_json.slidesToScroll = 1;
							attr_json.slidesToShow = 1;
							delete attr_json.responsive;
						}
						$this_element.slick(attr_json);
					}
				});

				/*$('.ae-list-items').slick({
					lazyLoad: 'ondemand'
				});*/

				/*$('.ae-advance-posts-section.ae-slick-init .ae-inner').slick({
					slidesToShow: 3,
				}).on('setPosition', function (event, slick) {
					slick.$slides.css('height', slick.$slideTrack.height() + 'px');
				});*/
				$('#main-nav').meanmenu({
					meanScreenWidth: "1050"
				});
				$this.initScrollToTop();

				$this.initCategoryMenu();

				$this.initSearch();

				$this.initStickySidebar();

				$this.cartHover();

				$this.searchHolderHeight();
				$this.specialMenuChildToggle();

				/* $('.ae-product-cat-tab li').on('click', function () {
					 $this.activeProductCategoryTab($(this));
				 })*/
			});

			$(window).resize(function ($) {
				$this.cartHover();
				$this.searchHolderHeight();
			});
			$this.listGridView();
		},

		specialMenuChildToggle: function () {
			$('body').on('click', '.ae-special-menu-toggle-child', function (e) {
 				e.stopPropagation();
				e.preventDefault();

			});
		},
		listGridView: function () {

			var wrapper = $('.ae-list-grid-switcher');
			var class_name = '';
			wrapper.find('a').on('click', function () {
				var type = $(this).attr('data-type');

				switch (type) {
					case "list":
						class_name = "ae-list-view";
						break;
					case "grid":
						class_name = "ae-grid-view";
						break;
					default:
						class_name = "ae-grid-view";
						break;
				}
				if (class_name != '') {

					$(this).closest('#shop-wrap').attr('class', '').addClass(class_name);
					$(this).closest('.ae-list-grid-switcher').find('a').removeClass('selected');
					$(this).addClass('selected');
				}
			});
		},
		initScrollToTop: function () {
			// Go to top.
			var $scroll_obj = $('#btn-scrollup');

			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$scroll_obj.fadeIn();
				} else {
					$scroll_obj.fadeOut();
				}
			});

			$scroll_obj.click(function () {
				$('html, body').animate({scrollTop: 0}, 600);
				return false;
			});
		},
		initSearch: function () {

			$(".search-btn").click(function (e) {

				var search_holder = $(this).closest('.search-holder');

				if (search_holder.hasClass('open')) {

					search_holder.removeClass('open');

					search_holder.find(".search-btn i").removeClass('fa-close');


				} else {

					search_holder.addClass('open');

					search_holder.find(".search-btn i").addClass('fa-close');

				}

				e.preventDefault();

			});
		},
		initStickySidebar: function () {
			//sticky sidebar
			var main_body_ref = $("body");

			if (main_body_ref.hasClass('global-sticky-sidebar')) {
				$('#primary, .primary-sidebar').theiaStickySidebar();
			}
		},
		cartHover: function () {

			var cart_node = $('.ae-cart-wrapper');

			$.each(cart_node, function () {
				var window_width = $(window).outerWidth();
				var container_width = $('.container').outerWidth();
				var cart_content = $(this).find('.ae-cart-content');
				var offset = $(this).offset();
				var offset_left_from_container = offset.left - $('.container').offset().left;
				var cart_content_width = cart_content.outerWidth();

				if ((offset_left_from_container + cart_content_width) < container_width) {
					cart_content.css({
						'left': '0'
					});
				} else {

					cart_content.css({
						'right': '0'
					});
				}
			});
		},
		searchHolderHeight: function () {

			var search_holder = $('.search-holder');

			$.each(search_holder, function () {
				var top_header = $(this).closest('.top-header');
				var top_header_height = top_header.outerHeight();
				var offset = top_header.offset();
				$(this).find('.search-box').css({'top': (top_header_height + 1) + 'px'});
			});
		},
		initCategoryMenu: function () {
			var specialMenu = $('.special-menu-container');
			specialMenu.find('a.special-menu').on('click', function () {
				if ($(this).parent('li').hasClass('active')) {
					$(this).parent('li').removeClass('active');
				} else {
					$(this).parent('li').addClass('active');
				}
			});
			specialMenu.find('ul.special-menu-wrapper.dropdown-enable ul.special-sub-menu').find('li.menu-item-has-children>a').append('<button type="button" class="ae-special-menu-toggle-child"><span class="fa fa-angle-right"></span></button>');
		},
		activeProductCategoryTab: function ($tab_item) {

			var cat_item_from_tab = $tab_item.attr('data-cat-id');
			var product_wrap = $tab_item.closest('.ae-inner').find('.ae-list-grid');
			var cat_class = 'ae-cat-id-' + cat_item_from_tab;

			$tab_item.closest('ul.ae-product-cat-tab').find('li').removeClass('ae-active');
			$tab_item.addClass('ae-active');
			if (cat_item_from_tab == "0") {
				product_wrap.find('li.product').show();
			} else {
				product_wrap.find('li.product').hide();
				product_wrap.find('li.product').find('.ae-woo-block-wrap.' + cat_class).closest('li.product').show();
			}

		},
		initAccessibility: function () {
			var main_menu_container = $('.main-navigation #primary-menu');
			var special_menu_container = $('.special-menu-container');
			main_menu_container.find('li.menu-item').focusin(function () {
				if (!$(this).hasClass('focus')) {
					$(this).addClass('focus');
				}
			});
			main_menu_container.find('li.menu-item').focusout(function () {
				$(this).removeClass('focus');

			});
			special_menu_container.find('li.menu-item.menu-item-has-children').focusin(function () {
				if (!$(this).hasClass('focus')) {
					$(this).addClass('focus');
				}
			});
			special_menu_container.find('li.menu-item.menu-item-has-children').focusout(function () {
				$(this).removeClass('focus');

			});
		}

	};
	$(function () {
		AgencyEcommerceThemeLib.init();
	});
})(jQuery);
