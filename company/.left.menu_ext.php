<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
if(CModule::IncludeModule("iblock"))
{
	$IBLOCK_ID = 27;        // указываем из акого инфоблока берем элементы
	$arOrder = Array("SORT"=>"ASC");    // сортируем по свойству SORT по возрастанию
	$arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL");
	$arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
	$i = 1;

	$aMenuLinksExt[100] = Array(
		'Первичные организации',
		'/company/pervychnie-organizacuy/',
		Array(),
		Array(
			'FROM_IBLOCK' => 1,
			'DEPTH_LEVEL'=> 1,
			'IS_PARENT' => 1
		),

	);

	while($ob = $res->GetNextElement())
	{


		$arFields = $ob->GetFields();            // берем поля
//        echo $arFields['NAME']." - arFields['NAME']<br>";
		/*        echo '<pre>';
                print_r($arFields);        //
                echo '</pre>';        */
		// начинаем наполнять массив aMenuLinksExt нужными данными
//		if($i == 1){
//			$aMenuLinksExt[] = Array(
//				$arFields['NAME'],
//				'/company/'.$arFields['DETAIL_PAGE_URL'],
//				Array(),
//				Array(
//					'FROM_IBLOCK' => 1,
//					'DEPTH_LEVEL'=> 1,
//					'IS_PARENT' => 1
//
//				)
//			);
//			$i = 2;
//		}elseif($i == 2){
			$aMenuLinksExt[] = Array(
				$arFields['NAME'],
				'/company/'.$arFields['DETAIL_PAGE_URL'],
				Array(),
				Array(
					'FROM_IBLOCK' => 1,
					'DEPTH_LEVEL'=> 2,
					'IS_ITEM' => 1
				)
			);
//		}

	}        //     while($ob = $res->GetNextElement())
}    //     if(CModule::IncludeModule("iblock"))
/*    echo "<br>Массив <b>aMenuLinksExt</b> - дополнительный";
    echo '<pre>';
    print_r($aMenuLinksExt);
    echo '</pre>';            */
$firstLink = Array(
	Array(
		"Устав",
		"/company/documents-ustav/",
		Array(),
		Array(),
		""
	)
);
$lastLink = Array(
	Array(
		"Сотрудники",
		"/company/staff/",
		Array(),
		Array(),
		""
	)
);
$aMenuLinks = array_merge( $firstLink,$aMenuLinksExt,$lastLink, $aMenuLinks);
//print_r($aMenuLinksExt);
// $aMenuLinks = array_merge($aMenuLinks);
?>
<?//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//
//CModule::IncludeModule('iblock');
//
//$arSections = CIBlockSection::GetList(array("left_margin" => "asc"), array("IBLOCK_CODE" => "projects_".SITE_ID, "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y"), false, array());
//
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
//$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);print_r($aMenuLinks);
//?>
