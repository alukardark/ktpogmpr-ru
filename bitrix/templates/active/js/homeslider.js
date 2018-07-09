$(function(){
	// HOME SLIDER
	var homeSlider = $('.homeslider .slick-slider');

	var hsWidth = 1150;
	var hsHeight = $('.homeslider').attr('data-height');
	var hsRatio = hsWidth / hsHeight;

	var homeSliderSettingsDefaults = {
		// fade: true,
		autoplay: false,
		autoplaySpeed: 4000,
		speed: 600,
		touchThreshold: 20,
		mobileFirst: true,
		dots: true,
		prevArrow: '<a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a>',
		nextArrow: '<a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>',
		infinite: true,
		slide: 'div.item',
		draggable: false,
		useCSS: true,
		cssEase: 'ease',
		easing: 'ease'
	};

	var homeSliderSettings;


	function hsSetSize(){
		var wWidth = $(window).width();
		var newOuterHeight = $(document).width() / hsRatio;
		var newHeight = $(document).width() / hsRatio;
		var scale = (newHeight / hsHeight);

		var hsItem = $('.homeslider .item');
		var hsItemIn = $('.homeslider .item-in');

		var hsDots = $('.homeslider .slick-dots');


		if(wWidth < hsWidth){
			homeSlider.height(newOuterHeight);
			hsItem.height(newOuterHeight);
			var width;

			if(window.matchMedia("screen and (max-width: 767px)").matches){
				width = 1150 - (30 / scale) + 'px';
			}
			else{
				width = 1150 - (160 / scale) + 'px';
			}
			hsItemIn.css({
				width: width,
				height: hsHeight,
				transform: "translate(-50%, -50%) " + "scale(" + scale + ")"
			});

			hsDots.css({transform: "scale(" + scale + ")"});
		}
		else{
			homeSlider.height(hsHeight);
			hsItem.height(hsHeight);

			hsItemIn.css({
				width: "",
				height: "",
				transform: ""
			});

			hsDots.css({transform: ""});
		}
	}

	if (homeSlider.length) {



		// var homeSliderSettingsCustom = {
		// 	autoplay: false,
		// 	autoplaySpeed: 4000,
		// 	speed: 600,
		// 	fade: true,
		// };
		// var homeSliderSettingsCustom = {
		// 	autoplay: false,
		// 	autoplaySpeed: 4000,
		// 	speed: 600,
		// 	fade: true,
		// };

		if((typeof homeSliderSettingsCustom != 'undefined')){
			homeSliderSettings = $.extend({}, homeSliderSettingsDefaults, homeSliderSettingsCustom);
		}
		else{
			homeSliderSettings = homeSliderSettingsDefaults;
		}

		homeSlider.on('init', function() {
			homeSlider.find('div[data-slick-index=0]').addClass('slide-animate');
		});

		homeSlider.on('afterChange', function(event, slick, currentSlide) {
			homeSlider.find('div[data-slick-index=' + currentSlide + ']').css('z-index', '1').siblings().css('z-index', '');
			homeSlider.find('div[data-slick-index=' + currentSlide + ']').addClass('slide-animate').siblings().removeClass('slide-animate');
		});

		homeSlider.slick(homeSliderSettings);

		hsSetSize();

		$(window).smartresize(function(){
			hsSetSize();
		});
	}

});
