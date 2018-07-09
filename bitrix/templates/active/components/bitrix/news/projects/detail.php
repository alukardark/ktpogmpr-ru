<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"projects",
	Array(
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"USE_SHARE" 			=> $arParams["USE_SHARE"],
		"SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
	),
	$component
);?>

<?
$linkedIBlocks = Active::getLinkedProperties($ElementID);
$linkedPartners = Active::getLinkedItems($ElementID, $arParams["IBLOCK_ID"], "PROPERTY_LINKED_PARTNERS");
$linkedProjects = Active::getLinkedItems($ElementID, $arParams["IBLOCK_ID"], "PROPERTY_LINKED_PROJECTS");
$linkedServices = Active::getLinkedItems($ElementID, $arParams["IBLOCK_ID"], "PROPERTY_LINKED_SERVICES");
$linkedStaff = Active::getLinkedItems($ElementID, $arParams["IBLOCK_ID"], "PROPERTY_LINKED_STAFF");
$linkedReviews = Active::getLinkedItems($ElementID, $arParams["IBLOCK_ID"], "PROPERTY_LINKED_REVIEWS");
?>

<?if(!empty($linkedPartners)) {?>
	<?
	global $arFilter;
	$arFilter = array("ID" => $linkedPartners);
	?>
	<h2><?=GetMessage("LINKED_PARTNERS_TITLE")?></h2>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "partners_slider", Array(
		"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => $linkedIBlocks[0]["LINKED_PARTNERS"]["LINK_IBLOCK_ID"],
			"NEWS_COUNT" => "20",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "ACTIVE_FROM",
			"SORT_ORDER2" => "DESC",
			"FILTER_NAME" => "arFilter",
			"FIELD_CODE" => array(
				0 => "PREVIEW_TEXT",
				1 => "PREVIEW_PICTURE",
				2 => "DETAIL_PICTURE",
				3 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "PRICECURRENCY",
				2 => "PRICE",
				3 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "j F Y",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "Новости",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
			"PAGER_SHOW_ALL" => "N",
			"DISPLAY_DATE" => "N",
			"ITEMS_PER_ROW"	=>	3,
			"DISPLAY_DETAIL_BUTTON"	=>	"N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"SET_BROWSER_TITLE" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_META_DESCRIPTION" => "Y",
			"INCLUDE_SUBSECTIONS" => "Y",
			"COMPONENT_TEMPLATE" => "home_services",
			"SET_LAST_MODIFIED" => "N",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"SHOW_404" => "N",
			"MESSAGE_404" => "",
		),
		false
	);?>
<?}?>

<?if(!empty($linkedStaff)) {?>
	<?
	global $arFilter;
	$arFilter = array("ID" => $linkedStaff);
	?>
	<h2><?=GetMessage("LINKED_STAFF_TITLE")?></h2>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "staff_slider", Array(
		"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => $linkedIBlocks[0]["LINKED_STAFF"]["LINK_IBLOCK_ID"],
			"NEWS_COUNT" => "20",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "ACTIVE_FROM",
			"SORT_ORDER2" => "DESC",
			"FILTER_NAME" => "arFilter",
			"FIELD_CODE" => array(
				0 => "PREVIEW_TEXT",
				1 => "PREVIEW_PICTURE",
				2 => "DETAIL_PICTURE",
				3 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "",
				1 => "PRICECURRENCY",
				2 => "PRICE",
				3 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "j F Y",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "Новости",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
			"PAGER_SHOW_ALL" => "N",
			"DISPLAY_DATE" => "N",
			"ITEMS_PER_ROW"	=>	3,
			"DISPLAY_DETAIL_BUTTON"	=>	"N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"SET_BROWSER_TITLE" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_META_DESCRIPTION" => "Y",
			"INCLUDE_SUBSECTIONS" => "Y",
			"COMPONENT_TEMPLATE" => "home_services",
			"SET_LAST_MODIFIED" => "N",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"SHOW_404" => "N",
			"MESSAGE_404" => "",
		),
		false
	);?>
<?}?>

<?if(!empty($linkedReviews)) {?>
	<?
	global $arFilter;
	$arFilter = array("ID" => $linkedReviews);
	?>
	<h2><?=GetMessage("LINKED_REVIEWS_TITLE")?></h2>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"reviews",
	array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => $linkedIBlocks[0]["LINKED_REVIEWS"]["LINK_IBLOCK_ID"],
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arFilter",
		"FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "PRICECURRENCY",
			2 => "PRICE",
			3 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "N",
		"ITEMS_PER_ROW"	=>	3,
		"DISPLAY_DETAIL_BUTTON"	=>	"N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"COMPONENT_TEMPLATE" => "reviews",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
<?}?>

<?if(!empty($linkedServices)) {?>
	<?
	global $arFilter;
	$arFilter = array("ID" => $linkedServices);
	?>
	<h2><?=GetMessage("LINKED_SERVICES_TITLE")?></h2>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"services_slider",
	array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => $linkedIBlocks[0]["LINKED_SERVICES"]["LINK_IBLOCK_ID"],
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "arFilter",
		"FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "PRICECURRENCY",
			2 => "PRICE",
			3 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "N",
		"ITEMS_PER_ROW"	=>	3,
		"DISPLAY_DETAIL_BUTTON"	=>	"N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"COMPONENT_TEMPLATE" => "services_slider",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
<?}?>

<?if(!empty($linkedProjects)) {?>
	<?
	global $arFilter;
	$arFilter = array("ID" => $linkedProjects);
	?>
	<h2><?=GetMessage("LINKED_PROJECTS_TITLE")?></h2>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"services_slider",
	array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => $linkedIBlocks[0]["LINKED_PROJECTS"]["LINK_IBLOCK_ID"],
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "arFilter",
		"FIELD_CODE" => array(
			0 => "PREVIEW_TEXT",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "PRICECURRENCY",
			2 => "PRICE",
			3 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "N",
		"ITEMS_PER_ROW"	=>	3,
		"DISPLAY_DETAIL_BUTTON"	=>	"N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"COMPONENT_TEMPLATE" => "services_slider",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
<?}?>

<?
$db_props = CIBlockElement::GetProperty($arParams["IBLOCK_ID"], $ElementID, array(), array("CODE" => "SHOW_ASK_FORM"));
if($ar_props = $db_props->Fetch()) {
	$showAskForm = $ar_props["VALUE_XML_ID"];
}
?>

<?if($showAskForm == "Y"):?>
	<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
	        "AREA_FILE_SHOW" => "file",
	        "PATH" => SITE_DIR."include/detail_ask_question.php",
	        "AREA_FILE_SUFFIX" => "inc",
	        "AREA_FILE_RECURSIVE" => "Y",
	        "EDIT_TEMPLATE" => "standard.php"
	    )
	);?>
<?endif?>


<div class="page-footer clear">
	<div class="clearfix">
		<div class="col col-back-btn">
<!--			<a class="btn btn-default" href="--><?//=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"]?><!--">-->
				<a class="btn btn-default" href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"].$arResult['VARIABLES']['SECTION_CODE']."/"?>">
				<i class="fa fa-angle-left"></i><?=GetMessage("T_NEWS_DETAIL_BACK")?></a></div>
		<div class="col col-share"><span class="block-label"><?=GetMessage("T_NEWS_DETAIL_SHARE")?></span>
			<script type="text/javascript" src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
			<script type="text/javascript" src="https://yastatic.net/share2/share.js" charset="utf-8"></script>
			<div data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter" data-counter="" class="ya-share2"></div>
		</div>
	</div>
</div>
