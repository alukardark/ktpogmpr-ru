<?//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//
//CModule::IncludeModule('iblock');
//
//$arSections = CIBlockSection::GetList(array("left_margin" => "asc"), array("IBLOCK_CODE" => "documents_".SITE_ID, "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y"), false, array());
//
//$arItemsTree = CIBlockElement::GetList(Array("SORT" => "ASC"), array("IBLOCK_CODE" => "documents_".SITE_ID, "ACTIVE" => "Y", "SECTION_GLOBAL_ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => "Y"), false, false, array());
//
////$tree = array();
//
////while ($arItem = $arItemsTree->GetNext()) {
////	$tree[$arItem["IBLOCK_SECTION_ID"]]["CHILDS"][$arItem["ID"]] = $arItem;
////}
//
//Active::getSectionChilds($arSections, $tree, $aMenuLinksExt);
//
//$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
//
//?>



<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;

if(CModule::IncludeModule("iblock")) {
$IBLOCK_ID = 9; // указываем инфоблок с элементами

$arOrder = Array("SORT"=>"ASC", "IBLOCK_SECTION_ID");
$arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL",);
$arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y", "SECTION_ID"=>false);
//$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
$res = CIBlockSection::GetList($arOrder, $arFilter);



while($ob = $res->GetNextElement()) // наполняем массив меню пунктами меню
{
$arFields = $ob->GetFields();
//    echo "<pre>";
    //print_r($arFields['NAME']);

$aMenuLinksExt[] = Array(
$arFields['NAME'],
$arFields['LIST_PAGE_URL'].$arFields['SECTION_PAGE_URL'],

Array(),
Array(),
""
);
}
}

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks); // меню сформировано
?>
