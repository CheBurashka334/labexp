<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Новости');
?>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."inc/news_list.php"), false);?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>