<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("rss");
?><?$APPLICATION->IncludeComponent(
	"bitrix:rss.out", 
	".default", 
	array(
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"FILTER_NAME" => "",
		"IBLOCK_ID" => "31",
		"IBLOCK_TYPE" => "content",
		"NUM_DAYS" => "120",
		"NUM_NEWS" => "20",
		"RSS_TTL" => "60",
		"SECTION_CODE" => "novosti-ktpo-gmpr",
		"SECTION_ID" => "37",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"YANDEX" => "N",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>