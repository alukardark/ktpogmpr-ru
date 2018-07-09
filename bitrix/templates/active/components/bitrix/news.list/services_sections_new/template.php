<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>
<?
//echo "<pre>";
//print_r($arResult);
//print_r($arParams);
//пример выборки дерева подразделов для раздела
//print_r($arParams["CODE"]);
//$arSections = CIBlockSection::GetList(
//	array(),
//	array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y", 'SECTION_ID'=>24)
//);
//while ($arSection = $arSections->GetNext())
//{
//	print_r($arSection);
//}
?>

<?if(!empty($arResult["SECTIONS"])):?>
	<?if($APPLICATION->GetCurDir() != "/sections/media/"):?>
		<div class="items-list clearfix items-view-grid img-or-3x2 services-list">
	<?endif?>
		<?foreach($arResult["SECTIONS"] as $arItem):?>
			<?
//			echo "<pre>";
//			print_r($arItem);
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="item-in">
					<?
					$dummy = "";
					if(!empty($arItem["GALLERY"]["PREVIEW"]["src"])) {
						$picture = $arItem["GALLERY"]["PREVIEW"]["src"];
					} else {
						$picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
						$dummy = "dummy";
					}
					?>
					<div class="item-img img-middle <?=$dummy?>">
						<a href="<?=$arItem['LIST_PAGE_URL'].$arItem['SECTION_PAGE_URL']?>" class="item-img-in img-middle-in">
							<!-- <img src="<?//=$picture?>" alt="<?//=$arItem["NAME"]?>" title="<?//=$arItem["NAME"]?>" class="img-responsive"/> -->
							<div style="background: url(<?=$picture?>) center/cover no-repeat; opacity: 1" class="img-hover-overlay"></div>
						</a>
					</div>
					<div class="item-content clearfix" style="height: 109px; overflow: hidden;">
						<div class="item-title"><a href="<?=$arItem['LIST_PAGE_URL'].$arItem['SECTION_PAGE_URL']?>"><?=$arItem["NAME"]?></a></div>
						<?if($arItem["DESCRIPTION"]):?>
							<div class="item-text hidden-xs"><?=$arItem["DESCRIPTION"]?></div>
						<?endif?>
					</div>
				</div>
			</div>
		<?endforeach;?>
	<?if($APPLICATION->GetCurDir() != "/sections/media/"):?>
		</div>
	<?endif?>
<?endif?>
<?//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!---->
<?//$this->setFrameMode(true);?>
<!---->
<?//if(!empty($arResult["SECTIONS"])):?>
<!--    <div class="items-list clearfix items-view-grid img-or-3x2 services-list" style="margin-bottom: 30px">-->
<!--        --><?//foreach($arResult["ITEMS"] as $arItem):?>
<!--            --><?//
//
//            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
//            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
//            ?>
<!--            <div class="item" id="--><?//=$this->GetEditAreaId($arItem['ID']);?><!--">-->
<!--                <div class="item-in">-->
<!--                    --><?//
//                    $dummy = "";
//                    if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])) {
//                        $picture = $arItem["PREVIEW_PICTURE"]["SRC"];
//                    } else {
//                        $picture = SITE_TEMPLATE_PATH."/img/dummy200.png";
//                        $dummy = "dummy";
//                    }
//                    ?>
<!--                    <div class="item-img img-middle --><?//=$dummy?><!--">-->
<!---->
<!--                        <a href="--><?//=$arItem["DETAIL_PAGE_URL"]?><!--" class="item-img-in img-middle-in">-->
<!--                            <img src="--><?//=$picture?><!--" alt="--><?//=$arItem["NAME"]?><!--" title="--><?//=$arItem["NAME"]?><!--" class="img-responsive"/>-->
<!--                            <div class="img-hover-overlay"></div>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="item-content clearfix">-->
<!--                        <div class="item-title"><a href="--><?//=$arItem["SECTION_PAGE_URL"]?><!--">--><?//=$arItem["NAME"]?><!--</a></div>-->
<!--                        --><?//if($arItem["PREVIEW_TEXT"]):?>
<!--                            <div class="item-text hidden-xs">--><?//=$arItem["PREVIEW_TEXT"]?><!--</div>-->
<!--                        --><?//endif?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?//endforeach;?>
<!--    </div>-->
<?//endif?>
