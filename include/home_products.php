<!--<div class="block-content-wrap clearfix">-->
<!--	<div class="sc-maxwidth">-->
<!--		<div class="ms-tabs products-slider-tabs">-->
<!--			<div class="tabs-ctrl"><a href="#ps1-tab1" class="active">Рекомендуем</a><a href="#ps1-tab2">Хиты продаж</a><a href="#ps1-tab3">Новинки</a></div>-->
<!--			<div class="tab-content">-->
<!--				<div id="ps1-tab1" class="tab-pane fade in active">-->
<!--				--><?//
//				global $arrFilterRecommend;
//				$arrFilterRecommend["!PROPERTY_RECOMMEND"] = false;
//				?>
<!--				--><?//$APPLICATION->IncludeComponent(
//	"bitrix:news.list",
//	"home_products",
//	array(
//		"IBLOCK_TYPE" => "catalog",
//		"IBLOCK_ID" => "6",
//		"NEWS_COUNT" => "20",
//		"SORT_BY1" => "SORT",
//		"SORT_ORDER1" => "ASC",
//		"SORT_BY2" => "ACTIVE_FROM",
//		"SORT_ORDER2" => "DESC",
//		"FILTER_NAME" => "arrFilterRecommend",
//		"FIELD_CODE" => array(
//			0 => "PREVIEW_TEXT",
//			1 => "PREVIEW_PICTURE",
//			2 => "DETAIL_PICTURE",
//			3 => "",
//		),
//		"PROPERTY_CODE" => array(
//			0 => "PRICE",
//			1 => "CURRENCY",
//			2 => "STATUS",
//			3 => "ART",
//			4 => "BRAND",
//			5 => "",
//		),
//		"CHECK_DATES" => "Y",
//		"DETAIL_URL" => "",
//		"AJAX_MODE" => "N",
//		"AJAX_OPTION_JUMP" => "N",
//		"AJAX_OPTION_STYLE" => "Y",
//		"AJAX_OPTION_HISTORY" => "N",
//		"CACHE_TYPE" => "A",
//		"CACHE_TIME" => "36000000",
//		"CACHE_FILTER" => "N",
//		"CACHE_GROUPS" => "Y",
//		"PREVIEW_TRUNCATE_LEN" => "",
//		"ACTIVE_DATE_FORMAT" => "j F Y",
//		"SET_TITLE" => "N",
//		"SET_STATUS_404" => "N",
//		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
//		"ADD_SECTIONS_CHAIN" => "N",
//		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
//		"PARENT_SECTION" => "",
//		"PARENT_SECTION_CODE" => "",
//		"DISPLAY_TOP_PAGER" => "N",
//		"DISPLAY_BOTTOM_PAGER" => "N",
//		"PAGER_TITLE" => "Новости",
//		"PAGER_SHOW_ALWAYS" => "N",
//		"PAGER_TEMPLATE" => "",
//		"PAGER_DESC_NUMBERING" => "N",
//		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
//		"PAGER_SHOW_ALL" => "N",
//		"DISPLAY_DATE" => "N",
//		"ITEMS_PER_ROW" => "5",
//		"DISPLAY_DETAIL_BUTTON" => "Y",
//		"DISPLAY_NAME" => "Y",
//		"DISPLAY_PICTURE" => "Y",
//		"DISPLAY_PREVIEW_TEXT" => "N",
//		"AJAX_OPTION_ADDITIONAL" => "",
//		"SET_BROWSER_TITLE" => "N",
//		"SET_META_KEYWORDS" => "N",
//		"SET_META_DESCRIPTION" => "N",
//		"INCLUDE_SUBSECTIONS" => "Y",
//		"COMPONENT_TEMPLATE" => "home_products",
//		"SET_LAST_MODIFIED" => "N",
//		"PAGER_BASE_LINK_ENABLE" => "N",
//		"SHOW_404" => "N",
//		"MESSAGE_404" => ""
//	),
//	false
//);?>
<!--				</div>-->
<!--				<div id="ps1-tab2" class="tab-pane fade">-->
<!--				--><?//
//				global $arrFilterBestseller;
//				$arrFilterBestseller["!PROPERTY_BESTSELLER"] = false;
//				?>
<!--				--><?//$APPLICATION->IncludeComponent(
//	"bitrix:news.list",
//	"home_products",
//	array(
//		"IBLOCK_TYPE" => "catalog",
//		"IBLOCK_ID" => "6",
//		"NEWS_COUNT" => "20",
//		"SORT_BY1" => "SORT",
//		"SORT_ORDER1" => "DESC",
//		"SORT_BY2" => "ACTIVE_FROM",
//		"SORT_ORDER2" => "DESC",
//		"FILTER_NAME" => "arrFilterBestseller",
//		"FIELD_CODE" => array(
//			0 => "PREVIEW_TEXT",
//			1 => "PREVIEW_PICTURE",
//			2 => "DETAIL_PICTURE",
//			3 => "",
//		),
//		"PROPERTY_CODE" => array(
//			0 => "PRICE",
//			1 => "CURRENCY",
//			2 => "STATUS",
//			3 => "ART",
//			4 => "BRAND",
//			5 => "",
//		),
//		"CHECK_DATES" => "Y",
//		"DETAIL_URL" => "",
//		"AJAX_MODE" => "N",
//		"AJAX_OPTION_JUMP" => "N",
//		"AJAX_OPTION_STYLE" => "Y",
//		"AJAX_OPTION_HISTORY" => "N",
//		"CACHE_TYPE" => "A",
//		"CACHE_TIME" => "36000000",
//		"CACHE_FILTER" => "N",
//		"CACHE_GROUPS" => "Y",
//		"PREVIEW_TRUNCATE_LEN" => "",
//		"ACTIVE_DATE_FORMAT" => "j F Y",
//		"SET_TITLE" => "N",
//		"SET_STATUS_404" => "N",
//		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
//		"ADD_SECTIONS_CHAIN" => "N",
//		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
//		"PARENT_SECTION" => "",
//		"PARENT_SECTION_CODE" => "",
//		"DISPLAY_TOP_PAGER" => "N",
//		"DISPLAY_BOTTOM_PAGER" => "N",
//		"PAGER_TITLE" => "Новости",
//		"PAGER_SHOW_ALWAYS" => "N",
//		"PAGER_TEMPLATE" => "",
//		"PAGER_DESC_NUMBERING" => "N",
//		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
//		"PAGER_SHOW_ALL" => "N",
//		"DISPLAY_DATE" => "N",
//		"ITEMS_PER_ROW" => "5",
//		"DISPLAY_DETAIL_BUTTON" => "Y",
//		"DISPLAY_NAME" => "Y",
//		"DISPLAY_PICTURE" => "Y",
//		"DISPLAY_PREVIEW_TEXT" => "N",
//		"AJAX_OPTION_ADDITIONAL" => "",
//		"SET_BROWSER_TITLE" => "N",
//		"SET_META_KEYWORDS" => "N",
//		"SET_META_DESCRIPTION" => "N",
//		"INCLUDE_SUBSECTIONS" => "Y",
//		"COMPONENT_TEMPLATE" => "home_products",
//		"SET_LAST_MODIFIED" => "N",
//		"PAGER_BASE_LINK_ENABLE" => "N",
//		"SHOW_404" => "N",
//		"MESSAGE_404" => ""
//	),
//	false
//);?>
<!--				</div>-->
<!--				<div id="ps1-tab3" class="tab-pane fade">-->
<!--				--><?//
//				global $arrFilterNew;
//				$arrFilterNew["!PROPERTY_NEW"] = false;
//				?>
<!--				--><?//$APPLICATION->IncludeComponent(
//	"bitrix:news.list",
//	"home_products",
//	array(
//		"IBLOCK_TYPE" => "catalog",
//		"IBLOCK_ID" => "6",
//		"NEWS_COUNT" => "20",
//		"SORT_BY1" => "SORT",
//		"SORT_ORDER1" => "ASC",
//		"SORT_BY2" => "ACTIVE_FROM",
//		"SORT_ORDER2" => "DESC",
//		"FILTER_NAME" => "arrFilterNew",
//		"FIELD_CODE" => array(
//			0 => "PREVIEW_TEXT",
//			1 => "PREVIEW_PICTURE",
//			2 => "DETAIL_PICTURE",
//			3 => "",
//		),
//		"PROPERTY_CODE" => array(
//			0 => "PRICE",
//			1 => "CURRENCY",
//			2 => "STATUS",
//			3 => "ART",
//			4 => "BRAND",
//			5 => "",
//		),
//		"CHECK_DATES" => "Y",
//		"DETAIL_URL" => "",
//		"AJAX_MODE" => "N",
//		"AJAX_OPTION_JUMP" => "N",
//		"AJAX_OPTION_STYLE" => "Y",
//		"AJAX_OPTION_HISTORY" => "N",
//		"CACHE_TYPE" => "A",
//		"CACHE_TIME" => "36000000",
//		"CACHE_FILTER" => "N",
//		"CACHE_GROUPS" => "Y",
//		"PREVIEW_TRUNCATE_LEN" => "",
//		"ACTIVE_DATE_FORMAT" => "j F Y",
//		"SET_TITLE" => "N",
//		"SET_STATUS_404" => "N",
//		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
//		"ADD_SECTIONS_CHAIN" => "N",
//		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
//		"PARENT_SECTION" => "",
//		"PARENT_SECTION_CODE" => "",
//		"DISPLAY_TOP_PAGER" => "N",
//		"DISPLAY_BOTTOM_PAGER" => "N",
//		"PAGER_TITLE" => "Новости",
//		"PAGER_SHOW_ALWAYS" => "N",
//		"PAGER_TEMPLATE" => "",
//		"PAGER_DESC_NUMBERING" => "N",
//		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
//		"PAGER_SHOW_ALL" => "N",
//		"DISPLAY_DATE" => "N",
//		"ITEMS_PER_ROW" => "5",
//		"DISPLAY_DETAIL_BUTTON" => "Y",
//		"DISPLAY_NAME" => "Y",
//		"DISPLAY_PICTURE" => "Y",
//		"DISPLAY_PREVIEW_TEXT" => "N",
//		"AJAX_OPTION_ADDITIONAL" => "",
//		"SET_BROWSER_TITLE" => "N",
//		"SET_META_KEYWORDS" => "N",
//		"SET_META_DESCRIPTION" => "N",
//		"INCLUDE_SUBSECTIONS" => "Y",
//		"COMPONENT_TEMPLATE" => "home_products",
//		"SET_LAST_MODIFIED" => "N",
//		"PAGER_BASE_LINK_ENABLE" => "N",
//		"SHOW_404" => "N",
//		"MESSAGE_404" => ""
//	),
//	false
//);?>
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
