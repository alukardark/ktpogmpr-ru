<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CModule::IncludeModule('iblock');

$arSections = CIBlockSection::GetList(array("left_margin" => "asc"), array("IBLOCK_CODE" => "services_".SITE_ID, "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y"), false, array());

$arSectionsDoc = CIBlockSection::GetList(array("left_margin" => "asc"), array("IBLOCK_CODE" => "media", "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y",'DEPTH_LEVEL'=>1 ), false, array());

/*$arItemsTree = CIBlockElement::GetList(
	Array("SORT" => "ASC"),
	array("IBLOCK_CODE" => "services_".SITE_ID, "ACTIVE" => "Y", "SECTION_GLOBAL_ACTIVE" => "Y", "INCLUDE_SUBSECTIONS" => "Y"),
	false,
	false,
	array()
);*/

$arItemsTree = CIBlockSection::GetList(
	Array("SORT" => "ASC"),
	array("IBLOCK_CODE" => "services_".SITE_ID, "ACTIVE" => "Y")
);

$arItemsTreeDoc = CIBlockSection::GetList(
	Array("SORT" => "ASC"),
	array("IBLOCK_CODE" => "media", "ACTIVE" => "Y")
);


$tree = array();
$treeDoc = array();

while ($arItem = $arItemsTree->GetNext()) {
	$tree[$arItem["IBLOCK_SECTION_ID"]]["CHILDS"][$arItem["ID"]] = $arItem;
	unset($tree[$arItem["IBLOCK_SECTION_ID"]]["CHILDS"][$arItem["ID"]]);
}
while ($arItem = $arItemsTreeDoc->GetNext()) {
	$treeDoc[$arItem["IBLOCK_SECTION_ID"]]["CHILDS"][$arItem["ID"]] = $arItem;
	unset($treeDoc[$arItem["IBLOCK_SECTION_ID"]]["CHILDS"][$arItem["ID"]]);
}


Active::getSectionChilds($arSections, $tree, $aMenuLinksExt);
Active::getSectionChilds($arSectionsDoc, $tree, $aMenuLinksExtDoc);

foreach ($aMenuLinksExtDoc as &$value) {
	$value[1] =  "media/".$value[1];
	$value[3] =  ['FROM_IBLOCK'=>1, 'DEPTH_LEVEL'=>2];
	unset($value[3]['IS_PARENT']);
}


$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);

if(is_array($aMenuLinksExtDoc)){
	$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExtDoc);
}

//print_r($aMenuLinks);


?>
<?//
//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//global $APPLICATION;
//if(CModule::IncludeModule("iblock"))
//{
//	$IBLOCK_ID = 26;        // указываем из акого инфоблока берем элементы
//	$arOrder = Array("SORT"=>"ASC");    // сортируем по свойству SORT по возрастанию
//	$arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL");
//	$arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y");
//	$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
//	while($ob = $res->GetNextElement())
//	{
//		$arFields = $ob->GetFields();            // берем поля
////        echo $arFields['NAME']." - arFields['NAME']<br>";
//		/*        echo '<pre>';
//                print_r($arFields);        //
//                echo '</pre>';        */
//		// начинаем наполнять массив aMenuLinksExt нужными данными
//		$aMenuLinksExt[] = Array(
//			$arFields['NAME'],
//			$arFields['DETAIL_PAGE_URL'],
//			Array(),
//			Array(),
//			""
//		);
//	}        //     while($ob = $res->GetNextElement())
//}    //     if(CModule::IncludeModule("iblock"))
///*    echo "<br>Массив <b>aMenuLinksExt</b> - дополнительный";
//    echo '<pre>';
//    print_r($aMenuLinksExt);
//    echo '</pre>';            */
//$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
//// $aMenuLinks = array_merge($aMenuLinks);
//?>