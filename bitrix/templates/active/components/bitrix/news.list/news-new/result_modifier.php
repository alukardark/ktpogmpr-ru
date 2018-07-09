<?
foreach ($arResult['ITEMS'] as $key => $arItem)
{
    $arSectionList = array();
    $rsSections = CIBlockElement::GetElementGroups($arItem['ID']);

    while ($arSection = $rsSections->GetNext())
    {
        $arSectionList[] = array(
            'ID' => $arSection['ID'],
            'NAME' => $arSection['NAME'],
            'SECTION_PAGE_URL' => $arSection['SECTION_PAGE_URL'],
        );
    }
    $arItem['SECTION_LIST'] = $arSectionList;
    $arResult['ITEMS'][$key] = $arItem;

}

?>