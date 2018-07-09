<?
if($arParams["PARENT_SECTION"]) {
	$arSections = CIBlockSection::GetList(
		array("SORT"=>"ASC"),
		array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y", "CODE" => $arParams["PARENT_SECTION_CODE"]),
		false,
		array()
	);

	while ($arSect = $arSections->GetNext()) {
		$rsSectParents = CIBlockSection::GetList(
			array('left_margin' => 'asc'),
			array("CODE" => $arSect["PARENT_SECTION_CODE"], "SECTION_ID" => $arSect["ID"], 'LEFT_MARGIN' => $arSect['LEFT_MARGIN'], 'RIGHT_MARGIN' => $arSect['RIGHT_MARGIN'], 'DEPTH_LEVEL' => $arSect['DEPTH_LEVEL'] + 1)
		);
	   while ($arSectParent = $rsSectParents->GetNext()) {
			 $arResult["SECTIONS"][] = $arSectParent;
	   }
	}

} else {
	$arSections = CIBlockSection::GetList(
		array("SORT"=>"ASC"),
		array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y", "GLOBAL_ACTIVE" => "Y", "DEPTH_LEVEL" => "1"),
		false,
		array()
	);

	while ($arSect = $arSections->GetNext()) {
	   $arResult["SECTIONS"][] = $arSect;
	}
}

if(!empty($arResult["SECTIONS"])) {
  foreach($arResult["SECTIONS"] as $key => $item) {
    $arResult["SECTIONS"][$key]["GALLERY"] = array(
      "DETAIL" => CFile::GetFileArray($item["PICTURE"]),
      "PREVIEW" => CFile::ResizeImageGet($item["PICTURE"], array("width" => "370", "height" => "246"), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true),
    );

		$arButtons = CIBlock::GetPanelButtons(
		    $item["IBLOCK_ID"],
		    0,
		    $item["ID"],
				array("SESSID" => false)
		);
		$arResult["SECTIONS"][$key]["EDIT_LINK"] = $arButtons["edit"]["edit_section"]["ACTION_URL"];
		$arResult["SECTIONS"][$key]["DELETE_LINK"] = $arButtons["edit"]["delete_section"]["ACTION_URL"];
  }
}
?>
