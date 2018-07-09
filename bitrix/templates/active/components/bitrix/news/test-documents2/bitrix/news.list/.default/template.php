<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?
if($APPLICATION->GetCurPage() !== "/sections/media/"){
//print_r($arResult);
	if($arResult['SECTION']['PATH'][1]['DEPTH_LEVEL'] >= 2){
		?>
		<h2><?=$arResult['SECTION']['PATH'][1]['NAME']?></h2>
		<?
	}else{
		?>
		<h2><?=$arResult['SECTION']['PATH'][0]['NAME']?></h2>
	<?}
	?>


	<?
//	$codeCurCat = $arResult['SECTION']['PATH'][0]['CODE'];
//	CModule::IncludeModule("iblock");
//	$arFilter = Array(
//		"IBLOCK_ID"=>IntVal(9),
//		"SECTION_CODE" => $codeCurCat,
//	);
//	$res = CIBlockElement::GetList(
//		Array("ID"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"),
//		$arFilter,
//		Array('CODE', "IBLOCK_SECTION_ID","NAME", "DATE_ACTIVE_FROM"));
//	while($ar_fields = $res->GetNext())
//	{
//
//	}

}
?>
<?
//echo "<pre>";
//print_r($arResult);

?>





<?//$arSections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]))?>
<!---->
<?//while ($arSection = $arSections->Fetch()):?>
<?//
//global $arSectionFilter;
//$arSectionFilter = array("SECTION_ID" => $arSection["ID"], "SECTION_CODE" => $arSection["CODE"]);
//$arCountFilter = array(
//	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
//	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
//	"SECTION_ID" => $arSection["ID"],
//	"SECTION_CODE" => $arSection["CODE"],
//	"ACTIVE" => "Y",
//	'GLOBAL_ACTIVE' => 'Y',
//	"INCLUDE_SUBSECTIONS" => ($arParams["INCLUDE_SUBSECTIONS"] == 'N' ? 'N' : 'Y')
//);
//$rsElementsCount = CIBlockElement::GetList(array(), $arCountFilter, array(), false, array());
//?>
<?//
//
//		//print_r($arSection["NAME"]);
//
//?>
<?//endwhile?>
<!--<pre>-->
<?
//print_r($arResult);
?>








<ul class="attached-files list-unstyled clearfix">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?

		//print_r($arItem['SECTION_LIST'][0]['SECTION_PAGE_URL']);
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<?if($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]):?>
			<li class="attached-files list-unstyled clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

				<a target="_blank" href="<?=$arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>">

					<?
					$file = CFile::ResizeImageGet($arItem['PROPERTIES']['MYIMG']['VALUE'], array(), BX_RESIZE_IMAGE_EXACT, true);
					if(!empty($file)){?>
						<div class="my-prev-doc" style="background: url(<?=$file['src']?>) center/cover no-repeat;"></div>
					<?}?>

					<?if($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["CONTENT_TYPE"]):?>
						<?$fileIcon = Active::getFileIcon($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["CONTENT_TYPE"]);?>
						<div class="file-icon"><i class="fa <?=$fileIcon?>"></i></div>
					<?endif?>
					<div class="file-desc">
						<div class="file-name"><?=$arItem["NAME"]?></div>
						<div class="file-size">
							<?=GetMessage('DOCUMENTS_FILE_SIZE')?>
							<?$fileSizeFormat = Active::fileSizeFormat($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"]);?>

<!--							--><?//=$fileSizeFormat["FILE_SIZE"]?>
							<?$fileSize = $arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_SIZE"]?>
							<?=substr($fileSize/1000000, 0, 4)?>
							<?="Мб"?>

<!--							--><?//=$fileSizeFormat["FILE_SIZE_TITLE"]?>

						</div>
					</div>

				</a>
			</li>
		<?endif?>
	<?endforeach;?>
</ul>
