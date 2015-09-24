<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Проекты');
?>
<?
    use \Bitrix\Iblock\ElementTable as EL;
    use \Bitrix\Iblock\InheritedPropertyTable as SEO;
?>
<?if($_GET['ajax']=='y'):?>
<!--ajax-->
<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"detail-project",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "information_en",
		"IBLOCK_ID" => "7",
		"ELEMENT_ID" => "",
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
		"CHECK_DATES" => "Y",
		"FIELD_CODE" => array("", ""),
		"PROPERTY_CODE" => array("link", ""),
		"IBLOCK_URL" => "",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"USE_PERMISSIONS" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		//"PAGER_TITLE" => "РЎС‚СЂР°РЅРёС†Р°",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	)
);?>
<!--endajax-->
<?else:?>
    <?
        $parameters = array(
            'select'=>array('ID'),
            'filter'=>array('IBLOCK_ID'=>'2','CODE'=>$_REQUEST["ELEMENT_CODE"])
        );
        $EL = EL::getList($parameters)->fetchAll();
        $id_element = $EL[0]['ID'];
        $parameters = array(
            'filter'=>array('IBLOCK_ID'=>'2','ENTITY_ID'=>$id_element)
        );
       $rows = SEO::getList($parameters)->fetchAll();
       if(!empty($rows))
       {
           foreach($rows as $item)
           {
               switch ($item['CODE']) {
                   case 'ELEMENT_META_TITLE':
                       $APPLICATION->SetPageProperty("title", $item['TEMPLATE']);
                       $APPLICATION->SetTitle($item['TEMPLATE']);
                       break;
               }
           }
       }
    ?>
    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."inc/projects_list.php"), false);?>
    <script>
        $(document).ready(function(){
            var res = ajcontent(location.pathname+'?ajax=y','<!--ajax-->','<!--endajax-->');
            $('.dark-bg, .page-aside').addClass('open');
        })
    </script>
<?endif;?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>