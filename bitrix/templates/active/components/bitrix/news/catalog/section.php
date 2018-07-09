<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(false);?>

<?
$arParams["INCLUDE_SUBSECTIONS"] = "N";

$arFilter = array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
	"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
	"ACTIVE" => "Y",
	'GLOBAL_ACTIVE' => 'Y',
	"INCLUDE_SUBSECTIONS" => ($arParams["INCLUDE_SUBSECTIONS"] == 'N' ? 'N' : 'Y')
);

$rsElementsCount = CIBlockElement::GetList(array(), $arFilter, array(), false, array());
?>

<!-- Start Description -->
<?if(empty($_REQUEST["PAGEN_1"])) {?>
	<?
	$arFilter = array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		'GLOBAL_ACTIVE' => 'Y'
	);

	$arSelect = array(
		"NAME",
		"UF_TOP_DESCRIPTION"
	);

	$rsSections = CIBlockSection::GetList(array(), $arFilter, false, $arSelect);

	while ($arSection = $rsSections->Fetch())
	{
			?>
			<?if(!empty($arSection['UF_TOP_DESCRIPTION'])):?>
				<div class="category-top-description">
					<? echo $arSection['UF_TOP_DESCRIPTION']; ?>
				</div>
			<?endif?>
			<?
	}
	?>
<?}?>
<!-- End Description -->

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"catalog_sections",
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
		"INCLUDE_IBLOCK_INTO_CHAIN"	=>	"N",
		"ADD_SECTIONS_CHAIN"	=>	"N",
		"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
		"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
		"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER"	=>	$arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER"	=>	$arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE"	=>	$arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE"	=>	$arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS"	=>	$arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING"	=>	$arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"DISPLAY_DATE"	=>	$arParams["DISPLAY_DATE"],
		"ITEMS_PER_ROW"	=>	$arParams["ITEMS_PER_ROW"],
		"DISPLAY_DETAIL_BUTTON"	=>	$arParams["DISPLAY_DETAIL_BUTTON"],
		"DISPLAY_VIEW_MODE"	=>	$arParams["DISPLAY_VIEW_MODE"],
		"DISPLAY_NAME"	=>	"Y",
		"DISPLAY_PICTURE"	=>	$arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT"	=>	$arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN"	=>	$arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT"	=>	$arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME"	=>	$arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL"	=>	$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES"	=>	$arParams["CHECK_DATES"],

		"PARENT_SECTION"	=>	$arResult["VARIABLES"]["SECTION_ID"],
		"PARENT_SECTION_CODE"	=>	$arResult["VARIABLES"]["SECTION_CODE"],
	),
	$component
);?>

<?
$arSections = CIBlockSection::GetList(
	array(),
	array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"CODE" => $arResult["VARIABLES"]["SECTION_CODE"], "ACTIVE" => "Y"
	),
	false,
	array("ID", "NAME")
);

while ($arSect = $arSections->GetNext())
{
   $arSectionName = $arSect["NAME"];
}
?>

<?
if($_REQUEST["view"]) {
	$viewMode = $_REQUEST["view"];
	setcookie("viewMode", $viewMode, 0, "/");
} else {
	if($_COOKIE["viewMode"]) {
		$viewMode = $_COOKIE["viewMode"];
	} else {
		$viewMode = "grid";
	}
}
$viewMode = "catalog_".$viewMode;

$arAvailableSort = array(
	"NAME" => Array("NAME", "asc"),
	"PRICE" => Array('PROPERTY_PRICE', "asc"),
	"DATE" => Array('DATE', "asc"),
);

$sort = array_key_exists("sort", $_REQUEST) && array_key_exists($_REQUEST["sort"], $arAvailableSort) ? $arAvailableSort[$_REQUEST["sort"]][0] : "NAME";
$sort_order = array_key_exists("order", $_REQUEST) && in_array($_REQUEST["order"], Array("asc", "desc")) ? $_REQUEST["order"] : $arAvailableSort[$sort][1];
?>

