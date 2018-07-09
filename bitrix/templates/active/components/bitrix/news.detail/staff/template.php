<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="employee-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div class="employee-img img-wrapper img-or-square">
			<div class="item-img img-middle">
				<div class="img-middle-in"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt=""></div>
			</div>
		</div>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<p class="item-date"><i class="fa fa-lg fa-clock-o"></i><?=$arResult["DISPLAY_ACTIVE_FROM"]?></p>
	<?endif?>
	<?if($arResult["NAME"]):?>
		<div class="h3 employee-name"><?=$arResult["NAME"]?></div>
		<?if($arResult["PROPERTIES"]["POST"]["VALUE"]):?>
			<div class="employee-text"><span class="semibold small"><?=$arResult["PROPERTIES"]["POST"]["VALUE"]?></span></div>
		<?endif?>
	<?endif?>
	<ul class="list-icons list-unstyled">
		<?if($arResult["PROPERTIES"]["EMAIL"]["VALUE"]):?>
			<li><i class="fa fa-envelope"></i><a href="mailto:<?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></a></li>
		<?endif?>
		<?if($arResult["PROPERTIES"]["PHONE"]["VALUE"]):?>
			<li><i class="fa fa-phone"></i><?=$arResult["PROPERTIES"]["PHONE"]["VALUE"]?></li>
		<?endif?>
	</ul>
	<ul class="social-icons list-unstyled">
		<?if(!empty($arResult["PROPERTIES"]["SOC_TWITTER"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_TWITTER"]["VALUE"]?>" title="Twitter" class="si si-twitter"><i class="fa fa-twitter"></i></a></li>
		<?endif?>
		<?if(!empty($arResult["PROPERTIES"]["SOC_FACEBOOK"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_FACEBOOK"]["VALUE"]?>" title="Facebook" class="si si-facebook"><i class="fa fa-facebook"></i></a></li>
		<?endif?>
		<?if(!empty($arResult["PROPERTIES"]["SOC_GOOGLE_PLUS"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_GOOGLE_PLUS"]["VALUE"]?>" title="Google+" class="si si-google-plus"><i class="fa fa-google-plus"></i></a></li>
		<?endif?>
		<?if(!empty($arResult["PROPERTIES"]["SOC_VIMEO"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_VIMEO"]["VALUE"]?>" title="Vimeo" class="si si-vimeo"><i class="fa fa-vimeo"></i></a></li>
		<?endif?>
		<?if(!empty($arResult["PROPERTIES"]["SOC_VK"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_VK"]["VALUE"]?>" title="ВКонтакте" class="si si-vk"><i class="fa fa-vk"></i></a></li>
		<?endif?>
		<?if(!empty($arResult["PROPERTIES"]["SOC_INSTAGRAM"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_INSTAGRAM"]["VALUE"]?>" title="Instagram" class="si si-instagram"><i class="fa fa-instagram"></i></a></li>
		<?endif?>
		<?if(!empty($arResult["PROPERTIES"]["SOC_ODNOKLASSNIKI"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_ODNOKLASSNIKI"]["VALUE"]?>" title="Одноклассники" class="si si-odnoklassniki"><i class="fa fa-odnoklassniki"></i></a></li>
		<?endif?>
		<?if(!empty($arResult["PROPERTIES"]["SOC_YOUTUBE"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_YOUTUBE"]["VALUE"]?>" title="Youtube" class="si si-youtube-play"><i class="fa fa-youtube-play"></i></a></li>
		<?endif?>
		<?if(!empty($arResult["PROPERTIES"]["SOC_LINKEDIN"]["VALUE"])):?>
			<li><a href="<?=$arResult["PROPERTIES"]["SOC_LINKEDIN"]["VALUE"]?>" title="LinkedIn" class="si si-linkedin"><i class="fa fa-linkedin"></i></a></li>
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
