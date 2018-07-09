<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="block-content-wrap clearfix home-block-facts">
  <div style="background-image: url('<?=SITE_DIR?>images/block-facts-bg.jpg');" class="block-bg"></div>
  <div class="sc-maxwidth block-content">
    <div class="row">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="col-xs-6 col-md-3 item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<?if($arItem["PROPERTIES"]["ICON_FA"]["VALUE"]):?>
						<div class="item-icon"><i class="fa <?=$arItem["PROPERTIES"]["ICON_FA"]["VALUE"]?>"></i></div>
					<?endif?>
	        <div class="item-content">
	          <div class="item-title"><span data-count="<?=$arItem["DISPLAY_PROPERTIES"]["COUNT"]["VALUE"]?>" class="count"><?=$arItem["DISPLAY_PROPERTIES"]["COUNT"]["VALUE"]?></span><?=$arItem["DISPLAY_PROPERTIES"]["COUNT_SYMBOL"]["VALUE"]?></div>
	          <div class="item-text"><?=$arItem["NAME"]?></div>
	        </div>
	      </div>
			<?endforeach;?>
    </div>
  </div>
</div>
