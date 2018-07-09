<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="block-content-wrap clearfix">
	<div class="block-content sc-maxwidth">
		<div class="block-title title-button">
<!--			<h2>--><?//=GetMessage('SERVICES_SLIDER_TITLE')?><!--</h2>-->
			<h2 class="my-adaptive-header-block">Разделы</h2>
			<a href="<?=str_replace("#SITE_DIR#/", SITE_DIR, $arResult["LIST_PAGE_URL"])?>" class="btn my-btn btn-sm my-btn-sm btn-default"><?=GetMessage('SERVICES_SLIDER_SHOW_ALL')?></a>
		</div>
		<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
		        "AREA_FILE_SHOW" => "file",
		        "PATH" => SITE_DIR."include/home_services_text_block.php",
		        "AREA_FILE_SUFFIX" => "inc",
		        "AREA_FILE_RECURSIVE" => "Y",
		        "EDIT_TEMPLATE" => "standard.php"
		    )
		);?>
		<div class="home-services-icons">
			<div class="row">
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="item col-sm-6 col-md-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>">
							<?if($arItem["PROPERTIES"]["ICON_FA"]["VALUE"]):?>
								<?

								?>
								<div class="item-icon"><i class="fa
								<?=$arItem["PROPERTIES"]["ICON_FA"]["VALUE"]?>
								"style="background: url(<?echo SITE_TEMPLATE_PATH."/img/".$arItem["PROPERTIES"]["MY_ICON_NAME"]["VALUE"];?>) center no-repeat;"
									></i></div>
							<?endif?>
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
</div>
