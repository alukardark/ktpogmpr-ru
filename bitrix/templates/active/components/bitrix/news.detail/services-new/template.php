<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>
<!--Разделы-->


<?

if($arResult["FIELDS"]["DETAIL_PICTURE"]) {
	$picture = $arResult["FIELDS"]["DETAIL_PICTURE"]["SRC"];
} elseif($arResult["FIELDS"]["PREVIEW_PICTURE"]) {
//	$picture = $arResult["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
} else {
	$picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
	$dummy = true;
}
?>

<?
if($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "left") {
	$imgPositionClass = "pull-left";
} elseif($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "right") {
	$imgPositionClass = "pull-right";
} elseif($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "fw") {
	$imgPositionClass = "";
}
?>

<?if($arParams["DISPLAY_PICTURE"]!="N" && $arResult["FIELDS"]["DETAIL_PICTURE"]):?>
	<?if($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "fw"):?><p><?endif?>
	<a style="float: left; margin-right: 20px" href="<?=$picture?>" class="img-zoom <?=$imgPositionClass?>"><img <?if($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] !== "fw"):?>width="300"<?endif?> src="<?=$picture?>" alt="" class="img-responsive"><span class="icon-zoom"></span></a>
	<?if($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "fw"):?></p><?endif?>
<?endif?>

<?if(!empty($arResult["PROPERTIES"]["VIDEO"]["VALUE"])):?>
	<div id="pp-video" class="pp-section <?if($tabs):?>tab-pane fade<?endif?>">
<!--		<h2>--><?//=GetMessage('PRODUCT_VIDEO')?><!--</h2>-->
		<div class="content-slider items-list-slider s_arrows_top"><a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a><a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>
			<div class="content-slider-in" style="overflow: visible">
				<div class="items-list clearfix items-view-slider videos-list slider" data-per-row="2">
					<?$arProp = $arResult["PROPERTIES"]["VIDEO"]["VALUE"];?>
					<!--					--><?//foreach ($arResult["PROPERTIES"]["VIDEO"]["VALUE"] as $arProp):?>
					<?
					$arProp = explode("/", $arProp);
					$arProp = array_pop($arProp);
					?>
					<?if(!empty($arProp)):?>
						<div class="itemX" style="max-width: 850px">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe src="https://www.youtube.com/embed/<?=$arProp?>" width="640" height="360" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" class="embed-responsive-item"></iframe>
							</div>
						</div>
					<?endif?>
					<!--					--><?//endforeach?>
				</div>
			</div>
		</div>
	</div>
<?endif?>


<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
	<p class="item-date"><i class="fa fa-lg fa-clock-o"></i><?=$arResult["DISPLAY_ACTIVE_FROM"]?></p>
<?endif?>
<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
	<?=$arResult["FIELDS"]["PREVIEW_TEXT"]?>
<?endif?>
<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
	<?=$arResult["DETAIL_TEXT"]?>
<?else:?>
	<?=$arResult["PREVIEW_TEXT"]?>
<?endif?>


<?if(!empty($arResult["PHOTO_GALLERY"])):?>
	<h2><?=GetMessage('GALLERY_TITLE')?></h2>
	<div class="content-slider items-list-slider s_arrows_top"><a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a><a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>
		<div class="content-slider-in">
			<div class="items-list clearfix items-view-slider img-or-3x2 gallery slider" data-per-row="4">
				<?foreach($arResult["PHOTO_GALLERY"] as $arItem):?>
					<div class="item"><a href="<?=$arItem["DETAIL"]["SRC"]?>" title="">
							<div class="img-middle item-img">
								<div class="img-middle-in"><img src="<?=$arItem["PREVIEW"]["src"]?>" alt="" class="img-responsive"/><span class="icon-zoom"></span></div>
							</div></a>
					</div>
				<?endforeach?>
			</div>
		</div>
	</div>
<?endif?>

<?if(!empty($arResult["PROPERTIES"]["FILES"]["VALUE"])):?>

	



	<div id="pp-files" class="pp-section <?if($tabs):?>tab-pane fade<?endif?>">
		<h2>Файлы</h2>
		<ul class="attached-files list-unstyled clearfix">
			<?foreach ($arResult["PROPERTIES"]["FILES"]["VALUE"] as $arProp):?>
				<?$arFile = array();?>
				<?$arFile = CFile::GetFileArray($arProp);?>
				<?if($arFile["SRC"]):?>
					<li class="attached-files list-unstyled clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<a target="_blank" href="<?=$arFile["SRC"]?>">
							<?if($arFile["CONTENT_TYPE"]):?>
								<?$fileIcon = Active::getFileIcon($arFile["CONTENT_TYPE"]);?>
								<div class="file-icon"><i class="fa <?=$fileIcon?>"></i></div>
							<?endif?>
							<div class="file-desc">
								<div class="file-name"><?=$arFile["ORIGINAL_NAME"]?></div>
								<div class="file-size">
									<?=GetMessage('DOCUMENTS_FILE_SIZE')?>
									<?$fileSizeFormat = Active::fileSizeFormat($arFile["FILE_SIZE"]);?>
									<?='Размер:'?>
									<?=$fileSizeFormat["FILE_SIZE"]?>
									<?=$fileSizeFormat["FILE_SIZE_TITLE"]?>
									<?='Кб'?>
								</div>
							</div>
						</a>
					</li>
				<?endif?>
			<?endforeach?>
		</ul>
	</div><br>
<?endif?>


