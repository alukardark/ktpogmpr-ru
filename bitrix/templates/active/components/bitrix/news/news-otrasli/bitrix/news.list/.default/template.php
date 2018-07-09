<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<!--<div class="items-list clearfix items-view---><?//if($arParams["DISPLAY_VIEW_MODE"] !== "grid"):?><!--list--><?//else:?><!--grid--><?//endif?><!-- img-or-3x2 news-list">-->
<?


if($APPLICATION->GetCurDir() == "/press-center/"):?>


	<a href="<?=$arResult["ITEMS"][0]['SECTION_LIST'][0]['SECTION_PAGE_URL']?>" class="my-btn-news btn my-btn btn-sm my-btn-sm btn-default ">
		Показать все
	</a>

<?endif;?>

<?
if($APPLICATION->GetCurPage() == "/press-center/" || $APPLICATION->GetCurPage() == "/company/pervychnie-organizacuy/"):
?>
<div class="items-list clearfix items-view-grid img-or-3x2 news-list">
	<?else:?>
	<div class="items-list clearfix items-view-list img-or-3x2 news-list">
		<?endif;?>


		<?if($arParams["DISPLAY_TOP_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
		<?endif;?>

		<?
		$html = file_get_contents('http://gmpr.ru/news/novosti_otrasli/');
		$doc = phpQuery::newDocument($html);


		//		$title = pq('.news-list')->html();
		//		print_r($title);



//		$news = pq('.news-item');
//		$title = pq('.news-item a b');
//		$name = pq('.news-item')->children('p');
//		$time = pq('.news-date-time')->html();




//		echo '<div>';
//		print_r($title->html());
//		echo '</div>';
		$hentry = $doc->find('.news-list');
		foreach ($hentry as $el) {
			$pq = pq($el); // Это аналог $ в jQuery

			$pq->find('.news-date-time')->wrap('<div class="xxx">');
			$pq->find('.news-item a')->attr('href', 'xxxxxxx');
		}
		echo $hentry;







		$document = phpQuery::unloadDocuments($doc);
		?>


		<?foreach($arResult["ITEMS"] as $arItem):?>

			<!--			--><?//
//			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
//			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
//			?>
			<!--			<div class="item" id="--><?//=$this->GetEditAreaId($arItem['ID']);?><!--">-->
			<!--				<div class="item-in">-->
			<!--					--><?//if($arParams["DISPLAY_PICTURE"]!="N"):?>
			<!--						--><?//if($arItem["FIELDS"]["PREVIEW_PICTURE"] || $arItem["FIELDS"]["DETAIL_PICTURE"]):?>
			<!--							--><?//
//							$dummy = "";
//							if($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
//								$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
//							} elseif($arItem["FIELDS"]["DETAIL_PICTURE"]) {
//								$picture = $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];
//							} else {
//								$picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
//								$dummy = "dummy";
//							}
//							?>
			<!--							<div class="item-img img-middle --><?//=$dummy?><!--"><a href="--><?//=$arItem["DETAIL_PAGE_URL"]?><!--" class="item-img-in img-middle-in"><img src="--><?//=$picture?><!--" alt="--><?//=$arItem["NAME"]?><!--" title="--><?//=$arItem["NAME"]?><!--" class="img-responsive"/>-->
			<!--									<div class="img-hover-overlay"></div></a></div>-->
			<!--						--><?//endif?>
			<!--					--><?//endif?>
			<!--					<div class="item-content">-->
			<!--						--><?//if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<!--							<div class="item-date"><i class="fa fa-lg fa-clock-o"></i>--><?//=$arItem["DISPLAY_ACTIVE_FROM"]?><!--</div>-->
			<!--						--><?//endif?>
			<!--						--><?//if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<!--							--><?//if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
			<!--								<div class="item-title"><a href="--><?//=$arItem["DETAIL_PAGE_URL"]?><!--">--><?//=$arItem["NAME"]?><!--</a></div>-->
			<!--							--><?//else:?>
			<!--								<div class="item-title">--><?//=$arItem["NAME"]?><!--</div>-->
			<!--							--><?//endif;?>
			<!--						--><?//endif;?>
			<!--						--><?//if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<!--							<div class="item-text hidden-xs">-->
			<!--								--><?//=$arItem["PREVIEW_TEXT"]?>
			<!--							</div>-->
			<!--						--><?//endif;?>
			<!--						--><?//if($arParams["DISPLAY_DETAIL_BUTTON"]!="N"):?>
			<!--							<div class="item-btns">-->
			<!--								<a href="--><?//=$arItem["DETAIL_PAGE_URL"]?><!--" class="btn btn-sm btn-primary">--><?//=GetMessage('DETAIL_BUTTON_TEXT')?><!--</a>-->
			<!--							</div>-->
			<!--						--><?//endif?>
			<!--					</div>-->
			<!--				</div>-->
			<!--			</div>-->
		<?endforeach;?>

		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
		<?endif;?>

	</div>
