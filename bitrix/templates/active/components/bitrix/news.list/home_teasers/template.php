<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?
global $evoSettings;
?>

<div
<?if($evoSettings["HOME_ICONS_BLOCK_BG_COLOR"]["CURRENT"]):?>
	style="background-color:<?=$evoSettings["HOME_ICONS_BLOCK_BG_COLOR"]["CURRENT"] ?>;"
<?endif?>
class="homes-icons-block-wrap">
	<div class="homes-icons-block sc-maxwidth">
		<div class="row">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="item col-sm-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
						<?if($arItem["PROPERTIES"]["ICON_FILE"]["VALUE"]) {?>
							<?$arFile = CFile::GetPath($arItem["PROPERTIES"]["ICON_FILE"]["VALUE"]);?>
							<div class="item-icon"><img src="<?=$arFile?>" alt=""></div>
						<?} else {?>
							<?if($arItem["PROPERTIES"]["ICON_FA"]["VALUE"]) {?>
								<div class="item-icon"><i class="fa <?=$arItem["PROPERTIES"]["ICON_FA"]["VALUE"]?>"></i></div>
							<?}?>
						<?}?>
						<div class="item-content">
							<div class="item-title"><?=$arItem["NAME"]?></div>
							<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
								<div class="item-text">
									<?=$arItem["PREVIEW_TEXT"]?>
								</div>
							<?endif;?>
						</div>
					</a>
				</div>
			<?endforeach;?>
		</div>
	</div>
</div>
