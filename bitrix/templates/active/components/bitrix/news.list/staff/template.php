<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<div class="items-list clearfix items-view-<?if($arParams["DISPLAY_VIEW_MODE"] !== "grid"):?>list<?else:?>grid<?endif?>">

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="overflow: hidden">
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
					<div class="item-img img-middle <?=$dummy?>"  style="background: url(<?=$picture?>) center/cover no-repeat; height: 300px;margin-bottom: 15px;">
						<span  class="item-img-in img-middle-in">
<!--							<img src="--><?//=$picture?><!--" alt="--><?//=$arItem["NAME"]?><!--" title="--><?//=$arItem["NAME"]?><!--" class="img-responsive"/>-->
							<div class="img-hover-overlay"></div>
						</span>
					</div>
				<?endif?>
			<?endif?>
			<div class="item-content" style="height: 232px;">
				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<div class="item-date"><i class="fa fa-lg fa-clock-o"></i><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
				<?endif?>
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<div class="item-title" style="margin-top: 0"><span class="semibold"><?=$arItem["NAME"]?></span></div>
					<?else:?>
						<div class="item-title" style="margin-top: 0"><?=$arItem["NAME"]?></div>
					<?endif;?>
				<?endif;?>
				<?if($arItem["PROPERTIES"]["POST"]["VALUE"]):?>
					<div class="item-text"><span class="semibold"><?=$arItem["PROPERTIES"]["POST"]["VALUE"]?></span></div>
				<?endif?>
				<ul class="list-icons list-unstyled">
					<?if($arItem["PROPERTIES"]["EMAIL"]["VALUE"]):?>
						<li class="my-staff-email"><i class="fa fa-envelope"></i><a href="mailto:<?=$arItem["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?=$arItem["PROPERTIES"]["EMAIL"]["VALUE"]?></a></li>
					<?endif?>
					<?if($arItem["PROPERTIES"]["PHONE"]["VALUE"]):?>

						<li class="my-staff-phone">
							<i class="fa fa-phone"></i>

							<a href="tel:<?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?>"><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?></a>
						</li>
					<?endif?>
				</ul>
				<ul class="social-icons list-unstyled">
					<?if(!empty($arItem["PROPERTIES"]["SOC_TWITTER"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_TWITTER"]["VALUE"]?>" title="Twitter" class="si si-twitter"><i class="fa fa-twitter"></i></a></li>
				  <?endif?>
					<?if(!empty($arItem["PROPERTIES"]["SOC_FACEBOOK"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_FACEBOOK"]["VALUE"]?>" title="Facebook" class="si si-facebook"><i class="fa fa-facebook"></i></a></li>
				  <?endif?>
				  <?if(!empty($arItem["PROPERTIES"]["SOC_GOOGLE_PLUS"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_GOOGLE_PLUS"]["VALUE"]?>" title="Google+" class="si si-google-plus"><i class="fa fa-google-plus"></i></a></li>
				  <?endif?>
				  <?if(!empty($arItem["PROPERTIES"]["SOC_VIMEO"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_VIMEO"]["VALUE"]?>" title="Vimeo" class="si si-vimeo"><i class="fa fa-vimeo"></i></a></li>
				  <?endif?>
				  <?if(!empty($arItem["PROPERTIES"]["SOC_VK"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_VK"]["VALUE"]?>" title="ВКонтакте" class="si si-vk"><i class="fa fa-vk"></i></a></li>
				  <?endif?>
				  <?if(!empty($arItem["PROPERTIES"]["SOC_INSTAGRAM"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_INSTAGRAM"]["VALUE"]?>" title="Instagram" class="si si-instagram"><i class="fa fa-instagram"></i></a></li>
				  <?endif?>
				  <?if(!empty($arItem["PROPERTIES"]["SOC_ODNOKLASSNIKI"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_ODNOKLASSNIKI"]["VALUE"]?>" title="Одноклассники" class="si si-odnoklassniki"><i class="fa fa-odnoklassniki"></i></a></li>
				  <?endif?>
				  <?if(!empty($arItem["PROPERTIES"]["SOC_YOUTUBE"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_YOUTUBE"]["VALUE"]?>" title="Youtube" class="si si-youtube-play"><i class="fa fa-youtube-play"></i></a></li>
				  <?endif?>
				  <?if(!empty($arItem["PROPERTIES"]["SOC_LINKEDIN"]["VALUE"])):?>
				    <li><a href="<?=$arItem["PROPERTIES"]["SOC_LINKEDIN"]["VALUE"]?>" title="LinkedIn" class="si si-linkedin"><i class="fa fa-linkedin"></i></a></li>
				  <?endif?>
				</ul>
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<div class="item-text hidden-xs">
						<?=$arItem["PREVIEW_TEXT"]?>
					</div>
				<?endif;?>
				<?if($arParams["DISPLAY_DETAIL_BUTTON"]!="N"):?>
					<div class="item-btns">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn btn-sm btn-primary"><?=GetMessage('DETAIL_BUTTON_TEXT')?></a>
					</div>
				<?endif?>
			</div>
		</div>
	</div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>

</div>
