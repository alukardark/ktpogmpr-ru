<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>
<?
if($arResult["FIELDS"]["DETAIL_PICTURE"]) {
	$picture = $arResult["FIELDS"]["DETAIL_PICTURE"]["SRC"];
} elseif($arResult["FIELDS"]["PREVIEW_PICTURE"]) {
	$picture = $arResult["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
} else {
	$picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
	$dummy = true;
}

if($arParams["DETAIL_TABS"] != "N" ) {
	$tabs = true;
} else {
	$tabs = false;
}
?>
<div class="product-page">
	<div class="row">
		<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
			<div class="detail-gallery col-sm-6 col-md-5">
				<div class="detail-main-image">
					<?if(!$dummy):?>
						<a href="<?=$picture?>" class="image img-middle">
					<?else:?>
						<span class="image img-middle">
					<?endif?>
						<div class="img-middle-in"><img src="<?=$picture?>" alt="" data-img-index="0">
							<?if(!$dummy):?>
								<span class="icon-zoom"></span>
							<?endif?>
							<?if(!empty($arResult["PROPERTIES"]["NEW"]["VALUE"])
							|| !empty($arResult["PROPERTIES"]["DISCOUNT"]["VALUE"])
							|| !empty($arResult["PROPERTIES"]["BESTSELLER"]["VALUE"])):?>
								<div class="product-badges">
									<?if(!empty($arResult["PROPERTIES"]["NEW"]["VALUE"])):?>
										<div class="product-badge new"><span><?=GetMessage('PRODUCT_BADGE_NEW')?></span></div>
									<?endif?>
									<?if(!empty($arResult["PROPERTIES"]["DISCOUNT"]["VALUE"])):?>
										<div class="product-badge discount"><span><i class="fa fa-percent"></i></span></div>
									<?endif?>
									<?if(!empty($arResult["PROPERTIES"]["BESTSELLER"]["VALUE"])):?>
										<div class="product-badge bestseller"><span><?=GetMessage('PRODUCT_BADGE_BESTSELLER')?></span></div>
									<?endif?>
								</div>
							<?endif?>
						</div>
					<?if(!$dummy):?>
						</a>
					<?else:?>
						</span>
					<?endif?>
					<?if(!empty($arResult["PHOTO_GALLERY"])):?>
						<a class="main-img-arrow arrow-prev"><i class="fa fa-angle-left"></i></a><a class="main-img-arrow arrow-next"><i class="fa fa-angle-right"></i></a>
						<div class="main-img-counter visible-xs-block"><span class="main-img-current">1</span> / <span class="main-img-total"><?=count($arResult["PHOTO_GALLERY"])+1;?></span></div>
					<?endif?>
				</div>
				<div class="slider detail-thumbs-slider hidden-xs" data-per-row="3">
					<?if(!empty($arResult["PHOTO_GALLERY"])):?>
						<div class="image active"><a href="<?=$picture?>" class="img-middle">
								<div class="img-middle-in"><img src="<?=$picture?>" alt=""></div></a>
						</div>
						<?foreach($arResult["PHOTO_GALLERY"] as $arItem):?>
							<div class="image"><a href="<?=$arItem["DETAIL"]["SRC"]?>" class="img-middle">
									<div class="img-middle-in"><img src="<?=$arItem["PREVIEW"]["src"]?>" alt=""></div></a>
							</div>
						<?endforeach?>
					<?endif?>
				</div>
				<script>
					var productGallery = [
						{src: '<?=$picture?>'},
						<?if(!empty($arResult["PHOTO_GALLERY"])):?>
							<?foreach($arResult["PHOTO_GALLERY"] as $arItem):?>
								{src: '<?=$arItem["DETAIL"]["SRC"]?>'},
							<?endforeach?>
						<?endif?>
					];
				</script>
			</div>
		<?endif?>
		<div class="col-sm-6 col-md-7">
			<div class="short-specs">
				<?if($arResult["PROPERTIES"]):?>
					<?$i=0?>
					<?foreach ($arResult["PROPERTIES"] as $arProp):?>
						<?if($arProp["CODE"] !== "PRICE"
						&& $arProp["CODE"] !== "CURRENCY"
						&& $arProp["CODE"] !== "STATUS"
						&& $arProp["CODE"] !== "ORDER_BUTTON"
						&& $arProp["CODE"] !== "RECOMMEND"
						&& $arProp["CODE"] !== "RECOMMENDATIONS"
						&& $arProp["CODE"] !== "NEW"
						&& $arProp["CODE"] !== "DISCOUNT"
						&& $arProp["CODE"] !== "BESTSELLER"
						&& $arProp["CODE"] !== "FILES"
						&& $arProp["CODE"] !== "VIDEO"
						&& $arProp["CODE"] !== "MORE_PHOTO"):?>
							<?if(!empty($arProp["VALUE"])):?>
								<?$i++?>
								<?if($i<=5):?>
									<?=$arProp["NAME"]?>: <span class="semibold"><?=$arProp["VALUE"]?></span><br>
								<?endif?>
							<?endif?>
						<?endif?>
					<?endforeach?>
					<?if($i>5):?>
						<a href="#pp-specs" class="all-specs-link"><i class="fa fa-lg fa-angle-down"></i><span class="link-dotted"><?=GetMessage('PRODUCT_ALL_PROPERTIES')?></span></a>
					<?endif?>
				<?endif?>
			</div>
			<?
			if(($arResult["PROPERTIES"]["PRICE"]["VALUE"])
			|| ($arResult["PROPERTIES"]["STATUS"]["VALUE"])
			|| ($arResult["PROPERTIES"]["ORDER_BUTTON"]["VALUE"])):
			?>
				<div class="clearfix">
					<div class="buy-block well">
						<?if($arResult["PROPERTIES"]["OLD_PRICE"]["VALUE"]):?>
							<div class="buy-block-item">
								<div class="old-price-label"><?=GetMessage('PRODUCT_OLD_PRICE')?></div>
								<div class="old-price">
									<?=number_format($arResult["PROPERTIES"]["OLD_PRICE"]["VALUE"], 0, '.', ' ')?>
									<?=$arResult["PROPERTIES"]["CURRENCY"]["VALUE"]?>
								</div>
							</div>
						<?endif?>
						<?if($arResult["PROPERTIES"]["PRICE"]["VALUE"]):?>
							<div class="buy-block-item">
								<div class="price">
									<?=number_format($arResult["PROPERTIES"]["PRICE"]["VALUE"], 0, '.', ' ')?>
									<?=$arResult["PROPERTIES"]["CURRENCY"]["VALUE"]?>
								</div>
							</div>
						<?endif?>
						<?if($arResult["PROPERTIES"]["STATUS"]["VALUE"]):?>
							<div class="buy-block-item">
								<div class="stock <?=$arResult["PROPERTIES"]["STATUS"]["VALUE_XML_ID"]?>"><i class="fa fa-check"></i><?=$arResult["PROPERTIES"]["STATUS"]["VALUE"]?></div>
							</div>
						<?endif?>
						<?if($arResult["PROPERTIES"]["ORDER_BUTTON"]["VALUE_XML_ID"] == "Y"):?>
							<div class="buy-block-item">
								<a data-params='{"subject":"<?=GetMessage('ORDER_FORM_SUBJECT')?>:<?=$arResult["NAME"]?>"}' data-href="<?=SITE_DIR?>ajax/order.php" data-toggle="modal" data-target="#modal_callback" class="btn btn-bold btn-primary js_ajax_modal"><?=GetMessage('PRODUCT_ORDER_BUTTON')?></a>
							</div>
						<?endif?>
					</div>
				</div>
			<?endif?>
		</div>
	</div>
	<?if($tabs):?>
		<div class="ms-tabs">
			<div class="tabs-ctrl">
				<?if($arResult["DETAIL_TEXT"]):?>
					<a href="#pp-description" class="active"><?=GetMessage('PRODUCT_DESCRIPTION_TITLE')?></a>
				<?endif?>
				<?if($arResult["PROPERTIES"]):?>
					<a href="#pp-specs"><?=GetMessage('PRODUCT_PROPERTIES')?></a>
				<?endif?>
				<?if($arResult["PROPERTIES"]["VIDEO"]["VALUE"]):?>
					<a href="#pp-video"><?=GetMessage('PRODUCT_VIDEO')?></a>
				<?endif?>
				<?if($arResult["PROPERTIES"]["FILES"]["VALUE"]):?>
					<a href="#pp-files"><?=GetMessage('PRODUCT_FILES')?></a>
				<?endif?>
				<?if($arResult["PROPERTIES"]["RECOMMENDATIONS"]["VALUE"]):?>
					<a href="#pp-recommended"><?=GetMessage('PRODUCT_RECOMMENDATIONS')?></a>
				<?endif?>
			</div>
			<div class="tab-content">
	<?endif?>
	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<div id="pp-description" class="pp-section <?if($tabs):?>tab-pane fade in active<?endif?>">
			<?=$arResult["DETAIL_TEXT"]?>
		</div>
	<?endif?>
	<?if($arResult["PROPERTIES"]):?>
		<div id="pp-specs" class="pp-section <?if($tabs):?>tab-pane fade<?endif?>">
			<div class="product-specs">
				<?foreach ($arResult["PROPERTIES"] as $arProp):?>
					<?if($arProp["CODE"] !== "PRICE"
					&& $arProp["CODE"] !== "CURRENCY"
					&& $arProp["CODE"] !== "STATUS"
					&& $arProp["CODE"] !== "ORDER_BUTTON"
					&& $arProp["CODE"] !== "RECOMMEND"
					&& $arProp["CODE"] !== "RECOMMENDATIONS"
					&& $arProp["CODE"] !== "NEW"
					&& $arProp["CODE"] !== "DISCOUNT"
					&& $arProp["CODE"] !== "BESTSELLER"
					&& $arProp["CODE"] !== "FILES"
					&& $arProp["CODE"] !== "VIDEO"
					&& $arProp["CODE"] !== "MORE_PHOTO"):?>
						<?if(!empty($arProp["VALUE"])):?>
							<dl>
								<dt><span><?=$arProp["NAME"]?></span></dt>
								<dd><span><?=$arProp["VALUE"]?></span></dd>
							</dl>
						<?endif?>
					<?endif?>
				<?endforeach?>
			</div>
		</div>
	<?endif?>
	<?if(!empty($arResult["PROPERTIES"]["VIDEO"]["VALUE"])):?>
		<div id="pp-video" class="pp-section <?if($tabs):?>tab-pane fade<?endif?>">
			<div class="content-slider items-list-slider s_arrows_top"><a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a><a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>
				<div class="content-slider-in">
					<div class="items-list clearfix items-view-slider videos-list slider" data-per-row="2">
						<?foreach ($arResult["PROPERTIES"]["VIDEO"]["VALUE"] as $arProp):?>
								<?if(!empty($arProp)):?>
									<div class="item">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe src="<?=$arProp?>" width="640" height="360" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" class="embed-responsive-item"></iframe>
										</div>
									</div>
								<?endif?>
						<?endforeach?>
					</div>
				</div>
			</div>
		</div>
	<?endif?>
	<?if(!empty($arResult["PROPERTIES"]["FILES"]["VALUE"])):?>
		<div id="pp-files" class="pp-section <?if($tabs):?>tab-pane fade<?endif?>">
			<ul class="attached-files list-unstyled clearfix">
				<?foreach ($arResult["PROPERTIES"]["FILES"]["VALUE"] as $arProp):?>
					<?$arFile = array();?>
					<?$arFile = CFile::GetFileArray($arProp);?>
					<?if($arFile["SRC"]):?>
						<li class="attached-files list-unstyled clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<a href="<?=$arFile["SRC"]?>">
								<?if($arFile["CONTENT_TYPE"]):?>
									<?$fileIcon = Active::getFileIcon($arFile["CONTENT_TYPE"]);?>
									<div class="file-icon"><i class="fa <?=$fileIcon?>"></i></div>
								<?endif?>
								<div class="file-desc">
									<div class="file-name"><?=$arFile["ORIGINAL_NAME"]?></div>
									<div class="file-size">
										<?=GetMessage('DOCUMENTS_FILE_SIZE')?>
										<?$fileSizeFormat = Active::fileSizeFormat($arFile["FILE_SIZE"]);?>
										<?=$fileSizeFormat["FILE_SIZE"]?>
										<?=$fileSizeFormat["FILE_SIZE_TITLE"]?>
									</div>
								</div>
							</a>
						</li>
					<?endif?>
				<?endforeach?>
			</ul>
		</div>
	<?endif?>
	<?if(!empty($arResult["PROPERTIES"]["RECOMMENDATIONS"]["VALUE"])):?>
		<?
		global $arFilter;
		$arFilter = array("ID" => $arResult["PROPERTIES"]["RECOMMENDATIONS"]["VALUE"]);
		?>
		<?if($tabs):?>
			<div id="pp-recommended" class="pp-section tab-pane fade">
		<?endif?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"products_slider",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"NEWS_COUNT" => "20",
				"SORT_BY1" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "ACTIVE_FROM",
				"SORT_ORDER2" => "DESC",
				"FILTER_NAME" => "arFilter",
				"FIELD_CODE" => array(
					0 => "PREVIEW_TEXT",
					1 => "PREVIEW_PICTURE",
					2 => "DETAIL_PICTURE",
					3 => "",
				),
				"PROPERTY_CODE" => array(
					0 => "NUMBER",
					1 => "NUMBER2",
					2 => "ART",
					3 => "BRAND",
					4 => "CURRENCY",
					5 => "STATUS",
					6 => "LIST_TEST",
					7 => "LIST_TEST2",
					8 => "LIST_TEST3",
					9 => "LIST_TEST4",
					10 => "LIST_TEST5",
					11 => "LIST_TEST6",
					12 => "LIST_TEST7",
					13 => "PRICE",
					14 => "PRICECURRENCY",
					15 => "",
				),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "j F Y",
				"SET_TITLE" => "N",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_TITLE" => "Новости",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
				"PAGER_SHOW_ALL" => "N",
				"DISPLAY_DATE" => "N",
				"ITEMS_PER_ROW"	=>	4,
				"DISPLAY_DETAIL_BUTTON"	=>	"N",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"INCLUDE_SUBSECTIONS" => "Y",
				"COMPONENT_TEMPLATE" => "products_slider",
				"SET_LAST_MODIFIED" => "N",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"SHOW_404" => "N",
				"MESSAGE_404" => ""
			),
			false
		);?>
		<?if($tabs):?>
			</div>
		<?endif?>
	<?endif?>
	<?if($tabs):?>
			</div>
		</div>
	<?endif?>
</div>
