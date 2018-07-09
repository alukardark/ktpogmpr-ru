function is_touch_device() {
	return (('ontouchstart' in window) || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0));
}

function throttle(fn, wait) {
	var time = Date.now();
	return function() {
		if ((time + wait - Date.now()) < 0) {
			fn();
			time = Date.now();
		}
	};
}

function itemsSliderResponsive(prerow, container) {
	if (!container) {
		if ($('.with-sidebar').length) {
			container = 820;
		} else {
			container = 1200;
		}
	}

	var slideWidth = prerow / container;
	var psResponsive = [
		// {
		// 	breakpoint: 1199,
		// 	settings: {
		// 		slidesToShow: prerow,
		// 		slidesToScroll: prerow,
		// 	}
		// }, {
		// 	breakpoint: 991,
		// 	settings: {
		// 		slidesToShow: Math.ceil(992 * slideWidth),
		// 		slidesToScroll: Math.ceil(992 * slideWidth),
		// 	}
		// }, {
		// 	breakpoint: 767,
		// 	settings: {
		// 		slidesToShow: Math.ceil(768 * slideWidth),
		// 		slidesToScroll: Math.ceil(768 * slideWidth),
		// 	}
		// }, {
		// 	breakpoint: 599,
		// 	settings: {
		// 		slidesToShow: Math.ceil(600 * slideWidth),
		// 		slidesToScroll: Math.ceil(600 * slideWidth),
		// 	}
		// }, {
		// 	breakpoint: 479,
		// 	settings: {
		// 		slidesToShow: Math.ceil(480 * slideWidth),
		// 		slidesToScroll: Math.ceil(480 * slideWidth),
		// 	}
		// }, {
		// 	breakpoint: 319,
		// 	settings: {
		// 		slidesToShow: Math.ceil(320 * slideWidth),
		// 		slidesToScroll: Math.ceil(320 * slideWidth),
		// 	}
		// }, {
		// 	breakpoint: 0,
		// 	settings: {
		// 		slidesToShow: 1,
		// 		slidesToScroll: 1,
		// 		speed: 250
		// 	}
		// }
		{
			breakpoint: 1199,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 4,
			}
		},
		{
			breakpoint: 1170,
			settings: {
				slidesToShow: Math.ceil(992 * slideWidth),
				slidesToScroll: Math.ceil(992 * slideWidth),
			}
		},
		{
			breakpoint: 900,
			settings: {
				slidesToShow: Math.ceil(768 * slideWidth),
				slidesToScroll: Math.ceil(768 * slideWidth),
			}
		},
		{
			breakpoint: 599,
			settings: {
				slidesToShow: Math.ceil(600 * slideWidth),
				slidesToScroll: Math.ceil(600 * slideWidth),
			}
		},
		{
			breakpoint: 479,
			settings: {
				slidesToShow: Math.ceil(320 * slideWidth),
				slidesToScroll: Math.ceil(320 * slideWidth),
			}
		},
		{
			breakpoint: 0,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				speed : 250
			}
		}
	];

	return psResponsive;
}

function itemsSliderInit(el) {
	$(el).filter(':visible').each(function() {
		var self = $(this);
		var slider = self.find('.slider');
		var sliderNews = self.find('.my-news');
		var maxItems = slider.data('per-row');
		var sliderFilter = self.prev('.slider-filter');

		sliderNews.slick({
			speed: 400,
			touchThreshold: 20,
			mobileFirst: true,
			prevArrow: self.find('.slick-prev'),
			nextArrow: self.find('.slick-next'),
			infinite: false,
			slide: '.item',
			draggable: false,
			responsive: [
				{
					breakpoint: 1199,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
					}
				},
				{
					breakpoint: 479,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
					}
				},
				{
					breakpoint: 0,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}

			],
			useCSS: true,
			cssEase: 'ease',
			easing: 'easeInOutCubic'
		});

		if (slider.hasClass('slick-initialized')) {
			slider.slick('setPosition');
		} else {
			slider.slick({
				speed: 400,
				touchThreshold: 20,
				mobileFirst: true,
				prevArrow: self.find('.slick-prev'),
				nextArrow: self.find('.slick-next'),
				infinite: false,
				slide: '.item',
				draggable: false,
				responsive: itemsSliderResponsive(maxItems),
				useCSS: true,
				cssEase: 'ease',
				easing: 'easeInOutCubic'
			});
		}





		if (sliderFilter) {
			var hpf = 'all';
			sliderFilter.find('a').on('click', function() {
				var category = $(this).attr('data-category');
				if (!$(this).hasClass('active')) {
					sliderFilter.find('a').removeClass('active');

					if (category == 'all') {
						slider.slick('slickUnfilter');
						hpf = 'all';
					} else {
						slider.slick('slickUnfilter');
						slider.slick('slickFilter', '.category-' + category);
						hpf = category;
					}
					$(this).addClass('active');
				}
				return false;
			});
		}
	});
}

