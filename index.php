<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."inc/home.php"), false);?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>