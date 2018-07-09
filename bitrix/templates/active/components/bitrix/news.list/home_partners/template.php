<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="home-parthners block-content-wrap clearfix">
	<div class="block-content sc-maxwidth my-block-content-partners">
		<div class="block-title">
			<h2><?=GetMessage('PARTNERS_SLIDER_TITLE')?></h2>
		</div>

		<div class="content-slider items-list-slider s_arrows_side home-logos-slider">
			<a class="slick-arrow slick-prev">
<!--				<i class="fa fa-angle-left"></i>-->
			</a>
			<a class="slick-arrow slick-next">
<!--				<i class="fa fa-angle-right"></i>-->
			</a>
			<div class="content-slider-in">
				<div data-per-row="<?=$arParams["ITEMS_PER_ROW"]?>" class="slider">
					<?
					$i = 0;
					?>
					<?foreach($arResult["ITEMS"] as $arItem):?>
						<?

						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						<div class="my-item item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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


									<div class="my-item-img item-img img-middle <?=$dummy?>"><a target="_blank" href="<?=$arItem['PROPERTIES']['SITE_ADDRESS']['VALUE']?>" class="item-img-in img-middle-in"><img src="<?=$picture?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" class="img-responsive"/>

											<div class="img-hover-overlay"></div></a>
										<a target="_blank" href="<?=$arItem['PROPERTIES']['SITE_ADDRESS']['VALUE']?>" class="my-description-partners"><? print_r($arResult['ITEMS'][$i++]['NAME']);?></a>
									</div>
					par<?endif?>
							<?endif?>
						</div>
					<?endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>
