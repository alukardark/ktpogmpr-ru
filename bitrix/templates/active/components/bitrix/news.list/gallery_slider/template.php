<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<h2><?=GetMessage('GALLERY_SLIDER_TITLE')?></h2>
<div class="content-slider items-list-slider s_arrows_side mt-30"><a class="slick-arrow slick-prev"><i class="fa fa-angle-left"></i></a><a class="slick-arrow slick-next"><i class="fa fa-angle-right"></i></a>
	<div class="content-slider-in">
		<div class="items-list clearfix items-view-slider img-or-album gallery slider" data-per-row="<?=$arParams["ITEMS_PER_ROW"]?>">
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
								<div class="item-img img-middle"><a href="<?=$picture?>" class="item-img-in img-middle-in"><img src="<?=$picture?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" class="img-responsive"/>
										<span class="icon-zoom"></span>
										<div class="img-hover-overlay"></div></a></div>
							<?endif?>
						<?endif?>
				</div>
			<?endforeach;?>
		</div>
	</div>
</div>
