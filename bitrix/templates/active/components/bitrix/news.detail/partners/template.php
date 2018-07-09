<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="partner-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div class="partner-img img-wrapper img-or-album img-style-bordered">
			<div class="item-img img-middle">
				<div class="img-middle-in"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=""></div>
			</div>
		</div>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<p class="item-date"><i class="fa fa-lg fa-clock-o"></i><?=$arResult["DISPLAY_ACTIVE_FROM"]?></p>
	<?endif?>
	<ul class="list-icons list-unstyled">
		<?if($arResult["PROPERTIES"]["SITE_ADDRESS"]["VALUE"]):?>
			<li><i class="fa fa-globe"></i><a href="<?=$arResult["PROPERTIES"]["SITE_ADDRESS"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["SITE_ADDRESS"]["VALUE"]?></a></li>
		<?endif?>
		<?if($arResult["PROPERTIES"]["EMAIL"]["VALUE"]):?>
			<li><i class="fa fa-envelope"></i><a href="mailto:<?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></a></li>
		<?endif?>
		<?if($arResult["PROPERTIES"]["PHONE"]["VALUE"]):?>
			<li><i class="fa fa-phone"></i><?=$arResult["PROPERTIES"]["PHONE"]["VALUE"]?></li>
		<?endif?>
	</ul>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<?=$arResult["FIELDS"]["PREVIEW_TEXT"]?>
	<?endif?>
	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?=$arResult["DETAIL_TEXT"]?>
	<?else:?>
		<?=$arResult["PREVIEW_TEXT"]?>
	<?endif?>
</div>
