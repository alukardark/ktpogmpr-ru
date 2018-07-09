<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?$APPLICATION->IncludeComponent(
	"axioma:active.form",
	"callback",
	array(
		"USE_CAPTCHA" => "N",
		"AJAX_MODE" => "Y",  // режим AJAX
		"AJAX_OPTION_SHADOW" => "N", // затемнять область
		"AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента
		"AJAX_OPTION_STYLE" => "N", // подключать стили
		"AJAX_OPTION_HISTORY" => "N",
		"OK_TEXT" => "В ближайшее время наш менеджер свяжется с вами.",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "PHONE",
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
