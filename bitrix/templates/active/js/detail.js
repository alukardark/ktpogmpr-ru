$(document).ready(function() {
	var pmi = $('.detail-main-image');
	var pmiImg = pmi.find('img');
	var pts = $('.detail-thumbs-slider');
	var ptsMaxIndex = $('.detail-thumbs-slider .image').length - 1;

	// THUMBS SLIDER
	pts.slick({
		speed: 200,
		touchThreshold: 20,
		mobileFirst: true,
		prevArrow: '<a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a>',
		nextArrow: '<a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>',
		infinite: false,
		draggable: false,
		// responsive: itemsSliderResponsive(pts.data('per-row'))
		responsive: [{
			breakpoint: 1199,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		}, {
			breakpoint: 991,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		}, {
			breakpoint: 767,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		}, {
			breakpoint: 599,
			settings: {
				slidesToShow: 6,
				slidesToScroll: 6,
			}
		}, {
			breakpoint: 479,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 5,
			}
		}, {
			breakpoint: 319,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		}, {
			breakpoint: 0,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				speed: 250
			}
		}]
	});

	// CHANGE MAIN IMAGE
	function setMainImg(index) {
		var current = pts.find('.image[data-slick-index="' + index + '"]');
		var href = current.find('a').attr('href');
		pts.find('.image').removeClass('active');
		current.addClass('active');
		pmi.find(".switching-image").show();

		$('<img>').attr('src', href).load(function() {
			pmiImg
				.attr({
					'src': href,
					'data-img-index': index
				});
			pmi.find(".switching-image").hide();
		}).each(function() {
			if (this.complete) {
				$(this).trigger("load");
			}
		});
		$('.main-img-current').html(parseInt(index) + 1);
		pmiImg.parent().attr('href', href);
	}

	$(document).on('click', '.detail-thumbs-slider .image a', function() {
		var index = $(this).parent().attr('data-slick-index');
		setMainImg(index);
		return false;
	});

	// PREV
	$(document).on('click', '.detail-main-image .arrow-prev', function() {
		var currentIndex = parseInt(pmiImg.attr('data-img-index'));
		var newIndex = currentIndex - 1;
		if (newIndex >= 0) {
			pts.slick('slickGoTo', parseInt(newIndex));
			setMainImg(newIndex);
		} else {
			pts.slick('slickGoTo', parseInt(ptsMaxIndex));
			setMainImg(ptsMaxIndex);
		}
	});

	// NEXT
	$(document).on('click', '.detail-main-image .arrow-next', function() {
		var currentIndex = parseInt(pmiImg.attr('data-img-index'));
		var newIndex = currentIndex + 1;
		if (newIndex <= ptsMaxIndex) {
			pts.slick('slickGoTo', parseInt(newIndex));
			setMainImg(newIndex);
		} else {
			pts.slick('slickGoTo', parseInt(0));
			setMainImg(0);
		}
	});

	// OPEN GALLERY POPUP
	$(document).on('click', '.detail-main-image a.image', function() {
		var startIndex = parseInt(pts.find('.active').attr('data-slick-index'));
		$.magnificPopup.open({
			items: productGallery,
			type: 'image',
			gallery: {
				enabled: true,
				preload: [0, 2],
				navigateByImgClick: true,
			},
			closeBtnInside: true,
			callbacks: {
				beforeOpen: function() {
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = 'mfp-zoom-in';
				}
			}
		}, startIndex);

		return false;
	});

	function scrollToTab(tabId) {
		if ($(tabId).length) {
			var tpHeight = $('.s_top_panel_fixed .top-panel').height();
			var minusOffsetTop = tpHeight !== null ? tpHeight : 0;

			var el = $(tabId);
			var offsetTop;

			if (el.closest('.tab-content').length) {
				offsetTop = el.closest('.tab-content').offset().top;
			} else {
				offsetTop = $(tabId).offset().top;
			}

			$('html, body').animate({
				scrollTop: offsetTop - minusOffsetTop - 20
			}, 1000);
		}
	}

	$(document).on('click', '.all-specs-link', function() {
		$('.tabs-ctrl a[href="' + $(this).attr('href') + '"]').click();
		scrollToTab($(this).attr('href'));
	});

});
