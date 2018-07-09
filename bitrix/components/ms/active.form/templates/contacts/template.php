<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?>

<?if(strlen($arResult["OK_MESSAGE"]) > 0):?>
		<h3><?=GetMessage("FORM_MESSAGE_OK_TITLE")?></h3>
		<?ShowNote($arResult["OK_MESSAGE"])?>
<?else:?>
	<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="form">
		<?=bitrix_sessid_post()?>

		<div class="row">
			<div class="col-sm-5 col-md-4">
				<fieldset class="form-group <?if($arResult["ERROR_MESSAGE"]["NAME"]):?>has-error<?endif?>">
					<label for="form-name"><i class="fa fa-user"></i> <?=GetMessage("MFT_NAME")?> </label><br>
					<input id="form-name" type="text" name="user_name" class="form-control input-sm <?if($arResult["ERROR_MESSAGE"]["NAME"]):?>error<?endif?>" value="<?=$arResult["AUTHOR_NAME"]?>">
				</fieldset>

				<fieldset class="form-group <?if($arResult["ERROR_MESSAGE"]["PHONE"]):?>has-error<?endif?>">
					<label for="form-phone"><i class="fa fa-phone"></i> <?=GetMessage("MFT_PHONE")?> </label><br>
					<input id="contact-form-phone" type="text" name="user_phone" class="form-control input-sm" value="<?=$arResult["AUTHOR_PHONE"]?>">
				</fieldset>

				<fieldset class="form-group <?if($arResult["ERROR_MESSAGE"]["EMAIL"]):?>has-error<?endif?>">
					<label for="form-email"><i class="fa fa-envelope"></i> <?=GetMessage("MFT_EMAIL")?><span class="red_star">*</span></label><br>
					<input id="form-email" type="text" name="user_email" class="form-control input-sm" value="<?=$arResult["AUTHOR_EMAIL"]?>">
				</fieldset>
		  </div>

			<div class="col-sm-7 col-md-8">
				<fieldset class="form-group <?if($arResult["ERROR_MESSAGE"]["MESSAGE"]):?>has-error<?endif?>">
					<label><?=GetMessage("MFT_MESSAGE")?> </label><br>
					<textarea class="form-control <?if($arResult["ERROR_MESSAGE"]["MESSAGE"]):?>error<?endif?>" name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
				</fieldset>
			</div>

			<?if($arParams["USE_CAPTCHA"] == "Y"):?>
			<div class="clear col-sm-5 col-md-4">
				<div class="form-group captcha-block <?if($arResult["ERROR_MESSAGE"]["CAPTCHA"]):?>has-error<?endif?>">
					<label><?=GetMessage("MFT_CAPTCHA_CODE")?></label>
					<div class="form-input">
						<div class="form-group">
							<img class="captcha-img" src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
						</div>
						<input class="form-control" type="text" name="captcha_word" size="30" maxlength="50" value="">
						<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
					</div>
				</div>
			</div>
			<?endif;?>
		</div>

		<input type="submit" class="btn btn-primary btn-bold" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
	</form>
	<script>
		$('#contact-form-phone').inputmask({"mask": "+7(999) 999-9999"});
	</script>
<?endif?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
