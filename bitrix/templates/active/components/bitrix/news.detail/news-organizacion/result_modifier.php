<?
if(!empty($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"])) {
  foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $item) {
    $arResult["PHOTO_GALLERY"][] = array(
      "DETAIL" => CFile::GetFileArray($item),
      "PREVIEW" => CFile::ResizeImageGet($item, array("width" => "125", "height" => "84"), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true),
    );
  }
}
$arResult["CONT_PHOTO"] = array();
if(isset($arResult["PROPERTIES"]["CONT_PHOTO"]["VALUE"]) && is_array($arResult["PROPERTIES"]["CONT_PHOTO"]["VALUE"]))
{
  foreach($arResult["PROPERTIES"]["CONT_PHOTO"]["VALUE"] as $FILE)
  {
    $FILE = CFile::GetFileArray($FILE);
    if(is_array($FILE))
      $arResult["CONT_PHOTO"][]=$FILE;
  }
}
?>
