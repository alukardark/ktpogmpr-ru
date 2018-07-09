$(document).ready(function(){
	var tc = $('#theme_changer');
	var tcIn = $('#theme_changer_in');
	var tct = $('#tc_toggle');

	// COLOR PICKER
	$(".colorpicker_input").each(function() {
		var self = $(this);
		var parent = self.closest('.tc_color');

		self.spectrum({
			showInput: true,
			preferredFormat: "hex",
			showInitial: true,
			// appendTo: $('#theme_changer'),
			appendTo: parent,
			show: function(color){
				parent.find('.sp-choose').on('click', function(){
					var request = "/?" + self.attr('data-id') + "=" + encodeURIComponent(self.val());
					if(self.attr('data-id') == 'CUSTOM_COLOR'){
						request += '&USE_CUSTOM_COLOR=Y';
						$.get(request, function( data ) {
							window.location.reload();
						});
					}
					else{
						$.get(request, function( data ) {
							window.location.reload();
						});
					}
				});
			}
		});
	});

	function placeOnScreen(){

		tcH = tcIn.outerHeight();

		if($(window).height() >= tcH){
			// middle of screen
			tc.css('margin-top','-' + tcH / 2 + 'px');
			tc.removeClass('tc_fullheight');
		}
		else{
			// full height of screen
			tc.addClass('tc_fullheight');
			tc.removeAttr( 'style' );
		}

	}


	tct.on('click',function(){
		tc.toggleClass('tc_hidden');
		if(tc.hasClass('tc_hidden')){
			$.cookie("tc","hide",{path: '/'});
		}
		else{
			$.cookie("tc","show",{path: '/'});
		}
	});

	$('.tc_title').on('click', function(){
		var parent = $(this).closest('.tc_section');

		parent.toggleClass('open');

		parent.find('.tc_content').slideToggle(250, function() {
			placeOnScreen();
		});
	});


	// tc_select_colors
	tc.find('.tc_select_colors a').on('click', function() {
		var parent = $(this).parents('.tc_select_colors');
		var reload = true;

		var request = $(this).attr('href');

		// if custom color not reload
		if(parent.find('.active').length){

			$('#color_theme_css').attr('href', templatePath + '/themes/' + $(this).attr('data-color') + '/theme.css');

			$(this).parent().addClass('active').siblings().removeClass('active');

			reload = false;
		}
		else{
			$('#tc_custom_color').removeClass('active');

			$(this).parent().addClass('active');
			request += '&USE_CUSTOM_COLOR=N';
		}

		$.get( encodeURI(request), function( data ) {
			if(reload){
				window.location.reload();
			}
		});

		return false;
	});


	// TC_SELECT
	tc.find('.tc_select a').on('click', function() {
		var parent = $(this).parents('.tc_select');
		var reload = true;

		if(parent.hasClass('tc_select_colors')){
			$('#color_theme_css').attr('href', templatePath + '/themes/' + $(this).attr('data-color') + '/theme.css');

			// if custom color not reload
			if(parent.find('.active').length){
				reload = false;
			}
		}

		$(this).parent().addClass('active').siblings().removeClass('active');

		$.get( encodeURI($(this).attr('href')), function( data ) {
			if(reload){
				window.location.reload();
			}
		});

		return false;
	});

	placeOnScreen();
	tc.addClass('init');

	$(window).resize(function(){
		placeOnScreen();
	});



	// SELECT
	var select = tc.find('select');
	select.on('change',function () {
		var selected = $(this).find(':selected');
		var newBgRequest = selected.data('url');

		if($(this).is('#boxed_texture')){
			$('body').css('background-image', 'url("'+templatePath+'/img/bg_tex/'+ selected.attr('data-img') +'")');
		}

		if($(this).is('#boxed_image')){
			$('body').css('background-image', 'url("'+templatePath+'/img/bg_img/'+ selected.attr('data-img') +'")');
		}

		if($(this).is('#page_heading_texture')){
			$('.page-heading').css('background-image', 'url("'+templatePath+'/img/bg_tex/'+ selected.attr('data-img') +'")');
		}

		if($(this).is('#page_heading_image')){
			$('.page-heading').css('background-image', 'url("'+templatePath+'/img/bg_img/'+ selected.attr('data-img') +'")');
		}



		$.get( encodeURI(newBgRequest), function( data ) {
			// window.location.reload();
		});

	});


	// CHECKBOX
	tc.find('.tc_checkboxes .link').on('click', function(e) {

		var parent = $(this).closest('.tc_checkboxes');
		var reload = true;
		// var li = $(this).parent();
		// var checkbox = $(this).find('input[type=checkbox]');

		// if(li.hasClass('active')){
		// 	li.removeClass('active');
		// 	checkbox.prop('checked', false);
		// }
		// else{
		// 	li.addClass('active');
		// 	checkbox.prop('checked', true);
		// }

		$.get( encodeURI($(this).attr('data-href')), function( data ) {
			if(reload){
				window.location.reload();
			}
		});
		e.preventDefault();
	});

});
