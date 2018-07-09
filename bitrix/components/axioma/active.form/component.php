<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

$ArEventType = CEventType::GetByID( "MS_ACTIVE_FEEDBACK", "ru" )->Fetch();

if(!is_array($ArEventType)) {
	$oEventType = new CEventType();
	$oEventType->Add( array(
		'LID' => 'ru',
		"EVENT_NAME" => "MS_ACTIVE_FEEDBACK",
		"NAME" => GetMessage("MS_FORM_EVENT_TYPE_NAME"),
		"DESCRIPTION"   => GetMessage("MS_FORM_EVENT_TYPE_DESCRIPTION"),
	) );
} else {
	if(empty($ArEventType["NAME"])) {
		CEventType::Update(array("ID" => $ArEventType["ID"]), array(
			"NAME" => GetMessage("MS_FORM_EVENT_TYPE_NAME"),
			"DESCRIPTION"   => GetMessage("MS_FORM_EVENT_TYPE_DESCRIPTION"),
		));
	}
}

$arFilter = Array("SITE_ID" => SITE_ID, "TYPE_ID" => "MS_ACTIVE_FEEDBACK", "ACTIVE" => "Y");

$dbType = CEventMessage::GetList($by = SITE_ID, $order="DESC", $arFilter);
while($arType = $dbType->GetNext()) {
	$arEvent[$arType["ID"]] = "[".$arType["ID"]."] ".$arType["SUBJECT"];
}

