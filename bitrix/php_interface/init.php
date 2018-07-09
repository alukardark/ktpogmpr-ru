<?php function startsWith($haystack, $needle)
{
	return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}
function endsWith($haystack, $needle)
{
	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
//if(startsWith($APPLICATION->GetCurDir(), "/")){
//    require ('phpQuery/phpQuery-onefile.php');
//}
//if(startsWith($APPLICATION->GetCurDir(), "news/")){
//    require ('phpQuery/phpQuery-onefile.php');
//}
function translit($s) {
$s = (string) $s; // преобразуем в строковое значение
$s = strip_tags($s); // убираем HTML-теги
$s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
$s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
$s = trim($s); // убираем пробелы в начале и конце строки
$s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
$s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
$s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
$s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
return $s; // возвращаем результат
}
function timerGet()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float) $usec + (float) $sec);
}
function timerFlag($round = 4, $debug = false)
{
	global $timer, $timer_iteration;
	if (empty($timer)) $timer           = timerGet();
	if (empty($timer_iteration)) $timer_iteration = 0;
	$old_timer       = $timer;
	$timer           = timerGet();
	if ($debug)
	{
		$backtrace = debug_backtrace();
		$dbg_nfo   = " " . $backtrace[0]['file'] . " (" . $backtrace[0]['line'] . ") [i = " . $timer_iteration . "]<br/>";
	}
	$timer_iteration++;
	$razn = round($timer - $old_timer, $round);
	if ($razn > 0.5) $razn = "<b>$razn</b>";
	echo $razn;
	if ($debug)
	{
		echo $dbg_nfo;
	}
	echo '<br/>';
}
function parseNews()
{
	include_once __DIR__.'/phpQuery-onefile.php';




	$curl = curl_init('http://www.gmpr.ru/news/novosti_otrasli/?SECTION_CODE=novosti_otrasli&SHOWALL_2=1');
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
// return "parseNews();";
				}
			}
			if($id != false){


				$curl = curl_init('http://www.gmpr.ru/news/novosti_otrasli/' . $id . '/');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

				$html_detail = curl_exec($curl);
				curl_close($curl);

				$doc_detail = phpQuery::newDocument($html_detail);

				$img = $doc_detail->find('.news-detail .fl_l a .detail_picture')->attr('src');
				$img = 'http://www.gmpr.ru' . $img;


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
//echo "New ID: ".$PRODUCT_ID;
				} else {
//echo "Error: ".$el->LAST_ERROR;
				}


				sleep(2);
			}
		}
		$i++;

	}

	return "parseNews();";
}
function parseNovostiProfsoyuza(){

	include_once __DIR__.'/phpQuery-onefile.php';



	$curl = curl_init('http://www.gmpr.ru/news/novosti_profsoyuza/?SECTION_CODE=novosti_profsoyuza&SHOWALL_2=1');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);

	$doc = phpQuery::newDocument($result);

	$doc->find('#bx_1914200112_14619')->children('.news-item')->appendTo(".news-list");
	$doc->find('#bx_1914200112_14619')->remove();
	$i = 1;

	foreach ($doc['.news-item']->slice(0, 4)->reverse() as $item) {

		if ($i <= 5) {

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
				"SECTION_CODE" => "novosti_profsoyuza",
				);
			$res = CIBlockElement::GetList(Array("ID" => "DESC", "PROPERTY_PRIORITY" => "DESC"), $arFilter, Array('CODE', "IBLOCK_SECTION_ID", "NAME", "DATE_ACTIVE_FROM"), Array("nPageSize" => 1));
			while ($ar_fields = $res->GetNext()) {
				$id_infoblock_element = $ar_fields["CODE"];

				// echo "<div style='background: red'>";
				// print_r($id_infoblock_element);
				// echo "</div>";
				if ($id <= $id_infoblock_element) {
				//return "parseNews();";
					$id = false;
				}
			}
			if($id != false){

				$curl = curl_init('http://www.gmpr.ru/news/novosti_profsoyuza/' . $id . '/');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

				$html_detail = curl_exec($curl);
				curl_close($curl);

				$doc_detail = phpQuery::newDocument($html_detail);

				$img = $doc_detail->find('.news-detail .fl_l a .detail_picture')->attr('src');
				$img = 'http://www.gmpr.ru' . $img;


				$doc_detail->find('.fl_l')->remove();
				$doc_detail->find('.news-date-time')->remove();

				$detail_news = $doc_detail->find('.news-detail')->html();
				$detail_news = str_replace("Подробнее", "", $detail_news);


				// echo "<hr>";
				// print_r($id);
				// echo "<br>";
				// print_r($title);
				// echo "<br>";
				// echo "<hr>";


				$el = new CIBlockElement;
				$PROP = array();
				$arLoadProductArray = Array(
					"CODE" => $id,
					"ACTIVE_FROM" => $date,
					"IBLOCK_SECTION_ID" => 40,
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
					//echo "New ID: " . $PRODUCT_ID;
				} else {
					//echo "Error: " . $el->LAST_ERROR;
				}


				sleep(2);


			}

		}

		$i++;
	}

	return "parseNovostiProfsoyuza();";
}

