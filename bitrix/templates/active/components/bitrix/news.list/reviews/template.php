<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="reviews-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="review-text"><?=$arItem["PREVIEW_TEXT"];?></div>
			<?endif;?>
			<div class="review-author">
				<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
					<?if($arItem["FIELDS"]["PREVIEW_PICTURE"] || $arItem["FIELDS"]["DETAIL_PICTURE"]):?>
						<?
						if($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
							$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
						} elseif($arItem["FIELDS"]["DETAIL_PICTURE"]) {
							$picture = $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];
						}
						?>
						<div style="background-image: url('<?=$picture?>');" class="review-img"></div>
					<?endif?>
				<?endif?>
				<div class="item-content">
					<div class="item-name"><?=$arItem["NAME"]?></div>
					<?if($arItem["PROPERTIES"]["POST"]["VALUE"]):?>
						<div class="item-descr"><?=$arItem["PROPERTIES"]["POST"]["VALUE"]?></div>
					<?endif?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	<?endforeach;?>
</div>