<?
$arAvailableLimit = array("12", "24", "48");

$limit = $APPLICATION->get_cookie('limit') ? $APPLICATION->get_cookie("limit") : "12";

if($_REQUEST["limit"])
	$limit = "12";
	$APPLICATION->set_cookie("limit", $limit);
if($_REQUEST["limit"] == "24")
	$limit = "24";
	$APPLICATION->set_cookie("limit", $limit);
if($_REQUEST["limit"] == "48")
	$limit = "48";
	$APPLICATION->set_cookie("limit", $limit);
?>

<?if ($rsElementsCount > 0):?>
	<?if(!isset($_REQUEST["ajax"])) $this->SetViewTarget("sidebar_filter");?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.smart.filter",
		"filter",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
			"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_GROUPS" => "Y",
			"SAVE_IN_SESSION" => "N",
			"INSTANT_RELOAD" => "N",
			"TEMPLATE_THEME" => "black",
			"FILTER_VIEW_MODE" => "vertical",
			"POPUP_POSITION" => "left",
			"XML_EXPORT" => "N",
			"SECTION_TITLE" => "-",
			"SECTION_DESCRIPTION" => "-",
			"COMPONENT_TEMPLATE" => "filter",
			"DISPLAY_ELEMENT_COUNT" => "Y",
			"SEF_MODE" => "N",
			"PAGER_PARAMS_NAME" => "arrPager"
		),
		false
	);?>
	<?if(!isset($_REQUEST["ajax"])) $this->EndViewTarget("sidebar_filter");?>
<?endif?>

<?if ($rsElementsCount > 0):?>
<div class="catalog_toolbar clearfix">
	<div class="item filter_button visible-xs-block">
		<button id="filter_mobile_btn" data-toggle="modal" data-target="#filter_mobile_modal" class="btn btn-primary btn-sm"><i class="fa fa-sliders"></i><?=GetMessage('FILTER_BTN')?></button>
	</div>
	<div class="item select_view">
		<button type="button" data-href="<?=$APPLICATION->GetCurPageParam('view=grid', array('view'))?>" class="btn <?if($viewMode == 'catalog_grid'):?>active<?endif;?> btn view_grid"><i></i></button>
		<button type="button" data-href="<?=$APPLICATION->GetCurPageParam('view=list', array('view'))?>" class="btn <?if($viewMode == 'catalog_list'):?>active<?endif;?> btn view_list"><i></i></button>
		<button type="button" data-href="<?=$APPLICATION->GetCurPageParam('view=compact', array('view'))?>" class="btn <?if($viewMode == 'catalog_compact'):?>active<?endif;?> btn view_compact"><i></i></button>
	</div>
	<div class="item sort_wrap">
		<span class="item_label"><?=GetMessage('SECT_SORT_LABEL')?></span>
		<div class="dropdown">
			<button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				<?=GetMessage('SECT_SORT_'.$sort)?>
				<i class="fa fa-angle-down"></i>
			</button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				<?foreach ($arAvailableSort as $key => $val):
					$className = ($sort == $val[0]) ? 'active' : '';
					if ($className)
						$className .= ($sort_order == 'asc') ? ' asc' : ' desc';
					$newSort = ($sort == $val[0]) ? ($sort_order == 'desc' ? 'asc' : 'desc') : $arAvailableSort[$key][1];
					?>
					<li class="<?=$className?>" role="presentation"><a role="menuitem" tabindex="-1" href="<?=$APPLICATION->GetCurPageParam('sort='.$key.'&order='.$newSort, array('sort', 'order'))?>" rel="nofollow"><?=GetMessage('SECT_SORT_'.$key)?><?if ($sort == $val[0]):?><?endif?></a></li>
				<?endforeach;?>
			</ul>
		</div>
	</div>
	<div class="item per_page_wrap"><span class="item_label"><?=GetMessage("SHOW_COUNT")?></span>
		<div class="dropdown">
			<button id="per_page_dropdown" type="button" data-toggle="dropdown" aria-expanded="true" class="btn dropdown-toggle"><span><?=$limit?></span><i class="fa fa-angle-down"></i></button>
			<ul role="menu" aria-labelledby="per_page_dropdown" class="dropdown-menu dd_fw">
				<?foreach($arAvailableLimit as $val):?>
					<li <?if($limit==$val) echo " class='active'";?>>
						<a rel="nofollow" href="<?=$APPLICATION->GetCurPageParam('limit='.$val, array('limit'))?>" data-val="<?=$val?>">
							<?=$val?>
						</a>
					</li>
				<?endforeach;?>
			</ul>
		</div>
	</div>
