<!--<div class="header-video">-->
<!--	<div class="header__video-wrapp">-->
<!--		<div class="header__video-box">-->
<!--			<button class="togglePlay"-->
<!---->
<!--			></button>-->
<!--			<video id="myVideo" class="header__video "   loop autoplay poster="--><?//=SITE_TEMPLATE_PATH?><!--/video/logo.gif" type="video/mp4">-->
<!--				<source src="--><?//=SITE_TEMPLATE_PATH?><!--/video/logo.mp4">-->
<!--			</video>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<script>-->
<!--	$(document).ready(function() {-->
<!--		var x = 0;-->
<!--		$('.togglePlay, .header__video').click(function(){-->
<!--			if(x == 0){-->
<!--				$('.togglePlay').removeClass('toggle-Play').addClass('toggle-Pause');-->
<!--				x = 1;-->
<!--			}else{-->
<!--				$('.togglePlay').removeClass('toggle-Pause').addClass('toggle-Play');-->
<!--				x = 0;-->
<!--			}-->
<!--		});-->
<!--		//device.js-->
<!--		if(device.tablet() && device.mobile()) {-->
<!--			$(".header-video").css('display','none');-->
<!--		};-->
<!---->
<!--	});-->
<!--</script>-->
<div data-height="460" class="homeslider js_homeslider">
	<div class="slick-slider">

		<div id="bgndVideo" class="player"
			 data-property="{
			 	quality: 'large',
				align: 'center',
				videoURL:'https://www.youtube.com/watch?v=XFX8uTCyJkA',
				containment:'.homeslider',
				autoPlay:true,
				loop: true,
				mute:true,
				startAt:0,
				opacity:1,
				showControls : false,
				showYTLogo: false,
				addRaster: false,
				stopMovieOnBlur: false
			}">
			<!--			videoURL:'https://www.youtube.com/watch?v=9uFkOWdGxMw',-->
		</div>
		<div class="wrapAllVideo"  onclick="$('#bgndVideo').YTPTogglePlay()" style="width: 100%; height: 100%;">

		</div>
		<button class="togglePlay" onclick="$('#bgndVideo').YTPTogglePlay()"></button>

	</div>
</div>

<script>
	$(document).ready(function() {
		$(".player").YTPlayer();
		var x = 0;
		$('.wrapAllVideo, .togglePlay').click(function(){
			if(x == 0){
				$('.togglePlay').removeClass('toggle-Play').addClass('toggle-Pause');
				x = 1;
			}else{
				$('.togglePlay').removeClass('toggle-Pause').addClass('toggle-Play');
				x = 0;
			}
		});
		//device.js
		if(!device.tablet() && !device.mobile()) {
			$(".player").YTPlayer();
		} else {
			$(".block-video").css('display','none');
		};

		$('#bgndVideo').on("YTPReady",function(e){
			$('.wrapAllVideo').css('pointer-events', 'auto');
			$('.togglePlay').css('visibility', 'visible');
		});
	});
</script>
<?//$APPLICATION->IncludeComponent(
//	"bitrix:news.list",
//	"home_slider",
//	Array(
//		"ACTIVE_DATE_FORMAT" => "j F Y",
//		"ADD_SECTIONS_CHAIN" => "N",
//		"AJAX_MODE" => "N",
//		"AJAX_OPTION_ADDITIONAL" => "",
//		"AJAX_OPTION_HISTORY" => "N",
//		"AJAX_OPTION_JUMP" => "N",
//		"AJAX_OPTION_STYLE" => "Y",
//		"CACHE_FILTER" => "N",
//		"CACHE_GROUPS" => "Y",
//		"CACHE_TIME" => "36000000",
//		"CACHE_TYPE" => "A",
//		"CHECK_DATES" => "Y",
//		"DETAIL_URL" => "",
//		"DISPLAY_BOTTOM_PAGER" => "N",
//		"DISPLAY_DATE" => "Y",
//		"DISPLAY_NAME" => "Y",
//		"DISPLAY_PICTURE" => "Y",
//		"DISPLAY_PREVIEW_TEXT" => "N",
//		"DISPLAY_TOP_PAGER" => "N",
//		"FIELD_CODE" => array("PREVIEW_PICTURE","DETAIL_PICTURE",""),
//		"FILTER_NAME" => "",
//		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
//		"IBLOCK_ID" => "17",
//		"IBLOCK_TYPE" => "content",
//		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
//		"INCLUDE_SUBSECTIONS" => "Y",
//		"MESSAGE_404" => "",
//		"NEWS_COUNT" => "20",
//		"PAGER_BASE_LINK_ENABLE" => "N",
//		"PAGER_DESC_NUMBERING" => "N",
//		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
//		"PAGER_SHOW_ALL" => "N",
//		"PAGER_SHOW_ALWAYS" => "N",
//		"PAGER_TEMPLATE" => "",
//		"PAGER_TITLE" => "Новости",
//		"PARENT_SECTION" => "",
//		"PARENT_SECTION_CODE" => "",
//		"PREVIEW_TRUNCATE_LEN" => "",
//		"PROPERTY_CODE" => array("TEXT_COLOR","TEXT_BACKGROUND_COLOR","POSITION","TEXT_ANIMATION","ADD_PHOTO_POSITION","ADD_PHOTO_ANIMATION","BUTTON1_TEXT","BUTTON1_URL","BUTTON1_CLASS","BUTTON2_TEXT","BUTTON2_URL","BUTTON2_CLASS","SLIDE_OVERLAY","ADD_PHOTO",""),
//		"SET_BROWSER_TITLE" => "N",
//		"SET_LAST_MODIFIED" => "N",
//		"SET_META_DESCRIPTION" => "N",
//		"SET_META_KEYWORDS" => "N",
//		"SET_STATUS_404" => "N",
//		"SET_TITLE" => "N",
//		"SHOW_404" => "N",
//		"SORT_BY1" => "SORT",
//		"SORT_BY2" => "ACTIVE_FROM",
//		"SORT_ORDER1" => "ASC",
//		"SORT_ORDER2" => "DESC"
//	)
//);?>
