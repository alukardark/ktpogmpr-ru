$(function(){

	// CUSTOM COLLAPSE
	$('*[data-toggle=ms-collapse]').each(function(index, el) {
		var $this = $(this);

		$this.on("click", function() {
			$this.toggleClass('collapsed');
			$($this.attr('href')).toggleClass('opened');
			return false;
		});
	});

	// MENU
	$(document).on("mouseenter", ".side-menu-dropdown li, .menubar .menu li", function() {
		var $this = $(this);
		var leaveTimer = $(this).data("leaveTimer") || 0;
		var enterTimer = $(this).data("enterTimer") || 0;
		clearTimeout(leaveTimer);
		clearTimeout(enterTimer);

		enterTimer = setTimeout(function() {
			$this.addClass("hover").siblings().removeClass("hover");
		}, 50);
		$(this).data("enterTimer", enterTimer);
	});

	$(document).on("mouseleave", ".side-menu-dropdown li, .menubar .menu li", function() {
		var $this = $(this);
		var enterTimer = $(this).data("enterTimer") || 0;
		var leaveTimer = $(this).data("leaveTimer") || 0;
		clearTimeout(enterTimer);
		clearTimeout(leaveTimer);

		if(!$this.hasClass('hassub') && !$this.parents('li').hasClass('hassub')){
			$this.removeClass("hover rtl sub_l");
		}
		else{
			leaveTimer = setTimeout(function() {
				$this.removeClass("hover rtl sub_l");
			}, 300);
		}

		$(this).data("leaveTimer", leaveTimer);
	});

	$(".menubar .search-toggle").on("mouseenter", function() {
		$('.menubar li').removeClass('hover');
	});

	// SIDE MENU
	// $(".side-menu-dropdown").on("mouseenter", function() {
	// 	var leaveTimer = $('.main').data("leaveTimer") || 0;
	// 	clearTimeout(leaveTimer);
	// 	$(this).closest('.main').addClass('hover-z');
	// });
	//
	// $(".side-menu-dropdown").on("mouseleave", function() {
	// 	var leaveTimer = $('.main').data("leaveTimer") || 0;
	// 	leaveTimer = setTimeout(function() {
	// 		$('.main').removeClass('hover-z');
	// 	}, 300);
	// 	$('.main').data("leaveTimer", leaveTimer);
	// });

	if(is_touch_device()){
		$('.side-menu-dropdown').removeClass('side-menu-dropdown').addClass('side-menu-accordion');
	}

	$('.side-menu-accordion > li.hassub').each(function(){
		if($(this).hasClass('active') || $(this).find('.active').length){
			$(this).addClass('opened');
		}
		else{
			$(this).addClass('closed');
		}
	});

	$(".side-menu-accordion > li.hassub > .link .js_sub_toggle").on("click", function() {
		var self = $(this);
		var li = self.closest('li');

		if(li.hasClass('closed')){
			li.removeClass('closed').addClass('opened hover');
		}
		else{
			li.removeClass('opened hover').addClass('closed');
		}
	});


	// HORIZONTAL MENU
	$('.menubar .js_sub_toggle').on('click', function() {
		$(this).closest('li').toggleClass('open');
	});

	$('.menubar .link > a[href=#]').on('click', function() {
		return false;
	});

	function menuInit() {
		var mWrap = $('.menubar .menu-wrapper');
		var mWrapIn = $('.menubar .menu-wrapper-in');
		var m = $('.menubar .menu');
		var me = m.find('> li:not(.menu-more)');
		var mMore = m.find('> .menu-more');
		var mMoreMenu = mMore.find('> .submenu > ul');

		function getMenuItemsWidth() {
			var totalMenuWidth = 0;
			me.filter(':not(:last)').each(function() {
				totalMenuWidth = totalMenuWidth + $(this).outerWidth();
			});
			return totalMenuWidth;
		}

		mMore.find('.link a').on('click', function(e) {
			e.preventDefault();
		});

		// clone menu to MORE
		me.clone().appendTo(mMoreMenu);
		var mme = mMoreMenu.find('>li');
		mme.addClass('hidden');

		function menuMore(){

			me.removeClass('hidden');
			mme.addClass('hidden');

			var mww = mWrapIn.width();
			var mw = m.width();

			if(mww < mw){
				mMore.removeClass('hidden');
				$(me.get().reverse()).each(function(i){
					var mww = mWrapIn.width() - mMore.width();
					var mw = m.width() - mMore.width();
					// console.log('i: ', i);
					// console.log('mWrapIn.width(): ', mWrapIn.width());
					// console.log('mww: ', mww);
					//
					//
					// console.log('m: ', m.width());
					// console.log('mMore: ', mMore.width());
					// console.log('mw: ', mw);

					if(mww < mw){
						$(this).addClass('hidden');

						$(mme.get().reverse()).eq(i).removeClass('hidden');
					}
				});
			}
			else{
				mMore.addClass('hidden');
			}
			// console.log('init');
			$('.menubar').addClass('initialized');
		}
		menuMore();


		function menuRtl() {
			// level 1 submenu
			m.find('>li.hassub').on("mouseenter", function() {
				elLeft = $(this).offset().left;
				elWidth = $(this).width();
				subWidth = $(this).find('>.submenu').width();

				if (elLeft + subWidth > $(window).width()) {
					// sub on full width
					if (elLeft + elWidth < subWidth) {
						$(this).addClass('sub_l').find('>.submenu').css('top', $(this).position().top + $(this).height());
					}
					// sub RTL
					else {
						$(this).addClass('rtl');
					}
				}
			});

			// level 2 submenu
			m.find('> li .submenu > ul > li.hassub').on({
				mouseenter: function() {
					elLeft = $(this).offset().left;
					elWidth = $(this).width();
					subWidth = $(this).find('>.submenu').width();

					if (elLeft + elWidth + subWidth > $(window).width()) {
						$(this).addClass('rtl');
					}
				},
				mouseleave: function() {
					//  $(this).removeClass('rtl');
				}
			});
		}
		menuRtl();

		function menuActive(){

			if (window.matchMedia("screen and (max-width: 767px)").matches) {
				m.find('li.active').parents('li').addClass('open');
				m.find('li.active.hassub').addClass('open');
			}

		}
		menuActive();

		$(window).smartresize(function(){
			menuMore();
			menuRtl();
			// menuActive();
		});

		$(document).on('m_fixed_menu', function(){
			menuMore();
			menuRtl();
		});

		$(document).on('wf-active', function(){
			menuMore();
		});

		// MENU
		// $(".side-menu-dropdown li, .menubar .menu li").on("mouseenter", function() {
		// 	var $this = $(this);
		//
		// 	var leaveTimer = $this.data("leaveTimer") || 0;
		// 	var enterTimer = $this.data("enterTimer") || 0;
		// 	clearTimeout(leaveTimer);
		// 	clearTimeout(enterTimer);
		//
		// 	enterTimer = setTimeout(function() {
		// 		$this.addClass("hover").siblings().removeClass("hover");
		// 	}, 50);
		// 	$this.data("enterTimer", enterTimer);
		// });
		//
		// $(".side-menu-dropdown li, .menubar .menu li").on("mouseleave", function() {
		// 	var $this = $(this);
		// 	var enterTimer = $this.data("enterTimer") || 0;
		// 	var leaveTimer = $this.data("leaveTimer") || 0;
		// 	clearTimeout(enterTimer);
		// 	clearTimeout(leaveTimer);
		//
		// 	if(!$this.hasClass('hassub') && !$this.parents('li').hasClass('hassub')){
		// 		$this.removeClass("hover rtl sub_l");
		// 	}
		// 	else{
		// 		leaveTimer = setTimeout(function() {
		// 			$this.removeClass("hover rtl sub_l");
		// 		}, 300);
		// 	}
		//
		// 	$this.data("leaveTimer", leaveTimer);
		// });
	}
	menuInit();
});