</div>
<?endif?>

<?if ($rsElementsCount > 0):?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		$viewMode,
		Array(
			"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
			"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
			"NEWS_COUNT"	=>	$limit,
			"SORT_BY1"	=>	$sort,
			"SORT_ORDER1"	=>	$sort_order,
			"SORT_BY2"	=>	$arParams["SORT_BY2"],
			"SORT_ORDER2"	=>	$arParams["SORT_ORDER2"],
			"FIELD_CODE"	=>	$arParams["LIST_FIELD_CODE"],
			"PROPERTY_CODE"	=>	$arParams["LIST_PROPERTY_CODE"],
			"DISPLAY_PANEL"	=>	$arParams["DISPLAY_PANEL"],
			"SET_TITLE"	=>	$arParams["SET_TITLE"],
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"INCLUDE_IBLOCK_INTO_CHAIN"	=>	$arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
			"ADD_SECTIONS_CHAIN"	=>	$arParams["ADD_SECTIONS_CHAIN"],
			"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
			"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
			"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"DISPLAY_TOP_PAGER"	=>	$arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER"	=>	$arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE"	=>	$arParams["PAGER_TITLE"],
			"PAGER_TEMPLATE"	=>	$arParams["PAGER_TEMPLATE"],
			"PAGER_SHOW_ALWAYS"	=>	$arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_DESC_NUMBERING"	=>	$arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"DISPLAY_DATE"	=>	$arParams["DISPLAY_DATE"],
			"ITEMS_PER_ROW"	=>	$arParams["ITEMS_PER_ROW"],
			"DISPLAY_DETAIL_BUTTON"	=>	$arParams["DISPLAY_DETAIL_BUTTON"],
			"DISPLAY_VIEW_MODE"	=>	$arParams["DISPLAY_VIEW_MODE"],
			"DETAIL_TABS"	=>	$arParams["DETAIL_TABS"],
			"DISPLAY_NAME"	=>	"Y",
			"DISPLAY_PICTURE"	=>	$arParams["DISPLAY_PICTURE"],
			"DISPLAY_PREVIEW_TEXT"	=>	$arParams["DISPLAY_PREVIEW_TEXT"],
			"PREVIEW_TRUNCATE_LEN"	=>	$arParams["PREVIEW_TRUNCATE_LEN"],
			"ACTIVE_DATE_FORMAT"	=>	$arParams["LIST_ACTIVE_DATE_FORMAT"],
			"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
			"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
			"FILTER_NAME"	=>	$arParams["FILTER_NAME"],
			"HIDE_LINK_WHEN_NO_DETAIL"	=>	$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
			"CHECK_DATES"	=>	$arParams["CHECK_DATES"],
			"INCLUDE_SUBSECTIONS" => "N",

			"PARENT_SECTION"	=>	$arResult["VARIABLES"]["SECTION_ID"],
			"PARENT_SECTION_CODE"	=>	$arResult["VARIABLES"]["SECTION_CODE"],
			"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
			"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		),
		$component
	);?>
<?else:?>
	<?=GetMessage("SECTION_EMPTY")?>
<?endif?>
