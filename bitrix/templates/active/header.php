<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1">
	<script>
		document.documentElement.className = "js";
	</script>

	<?$APPLICATION->ShowHead();?>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=latin,cyrillic">

	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/bootstrap.custom.css');?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/font-awesome.min.css');?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/jquery.mb.YTPlayer/dist/css/jquery.mb.YTPlayer.min.css');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/jquery.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/jquery-migrate-1.2.1.min.js');?>

	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/jquery.easing.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/bootstrap.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/slick.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/jquery.magnific-popup.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/jquery.smartresize.js');?>
	<script>
		$.extend(true, $.magnificPopup.defaults, {
			tClose: '<?=GetMessage("MAGNIFIC_CLOSE")?>',
			tLoading: '',
			gallery: {
				tPrev: '<?=GetMessage("MAGNIFIC_LEFT")?>',
				tNext: '<?=GetMessage("MAGNIFIC_RIGHT")?>',
				tCounter: '%curr% / %total%'
			},
			image: {
				tError: '<?=GetMessage("MAGNIFIC_ERROR_IMAGE")?>'
			},
			ajax: {
				tError: '<?=GetMessage("MAGNIFIC_ERROR_AJAX")?>'
			},
			closeBtnInside: false
		});

	</script>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/device.js/device.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.mb.YTPlayer/dist/jquery.mb.YTPlayer.min.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/main.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/menu.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/detail.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/ajax-modal.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/homeslider.js');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/homeslider.js');?>

		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/inputmask/dist/jquery.inputmask.bundle.js');?>

	<link href="<?=SITE_TEMPLATE_PATH?>/img/loading_modal.gif" rel="prefetch">

	<?$page = $APPLICATION->GetCurPage();?>
	<?$sidebar = $APPLICATION->GetProperty("sidebar");?>
	<?$sidebarTeasers = $APPLICATION->GetProperty("sidebar_teasers");?>
	<?$sidebarManager = $APPLICATION->GetProperty("sidebar_manager");?>
	<?$sidebarNotices = $APPLICATION->GetProperty("sidebar_notices");?>
	<?$sidebarBanner = $APPLICATION->GetProperty("sidebar_banner");?>
	<?$isContactsPage = CSite::InDir(SITE_DIR.'contacts/');?>
	<?$isHomePage = CSite::InDir(SITE_DIR.'index.php');?>
	<?$is404Page = defined("ERROR_404") && ERROR_404 === "Y";?>

	<?global $evoSettings;?>

	<?$evoSettings = $APPLICATION->IncludeComponent(
		"ms:active.theme",
		"",
		array(),
		false,
		array('HIDE_ICONS' => 'Y')
	);
	?>

	<?
	if($evoSettings["MENU_TYPE"]["CURRENT"] == "v1") {
		$menuColor = "s_menubar_underline";
	} elseif($evoSettings["MENU_TYPE"]["CURRENT"] == "v2") {
		$menuColor = "s_menubar_white";
	} elseif($evoSettings["MENU_TYPE"]["CURRENT"] == "v3") {
		$menuColor = "s_menubar_white_2";
	} elseif($evoSettings["MENU_TYPE"]["CURRENT"] == "v4") {
		$menuColor = "s_menubar_color";
	} elseif($evoSettings["MENU_TYPE"]["CURRENT"] == "v5") {
		$menuColor = "s_menubar_dark";
	}

	if($evoSettings["HEADER_TYPE"]["CURRENT"] == "v1") {
		$headerType = "s_header_type_1";
	} elseif($evoSettings["HEADER_TYPE"]["CURRENT"] == "v2") {
		$headerType = "s_header_type_2";
	}

	if($evoSettings["FIXED"]["CURRENT"] == "yes") {
		if($evoSettings["HEADER_TYPE"]["CURRENT"] == "v1") {
			$s_fixed = "s_fixed_header";
		} elseif($evoSettings["HEADER_TYPE"]["CURRENT"] == "v2") {
			$s_fixed = "s_fixed_menu";
		}
	} elseif($evoSettings["FIXED"]["CURRENT"] == "no") {
		$s_fixed = "";
	}

	if($evoSettings["SLIDER_WIDTH"]["CURRENT"] == "fw") {
		$sliderType = "s_homeslider_large";
	} elseif($evoSettings["SLIDER_WIDTH"]["CURRENT"] == "small") {
		$sliderType = "s_homeslider_small";
	}

	if($evoSettings["BOXED_TYPE"]["CURRENT"] == "no") {
		$s_boxed = "";
	} elseif($evoSettings["BOXED_TYPE"]["CURRENT"] == "texture") {
		$s_boxed = "s_boxed s_bg_texture";
	} elseif($evoSettings["BOXED_TYPE"]["CURRENT"] == "image") {
		$s_boxed = "s_boxed s_bg_image";
	} elseif($evoSettings["BOXED_TYPE"]["CURRENT"] == "color") {
		$s_boxed = "s_boxed s_bg_color";
	}

	if($evoSettings["PAGE_HEADING_TYPE"]["CURRENT"] == "bg_no") {
		$s_page_heading_bg = "";
	} elseif($evoSettings["PAGE_HEADING_TYPE"]["CURRENT"] == "color") {
		$s_page_heading_bg = "s_page_heading_bg s_page_heading_color";
	} elseif($evoSettings["PAGE_HEADING_TYPE"]["CURRENT"] == "texture") {
		$s_page_heading_bg = "s_page_heading_bg s_page_heading_texture";
	} elseif($evoSettings["PAGE_HEADING_TYPE"]["CURRENT"] == "image") {
		$s_page_heading_bg = "s_page_heading_bg s_page_heading_image";
	}

	if($evoSettings["PAGE_HEADING_TYPE"]["CURRENT"] !== "bg_no") {
		if($evoSettings["PAGE_HEADING_TEXT_COLOR"]["CURRENT"] == "dark") {
			$s_page_heading_text_color = "s_page_heading_text_dark";
		} elseif($evoSettings["PAGE_HEADING_TEXT_COLOR"]["CURRENT"] == "white") {
			$s_page_heading_text_color = "s_page_heading_text_white";
		}
	} else {
		$s_page_heading_text_color = "s_page_heading_text_dark";
	}

	if($evoSettings["SIDEBAR_MENU_COLOR"]["CURRENT"] == "v1") {
		$s_side_menu_color = "s_side_menu_dark";
	} elseif($evoSettings["SIDEBAR_MENU_COLOR"]["CURRENT"] == "v2") {
		$s_side_menu_color = "s_side_menu_color";
	}

	if($evoSettings["TOP_PANEL_TEXT_COLOR"]["CURRENT"] == "v1") {
		$s_top_panel_text_color = "s_top_panel_text_white";
	} elseif($evoSettings["TOP_PANEL_TEXT_COLOR"]["CURRENT"] == "v2") {
		$s_top_panel_text_color = "s_top_panel_text_dark";
	}

	if($evoSettings["HOME_ICONS_BLOCK_TEXT_COLOR"]["CURRENT"] == "v1") {
		$s_homes_icons_block_text_color = "s_homes_icons_block_text_white";
	} elseif($evoSettings["HOME_ICONS_BLOCK_TEXT_COLOR"]["CURRENT"] == "v2") {
		$s_homes_icons_block_text_color = "s_homes_icons_block_text_dark";
	}
	?>

	<script>
		var homeSliderSettingsCustom = {
			autoplay: true,
			// autoplaySpeed: 4000,
			// speed: 600,
			// fade: true,
		};
	</script>

	<?if($evoSettings["USE_CUSTOM_COLOR"]["CURRENT"] !== "Y"):?>
		<link rel="stylesheet" id="color_theme_css" href="<?=SITE_TEMPLATE_PATH?>/themes/<?=$evoSettings["COLOR_THEME"]["CURRENT"]?>/theme.css">
	<?else:?>
		<?
		$color = $evoSettings["CUSTOM_COLOR"]["CURRENT"];
		$objColor = new \Mexitek\PHPColors\Color($evoSettings["CUSTOM_COLOR"]["CURRENT"]);
		$colorHover = "#".$objColor->mix("#fff", "70");
		$colorHoverDarken = "#".$objColor->mix("#000", "70");
		$colorRgbArray = $objColor->getRgb();
		$colorRGBA = $colorRgbArray["R"].', '.$colorRgbArray["G"].', '.$colorRgbArray["B"];
		?>
		<style type="text/css">
			<?if(file_exists($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/themes/custom/theme.php")):?>
			<?require($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/themes/custom/theme.php");?>
			<?endif?>
		</style>
	<?endif?>
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/custom.css">
	<script src="<?=SITE_TEMPLATE_PATH?>/custom.js"></script>
</head>
<body
	<?if($evoSettings["BOXED_USE_FILE"]["CURRENT"] !== "Y"):?>
		<?if($evoSettings["BOXED_TYPE"]["CURRENT"] == "texture"):?>
			style="background-image:url('<?=SITE_TEMPLATE_PATH?>/img/bg_tex/<?=$evoSettings["BOXED_TEXTURE"]["CURRENT"]?>');"
		<?elseif($evoSettings["BOXED_TYPE"]["CURRENT"] == "image"):?>
			style="background-image:url('<?=SITE_TEMPLATE_PATH?>/img/bg_img/<?=$evoSettings["BOXED_IMAGE"]["CURRENT"]?>');"
		<?elseif($evoSettings["BOXED_TYPE"]["CURRENT"] == "color"):?>
			style="background-color:<?=$evoSettings["BOXED_COLOR"]["CURRENT"] ?>;"
		<?endif?>
	<?else:?>
		style="background-image:url('<?=$evoSettings["BOXED_FILE"]["CURRENT"]?>');"
	<?endif?>
	class="<?if($isHomePage):?>homepage<?endif?>
		<?=$s_top_panel_text_color?> <?=$s_homes_icons_block_text_color?> s_footer_text_white s_page_heading_type_oneline <?=$headerType?> <?=$sliderType?> <?=$s_boxed?> <?=$s_page_heading_bg?> <?=$s_page_heading_text_color?> <?=$s_fixed?> <?=$menuColor?> <?=$s_side_menu_color?>">

<?$APPLICATION->IncludeComponent(
	"ms:active.theme",
	"tc",
	array(),
	false,
	array('HIDE_ICONS' => 'Y')
);
?>

<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?if(!CModule::IncludeModule("ms.active")):?>
	<p><?=GetMessage("ACTIVE_MODULE_ERROR");?></p>
	<?die();?>
<?endif?>

<div class="site-wrapper">
	<div class="header-mobile visible-xs-block">
		<div class="in">
			<div class="col mobile-menu-toggle-wrap"><a href="#" rel="nofollow" class="hm-btn mobile-menu-toggle"><i class="fa fa-bars"></i><i class="i-cross">&#10005;</i></a></div>
			<div class="col logo">
				<?$APPLICATION->IncludeFile(SITE_DIR."include/header_logo.php", Array(), Array("MODE"=>"html"));?>
			</div>
			<div class="col mobile-search-toggle-wrap"><a href="#" rel="nofollow" class="hm-btn mobile-search-toggle"><i class="fa fa-search"></i><i class="i-cross">&#10005;</i></a></div>
		</div>
	</div>
	<div class="mobile-search">
		<div class="mobile-search-in">
			<?$APPLICATION->IncludeComponent("bitrix:search.title", "search", Array(
				"NUM_CATEGORIES" => "1",
				"TOP_COUNT" => "5",
				"ORDER" => "date",
				"USE_LANGUAGE_GUESS" => "Y",
				"CHECK_DATES" => "N",
				"SHOW_OTHERS" => "N",
				"PAGE" => SITE_DIR."search/index.php",
				"CATEGORY_0_TITLE" => "",
				"CATEGORY_0" => "",
			),
				false
			);?>
		</div>
	</div>
	<div
		<?if($evoSettings["TOP_PANEL_BG_COLOR"]["CURRENT"]):?>
			style="background-color:<?=$evoSettings["TOP_PANEL_BG_COLOR"]["CURRENT"] ?>;"
		<?endif?>
		class="top-panel hidden-xs">
		<div class="sc-maxwidth">
			<div class="in">
				<?if($evoSettings["HEADER_TYPE"]["CURRENT"] == "v1") {?>
					<div class="col">
						<div class="item"><?$APPLICATION->IncludeFile(SITE_DIR."include/footer_address.php", Array(), Array("MODE"=>"php"));?></div>
					</div>
					<div class="col">
						<div class="item"><?$APPLICATION->IncludeFile(SITE_DIR."include/shedule.php", Array(), Array("MODE"=>"html"));?></div>
					</div>
					<div class="col">
						<div class="item"><?$APPLICATION->IncludeFile(SITE_DIR."include/phone.php", Array(), Array("MODE"=>"html"));?></div>
						<div class="item"><?$APPLICATION->IncludeFile(SITE_DIR."include/fixed_panel_feedback.php", Array(), Array("MODE"=>"php"));?></div>
					</div>
				<?} elseif($evoSettings["HEADER_TYPE"]["CURRENT"] == "v2") {?>
					<div class="col">
						<div class="item item-slogan"><?$APPLICATION->IncludeFile(SITE_DIR."include/slogan.php", Array(), Array("MODE"=>"php"));?></div>
					</div>
					<div class="col">
						<div class="item item-social">
							<?$APPLICATION->IncludeFile(SITE_DIR."include/social_icons.php", Array(), Array("MODE"=>"php"));?>
						</div>
					</div>
					<div class="col">
						<div class="item item-callback"><?$APPLICATION->IncludeFile(SITE_DIR."include/fixed_panel_feedback.php", Array(), Array("MODE"=>"php"));?></div>
					</div>
				<?}?>
			</div>
		</div>
	</div>

	<?if($evoSettings["HEADER_TYPE"]["CURRENT"] == "v1") {?>
		<div class="header-placeholder"></div>
		<header id="header">
			<div id="header-in" class="sc-maxwidth">
				<div class="row">
					<div class="col col-xs-12 col-sm-2 col-md-3 hidden-xs">
						<?$APPLICATION->IncludeFile(SITE_DIR."include/header_logo.php", Array(), Array("MODE"=>"html"));?>
						<div class="my-logo-description">
							<p class="my-logo-description-one">Горно-Металлургический Профсоюз России</p>
							<p class="my-logo-description-two">Кемеровская территориальная профсоюзная организация</p>
						</div>
					</div>
					<div class="col col-menu col-xs-12 col-sm-10 col-md-9">
						<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "top"
	),
	false
);?>
					</div>
				</div>
			</div>
		</header>
	<?} elseif($evoSettings["HEADER_TYPE"]["CURRENT"] == "v2") {?>
		<header id="header" class="hidden-xs">
			<div id="header-in" class="sc-maxwidth">
				<div class="row">
					<div class="col-logo col-sm-3">
						<?$APPLICATION->IncludeFile(SITE_DIR."include/header_logo.php", Array(), Array("MODE"=>"html"));?>
					</div>
					<div class="col-right col-sm-9">
						<div class="col-right-in">
							<div class="col col-address">
								<?$APPLICATION->IncludeFile(SITE_DIR."include/header2_address.php", Array(), Array("MODE"=>"php"));?>
							</div>
							<div class="col col-worktime">
								<?$APPLICATION->IncludeFile(SITE_DIR."include/header2_schedule.php", Array(), Array("MODE"=>"php"));?>
							</div>
							<div class="col col-phone">
								<?$APPLICATION->IncludeFile(SITE_DIR."include/header2_contacts.php", Array(), Array("MODE"=>"php"));?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="menubar-placeholder"></div>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
			"ROOT_MENU_TYPE" => "top",
			"MENU_CACHE_TYPE" => "A",
			"MENU_CACHE_TIME" => "36000000",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => "",
			"MAX_LEVEL" => "4",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "Y",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N",
		),
			false
		);?>
	<?}?>

	<?if(!$isHomePage && !$is404Page) {?>
	<div
		<?if($evoSettings["PAGE_HEADING_USE_FILE"]["CURRENT"] !== "Y"):?>
			<?if($evoSettings["PAGE_HEADING_TYPE"]["CURRENT"] == "image"):?>
				style="background-image:url('<?=SITE_TEMPLATE_PATH?>/img/bg_img/<?=$evoSettings["PAGE_HEADING_IMAGE"]["CURRENT"]?>');"
			<?elseif($evoSettings["PAGE_HEADING_TYPE"]["CURRENT"] == "texture"):?>
				style="background-image:url('<?=SITE_TEMPLATE_PATH?>/img/bg_tex/<?=$evoSettings["PAGE_HEADING_TEXTURE"]["CURRENT"]?>');"
			<?elseif($evoSettings["PAGE_HEADING_TYPE"]["CURRENT"] == "color"):?>
				style="background-color:<?=$evoSettings["PAGE_HEADING_COLOR"]["CURRENT"] ?>;"
			<?endif?>
		<?else:?>
			style="background-image:url('<?=$evoSettings["PAGE_HEADING_FILE"]["CURRENT"]?>');"
		<?endif?>
		class="page-heading s_page_heading_type_oneline">
		<div class="sc-maxwidth clearfix">
			<h1 class="my-new-title"><?$APPLICATION->ShowTitle(false)?></h1>
			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
			),
				false
			);?>
		</div>
	</div>

	<?
	//			function startsWith($haystack, $needle)
	//			{
	//				return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
	//			}
	//
	//			function endsWith($haystack, $needle)
	//			{
	//				return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
	//			}


	?>
	<?if($sidebar !== "N"
//	&& !startsWith($APPLICATION->GetCurDir(), "/documents/")
	) {?>

	<main class="main with-sidebar">
		<div class="sc-maxwidth">
			<div class="row">
				<div class="content col-xs-12 col-sm-8 col-md-9">
					<?} else {?>

					<main class="main without-sidebar">
						<div class="sc-maxwidth">
							<div class="content">
								<?}?>

								<?}?>

								<?if($isHomePage) {?>
									<?
									$homeBlocks = $evoSettings["HOME_BLOCKS"];
									foreach($homeBlocks as $key => $item) {
										if($item["active"] == "Y") {
											if($key !== "home_about") {
												$APPLICATION->IncludeFile(
													SITE_DIR."include/".$key.".php",
													Array(),
													Array("MODE"=>"html")
												);
											} else {
												?>
												<div class="block-content-wrap clearfix">
													<div class="sc-maxwidth">
														<div class="row">
															<div class="block-content col-xs-12 col-md-8">
																<?$APPLICATION->IncludeFile(
																	SITE_DIR."include/home_about.php",
																	Array(),
																	Array("MODE"=>"php")
																);?>
															</div>
															<div class="visible-xs-block clearfix"></div>
															<div class="block-content col-xs-12 col-md-4">
																<?$APPLICATION->IncludeFile(
																	SITE_DIR."include/home_faq.php",
																	Array(),
																	Array("MODE"=>"php")
																);?>
															</div>
														</div>
													</div>
												</div>
												<?
											}
										}
									}
									?>
								<?}?>
