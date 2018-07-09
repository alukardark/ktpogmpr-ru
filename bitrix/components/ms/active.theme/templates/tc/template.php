<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<link rel="stylesheet" href="<?=$this->GetFolder()?>/tc.min.css">
<script src="<?=$this->GetFolder()?>/jquery.cookie.min.js" type="text/javascript"></script>
<script src="<?=$this->GetFolder()?>/spectrum.min.js" type="text/javascript"></script>
<script type="text/javascript">
	var templatePath = "<?=SITE_TEMPLATE_PATH?>";

	(function ( $ ) {
		var localization = $.spectrum.localization["ru"] = {
			cancelText: "<?=GetMessage("TC_COLORPICKER_CANCEL")?>",
			chooseText: "<?=GetMessage("TC_COLORPICKER_CHOOSE")?>"
		};
		$.extend($.fn.spectrum.defaults, localization);
	})( jQuery );
</script>
<script src="<?=$this->GetFolder()?>/tc.js" type="text/javascript"></script>

<?
if($_COOKIE["tc"]) {
	if($_COOKIE["tc"] == "hide") {
		$themeChangerClass = "tc_hidden";
	}
} else {
	$themeChangerClass = "tc_hidden";
}
?>

<div id="theme_changer" class="tc_fullheight <?=$themeChangerClass?>">
	<div id="theme_changer_scroll_container">
		<div id="theme_changer_in" class="clearfix">
			<div id="tc_title"><?=GetMessage("TC_SETTINGS")?></div>

			<?if($arResult["COLOR_THEME"]["LIST"]):?>
				<div id="tc_section_color_theme" class="tc_section open">
					<div class="tc_title"><?=GetMessage("TC_COLOR_THEME")?><span class="title_toggle_icon"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span></div>
					<div class="tc_content">
						<ul class="tc_select_colors">
							<?foreach($arResult["COLOR_THEME"]["LIST"] as $key => $arItem) {?>
								<li <?if($arResult["COLOR_THEME"]["CURRENT"] == $key && $arResult["USE_CUSTOM_COLOR"]["CURRENT"] !== "Y"):?>class="active"<?endif;?>><a title="<?=$key?>" data-color="<?=$key?>" href="<?=$APPLICATION->GetCurPageParam('COLOR_THEME='.$key, array('COLOR_THEME'))?>"><span style="background-color:<?=$arItem["BG"]?>"><i class="fa fa-check"></i></span></a></li>
							<?}?>
						</ul>
						<div class="tc_subtitle"><?=GetMessage("TC_CUSTOM_COLOR")?></div>
						<div class="tc_color <?if($arResult["USE_CUSTOM_COLOR"]["CURRENT"] === "Y"):?>active<?endif;?>" id="tc_custom_color">
							<input data-id="CUSTOM_COLOR" id="custom_color" type="text" size="7" value="<?=$arResult["CUSTOM_COLOR"]["CURRENT"]?>" class="no-alpha colorpicker_input">
						</div>
					</div>
				</div>
			<?endif?>

			<?if($arResult["HEADER_TYPE"]["LIST"]):?>
				<div id="tc_section_header_type" class="tc_section open">
					<div class="tc_title"><?=GetMessage("TC_HEADER")?><span class="title_toggle_icon"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span></div>
					<div class="tc_content">
						<ul class="tc_select tc_select_buttons">
							<?foreach($arResult["HEADER_TYPE"]["LIST"] as $key => $arItem) {?>
								<li <?if($arResult["HEADER_TYPE"]["CURRENT"] == $key):?>class="active"<?endif;?>><a href="<?=$APPLICATION->GetCurPageParam('HEADER_TYPE='.$key, array('HEADER_TYPE'))?>"><?=$arItem["NAME"];?></a></li>
							<?}?>
						</ul>
					</div>
				</div>
			<?endif?>

			<?if($arResult["MENU_TYPE"]["LIST"]):?>
				<div id="tc_section_menu_type" class="tc_section open">
					<div class="tc_title"><?=GetMessage("TC_MENU")?><span class="title_toggle_icon"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span></div>
					<div class="tc_content">
						<ul class="tc_select tc_select_buttons">
							<?foreach($arResult["MENU_TYPE"]["LIST"] as $key => $arItem) {?>
								<li <?if($arResult["MENU_TYPE"]["CURRENT"] == $key):?>class="active"<?endif;?>><a href="<?=$APPLICATION->GetCurPageParam('MENU_TYPE='.$key, array('MENU_TYPE'))?>"><?=$arItem["NAME"];?></a></li>
							<?}?>
						</ul>
					</div>
				</div>
			<?endif?>

			<?if($arResult["BOXED_TYPE"]["LIST"]):?>
				<div id="tc_section_boxed_type" class="tc_section open">
					<div class="tc_title"><?=GetMessage("TC_BOXED_TYPE")?><span class="title_toggle_icon"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span></div>
					<div class="tc_content">
						<ul class="tc_select tc_select_buttons">
							<?foreach($arResult["BOXED_TYPE"]["LIST"] as $key => $arItem) {?>
								<li <?if($arResult["BOXED_TYPE"]["CURRENT"] == $key):?>class="active"<?endif;?>><a href="<?=$APPLICATION->GetCurPageParam('BOXED_TYPE='.$key, array('BOXED_TYPE'))?>"><?=$arItem["NAME"];?></a></li>
							<?}?>
						</ul>

						<?if($arResult["BOXED_TYPE"]["CURRENT"] == "texture"):?>
							<?if($arResult["BOXED_TEXTURE"]["LIST"]):?>
								<div class="tc_subtitle"><?=GetMessage("TC_BOXED_TEXTURE")?></div>
								<select id="boxed_texture">
									<?foreach($arResult["BOXED_TEXTURE"]["LIST"] as $key => $arItem) {?>
										<option data-url="<?=$APPLICATION->GetCurPageParam('BOXED_TEXTURE='.$key, array('BOXED_TEXTURE'))?>" data-img="<?=$arItem["NAME"];?>" <?if($arResult["BOXED_TEXTURE"]["CURRENT"] == $key):?>selected="selected"<?endif;?>><?=$arItem["NAME"];?></option>
									<?}?>
								</select>
							<?endif?>
						<?endif?>

						<?if($arResult["BOXED_TYPE"]["CURRENT"] == "image"):?>
							<?if($arResult["BOXED_IMAGE"]["LIST"]):?>
								<div class="tc_subtitle"><?=GetMessage("TC_BOXED_IMAGE")?></div>
								<select id="boxed_image">
									<?foreach($arResult["BOXED_IMAGE"]["LIST"] as $key => $arItem) {?>
										<option data-url="<?=$APPLICATION->GetCurPageParam('BOXED_IMAGE='.$key, array('BOXED_IMAGE'))?>" data-img="<?=$arItem["NAME"];?>" <?if($arResult["BOXED_IMAGE"]["CURRENT"] == $key):?>selected="selected"<?endif;?>><?=$arItem["NAME"];?></option>
									<?}?>
								</select>
							<?endif?>
						<?endif?>

						<?if($arResult["BOXED_TYPE"]["CURRENT"] == "color"):?>
							<div class="tc_subtitle"><?=GetMessage("TC_BOXED_COLOR")?></div>
							<div class="tc_color">
								<input data-id="BOXED_COLOR" id="boxed_color" type="text" size="7" value="<?=$arResult["BOXED_COLOR"]["CURRENT"]?>" class="no-alpha colorpicker_input">
							</div>
						<?endif?>
					</div>
				</div>
			<?endif?>

			<?if($arResult["PAGE_HEADING_TYPE"]["LIST"]):?>
				<div id="tc_section_page_heading_type" class="tc_section open">
					<div class="tc_title"><?=GetMessage("TC_PAGE_HEADING_TYPE")?><span class="title_toggle_icon"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span></div>
					<div class="tc_content">
						<ul class="tc_select tc_select_buttons">
							<?foreach($arResult["PAGE_HEADING_TYPE"]["LIST"] as $key => $arItem) {?>
								<li <?if($arResult["PAGE_HEADING_TYPE"]["CURRENT"] == $key):?>class="active"<?endif;?>><a href="<?=$APPLICATION->GetCurPageParam('PAGE_HEADING_TYPE='.$key, array('PAGE_HEADING_TYPE'))?>"><?=$arItem["NAME"];?></a></li>
							<?}?>
						</ul>

						<?if($arResult["PAGE_HEADING_TYPE"]["CURRENT"] == "texture"):?>
							<?if($arResult["PAGE_HEADING_TEXTURE"]["LIST"]):?>
								<div class="tc_subtitle"><?=GetMessage("TC_PAGE_HEADING_TEXTURE")?></div>
								<select id="page_heading_texture">
									<?foreach($arResult["PAGE_HEADING_TEXTURE"]["LIST"] as $key => $arItem) {?>
										test
										<option data-url="<?=$APPLICATION->GetCurPageParam('PAGE_HEADING_TEXTURE='.$key, array('PAGE_HEADING_TEXTURE'))?>" data-img="<?=$arItem["NAME"];?>" <?if($arResult["PAGE_HEADING_TEXTURE"]["CURRENT"] == $key):?>selected="selected"<?endif;?>><?=$arItem["NAME"];?></option>
									<?}?>
								</select>
							<?endif?>
						<?endif?>

						<?if($arResult["PAGE_HEADING_TYPE"]["CURRENT"] == "image"):?>
							<?if($arResult["PAGE_HEADING_IMAGE"]["LIST"]):?>
								<div class="tc_subtitle"><?=GetMessage("TC_PAGE_HEADING_IMAGE")?></div>
								<select id="page_heading_image">
									<?foreach($arResult["PAGE_HEADING_IMAGE"]["LIST"] as $key => $arItem) {?>
										<option data-url="<?=$APPLICATION->GetCurPageParam('PAGE_HEADING_IMAGE='.$key, array('PAGE_HEADING_IMAGE'))?>" data-img="<?=$arItem["NAME"];?>" <?if($arResult["PAGE_HEADING_IMAGE"]["CURRENT"] == $key):?>selected="selected"<?endif;?>><?=$arItem["NAME"];?></option>
									<?}?>
								</select>
							<?endif?>
						<?endif?>

						<?if($arResult["PAGE_HEADING_TYPE"]["CURRENT"] == "color"):?>
							<div class="tc_subtitle"><?=GetMessage("TC_PAGE_HEADING_COLOR")?></div>
							<div class="tc_color">
								<input data-id="PAGE_HEADING_COLOR" id="page_heading_color" type="text" size="7" value="<?=$arResult["PAGE_HEADING_COLOR"]["CURRENT"]?>" class="no-alpha colorpicker_input">
							</div>
						<?endif?>

						<?if($arResult["PAGE_HEADING_TYPE"]["CURRENT"] == "texture" || $arResult["PAGE_HEADING_TYPE"]["CURRENT"] == "image" || $arResult["PAGE_HEADING_TYPE"]["CURRENT"] == "color"):?>
							<?if($arResult["PAGE_HEADING_TEXT_COLOR"]["LIST"]):?>
								<div class="tc_subtitle"><?=GetMessage("TC_PAGE_HEADING_TEXT_COLOR")?></div>
								<ul class="tc_select tc_select_buttons">
									<?foreach($arResult["PAGE_HEADING_TEXT_COLOR"]["LIST"] as $key => $arItem) {?>
										<li <?if($arResult["PAGE_HEADING_TEXT_COLOR"]["CURRENT"] == $key):?>class="active"<?endif;?>><a href="<?=$APPLICATION->GetCurPageParam('PAGE_HEADING_TEXT_COLOR='.$key, array('PAGE_HEADING_TEXT_COLOR'))?>"><?=$arItem["NAME"];?></a></li>
									<?}?>
								</ul>
							<?endif?>
						<?endif?>
					</div>
				</div>
			<?endif?>

			<?if($arResult["FIXED"]["LIST"]):?>
				<div id="tc_section_fixed" class="tc_section open">
					<div class="tc_title"><?=GetMessage("TC_FIXED")?><span class="title_toggle_icon"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span></div>
					<div class="tc_content">
						<ul class="tc_select tc_select_buttons">
							<?foreach($arResult["FIXED"]["LIST"] as $key => $arItem) {?>
								<li <?if($arResult["FIXED"]["CURRENT"] == $key):?>class="active"<?endif;?>><a href="<?=$APPLICATION->GetCurPageParam('FIXED='.$key, array('FIXED'))?>"><?=$arItem["NAME"];?></a></li>
							<?}?>
						</ul>
					</div>
				</div>
			<?endif?>

			<div id="tc_section_home_blocks" class="tc_section open">
				<div class="tc_title"><?=GetMessage("TC_HOME_BLOCKS")?><span class="title_toggle_icon"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span></div>
				<div class="tc_content">
					<ul class="tc_checkboxes">
						<?if($arResult["HOME_SLIDER"]["LIST"]):?>
							<?if($arResult["HOME_SLIDER"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_SLIDER=N', array('HOME_SLIDER'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_SLIDER")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_SLIDER=Y', array('HOME_SLIDER'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_SLIDER")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_TEASERS"]["LIST"]):?>
							<?if($arResult["HOME_TEASERS"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_TEASERS=N', array('HOME_TEASERS'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_TEASERS")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_TEASERS=Y', array('HOME_TEASERS'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_TEASERS")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_SERVICES_ICONS"]["LIST"]):?>
							<?if($arResult["HOME_SERVICES_ICONS"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_SERVICES_ICONS=N', array('HOME_SERVICES_ICONS'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_SERVICES_ICONS")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_SERVICES_ICONS=Y', array('HOME_SERVICES_ICONS'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_SERVICES_ICONS")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_SERVICES"]["LIST"]):?>
							<?if($arResult["HOME_SERVICES"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_SERVICES=N', array('HOME_SERVICES'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_SERVICES")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_SERVICES=Y', array('HOME_SERVICES'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_SERVICES")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_MESSAGE_BLOCK"]["LIST"]):?>
							<?if($arResult["HOME_MESSAGE_BLOCK"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_MESSAGE_BLOCK=N', array('HOME_MESSAGE_BLOCK'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_MESSAGE_BLOCK")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_MESSAGE_BLOCK=Y', array('HOME_MESSAGE_BLOCK'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_MESSAGE_BLOCK")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_PRODUCTS"]["LIST"]):?>
							<?if($arResult["HOME_PRODUCTS"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_PRODUCTS=N', array('HOME_PRODUCTS'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_PRODUCTS")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_PRODUCTS=Y', array('HOME_PRODUCTS'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_PRODUCTS")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_PROJECTS"]["LIST"]):?>
							<?if($arResult["HOME_PROJECTS"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_PROJECTS=N', array('HOME_PROJECTS'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_PROJECTS")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_PROJECTS=Y', array('HOME_PROJECTS'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_PROJECTS")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_GALLERY"]["LIST"]):?>
							<?if($arResult["HOME_GALLERY"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_GALLERY=N', array('HOME_GALLERY'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_GALLERY")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_GALLERY=Y', array('HOME_GALLERY'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_GALLERY")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_FEATURES"]["LIST"]):?>
							<?if($arResult["HOME_FEATURES"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_FEATURES=N', array('HOME_FEATURES'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_FEATURES")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_FEATURES=Y', array('HOME_FEATURES'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_FEATURES")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_ABOUT"]["LIST"]):?>
							<?if($arResult["HOME_ABOUT"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_ABOUT=N', array('HOME_ABOUT'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_ABOUT")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_ABOUT=Y', array('HOME_ABOUT'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_ABOUT")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_FACTS"]["LIST"]):?>
							<?if($arResult["HOME_FACTS"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_FACTS=N', array('HOME_FACTS'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_FACTS")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_FACTS=Y', array('HOME_FACTS'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_FACTS")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_NEWS"]["LIST"]):?>
							<?if($arResult["HOME_NEWS"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_NEWS=N', array('HOME_NEWS'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_NEWS")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_NEWS=Y', array('HOME_NEWS'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_NEWS")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_PARTNERS"]["LIST"]):?>
							<?if($arResult["HOME_PARTNERS"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_PARTNERS=N', array('HOME_PARTNERS'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_PARTNERS")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_PARTNERS=Y', array('HOME_PARTNERS'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_PARTNERS")?></span></span></li>
							<?endif;?>
						<?endif?>

						<?if($arResult["HOME_REVIEWS"]["LIST"]):?>
							<?if($arResult["HOME_REVIEWS"]["CURRENT"] == "Y"):?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_REVIEWS=N', array('HOME_REVIEWS'))?>"><input checked type="checkbox"><span><?=GetMessage("TC_HOME_REVIEWS")?></span></span></li>
							<?else:?>
								<li class="active"><span class="link" data-href="<?=$APPLICATION->GetCurPageParam('HOME_REVIEWS=Y', array('HOME_REVIEWS'))?>"><input type="checkbox"><span><?=GetMessage("TC_HOME_REVIEWS")?></span></span></li>
							<?endif;?>
						<?endif?>
					</ul>
				</div>
			</div>

			<div class="tc_section tc_section_restore">
				<a href="<?=$APPLICATION->GetCurPageParam('RESTORE_SETTINGS=Y', array('TC_SETTINGS_RESTORE'))?>"><?=GetMessage("TC_SETTINGS_RESTORE")?></a>
			</div>

		</div>
	</div>
	<a id="tc_toggle"><i class="fa fa-cog"></i></a>
</div>
