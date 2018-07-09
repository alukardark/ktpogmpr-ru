<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<!--<div data-height="460" class="homeslider js_homeslider">-->
<!--	<div class="slick-slider">-->
<!---->
<!--		<div id="bgndVideo" class="player"-->
<!--			data-property="{-->
<!---->
<!--				videoURL:'https://www.youtube.com/watch?v=XFX8uTCyJkA',-->
<!--				containment:'.homeslider',-->
<!--				autoPlay:true,-->
<!--				loop: true,-->
<!--				mute:true,-->
<!--				startAt:0,-->
<!--				opacity:1,-->
<!--				showControls : false,-->
<!--				showYTLogo: false,-->
<!--				addRaster: false,-->
<!--				stopMovieOnBlur: false-->
<!--			}">-->
<!--<!--			videoURL:'https://www.youtube.com/watch?v=9uFkOWdGxMw',-->-->
<!--		</div>-->
<!--		<button-->
<!---->
<!--			class="togglePlay" onclick="$('#bgndVideo').YTPTogglePlay()"></button>-->

		<!--		--><?//foreach($arResult["ITEMS"] as $arItem):?>
		<!--			--><?//
		//			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		//			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		//			?>
		<!--			--><?//if($arItem["FIELDS"]["PREVIEW_PICTURE"] || $arItem["FIELDS"]["DETAIL_PICTURE"]) {?>
		<!--				--><?//
		//				if($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
		//					$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
		//				} elseif($arItem["FIELDS"]["DETAIL_PICTURE"]) {
		//					$picture = $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];
		//				}
		//
		//				if($arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE_XML_ID"] == "ltr") {
		//					$textPosition = "ltr";
		//				} elseif($arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE_XML_ID"] == "rtl") {
		//					$textPosition = "rtl";
		//				} elseif($arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE_XML_ID"] == "center") {
		//					$textPosition = "center";
		//				}
		//				?>
		<!--				<div class="item slide---><?//=$textPosition?><!--" style="background-image:url(--><?//=$picture?>
		<!--		)" id="-->
		<?//=$this->GetEditAreaId($arItem['ID']);?><!--">-->
		<!--					<div class="item-in">-->
		<!--						<div class="slide-text-->
		<!--						--><?//if($arItem["DISPLAY_PROPERTIES"]["TEXT_ANIMATION"]["VALUE"]):?><!--anim --><?//=$arItem["DISPLAY_PROPERTIES"]["TEXT_ANIMATION"]["VALUE_XML_ID"]?><!----><?//endif?><!--"-->
		<!--						style="--><?//if($arItem["DISPLAY_PROPERTIES"]["TEXT_COLOR"]["VALUE"]):?>
		<!--		color:-->
		<?//=$arItem["DISPLAY_PROPERTIES"]["TEXT_COLOR"]["VALUE"]?><!----><?//endif?><!--">-->
		<!--							<div class="in">-->
		<!--								<div class="in2" --><?//if($arItem["DISPLAY_PROPERTIES"]["TEXT_BACKGROUND_COLOR"]["VALUE"]):?><!--style="background: --><?//=$arItem["DISPLAY_PROPERTIES"]["TEXT_BACKGROUND_COLOR"]["VALUE"]?><!--"--><?//endif?><!-->
		<!--									<div class="title">--><?//=$arItem["NAME"]?><!--</div>-->
		<!--									<div class="text">-->
		<!--										--><?//=$arItem["PREVIEW_TEXT"]?>
		<!--									</div>-->
		<!--									<div class="btn-wrap">-->
		<!--										--><?//if($arItem["DISPLAY_PROPERTIES"]["BUTTON1_TEXT"]["VALUE"]):?>
		<!--											<a href="--><?//=$arItem["DISPLAY_PROPERTIES"]["BUTTON1_URL"]["VALUE"]?><!--" class="btn --><?//=$arItem["DISPLAY_PROPERTIES"]["BUTTON1_CLASS"]["VALUE_XML_ID"]?><!--">--><?//=$arItem["DISPLAY_PROPERTIES"]["BUTTON1_TEXT"]["VALUE"]?><!--</a>-->
		<!--										--><?//endif?>
		<!--										--><?//if($arItem["DISPLAY_PROPERTIES"]["BUTTON2_TEXT"]["VALUE"]):?>
		<!--											<a href="--><?//=$arItem["DISPLAY_PROPERTIES"]["BUTTON2_URL"]["VALUE"]?><!--" class="btn --><?//=$arItem["DISPLAY_PROPERTIES"]["BUTTON2_CLASS"]["VALUE_XML_ID"]?><!--">--><?//=$arItem["DISPLAY_PROPERTIES"]["BUTTON2_TEXT"]["VALUE"]?><!--</a>-->
		<?//endif?>
		<!--									</div>-->
		<!--								</div>-->
		<!--							</div>-->
		<!--						</div>-->
		<!--						--><?//if($arItem["DISPLAY_PROPERTIES"]["ADD_PHOTO"]["FILE_VALUE"]["SRC"]):?>
		<!--							<div class="slide-img --><?//if($arItem["DISPLAY_PROPERTIES"]["ADD_PHOTO_ANIMATION"]["VALUE"]):?><!--anim --><?//=$arItem["DISPLAY_PROPERTIES"]["ADD_PHOTO_ANIMATION"]["VALUE"]?><!----><?//endif?><!--">-->
		<!--								<div class="slide-img-in">-->
		<!--									<div style="-->
		<!--										background-image:url(-->
		<!--									--><?//=$arItem["DISPLAY_PROPERTIES"]["ADD_PHOTO"]["FILE_VALUE"]["SRC"]?>
		<!--										); background-position: center -->
		<?//=$arItem["DISPLAY_PROPERTIES"]["ADD_PHOTO_POSITION"]["VALUE_XML_ID"]?>
		<!--										;"class="slide-img-bg"></div>-->
		<!--								</div>-->
		<!--							</div>-->
		<?//endif?>
		<!--					</div>-->
		<!--					--><?//if($arItem["DISPLAY_PROPERTIES"]["SLIDE_OVERLAY"]["VALUE_XML_ID"] == "Y"):?>
		<!--						<a href="--><?//=$arItem["DISPLAY_PROPERTIES"]["BUTTON1_URL"]["VALUE"]?><!--" class="slide-overlay"></a>-->
		<!--					--><?//endif?>
		<!--				</div>-->
		<!--			--><?//}?>
		<!--		--><?//endforeach;?>
<!--	</div>-->
<!--</div>-->

<script>
	$(document).ready(function() {
		$(".player").YTPlayer();
		var x = 0;
		$('.togglePlay').click(function(){
			if(x == 0){
				$(this).removeClass('toggle-Play').addClass('toggle-Pause');
				x = 1;
			}else{
				$(this).removeClass('toggle-Pause').addClass('toggle-Play');
				x = 0;
			}
		});
		//device.js
		if(!device.tablet() && !device.mobile()) {
			$(".player").YTPlayer();
		} else {
			$(".block-video").css('display','none');
		};

	});
</script>
