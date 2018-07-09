<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("");?><?$APPLICATION->IncludeComponent(
	"axioma:active.form",
	"feedback",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"OK_TEXT" => "В ближайшее время наш специалист свяжется с Вами.",
		"REQUIRED_FIELDS" => array(0=>"EMAIL",1=>"MESSAGE",),
		"USE_CAPTCHA" => "N"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>