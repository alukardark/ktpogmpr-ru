<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<ul class="attached-files list-unstyled clearfix">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<?if($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]):?>
			<li class="attached-files list-unstyled clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a target="_blank" href="<?=$arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>">
					<?if($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["CONTENT_TYPE"]):?>
						<?$fileIcon = Active::getFileIcon($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["CONTENT_TYPE"]);?>
						<div class="file-icon"><i class="fa <?=$fileIcon?>"></i></div>
					<?endif?>
					<div class="file-desc">
						<div class="file-name"><?=$arItem["NAME"]?></div>
						<div class="file-size">
							<?=GetMessage('DOCUMENTS_FILE_SIZE')?>
							<?$fileSizeFormat = Active::fileSizeFormat($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"]);?>
							<?=$fileSizeFormat["FILE_SIZE"]?>
							<?=$fileSizeFormat["FILE_SIZE_TITLE"]?>
						</div>
					</div>
				</a>
			</li>
		<?endif?>
	<?endforeach;?>
</ul>
