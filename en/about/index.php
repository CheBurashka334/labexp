<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>
<?
use \Bitrix\Iblock\ElementTable as EL;
use \Bitrix\Iblock\InheritedPropertyTable as SEO;
?>
<?if($_GET['ajax']=='y'):?>
    <!--ajax-->
    <div class="page-aside-detail contacts">
        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."inc/about.php"), false);?>
    </div>
    <!--endajax-->
<?else:?>


    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."inc/home.php"), false);?>
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