<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?if(!empty($arResult["ITEMS"])):?>
	<div class="side-block side-banner">
		<div class="slider">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<?
				if($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
					$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
				} elseif($arItem["FIELDS"]["DETAIL_PICTURE"]) {
					$picture = $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];
				}
				?>
				<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><img src="<?=$picture?>" alt="">
						<?if($arItem["PROPERTIES"]["CAPTION"]["VALUE"]):?>
							<span class="img-caption"><span class="img-caption-bg"></span><span><?=$arItem["PROPERTIES"]["CAPTION"]["VALUE"]?></span></span>
						<?endif?>
					</a>
				</div>
			<?endforeach;?>
		</div>
	</div>
<?endif?>
