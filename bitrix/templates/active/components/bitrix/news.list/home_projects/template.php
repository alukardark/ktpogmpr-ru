<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="block-content-wrap clearfix">
	<div class="block-content sc-maxwidth">
		<div class="block-title title-button">
			<h2><?=GetMessage('PROJECTS_TITLE')?></h2><a href="<?=str_replace("#SITE_DIR#/", SITE_DIR, $arResult["LIST_PAGE_URL"])?>" class="btn btn-sm btn-default"><?=GetMessage('SERVICES_SLIDER_SHOW_ALL')?></a>
		</div>

		<div class="content-slider items-list-slider s_arrows_top home-projects-slider"><a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a><a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>
			<div class="content-slider-in">
				<div class="items-list clearfix items-view-slider img-or-3x2 services-list slider" data-per-row="<?=$arParams["ITEMS_PER_ROW"]?>">
					<?foreach($arResult["ITEMS"] as $arItem):?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						<div class="item category-<?=$arItem["IBLOCK_SECTION_ID"]?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<div class="item-in">
								<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
									<?if($arItem["FIELDS"]["PREVIEW_PICTURE"] || $arItem["FIELDS"]["DETAIL_PICTURE"]):?>
										<?
										$dummy = "";
										if($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
											$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
										} elseif($arItem["FIELDS"]["DETAIL_PICTURE"]) {
											$picture = $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];
										} else {
											$picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
											$dummy = "dummy";
										}
										?>
										<div class="item-img img-middle <?=$dummy?>"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item-img-in img-middle-in"><img src="<?=$picture?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" class="img-responsive"/>
												<div class="img-hover-overlay"></div></a></div>
									<?endif?>
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
									<?endif;?>
									<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
										<div class="item-text hidden-xs">
											<?=$arItem["PREVIEW_TEXT"]?>
										</div>
									<?endif;?>
								</div>
							</div>
						</div>
					<?endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>
