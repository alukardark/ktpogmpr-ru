<?//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!---->
<?//$this->setFrameMode(true);?>
<!---->
<!---->
<!---->
<!---->
<!--<!--Первичные организации-->
<!---->
<?//
//if($arResult["FIELDS"]["DETAIL_PICTURE"]) {
//	$picture = $arResult["FIELDS"]["DETAIL_PICTURE"]["SRC"];
//} elseif($arResult["FIELDS"]["PREVIEW_PICTURE"]) {
//	$picture = $arResult["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
//} else {
//	$picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
//	$dummy = true;
//}
//?>
<!---->
<?//
//if($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "left") {
//	$imgPositionClass = "pull-left";
//} elseif($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "right") {
//	$imgPositionClass = "pull-right";
//} elseif($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "fw") {
//	$imgPositionClass = "";
//}
//?>
<!---->
<?//if($arParams["DISPLAY_PICTURE"]!="N"):?>
<!--	--><?//if($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "fw"):?><!--<p>--><?//endif?>
<!--	<a href="--><?//=$picture?><!--" class="img-zoom --><?//=$imgPositionClass?><!--"><img --><?//if($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] !== "fw"):?><!--width="300"--><?//endif?><!-- src="--><?//=$picture?><!--" alt="" class="img-responsive"><span class="icon-zoom"></span></a>-->
<!--	--><?//if($arResult["PROPERTIES"]["IMG_POSITION"]["VALUE_XML_ID"] == "fw"):?><!--</p>--><?//endif?>
<?//endif?>
<!---->
<?//if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
<!--	<p class="item-date"><i class="fa fa-lg fa-clock-o"></i>--><?//=$arResult["DISPLAY_ACTIVE_FROM"]?><!--</p>-->
<?//endif?>
<?//if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
<!--	--><?//=$arResult["FIELDS"]["PREVIEW_TEXT"]?>
<?//endif?>
<?//if(strlen($arResult["DETAIL_TEXT"])>0):?>
<!--	--><?//=$arResult["DETAIL_TEXT"]?>
<?//else:?>
<!--	--><?//=$arResult["PREVIEW_TEXT"]?>
<?//endif?>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>
<!--Пресс-центр-->
<?
if($arResult["FIELDS"]["DETAIL_PICTURE"]) {
	$picture = $arResult["FIELDS"]["DETAIL_PICTURE"]["SRC"];
} elseif($arResult["FIELDS"]["PREVIEW_PICTURE"]) {
	$picture = $arResult["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
} else {
	$picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
	$dummy = true;
}

$tabs = false;
?>

<div class="project-page">
	<div class="row">

		<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
			<div class="detail-gallery col-sm-6 col-md-7">
				<div class="detail-main-image">
					<?if(!$dummy):?>
					<a href="<?=$picture?>" class="image img-middle">
						<?else:?>
						<span class="image img-middle">
					<?endif?>
							<div class="img-middle-in my-img-middle-in">
								<img class="img-middle-in-inner" src="<?=$picture?>" alt="" data-img-index="0">
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
		<div class="col-sm-6 col-md-5">
			<?if($arResult["PREVIEW_TEXT"]):?>
				<!--				<div class="short-description">--><?//=$arResult["PREVIEW_TEXT"]?><!--</div>-->
			<?endif;?>
			<div class="short-specs">
				<?if($arResult["PROPERTIES"]):?>
					<?$i=0?>
					<?$ch = 0;?>
					<p>
						<strong>Адрес:</strong>
						<?=$arResult['PROPERTIES']['ORG_ADRESS']['VALUE'];?>
					</p>

					<?if (!empty($arResult['PROPERTIES']['CONT_POCHT_ADRESS']['VALUE'])){
						?>
						<p>
							<strong>Почтовый адрес:</strong>
							<?=$arResult['PROPERTIES']['CONT_POCHT_ADRESS']['VALUE'];?>
						</p>
					<?}?>

					<p>
						<strong>Приёмная профкома:</strong>
						<?=$arResult['PROPERTIES']['ORG_PRIEMN']['VALUE'];?>
					</p>
					<p>
						<strong>E-mail:</strong>
						<?=$arResult['PROPERTIES']['ORG_EMAIL']['VALUE'];?>
					</p>


					<?foreach ($arResult["PROPERTIES"] as $arProp):?>
						<?if($arProp["CODE"] !== "PRICE"
							&& $arProp["CODE"] !== "LINKED_SERVICES"
							&& $arProp["CODE"] !== "LINKED_PROJECTS"
							&& $arProp["CODE"] !== "LINKED_REVIEWS"
							&& $arProp["CODE"] !== "LINKED_PARTNERS"
							&& $arProp["CODE"] !== "LINKED_STAFF"
							&& $arProp["CODE"] !== "SHOW_ASK_FORM"
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
									<!--									--><?//=$arProp["NAME"]?><!--: <span class="semibold">--><?//=$arProp["VALUE"]?><!--</span><br>-->




								<?endif?>
							<?endif?>
						<?endif?>
					<?endforeach?>
					<?if($i>5):?>
						<!--						<a href="#pp-specs" class="all-specs-link"><i class="fa fa-lg fa-angle-down"></i><span class="link-dotted">--><?//=GetMessage('PRODUCT_ALL_PROPERTIES')?><!--</span></a>-->
					<?endif?>
				<?endif?>


				<?print_r($arResult['PREVIEW_TEXT']);?>


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
								<div class="old-price"><?=$arResult["PROPERTIES"]["OLD_PRICE"]["VALUE"]?> <?=$arResult["PROPERTIES"]["CURRENCY"]["VALUE"]?></div>
							</div>
						<?endif?>
						<?if($arResult["PROPERTIES"]["PRICE"]["VALUE"]):?>
							<div class="buy-block-item">
								<div class="price">	<?=$arResult["PROPERTIES"]["PRICE"]["VALUE"]?> <?=$arResult["PROPERTIES"]["CURRENCY"]["VALUE"]?></div>
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




	<?

	echo '<h2>Контакты</h2>';
	//echo "<pre>";
	//print_r($arResult['PROPERTIES']['CONT_NAME']['VALUE']);
	echo '<div class="my-table-wrap clearfix">';
	foreach ($arResult['PROPERTIES']['CONT_NAME']['VALUE'] as $arProp){

		echo '<div class="col-sm-6" style="margin-bottom: 15px; padding: 0;">';
//		echo '<table height="150px" cellpadding="0" cellspacing="0">';
//		echo '<tbody>';
//		echo '<tr>';




		echo '<td style="">';
//		echo(CFile::ShowImage($arProp));
		$file = CFile::ResizeImageGet($arResult["CONT_PHOTO"][$ch], array(), BX_RESIZE_IMAGE_EXACT, true);

		if(!empty($file)){
			echo '<div style="background: url('.$file['src'].') center/cover no-repeat; width:80px;height:120px; display:inline-block;vertical-align: middle; margin-right:5%">';
			echo '</div>';
		}else{
			echo '<div style="display: inline-block;vertical-align: middle; height: 120px;">';
			echo '</div>';
		}



		echo '</td>';

		echo "<td width=\"5%\"></td>";

		echo '<td><p style="margin: 0; display: inline-block; vertical-align: middle; width: 70%;">';
		echo '<strong>';
		echo $arResult['PROPERTIES']['CONT_PROF']['VALUE'][$ch];
		echo ':</strong><br>';
		echo $arResult['PROPERTIES']['CONT_NAME']['VALUE'][$ch];
		echo '<br>';

		echo '<strong>Телефон: ';
		echo '</strong>';
		echo $arResult['PROPERTIES']['CONT_PHONE']['VALUE'][$ch];
		echo '<br>';

		echo '<strong>E-mail: ';
		echo '</strong>';
		echo $arResult['PROPERTIES']['CONT_EMAIL']['VALUE'][$ch];
		echo '<br>';
		echo '</p></td>';
		$ch++;


//		echo '</tr>';
//		echo '</tbody>';
//		echo '</table>';
		echo '</div>';


	}
	echo '</div>';
	?>

	<!--	--><?//print_r($arResult['PROPERTIES']['CONT_NAME']['VALUE'][0])?>
	<!--	--><?//print_r($arResult['PROPERTIES']['CONT_PROF']['VALUE'][0])?>
	<!--	--><?//foreach($arResult["ITEMS"] as $arItem):?>

	<!--	--><?//endforeach;?>


	<?if($tabs):?>
	<div class="ms-tabs">
		<div class="tabs-ctrl">

			<?if($arResult["DETAIL_TEXT"]):?>
				<a href="#pp-description" class="active"><?=GetMessage('PRODUCT_DESCRIPTION_TITLE')?></a>
			<?endif?>
			<?if($arResult["PROPERTIES"]["VIDEO"]["VALUE"]):?>
				<a href="#pp-video"><?=GetMessage('PRODUCT_VIDEO')?></a>
			<?endif?>
			<?if($arResult["PROPERTIES"]["FILES"]["VALUE"]):?>
				<a href="#pp-files"><?=GetMessage('PRODUCT_FILES')?></a>
			<?endif?>
		</div>
		<div class="tab-content">
			<?endif?>
			<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
				<h2>Об организации</h2>
				<div id="pp-description" class="pp-section <?if($tabs):?>tab-pane fade in active<?endif?>">
					<?=$arResult["DETAIL_TEXT"]?>
				</div>
			<?endif?>
			<?if(!empty($arResult["PROPERTIES"]["VIDEO"]["VALUE"])):?>
				<div id="pp-video" class="pp-section <?if($tabs):?>tab-pane fade<?endif?>">
					<h2><?=GetMessage('PRODUCT_VIDEO')?></h2>
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
					<h2><?=GetMessage('PRODUCT_FILES')?></h2>
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
				</div><br>
			<?endif?>
			<?if($tabs):?>
		</div>
	</div>
<?endif?>
</div>
