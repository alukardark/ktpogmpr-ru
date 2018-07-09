<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<!---->
<?//if($arParams["USE_RSS"]=="Y"):?>
<!--	--><?//
//	$rss_url = CComponentEngine::makePathFromTemplate($arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss_section"], array_map("urlencode", $arResult["VARIABLES"]));
//	if(method_exists($APPLICATION, 'addheadstring'))
//		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$rss_url.'" href="'.$rss_url.'" />');
//	?>
<!--	<a href="--><?//=$rss_url?><!--" title="rss" target="_self"><img alt="RSS" src="--><?//=$templateFolder?><!--/images/gif-light/feed-icon-16x16.gif" border="0" align="right" /></a>-->
<?//endif?>
<!---->
<?//if($arParams["USE_SEARCH"]=="Y"):?>
<?//=GetMessage("SEARCH_LABEL")?><!----><?//$APPLICATION->IncludeComponent(
//	"bitrix:search.form",
//	"flat",
//	Array(
//		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
//	),
//	$component
//);?>
<!--<br />-->
<?//endif?>
<?//if($arParams["USE_FILTER"]=="Y"):?>
<?//$APPLICATION->IncludeComponent(
//	"bitrix:catalog.filter",
//	"",
//	Array(
//		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
//		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
//		"FILTER_NAME" => $arParams["FILTER_NAME"],
//		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
//		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],
//		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
//		"CACHE_TIME" => $arParams["CACHE_TIME"],
//		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
//		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
//	),
//	$component
//);
//?>
<!--<br />-->
<?//endif?>
<?
//$arResult['VARIABLES']['SECTION_CODE'];
?>
<?

?>
<?
CModule::IncludeModule("iblock");
$el = CIBlockSection::GetList(array(), array('IBLOCK_ID'=>33,'CODE' => $arResult['VARIABLES']['SECTION_CODE']),
	false , array('IBLOCK_ID','SECTION_ID','ID'),array('nTopCount' => 1))->Fetch();




$arSections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]
,"CODE"=>$arResult['VARIABLES']['SECTION_CODE']
));




//if($arSections->result->num_rows === 0){
//	$arSections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]
//	,"CODE"=>$arResult['VARIABLES']['SECTION_CODE']
//	));
//
//}else{
//	$arSections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]
//	,"SECTION_ID"=>$el['ID']
//	));
//}

?>


<?while ($arSection = $arSections->Fetch()):



	global $arSectionFilter;

	$arSectionFilter = array("SECTION_ID" => $arSection["ID"], "SECTION_CODE" => $arSection["CODE"]);

	//print_r( $arSection["CODE"]);

	$arCountFilter = array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $arSection["ID"],
		"SECTION_CODE" => $arSection["CODE"],
		"ACTIVE" => "Y",
		'GLOBAL_ACTIVE' => 'Y',
		"INCLUDE_SUBSECTIONS" => ($arParams["INCLUDE_SUBSECTIONS"] == 'N' ? 'N' : 'Y')
	);
	$rsElementsCount = CIBlockElement::GetList(array(), $arCountFilter, array(), false, array());
	?>

	<?

	?>
	<h2><a class="my-header-link-cat

	 <?if ($arSection['DEPTH_LEVEL']<=1){

		}elseif($arSection['DEPTH_LEVEL']==2){
			echo 'childCat';
		}elseif($arSection['DEPTH_LEVEL']>=3){
			echo 'childCatLittle';
		}
		?>
	"
		   href="/sections/media/<?=$arSection['CODE']?>/"><?=$arSection['NAME']?></a></h2>

	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	Array(
		"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
		"NEWS_COUNT"	=>	$arParams["NEWS_COUNT"],
		"SORT_BY1"	=>	$arParams["SORT_BY1"],
		"SORT_ORDER1"	=>	$arParams["SORT_ORDER1"],
		"SORT_BY2"	=>	$arParams["SORT_BY2"],
		"SORT_ORDER2"	=>	$arParams["SORT_ORDER2"],
		"FIELD_CODE"	=>	$arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE"	=>	$arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"DISPLAY_PANEL"	=>	$arParams["DISPLAY_PANEL"],
		"SET_TITLE"	=>	$arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN"	=>	$arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
		"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
		"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER"	=>	"N",
		"DISPLAY_BOTTOM_PAGER"	=>	"N",
		"PAGER_TITLE"	=>	$arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE"	=>	$arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS"	=>	$arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING"	=>	$arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"DISPLAY_DATE"	=>	$arParams["DISPLAY_DATE"],
		"ITEMS_PER_ROW"	=>	$arParams["ITEMS_PER_ROW"],
		"DISPLAY_NAME"	=>	"Y",
		"DISPLAY_PICTURE"	=>	$arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT"	=>	$arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN"	=>	$arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT"	=>	$arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME"	=>	"arSectionFilter",
		"HIDE_LINK_WHEN_NO_DETAIL"	=>	$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES"	=>	$arParams["CHECK_DATES"],
	),
	$component
);?>
<?endwhile?>




