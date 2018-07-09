<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка: 404 - Страница не найдена");
?>

<div class="sc-maxwidth">
  <div class="content">
    <div class="page-error">
      <div class="page-title-code">404</div>
      <h1 class="page-title-text">Страница не найдена</h1>
      <div class="page-text">Страница, которую вы запросили, не найдена. Скорее всего вы попали на битую ссылку или опечатались при вводе URL.</div>
      <hr>
      <div class="page-btn"><a href="<?=SITE_DIR?>" class="btn btn-dark btn-bold">Перейти на главную</a></div>
    </div>
  </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
