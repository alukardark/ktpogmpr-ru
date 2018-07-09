<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div id="pp-recommended" class="pp-section">
	<h2><?=GetMessage('PRODUCTS_SLIDER_TITLE')?></h2>
	<div class="content-slider products-slider s_arrows_top mt-30"><a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a><a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>
		<div class="content-slider-in">
			<div data-per-row="<?=$arParams["ITEMS_PER_ROW"]?>" class="products slider">
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
								<?if($arItem["FIELDS"]["PREVIEW_PICTURE"] || $arItem["FIELDS"]["DETAIL_PICTURE"]):?>
									<?
									if($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
										$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
									} elseif($arItem["FIELDS"]["DETAIL_PICTURE"]) {
										$picture = $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"];
									}
									?>
									<div class="item-img img-middle"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item-img-in img-middle-in"><img src="<?=$picture?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" class="img-responsive"/>
											<div class="img-hover-overlay"></div>
											<?if(!empty($arItem["PROPERTIES"]["NEW"]["VALUE"])
											|| !empty($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"])
											|| !empty($arItem["PROPERTIES"]["BESTSELLER"]["VALUE"])):?>
												<div class="product-badges">
													<?if(!empty($arItem["PROPERTIES"]["NEW"]["VALUE"])):?>
														<div class="product-badge new"><span><?=GetMessage('PRODUCT_BADGE_NEW')?></span></div>
													<?endif?>
													<?if(!empty($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"])):?>
														<div class="product-badge discount"><span><i class="fa fa-percent"></i></span></div>
													<?endif?>
													<?if(!empty($arItem["PROPERTIES"]["BESTSELLER"]["VALUE"])):?>
														<div class="product-badge bestseller"><span><?=GetMessage('PRODUCT_BADGE_BESTSELLER')?></span></div>
													<?endif?>
												</div>
											<?endif?>
									</a></div>
								<?endif?>
							<?endif?>
							<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
								<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
									<div class="name"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
								<?else:?>
									<div class="name"><?=$arItem["NAME"]?></div>
								<?endif;?>
							<?endif;?>
							<?if($arItem["DISPLAY_PROPERTIES"]["STATUS"]["VALUE"]):?>
								<div class="stock <?=$arItem["DISPLAY_PROPERTIES"]["STATUS"]["VALUE_XML_ID"]?>"><i class="fa fa-check"></i><?=$arItem["DISPLAY_PROPERTIES"]["STATUS"]["VALUE"]?></div>
							<?endif?>
							<div class="price"><?=$arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?> <?=$arItem["DISPLAY_PROPERTIES"]["CURRENCY"]["VALUE"]?></div>
							<?if($arParams["DISPLAY_DETAIL_BUTTON"] == "Y"):?>
								<div class="item-btns">
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-sm btn-primary"><?=GetMessage('NEWS_DETAIL_BUTTON')?></a>
								</div>
							<?endif?>
					</div>
				<?endforeach;?>
			</div>
		</div>
	</div>
</div>