<?
CModule::IncludeModule("iblock");
$el = CIBlockSection::GetList(array(), array('IBLOCK_ID'=>33,'CODE' => $arResult['VARIABLES']['SECTION_CODE']),
	false , array('IBLOCK_ID','SECTION_ID','ID'),array('nTopCount' => 1))->Fetch();




$arSections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]
,"SECTION_ID"=>$el['ID']
));



//if($arSections->result->num_rows === 0){
//	$arSections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]
//	,"CODE"=>$arResult['VARIABLES']['SECTION_CODE']
//	));
//
//}else{
//	$arSections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]
//	,"SECTION_ID"=>$el['ID']
//	));
//}

?>


<?while ($arSection = $arSections->Fetch()):



	global $arSectionFilter;

	$arSectionFilter = array("SECTION_ID" => $arSection["ID"], "SECTION_CODE" => $arSection["CODE"]);

	//print_r( $arSection["CODE"]);

	$arCountFilter = array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $arSection["ID"],
		"SECTION_CODE" => $arSection["CODE"],
		"ACTIVE" => "Y",
		'GLOBAL_ACTIVE' => 'Y',
		"INCLUDE_SUBSECTIONS" => ($arParams["INCLUDE_SUBSECTIONS"] == 'N' ? 'N' : 'Y')
	);
	$rsElementsCount = CIBlockElement::GetList(array(), $arCountFilter, array(), false, array());
	?>

<?

	?>
	<h2><a class="my-header-link-cat

	 <?if ($arSection['DEPTH_LEVEL']<=1){

		}elseif($arSection['DEPTH_LEVEL']==2){
			echo 'childCat';
		}elseif($arSection['DEPTH_LEVEL']>=3){
			echo 'childCatLittle';
		}
		?>
	"
		   href="/sections/media/<?=$arSection['CODE']?>/"><?=$arSection['NAME']?></a></h2>

	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"",
		Array(
			"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
			"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
			"NEWS_COUNT"	=>	$arParams["NEWS_COUNT"],
			"SORT_BY1"	=>	$arParams["SORT_BY1"],
			"SORT_ORDER1"	=>	$arParams["SORT_ORDER1"],
			"SORT_BY2"	=>	$arParams["SORT_BY2"],
			"SORT_ORDER2"	=>	$arParams["SORT_ORDER2"],
			"FIELD_CODE"	=>	$arParams["LIST_FIELD_CODE"],
			"PROPERTY_CODE"	=>	$arParams["LIST_PROPERTY_CODE"],
			"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
			"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
			"DISPLAY_PANEL"	=>	$arParams["DISPLAY_PANEL"],
			"SET_TITLE"	=>	$arParams["SET_TITLE"],
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"INCLUDE_IBLOCK_INTO_CHAIN"	=>	$arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
			"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
			"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
			"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"DISPLAY_TOP_PAGER"	=>	"N",
			"DISPLAY_BOTTOM_PAGER"	=>	"N",
			"PAGER_TITLE"	=>	$arParams["PAGER_TITLE"],
			"PAGER_TEMPLATE"	=>	$arParams["PAGER_TEMPLATE"],
			"PAGER_SHOW_ALWAYS"	=>	$arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_DESC_NUMBERING"	=>	$arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"DISPLAY_DATE"	=>	$arParams["DISPLAY_DATE"],
			"ITEMS_PER_ROW"	=>	$arParams["ITEMS_PER_ROW"],
			"DISPLAY_NAME"	=>	"Y",
			"DISPLAY_PICTURE"	=>	$arParams["DISPLAY_PICTURE"],
			"DISPLAY_PREVIEW_TEXT"	=>	$arParams["DISPLAY_PREVIEW_TEXT"],
			"PREVIEW_TRUNCATE_LEN"	=>	$arParams["PREVIEW_TRUNCATE_LEN"],
			"ACTIVE_DATE_FORMAT"	=>	$arParams["LIST_ACTIVE_DATE_FORMAT"],
			"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
			"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
			"FILTER_NAME"	=>	"arSectionFilter",
			"HIDE_LINK_WHEN_NO_DETAIL"	=>	$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
			"CHECK_DATES"	=>	$arParams["CHECK_DATES"],
		),
		$component
	);?>
<?endwhile?>
