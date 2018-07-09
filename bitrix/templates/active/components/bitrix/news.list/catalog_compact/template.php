<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<div class="products compact clearfix">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="item-in">
				<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
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
					<div class="col-xs-4 col-sm-3 item-left">
						<div class="item-img img-middle <?=$dummy?>"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item-img-in img-middle-in"><img src="<?=$picture?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" class="img-responsive"/>
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
					</div>
				<?endif?>
				<div class="item-content">
					<div class="item-content-in">
						<div class="row">
							<div class="col-sm-12 col-md-4 col-title">
								<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
									<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
										<div class="item-title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
									<?else:?>
										<div class="item-title"><?=$arItem["NAME"]?></div>
									<?endif;?>
								<?endif;?>
							</div>
							<div class="col-sm-12 col-md-3 col-stock">
								<?if($arItem["DISPLAY_PROPERTIES"]["STATUS"]["VALUE"]):?>
									<div class="stock <?=$arItem["DISPLAY_PROPERTIES"]["STATUS"]["VALUE_XML_ID"]?>"><i class="fa fa-check"></i><?=$arItem["DISPLAY_PROPERTIES"]["STATUS"]["VALUE"]?></div>
								<?endif?>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 col-prices">
								<?if($arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]):?>
									<div class="price">
										<?=number_format($arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"], 0, '.', ' ')?>
										<?=$arItem["DISPLAY_PROPERTIES"]["CURRENCY"]["VALUE"]?>
									</div>
								<?endif?>
							</div>
							<div class="hidden-xs hidden-sm col-sm-6 col-md-2 col-button">
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-sm btn-primary"><?=GetMessage('DETAIL_BUTTON_TEXT')?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?endforeach;?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
