<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->setFrameMode(true);?>
<!--<div class="items-list clearfix items-view---><?//if($arParams["DISPLAY_VIEW_MODE"] !== "grid"):?><!--list--><?//else:?><!--grid--><?//endif?><!-- img-or-3x2 news-list">-->
<?


if($APPLICATION->GetCurDir() == "/news/"):?>


<!--	<a href="--><?//=$arResult["ITEMS"][0]['SECTION_LIST'][0]['SECTION_PAGE_URL']?><!--" class="my-btn-news btn my-btn btn-sm my-btn-sm btn-default ">Показать все</a>-->
<!--	<a title="RSS-подписка" href="/rss.php" class="rss" target="_blank"></a>-->

<?endif;?>

<?//
//if($APPLICATION->GetCurPage() == "/press-center/" || $APPLICATION->GetCurPage() == "/company/pervychnie-organizacuy/" || $APPLICATION->GetCurPage() == "/news/"):
//?>
<!--<div class="my-news-items-list items-list clearfix items-view-grid img-or-3x2 news-list">-->
<!---->
<!--	--><?//else:?><!--<div class="my-news-items-list items-list clearfix items-view-list img-or-3x2 news-list">--><?//endif;?>

		<?if($arParams["DISPLAY_TOP_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
		<?endif;?>
		<?
		$i = 0;
		?>
		<? foreach ($arResult["ITEMS"] as $arItem): ?>
			<?if($APPLICATION->GetCurPage() == "/news/" && $i<3) { ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div style="position: relative;" class="item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<div class="item-in">
						<?if ($arParams["DISPLAY_PICTURE"] != "N"): ?>

							<?$dummy = "";
							if ($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
								$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
							}
							else{
								$picture = SITE_TEMPLATE_PATH . "/img/dummy200.png";
								$dummy = "dummy";
							}?>
							<div class="item-img img-middle <?= $dummy ?>"><a
									href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
									class="item-img-in img-middle-in my-new-item-img-in">

									<div style="background: url(<?= $picture ?>) center/cover no-repeat; opacity: 1"
										 class="img-hover-overlay"></div>
								</a></div>
						<?endif ?>
						<div class="item-content">
							<? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
								<div class="item-date"><i
										class="fa fa-lg fa-clock-o"></i><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></div>
							<?endif ?>
							<? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
								<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
									<div class="item-title"><a
											href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a></div>
									<?
								else: ?>
									<div class="item-title"><?= $arItem["NAME"] ?></div>
								<?endif; ?>
							<?endif; ?>
							<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
								<div class="item-text hidden-xs">
									<?= $arItem["PREVIEW_TEXT"] ?>
								</div>
							<?endif; ?>
							<? if ($arParams["DISPLAY_DETAIL_BUTTON"] != "N"): ?>
								<div class="item-btns">
									<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
									   class="btn btn-sm btn-primary"><?= GetMessage('DETAIL_BUTTON_TEXT') ?></a>
								</div>
							<?endif ?>
						</div>
					</div>
				</div>
				<?
				$i++;
			}elseif($i==0){
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<div class="item-in">
						<?if ($arParams["DISPLAY_PICTURE"] != "N"): ?>
							<?$dummy = "";
							if ($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
								$picture = $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"];
							}
							else {
								$picture = SITE_TEMPLATE_PATH . "/img/dummy200.png";
								$dummy = "dummy";
							}
							?>
							<div class="item-img img-middle <?= $dummy ?>"><a
									href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
									class="item-img-in img-middle-in my-new-item-img-in">
									<div style="background: url(<?= $picture ?>) center/cover no-repeat; opacity: 1"
										 class="img-hover-overlay"></div>
								</a></div>
						<?endif ?>

						<div class="item-content">
							<? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
								<div class="item-date"><i
										class="fa fa-lg fa-clock-o"></i><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></div>
							<?endif ?>
							<? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
								<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
									<div class="item-title"><a
											href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a></div>
									<?
								else: ?>
									<div class="item-title"><?= $arItem["NAME"] ?></div>
								<?endif; ?>
							<?endif; ?>
							<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
								<div class="item-text hidden-xs">
									<?= $arItem["PREVIEW_TEXT"] ?>
								</div>
							<?endif; ?>
							<? if ($arParams["DISPLAY_DETAIL_BUTTON"] != "N"): ?>
								<div class="item-btns">
									<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
									   class="btn btn-sm btn-primary"><?= GetMessage('DETAIL_BUTTON_TEXT') ?></a>
								</div>
							<?endif ?>
						</div>
					</div>
				</div>
				<?
			}
		endforeach;

		?>
		<?
		if($APPLICATION->GetCurDir() == "/news/novosti-ktpo-gmpr/"):
			?>
			<a title="RSS-подписка" href="/rss.php" class="rss" target="_blank"></a>
		<?endif;?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
		<?endif;?>


