<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?if (!empty($arResult)):?>
<div class="menubar">
	<nav class="menu-wrapper sc-maxwidth clearfix">
		<div class="menu-wrapper-in">
			<div class="menubar-search hidden-xs"><a href="#" class="search-toggle"><i class="fa fa-search"></i><i class="i-cross">&#10005;</i></a>
				<div class="search-dropdown">
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

			<ul class="menu">
				<?
				$previousLevel = 0;
				foreach($arResult as $arItem):?>

				<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
					<?=str_repeat("</ul></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
				<?endif?>

				<?if ($arItem["IS_PARENT"]):?>
					<?if ($arItem["DEPTH_LEVEL"] == 1):?>
						<li class="hassub <?if ($arItem["SELECTED"]):?>active<?endif?>">
							<div class="link">
								<span class="js_sub_toggle"><i></i></span>
								<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
							</div>
							<div class="submenu"><ul>
					<?else:?>
						<li class="hassub <?if ($arItem["SELECTED"]):?>active<?endif?>">
							<div class="link">
								<span class="js_sub_toggle"><i></i></span>
								<a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
							</div>
							<div class="submenu"><ul>
					<?endif?>
				<?else:?>
					<?if ($arItem["PERMISSION"] > "D"):?>
						<?if ($arItem["DEPTH_LEVEL"] == 1):?>
							<li class="<?if ($arItem["SELECTED"]):?>active<?else:?>root-item<?endif?>">
								<div class="link">
									<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
								</div>
							</li>
						<?else:?>
							<li<?if ($arItem["SELECTED"]):?> class="active"<?endif?>>
								<div class="link">
									<a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
								</div>
							</li>
						<?endif?>
					<?endif?>
				<?endif?>

				<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
				<?endforeach?>

				<?if ($previousLevel > 1)://close last item tags?>
					<?=str_repeat("</ul></div></li>", ($previousLevel-1) );?>
				<?endif?>

				<li class="menu-more hassub">
					<div class="link"><a href="#"><?=GetMessage('MENU_MORE');?></a>
					</div>
					<div class="submenu">
						<ul></ul>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>
<?endif?>
