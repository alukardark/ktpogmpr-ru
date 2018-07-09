<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="contacts-page">
	<div class="contacts-map-wrapper">
		 <?$APPLICATION->IncludeFile(SITE_DIR."include/contacts_map.php", Array(), Array("MODE"=>"html"));?>
	</div>
	<div class="row">
		<div class="contacts-info col-sm-6">
			<h2>Контакты</h2>
			<p>
 <big>654018, г. Новокузнецк, ул. Циолковского, 50</big>
			</p>
			<ul class="list-icons">
 <a href="tel:+73843770932"></a>
				<li><a href="tel:+73843770932"><i class="fa fa-phone"></i><span class="phone">8 (3843) <strong>77-09-32</strong></span></a></li>
 <a href="tel:+73843770923"></a>
				<li><a href="tel:+73843770923"><i class="fa fa-phone"></i><span class="phone">8 (3843) <strong>77-09-23</strong></span></a></li>
				<li><i class="fa fa-clock-o"></i>Время работы: Пн - Пт (с 8.30 до 17.15)</li>
 <a href="mailto:kem_gmpr@mail.ru"></a>
				<li><a href="mailto:kem_gmpr@mail.ru"><i class="fa fa-envelope"></i>kem_gmpr@mail.ru</a></li>
			</ul>
			 <?$APPLICATION->IncludeFile(SITE_DIR."include/social_icons.php", Array(), Array("MODE"=>"html"));?>
		</div>
		<div class="contacts-requisites col-sm-5 col-sm-offset-1">
			<h2>Реквизиты</h2>
			<p>
				 Кемеровская территориальная профсоюзная организация<br>
				 Горно-металлургический профсоюз России<br>
				 654018, г. Новокузнецк, ул. Циолковского, 50<br>
				 ИНН 4216003322 КПП 421701001<br>
				 ОГРН 1024200003519<br>
				 р/счет 40703810926170100077<br>
				 в отделении №8615 Сбербанка России г. Кемерово<br>
				 к/счет 30101810200000000612 БИК 945754757<br>
			</p>
		</div>
	</div>
	<div class="contacts-form">
		<h2>Свяжитесь с нами</h2>
		 <?$APPLICATION->IncludeComponent(
	"axioma:active.form",
	"contacts",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"COMPONENT_TEMPLATE" => "contacts",
		"EMAIL_TO" => "coder7@web-axioma.ru",
		"EVENT_MESSAGE_ID" => array(),
		"OK_TEXT" => "В ближайшее время наш специалист свяжется с Вами.",
		"REQUIRED_FIELDS" => array(0=>"EMAIL",1=>"MESSAGE",),
		"USE_CAPTCHA" => "N"
	)
);?>
	</div>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>