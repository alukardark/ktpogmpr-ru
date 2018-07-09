<?//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//
//CModule::IncludeModule('iblock');
//
//$arSections = CIBlockSection::GetList(array("left_margin" => "asc"), array("IBLOCK_CODE" => "projects_".SITE_ID, "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y"), false, array());
//
//$arItemsTree = CIBlockElement::GetList(Array("SORT" => "ASC"), array("IBLOCK_CODE" => "projects_".SITE_ID, "ACTIVE" => "Y", "SECTION_GLOBAL_ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => "Y"), false, false, array());
//
//$tree = array();
//
//while ($arItem = $arItemsTree->GetNext()) {
//	$tree[$arItem["IBLOCK_SECTION_ID"]]["CHILDS"][$arItem["ID"]] = $arItem;
//}
//
//Active::getSectionChilds($arSections, $tree, $aMenuLinksExt);
//
//$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
//?>
