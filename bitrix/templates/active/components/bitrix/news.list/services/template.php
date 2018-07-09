<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>
<?if($APPLICATION->GetCurDir() == "/sections/media/"):?>
	<style>
		.bx-context-toolbar-empty-area{
			min-height: 0!important;
		}
		.page-before-text{
			margin-bottom: 0 !important;
		}
		@media screen and (min-width: 992px){
			.with-sidebar .items-view-grid .item:nth-child(3n+1) {
				clear: none;
			}
		}
	</style>
	<?else:?>

<div class="items-list clearfix items-view-<?if($arParams["DISPLAY_VIEW_MODE"] !== "grid"):?>list<?else:?>grid<?endif?> img-or-3x2 services-elements">

	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
	<?endif;?>

	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
		<!-- <?if($arItem["FIELDS"]["PREVIEW_PICTURE"] || $arItem["FIELDS"]["DETAIL_PICTURE"]):?> -->
		<?
		$dummy = "";
		if($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
			$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
		} elseif($arItem["FIELDS"]["DETAIL_PICTURE"]) {
			$picture = $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];
			$dummy = "dummy";
		}else{
			$picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
		}
		?>
		<div class="item-img img-middle <?=$dummy?>">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item-img-in img-middle-in">
				<!-- <img src="<?//=$picture?>" alt="<?//=$arItem["NAME"]?>" title="<?//=$arItem["NAME"]?>" class="img-responsive"/> -->
				<div style="background: url(<?=$picture?>) center/cover no-repeat; opacity: 1" class="img-hover-overlay"></div>
			</a>
		</div>
		<!-- <?endif?> -->
		<?endif?>
		<div class="item-content">
			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<div class="item-date"><i class="fa fa-lg fa-clock-o"></i><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
			<?endif?>
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
			<div class="item-title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
			<?else:?>
			<div class="item-title"><?=$arItem["NAME"]?></div>
			<?endif;?>
			<?endif?>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<div class="item-text hidden-xs">
				<?=$arItem["PREVIEW_TEXT"]?>
			</div>
			<?endif?>
			<?if($arItem["PROPERTIES"]["PRICE"]["VALUE"]):?>
			<div class="item-price"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?></div>
			<?endif?>
			<?if($arParams["DISPLAY_DETAIL_BUTTON"]!="N"):?>
			<div class="item-btns">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-sm btn-primary"><?=GetMessage('DETAIL_BUTTON_TEXT')?></a>
			</div>
			<?endif?>
		</div>
	</div>
	<?endforeach;?>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
	<?endif;?>

</div>
<?endif;?>
