<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_DIR."include/faq_top_block.php",
        "AREA_FILE_SUFFIX" => "inc",
        "AREA_FILE_RECURSIVE" => "Y",
        "EDIT_TEMPLATE" => "standard.php"
    )
);?>

<?$arSections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]))?>
<?$arTabs = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams["IBLOCK_ID"]))?>

<div class="ms-tabs faq-tabs">
  <div class="tabs-ctrl tabs-sm">
    <?$isFirstTab = true;?>
    <?while ($arTab = $arTabs->Fetch()):?>
      <a href="#faq-tab<?=$arTab['ID']?>" <?if($isFirstTab):?>class="active"<?endif?>><?=$arTab['NAME']?></a>
      <?$isFirstTab = false?>
    <?endwhile?>
  </div>
  <div class="tab-content">
    <?$isFirstSect = true;?>
    <?while ($arSection = $arSections->Fetch()):?>
      <?
      global $arSectionFilter;
      $arSectionFilter = array("SECTION_ID" => $arSection["ID"], "SECTION_CODE" => $arSection["CODE"]);
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
    	<div id="faq-tab<?=$arSection['ID']?>" class="tab-pane fade in <?if($isFirstSect):?>active<?endif?>">
    		<div class="panel-group block-accordion">
          <?if ($rsElementsCount > 0):?>
            <?$APPLICATION->IncludeComponent(
          		"bitrix:news.list",
          		"faq",
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
          <?else:?>
            <?=GetMessage("SECTION_EMPTY")?>
          <?endif?>
        </div>
      </div>
      <?$isFirstSect = false?>
    <?endwhile?>
  </div>
</div>

<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => SITE_DIR."include/faq_bottom_block.php",
        "AREA_FILE_SUFFIX" => "inc",
        "AREA_FILE_RECURSIVE" => "Y",
        "EDIT_TEMPLATE" => "standard.php"
    )
);?>
