<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arViewMode = array(
	'grid' => GetMessage('DISPLAY_VIEW_MODE_GRID'),
	'list' => GetMessage('DISPLAY_VIEW_MODE_LIST')
);

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("SHOW_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("SHOW_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("SHOW_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_DETAIL_BUTTON" => Array(
		"NAME" => GetMessage("DISPLAY_DETAIL_BUTTON"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"ITEMS_PER_ROW" => Array(
		"NAME" => GetMessage("ITEMS_PER_ROW"),
		"TYPE" => "STRING",
		"DEFAULT" => "4",
	),
);

?>
