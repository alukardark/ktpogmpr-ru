<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?if(!empty($arResult["ITEMS"])):?>
	<div class="side-block side-managers-block">
		<div class="item-title h3">
			 <?=GetMessage('SIDEBAR_MANAGER_TITLE')?>
		</div>
		<div class="item-content">
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
				<div class="item clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div style="background-image: url('<?=$picture?>');" class="img bg-img round"></div>
					<div class="name"><?=$arItem["NAME"]?></div>
					<div class="phone"><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?></div>
				</div>
			<?endforeach;?>
		</div>
	</div>
<?endif?>
