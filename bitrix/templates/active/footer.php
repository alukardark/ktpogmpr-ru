<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>



			<?if(!$isHomePage && !$is404Page) {?>
						<?if($sidebar !== "N") {?>
						</div>
						<aside class="sidebar hidden-xs col-sm-4 col-md-3">
							<?$APPLICATION->ShowViewContent("sidebar_filter")?>
							<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"left", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "Y",
		"COMPONENT_TEMPLATE" => "left"
	),
	false
);?>
<!--							--><?//if($sidebarTeasers !== "N"):?>
<!--								--><?//$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
//												"AREA_FILE_SHOW" => "file",
//												"PATH" => SITE_DIR."include/sidebar_teasers_block.php",
//												"AREA_FILE_SUFFIX" => "inc",
//												"AREA_FILE_RECURSIVE" => "Y",
//												"EDIT_TEMPLATE" => "standard.php"
//										)
//								);?>
<!--							--><?//endif?>
<!--							--><?//if($sidebarManager !== "N"):?>
<!--								--><?//$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
//												"AREA_FILE_SHOW" => "file",
//												"PATH" => SITE_DIR."include/sidebar_manager_block.php",
//												"AREA_FILE_SUFFIX" => "inc",
//												"AREA_FILE_RECURSIVE" => "Y",
//												"EDIT_TEMPLATE" => "standard.php"
//										)
//								);?>
<!--							--><?//endif?>
<!--							--><?//if($sidebarNotices !== "N"):?>
<!--								--><?//$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
//												"AREA_FILE_SHOW" => "file",
//												"PATH" => SITE_DIR."include/sidebar_notices_block.php",
//												"AREA_FILE_SUFFIX" => "inc",
//												"AREA_FILE_RECURSIVE" => "Y",
//												"EDIT_TEMPLATE" => "standard.php"
//										)
//								);?>
<!--							--><?//endif?>
<!--							--><?//if($sidebarBanner !== "N"):?>
<!--								--><?//$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
//												"AREA_FILE_SHOW" => "file",
//												"PATH" => SITE_DIR."include/sidebar_banner_block.php",
//												"AREA_FILE_SUFFIX" => "inc",
//												"AREA_FILE_RECURSIVE" => "Y",
//												"EDIT_TEMPLATE" => "standard.php"
//										)
//								);?>
<!--							--><?//endif?>
						</aside>
					</div>
				</div>
			</main>
						<?} else {?>
					</div>
				</div>
			</main>
						<?}?>
			<?}?>

			<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."include/footer_ask.php",
							"AREA_FILE_SUFFIX" => "inc",
							"AREA_FILE_RECURSIVE" => "Y",
							"EDIT_TEMPLATE" => "standard.php"
					)
			);?>
			<footer id="footer" style="background: url('<?=SITE_TEMPLATE_PATH?>/img/bg_tex/tweed.png');">
				<div id="footer-in" class="sc-maxwidth">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-9 pull-left">
							<div class="row row-menus my-menus-footer">
								<div class="col col1 col-sm-3 col-xs-6">
									<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
													"AREA_FILE_SHOW" => "file",
													"PATH" => SITE_DIR."include/footer_menu1.php",
													"AREA_FILE_SUFFIX" => "inc",
													"AREA_FILE_RECURSIVE" => "Y",
													"EDIT_TEMPLATE" => "standard.php"
											)
									);?>
								</div>
								<div class="col col2 col-sm-3 col-xs-6">
									<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
													"AREA_FILE_SHOW" => "file",
													"PATH" => SITE_DIR."include/footer_menu2.php",
													"AREA_FILE_SUFFIX" => "inc",
													"AREA_FILE_RECURSIVE" => "Y",
													"EDIT_TEMPLATE" => "standard.php"
											)
									);?>
								</div>
								<div class="col my-col-3 col3 col-sm-6 col-xs-12">
									<ul class="menu list-icons">
										<li style="line-height: 14px"><?$APPLICATION->IncludeFile(SITE_DIR."include/footer_address_two.php", Array(), Array("MODE"=>"php"));?></li>
										<li><?$APPLICATION->IncludeFile(SITE_DIR."include/footer_phone.php", Array(), Array("MODE"=>"php"));?></li>
										<li><?$APPLICATION->IncludeFile(SITE_DIR."include/footer_email.php", Array(), Array("MODE"=>"php"));?></li>
									</ul>
									<div class="counters clearfix hidden">
										<?$APPLICATION->IncludeFile(SITE_DIR."include/footer_counters.php", Array(), Array("MODE"=>"php"));?>
									</div>
								</div>
							</div>
						</div>
						<div class="col col-xs-12 col-sm-12 col-md-3 my-overlay-copyright-parent">
							<div class="row">
								<div class="col-md-12 text-right my-overlay-copyright">
									<div class="copyright"><?$APPLICATION->IncludeFile(SITE_DIR."include/copyright.php", Array(), Array("MODE"=>"php"));?>
									</div>
								</div>
							</div>
<!--							--><?//$APPLICATION->IncludeFile(SITE_DIR."include/social_icons.php", Array(), Array("MODE"=>"php"));?>
						</div>
					</div>
				</div>
			</footer><a id="f_up" href="#"><i class="fa fa-angle-up"></i></a>
			<div tabindex="-1" role="dialog" class="modal_form modal_ajax modal">
				<div role="document" class="modal-dialog">
					<div class="modal-content"></div>
				</div>
			</div>
			<div id="filter_mobile_modal" tabindex="-1" role="dialog" class="modal_form modal fade">
				<div role="document" class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">&times;</span></button>
							<div class="modal-title"><?=GetMessage("MODAL_FILTER_TITLE");?></div>
						</div>
						<div class="modal-body bx-filter bx-filter-vertical"></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
