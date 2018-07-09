<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?>

<?if(strlen($arResult["OK_MESSAGE"]) > 0):?>
	<div class="modal-header">
		<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">&times;</span></button>
		<div class="modal-title"><?=GetMessage("FORM_MESSAGE_OK_TITLE")?></div>
		<div class="modal-subtitle"><?ShowNote($arResult["OK_MESSAGE"])?></div>
	</div>
	<script type="text/javascript">
		hideModal();

	</script>
<?else:?>
	<div class="modal-header">
		<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">&times;</span></button>
		<div class="modal-title"><?=GetMessage("FORM_TITLE")?></div>
		<div class="modal-subtitle"><?=GetMessage("FORM_SUBTITLE_TEXT")?></div>
	</div>

	<div class="modal-body">
		<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="form">
			<?=bitrix_sessid_post()?>

			<fieldset class="form-group <?if($arResult["ERROR_MESSAGE"]["NAME"]):?>has-error<?endif?>">
				<label for="form-name"><i class="fa fa-user"></i> <?=GetMessage("MFT_NAME")?> <span class="red_star">*</span></label><br>
				<input id="form-name" type="text" name="user_name" class="form-control input-sm <?if($arResult["ERROR_MESSAGE"]["NAME"]):?>error<?endif?>" value="<?=$arResult["AUTHOR_NAME"]?>">
			</fieldset>

			<fieldset class="form-group <?if($arResult["ERROR_MESSAGE"]["PHONE"]):?>has-error<?endif?>">
				<label for="form-phone"><i class="fa fa-phone"></i> <?=GetMessage("MFT_PHONE")?> <span class="red_star">*</span></label><br>
				<input id="form-phone" type="text" name="user_phone" class="form-control input-sm" value="<?=$arResult["AUTHOR_PHONE"]?>">
			</fieldset>

			<?if($arParams["USE_CAPTCHA"] == "Y"):?>
				<div class="form-group captcha-block <?if($arResult["ERROR_MESSAGE"]["CAPTCHA"]):?>has-error<?endif?>">
					<label><?=GetMessage("MFT_CAPTCHA_CODE")?></label>
					<div class="form-input">
						<img class="captcha-img" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
						<input class="form-control" type="text" name="captcha_word" size="30" maxlength="50" value="">
						<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
					</div>
				</div>
			<?endif;?>

			<input type="submit" class="btn btn-primary" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
		</form>
	</div>
	<script>
		$('#form-phone').inputmask({"mask": "+7 (999) 999-9999",  "showMaskOnFocus": true, "showMaskOnHover": false, "clearIncomplete":  true});
	</script>
<?endif?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
