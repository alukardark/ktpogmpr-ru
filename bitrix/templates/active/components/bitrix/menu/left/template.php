<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>

<?
global $evoSettings;

if($evoSettings["SIDEBAR_MENU_TYPE"]["CURRENT"] == "v1") {
	$sidebarMenuType = "side-menu-accordion";
} elseif($evoSettings["SIDEBAR_MENU_TYPE"]["CURRENT"] == "v2") {
	$sidebarMenuType = "side-menu-dropdown";
}
?>

<?if (!empty($arResult)):?>
	<div class="side-block side-menu-wrapper">
		<ul class="menu side-menu <?=$sidebarMenuType?>">
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
							<span class="js_sub_toggle"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span>
							<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
						</div>
						<div class="submenu"><ul>
				<?else:?>
					<li class="hassub <?if ($arItem["SELECTED"]):?>active<?endif?>">
						<div class="link">
							<span class="js_sub_toggle"><i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></span>
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
		</ul>
	</div>
<?endif?>
