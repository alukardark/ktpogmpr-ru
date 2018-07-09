<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="panel-group block-accordion">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="panel panel-default" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="panel-heading">
				<h4 class="panel-title"><a data-toggle="collapse" href="#collapse<?=$arItem["ID"]?>" aria-expanded="false"><?=$arItem["NAME"]?>
					<?if($arItem["PROPERTIES"]["PRICE"]["VALUE"]):?>
						<strong class="pay"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?></strong>
					<?endif?>
				</a></h4>
			</div>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div id="collapse<?=$arItem["ID"]?>" class="panel-collapse collapse">
					<div class="panel-body">
						<?=$arItem["PREVIEW_TEXT"]?>
						<p><a href="#" data-params='{"subject":"<?=GetMessage('VACANCIES_SEND')?>"}' data-href="<?=SITE_DIR?>ajax/vacancy.php" data-toggle="modal" data-target="#modal_callback" class="btn btn-dark btn-bold js_ajax_modal"><?=GetMessage('VACANCIES_SEND')?></a></p>
					</div>
				</div>
			<?endif;?>
		</div>
	<?endforeach;?>
</div>