$(document).ready(function() {




$('.rss').hover(function(){
	$('.rss').toggleClass('opac');
});













	if (is_touch_device()) {
		$('html').addClass('touch');
	} else {
		$('html').addClass('no-touch');
	}

	function homeFacts() {
		var hbfTop = $('.home-block-facts').offset().top;
		var winScroll = $(window).scrollTop() + $(window).height();

		if (winScroll >= hbfTop) {
			$('.home-block-facts .count').each(function() {
				if (!$(this).hasClass('ready')) {

					$(this).addClass('ready');
					$(this).prop('Counter', 0).animate({
						Counter: $(this).attr('data-count')
					}, {
						duration: 600,
						easing: 'swing',
						step: function(now) {
							$(this).text(Math.ceil(now));
						}
					});
				}
			});
		}
	}

	if ($('.home-block-facts').length) {
		homeFacts();
		$(window).on('scroll', throttle(homeFacts, 100));
	}

	// TABS
	$('.ms-tabs .tabs-ctrl a').on('click', function() {
		if (!$(this).hasClass('active')) {
			$(this).addClass('active').siblings().removeClass('active');
			$(this).tab('show');
		}
		return false;
	});

	$('.ms-tabs .tabs-ctrl a').on('shown.bs.tab', function(event) {
		var activeTab = $(event.target).attr('href');
		var slider = $(activeTab + ' .content-slider');
		itemsSliderInit(slider);
	});


	// ITEMS SLIDERS
	itemsSliderInit('.products-slider');
	itemsSliderInit('.items-list-slider');

	// SIDE BANNER
	$('.side-banner .slider').each(function() {
		var self = $(this);
		var initial = Math.floor(Math.random() * self.find('.item').length);

		self.slick({
			initialSlide: initial,
			fade: true,
			autoplay: false,
			autoplaySpeed: 4000,
			speed: 250,
			touchThreshold: 20,
			mobileFirst: true,
			dots: true,
			arrows: true,
			prevArrow: '<a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a>',
			nextArrow: '<a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>',
			infinite: true,
			slide: 'div.item',
			draggable: false,
			useCSS: true,
			cssEase: 'ease',
			easing: 'easeInOutCubic'
		});
	});

	// $(document).on('click', function(e){
	// 	if($('.search-dropdown.active').length){
	// 		if (!$(e.target).is('.search-dropdown') && !$(e.target).parents('.search-dropdown').length) {
	// 			$('.top-panel .js-search-toggle').click();
	// 		}
	// 	}
	// });

	// MENU SEARCH TOGGLE
	$('.search-toggle').on('click', function(e) {
		e.preventDefault();
		$(this).toggleClass('active');
		// $('.search-dropdown').toggleClass('active').toggle();
		$('.search-dropdown').toggleClass('active');
	});


	// MOBILE TOGGLES
	$('.mobile-search-toggle').on('click', function() {
		$(this).toggleClass('active');
		$('.mobile-menu-toggle').removeClass('active');
		// $('.menubar .menu-wrapper').removeClass('active').hide();
		// $('.mobile-search').toggleClass('active').toggle();
		$('.menubar .menu-wrapper').removeClass('active');
		$('.mobile-search').toggleClass('active');

		return false;
	});

	$('.mobile-menu-toggle').on('click', function() {
		$(this).toggleClass('active');
		$('.mobile-search-toggle').removeClass('active');
		// $('.mobile-search').removeClass('active').hide();
		// $('.menubar .menu-wrapper').toggleClass('active').toggle();
		$('.mobile-search').removeClass('active');
		$('.menubar .menu-wrapper').toggleClass('active');

		return false;
	});

	// SCROLL TO TOP BUTTON
	$(document).on('scroll', function() {
		var doc = document.documentElement;
		var top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

		if (top > 350) {
			$('#f_up').addClass('show');
		} else {
			$('#f_up').removeClass('show');
		}
	});

	$('#f_up').on('click', function() {
		$('html, body').animate({
			scrollTop: 0
		}, 600);

		return false;
	});


	// FIXED PANEL
	var headerH = $('#header').height();

	function fixedHeader() {
		if (!headerH) {
			headerH = $('#header').height();
		}
		var doc = document.documentElement;
		var scrollTop = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
		var offsetTop = $('.top-panel').height() + (headerH * 2);
		var $body = $('body');
		// var $target = $('#header');
		var $placeholder = $('.header-placeholder');

		if (scrollTop > offsetTop) {
			$placeholder.css('height', headerH);
			$body.addClass('m_fixed_header');
		} else {
			$placeholder.css('height', '0');
			$body.removeClass('m_fixed_header');
		}
	}

	if ($('body').hasClass('s_fixed_header')) {
		if (!window.matchMedia("screen and (max-width: 767px)").matches) {
			fixedHeader();
		}

		// $(document).on('scroll', function() {
		// 	if (window.matchMedia("screen and (min-width: 768px)").matches) {
		// 		fixedHeader();
		// 	}
		// });

		$(window).on('scroll', function() {
			if (window.matchMedia("screen and (min-width: 768px)").matches) {
				fixedHeader();
			}
		});

		$(window).smartresize(function() {
			if (window.matchMedia("screen and (max-width: 767px)").matches) {
				$('.header-placeholder').css('padding-top', '0');
				$('body').removeClass('m_fixed_header');
			} else {
				fixedHeader();
			}
		});
	}

	// FIXED MENU
	function fixedMenu() {
		var doc = document.documentElement;
		var scrollTop = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
		var offsetTop = $('.menubar-placeholder').offset().top + 68;
		var $body = $('body');
		var $placeholder = $('.menubar-placeholder');

		if (scrollTop > offsetTop) {
			if (!$body.hasClass('m_fixed_menu')) {
				$body.addClass('m_fixed_menu');
				$placeholder.css('height', $('.menubar').outerHeight());
			}
		} else {
			if ($body.hasClass('m_fixed_menu')) {
				$body.removeClass('m_fixed_menu');
				$placeholder.css('height', '0');
			}
		}
	}

	if ($('.s_fixed_menu').length) {
		if (!window.matchMedia("screen and (max-width: 767px)").matches) {
			fixedMenu();
		}

		$(document).on('scroll', function() {
			if (window.matchMedia("screen and (min-width: 768px)").matches) {
				fixedMenu();
			}
		});
	}

	// GALLERY
	$('.gallery').each(function() {
		$(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			closeBtnInside: true,
			titleSrc: 'title',
			overflowY: 'hidden',
			gallery: {
				preload: [0, 2],
				enabled: true
			},
			callbacks: {
				beforeOpen: function() {
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = 'mfp-zoom-in';
				}
			}
		});
	});

	// IMAGES ON PAGE
	$('.img-zoom').magnificPopup({
		type: 'image',
		closeBtnInside: true,
		titleSrc: 'title',
		overflowY: 'hidden',
		callbacks: {
			beforeOpen: function() {
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				this.st.mainClass = 'mfp-zoom-in';
			}
		}
	});

	// ACCORDION
	$('.block-accordion').on('show.bs.collapse', function() {
		$('.block-accordion').find('.collapse.in').collapse('hide');
	});

	$('.home-questions').on('show.bs.collapse', function() {
		$('.home-questions .item-title').toggleClass('active');
	});

	// CATALOG SELECT VIEW
	$('.select_view .btn').on('click', function() {
		window.location = $(this).attr('data-href');
	});

});