function parseVestiIzRegionov(){

	include_once __DIR__.'/phpQuery-onefile.php';


	$curl = curl_init('http://www.gmpr.ru/news/vesti_iz_regionov/11732?SECTION_CODE=vesti_iz_regionov&amp%3Bamp%3Bamp%3BPAGEN_2=20&SHOWALL_2=1');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);

	$doc = phpQuery::newDocument($result);

// $doc->find('#bx_1914200112_14619')->children('.news-item')->appendTo(".news-list");
// $doc->find('#bx_1914200112_14619')->remove();
	$i = 1;

	//foreach ($doc['.news-list']->children('#bx_1914200112_15008')->prevAll('.news-item') as $item) {
	foreach ($doc['.news-item']->slice(0, 4)->reverse() as $item) {

		if ($i <= 10) {

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
				"SECTION_CODE" => "vesti_iz_regionov",
				);
			$res = CIBlockElement::GetList(Array("ID" => "DESC", "PROPERTY_PRIORITY" => "DESC"), $arFilter, Array('CODE', "IBLOCK_SECTION_ID", "NAME", "DATE_ACTIVE_FROM"), Array("nPageSize" => 1));
			while ($ar_fields = $res->GetNext()) {
				$id_infoblock_element = $ar_fields["CODE"];

				if ($id <= $id_infoblock_element) {
				//return "parseNews();";
					$id = false;
				}
			}
			if($id != false){



				$curl = curl_init('http://www.gmpr.ru/news/vesti_iz_regionov/' . $id . '/');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

				$html_detail = curl_exec($curl);
				curl_close($curl);

				$doc_detail = phpQuery::newDocument($html_detail);

				$img = $doc_detail->find('.news-detail .fl_l a .detail_picture')->attr('src');
				$img = 'http://www.gmpr.ru' . $img;


				$doc_detail->find('.fl_l')->remove();
				$doc_detail->find('.news-date-time')->remove();

				$detail_news = $doc_detail->find('.news-detail')->html();
				$detail_news = str_replace("Подробнее", "", $detail_news);

				$el = new CIBlockElement;
				$PROP = array();
				$arLoadProductArray = Array(
					"CODE" => $id,
					"ACTIVE_FROM" => $date,
					"IBLOCK_SECTION_ID" => 42,
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
					//echo "New ID: " . $PRODUCT_ID;
				} else {
					//echo "Error: " . $el->LAST_ERROR;
				}


				sleep(2);


			}

		}

		$i++;
	}


	

	return "parseVestiIzRegionov();";
}

function parseProfsoyuzZashchishchaet(){

	include_once __DIR__.'/phpQuery-onefile.php';


	$curl = curl_init('http://www.gmpr.ru/news/profsoyuz_zashchishchaet/?SECTION_CODE=profsoyuz_zashchishchaet&SHOWALL_2=1');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);

	$doc = phpQuery::newDocument($result);

// $doc->find('#bx_1914200112_14619')->children('.news-item')->appendTo(".news-list");
// $doc->find('#bx_1914200112_14619')->remove();
	$i = 1;

//foreach ($doc['.news-list']->children('#bx_1914200112_14757')->prevAll('.news-item') as $item) {
	foreach ($doc['.news-item']->slice(0, 4)->reverse() as $item) {

		if ($i <= 5) {

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
				"SECTION_CODE" => "profsoyuz_zashchishchaet",
				);
			$res = CIBlockElement::GetList(Array("ID" => "DESC", "PROPERTY_PRIORITY" => "DESC"), $arFilter, Array('CODE', "IBLOCK_SECTION_ID", "NAME", "DATE_ACTIVE_FROM"), Array("nPageSize" => 1));
			while ($ar_fields = $res->GetNext()) {
				$id_infoblock_element = $ar_fields["CODE"];

			// echo "<div style='background: red'>";
			// print_r($id_infoblock_element);
			// echo "</div>";
				if ($id <= $id_infoblock_element) {
				//return "parseNews();";
					$id = false;
				}
			}
			if($id != false){



				$curl = curl_init('http://www.gmpr.ru/news/profsoyuz_zashchishchaet/' . $id . '/');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

				$html_detail = curl_exec($curl);
				curl_close($curl);

				$doc_detail = phpQuery::newDocument($html_detail);

				$img = $doc_detail->find('.news-detail .fl_l a .detail_picture')->attr('src');
				$img = 'http://www.gmpr.ru' . $img;


				$doc_detail->find('.fl_l')->remove();
				$doc_detail->find('.news-date-time')->remove();

				$detail_news = $doc_detail->find('.news-detail')->html();
				$detail_news = str_replace("Подробнее", "", $detail_news);


			// echo "<hr>";
			// print_r($id);
			// echo "<br>";
			// print_r($title);
			// echo "<br>";
			// echo "<hr>";


				$el = new CIBlockElement;
				$PROP = array();
				$arLoadProductArray = Array(
					"CODE" => $id,
					"ACTIVE_FROM" => $date,
					"IBLOCK_SECTION_ID" => 43,
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
				//echo "New ID: " . $PRODUCT_ID;
				} else {
				//echo "Error: " . $el->LAST_ERROR;
				}


				sleep(2);


			}

		}

		$i++;
	}


	

	return "parseProfsoyuzZashchishchaet();";
}