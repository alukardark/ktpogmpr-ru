<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="items-list clearfix img-or-3x2 items-view-gallery-grid gallery">

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
				<?if($arItem["FIELDS"]["PREVIEW_PICTURE"] || $arItem["FIELDS"]["DETAIL_PICTURE"]):?>
					<?
					if($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
						$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
					} elseif($arItem["FIELDS"]["DETAIL_PICTURE"]) {
						$picture = $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];
					}
					?>
					<a href="<?=$picture?>">
						<div class="img-middle item-img">
							<div class="img-middle-in"><img src="<?=$picture?>" alt="<?=$arItem["NAME"]?>" class="img-responsive"/><span class="icon-zoom"></span></div>
						</div>
					</a>
				<?endif?>
			<?endif?>
	</div>
<?endforeach;?>

</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
