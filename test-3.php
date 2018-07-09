<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test-3");
?>


<?

include_once __DIR__.'/bitrix/php_interface/phpQuery-onefile.php';



	function parseNewsX()
{





	$curl = curl_init('http://gmpr.ru/news/novosti_otrasli/?SECTION_CODE=novosti_otrasli&SHOWALL_2=1');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);

	$doc = phpQuery::newDocument($result);

		$doc->find('#bx_1914200112_15052')->children('.news-item')->appendTo(".news-list");
	$doc->find('#bx_1914200112_15052')->remove();

	$doc->find('#bx_1914200112_14619')->children('.news-item')->appendTo(".news-list");
	$doc->find('#bx_1914200112_14619')->remove();


	$i = 1;

// foreach ($doc['.news-item'] as $item) {
	foreach ($doc['.news-item']->slice(0, 3)->reverse() as $item){
		if($i<=4){

			$date = pq($item)->find('.news-date-time')->text();

			$title = pq($item)->find('a b')->text();
			$title = trim($title);

			$text = pq($item)->find('a b')->remove();
			$text = pq($item)->find('.news-date-time')->remove();
			$text = pq($item)->text();
			$text = trim($text);

			$id = pq($item)->children('a')->attr('href');
			$id = explode('/', $id);
			$id = $id[3];

			


			CModule::IncludeModule("iblock");
			$arFilter = Array(
				"IBLOCK_ID" => IntVal(31),
				"SECTION_CODE" => "novosti-otrasli",
				);
			$res = CIBlockElement::GetList(Array("ID" => "DESC", "PROPERTY_PRIORITY" => "ASC"), $arFilter, Array('CODE', "IBLOCK_SECTION_ID", "NAME", "DATE_ACTIVE_FROM"), Array("nPageSize" => 1));
			while ($ar_fields = $res->GetNext()) {
				$id_infoblock_element = $ar_fields["CODE"];
// if ($id_infoblock_element === $id) {
				if($id <= $id_infoblock_element){
					$id = false;
// // return "parseNews();";
				}
			}

			print_r($title);
			echo "<br>";
			echo "id->";
			print_r($id);
			echo "<br>";

			echo "id_infoblock_element->";
			print_r($id_infoblock_element);
			echo "<hr>";
			

			if($id != false){


				$curl = curl_init('http://gmpr.ru/news/novosti_otrasli/' . $id . '/');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

				$html_detail = curl_exec($curl);
				curl_close($curl);

				$doc_detail = phpQuery::newDocument($html_detail);

				$img = $doc_detail->find('.news-detail .fl_l a .detail_picture')->attr('src');
				$img = 'http://gmpr.ru' . $img;


				$doc_detail->find('.fl_l')->remove();
				$doc_detail->find('.news-date-time')->remove();

				$detail_news = $doc_detail->find('.news-detail')->html();
				$detail_news = str_replace("Подробнее", "", $detail_news);


				$el = new CIBlockElement;
				$PROP = array();
				$arLoadProductArray = Array(
					"CODE" => $id,
					"ACTIVE_FROM" => $date,
					"IBLOCK_SECTION_ID" => 38,
					"IBLOCK_ID" => 31,
					"PROPERTY_VALUES" => $PROP,
					"NAME" => $title,
					"ACTIVE" => "Y",
					"PREVIEW_TEXT" => $text,
					"DETAIL_TEXT_TYPE" => 'html',
					"DETAIL_TEXT" => $detail_news,
					"DETAIL_PICTURE" => CFile::MakeFileArray($img),
					"PREVIEW_PICTURE" => CFile::MakeFileArray($img)
					);
				if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
echo "New ID: ".$PRODUCT_ID;
				} else {
echo "Error: ".$el->LAST_ERROR;
				}


				sleep(2);
			}
		}
		$i++;

	}


}




parseNewsX();







?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>