if(!is_array($arEvent)) {
	$oEventMessage  = new CEventMessage();
	$oEventMessage->Add( array(
		'ACTIVE'    => 'Y',
		'EVENT_NAME'    => 'MS_ACTIVE_FEEDBACK',
		'LID'           => SITE_ID,
		'EMAIL_FROM'    => '#DEFAULT_EMAIL_FROM#',
		'EMAIL_TO'      => '#DEFAULT_EMAIL_FROM#',
		'SUBJECT'       =>	GetMessage("MS_FORM_EVENT_SUBJECT"),
		'MESSAGE'       =>	GetMessage("MS_FORM_EVENT_MESSAGE_TEXT"),
		'BODY_TYPE'     => 'html',
	) );
} else {
	$arFilter = Array("SITE_ID" => SITE_ID, "TYPE_ID" => "MS_ACTIVE_FEEDBACK", "ACTIVE" => "Y");

	$dbType = CEventMessage::GetList($by = SITE_ID, $order="DESC", $arFilter);
	while($arType = $dbType->GetNext()) {
		$arEventIds[] = $arType["ID"];
	}

	if(is_array($arEventIds)) {
		foreach($arEventIds as $key => $arItem) {
			$rsEventMessage = CEventMessage::GetByID($arItem);
			$rsEventMessage = $rsEventMessage->Fetch();

			if(empty($rsEventMessage["SUBJECT"]) || empty($rsEventMessage["MESSAGE"])) {
				$oEventMessage  = new CEventMessage();
				$oEventMessage->Update($arItem, array(
					"SUBJECT" => GetMessage("MS_FORM_EVENT_SUBJECT"),
					'MESSAGE' => GetMessage("MS_FORM_EVENT_MESSAGE_TEXT"),
				));
			}
		}
	}
}

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if($arParams["EVENT_NAME"] == '')
	$arParams["EVENT_NAME"] = "MS_ACTIVE_FEEDBACK";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if($arParams["EMAIL_TO"] == '')
	$arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if($arParams["OK_TEXT"] == '')
	$arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"]))
{
	$arResult["ERROR_MESSAGE"] = array();
	if(check_bitrix_sessid())
	{
		if(empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"]))
		{
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["user_name"]) <= 1)
				$arResult["ERROR_MESSAGE"]["NAME"] = GetMessage("MF_REQ_NAME");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["user_phone"]) <= 1)
				$arResult["ERROR_MESSAGE"]["PHONE"] = GetMessage("MF_REQ_PHONE");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("SUBJECT", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["subject"]) <= 1)
				$arResult["ERROR_MESSAGE"]["SUBJECT"] = GetMessage("MF_REQ_SUBJECT");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["user_email"]) <= 1)
				$arResult["ERROR_MESSAGE"]["EMAIL"] = GetMessage("MF_REQ_EMAIL");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["MESSAGE"]) <= 3)
				$arResult["ERROR_MESSAGE"]["MESSAGE"] = GetMessage("MF_REQ_MESSAGE");
		}
		if(strlen($_POST["user_email"]) > 1 && !check_email($_POST["user_email"]))
			$arResult["ERROR_MESSAGE"]["EMAIL"] = GetMessage("MF_EMAIL_NOT_VALID");
		if($arParams["USE_CAPTCHA"] == "Y")
		{
			include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
			$captcha_code = $_POST["captcha_sid"];
			$captcha_word = $_POST["captcha_word"];
			$cpt = new CCaptcha();
			$captchaPass = COption::GetOptionString("main", "captcha_password", "");
			if (strlen($captcha_word) > 0 && strlen($captcha_code) > 0)
			{
				if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass))
					$arResult["ERROR_MESSAGE"]["CAPTCHA"] = GetMessage("MF_CAPTCHA_WRONG");
			}
			else
				$arResult["ERROR_MESSAGE"]["CAPTCHA"] = GetMessage("MF_CAPTHCA_EMPTY");

		}
		if(empty($arResult["ERROR_MESSAGE"]))
		{
			$arFields = Array(
				"AUTHOR" => $_POST["user_name"],
				"AUTHOR_PHONE" => $_POST["user_phone"],
				"SUBJECT" => $_POST["subject"],
				"AUTHOR_EMAIL" => $_POST["user_email"],
				"EMAIL_TO" => $arParams["EMAIL_TO"],
				"TEXT" => $_POST["MESSAGE"],
			);
			if(!empty($arParams["EVENT_MESSAGE_ID"])) {
				foreach($arParams["EVENT_MESSAGE_ID"] as $v)
					if(IntVal($v) > 0)
						CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", IntVal($v));
			} else {
				$files[] = CFile::SaveFile(
					array(
						"name" => $_FILES["attach_file"]["name"],
						"tmp_name" => $_FILES["attach_file"]["tmp_name"],
						"old_file" => "0",
						"del" => "N",
						"MODULE_ID" => "",
						"description" => ""
					),
					'mail_temp_files',
					false,
					false
				);


				if (CModule::IncludeModule("iblock")):

				$el = new CIBlockElement;
				$PROP = array(
					"NAME"    => $arFields['AUTHOR'],
					"PHONE"    => $arFields['AUTHOR_PHONE'],
					"EMAIL"    => $arFields['AUTHOR_EMAIL'],
					"TEXT"    => $arFields['TEXT'],
				);
				$arLoadProductArray = Array(
					"CODE"    => mt_rand(),
					"ACTIVE_FROM"    => "",
					"IBLOCK_SECTION_ID" => "",
					"IBLOCK_ID"      => 32,
					"PROPERTY_VALUES"=> $PROP,
					"NAME"           => $arFields['AUTHOR_EMAIL'],
					"ACTIVE"         => "Y",
					"PREVIEW_TEXT"   => "",
					"DETAIL_TEXT"    => ""
				);
				$PRODUCT_ID = $el->Add($arLoadProductArray);
				endif;

				CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "Y", "", $files);



				CFile::Delete($files[0]);
			}

			$_SESSION["MF_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
			$_SESSION["MF_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
			$_SESSION["MF_SUBJECT"] = htmlspecialcharsbx($_POST["subject"]);
			$_SESSION["MF_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
			LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"], Array("success")));
		}

		$arResult["MESSAGE"] = htmlspecialcharsbx($_POST["MESSAGE"]);
		$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
		$arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
		$arResult["SUBJECT"] = htmlspecialcharsbx($_POST["subject"]);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
		$arResult["ATTACH_FILE"] = $_FILES["attach_file"];
	}
	else
		$arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
}
elseif($_REQUEST["success"] == $arResult["PARAMS_HASH"])
{

	$arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if(empty($arResult["ERROR_MESSAGE"]))
{
	if($USER->IsAuthorized())
	{
	}
	else
	{
		if(strlen($_SESSION["MF_NAME"]) > 0)
			$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_SESSION["MF_NAME"]);
		if(strlen($_SESSION["MF_PHONE"]) > 0)
			$arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_SESSION["MF_PHONE"]);
		if(strlen($_SESSION["MF_SUBJECT"]) > 0)
			$arResult["SUBJECT"] = htmlspecialcharsbx($_SESSION["MF_SUBJECT"]);
		if(strlen($_SESSION["MF_EMAIL"]) > 0)
			$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_SESSION["MF_EMAIL"]);
	}
}

if($arParams["USE_CAPTCHA"] == "Y")
	$arResult["capCode"] =  htmlspecialcharsbx($APPLICATION->CaptchaGetCode());

$this->IncludeComponentTemplate();
