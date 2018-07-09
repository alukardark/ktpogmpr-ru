<?//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//
//CModule::IncludeModule('iblock');
//
//$arSections = CIBlockSection::GetList(array("left_margin" => "asc"), array("IBLOCK_CODE" => "services_".SITE_ID, "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y"), false, array());
//
//$arItemsTree = CIBlockElement::GetList(Array("SORT" => "ASC"), array("IBLOCK_CODE" => "services_".SITE_ID, "ACTIVE" => "Y", "SECTION_GLOBAL_ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => "Y"), false, false, array());
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
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
if(CModule::IncludeModule("iblock"))
{
	$IBLOCK_ID = 26;        // указываем из акого инфоблока берем элементы
	$arOrder = Array("SORT"=>"ASC");    // сортируем по свойству SORT по возрастанию
	$arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL");
	$arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();            // берем поля
//        echo $arFields['NAME']." - arFields['NAME']<br>";
		/*        echo '<pre>';
                print_r($arFields);        //
                echo '</pre>';        */
		// начинаем наполнять массив aMenuLinksExt нужными данными
		$aMenuLinksExt[] = Array(
			$arFields['NAME'],
			$arFields['DETAIL_PAGE_URL'],
			Array(),
			Array(),
			""
		);
	}        //     while($ob = $res->GetNextElement())
}    //     if(CModule::IncludeModule("iblock"))
/*    echo "<br>Массив <b>aMenuLinksExt</b> - дополнительный";
    echo '<pre>';
    print_r($aMenuLinksExt);
    echo '</pre>';            */
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
// $aMenuLinks = array_merge($aMenuLinks);
?>