<?
if(!empty($arResult["PROPERTIES"]["GALLERY"]["VALUE"])) {
  foreach($arResult["PROPERTIES"]["GALLERY"]["VALUE"] as $item) {
    $arResult["PHOTO_GALLERY"][] = array(
      "DETAIL" => CFile::GetFileArray($item),
      "PREVIEW" => CFile::ResizeImageGet($item, array("width" => "204", "height" => "136"), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true),
    );
  }
}
?>
