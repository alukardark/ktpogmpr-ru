<?
if(!empty($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"])) {
  foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $item) {
    $arResult["PHOTO_GALLERY"][] = array(
      "DETAIL" => CFile::GetFileArray($item),
      "PREVIEW" => CFile::ResizeImageGet($item, array("width" => "76", "height" => "76"), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true),
    );
  }
}
?>
