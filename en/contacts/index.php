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
        <div class="page-aside-header">
            <div class="item-title large">Contacts</div>
        </div>
        <div class="page-aside-map" id="yamap"></div>
        <div class="page-aside-body clearfix">
            <div class="contacts-box left">
                <p class="xx-big">
                    <?=$GLOBALS['options_props_en']['contacts']['~VALUE']['TEXT']?>
                </p>
            </div>
            <div class="feedback-box left">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form.result.new",
                    "callback",
                    Array(
                        "COMPONENT_TEMPLATE" => "callback",
                        "WEB_FORM_ID" => "1",
                        "IGNORE_CUSTOM_TEMPLATE" => "N",
                        "USE_EXTENDED_ERRORS" => "N",
                        "SEF_MODE" => "N",
                        "VARIABLE_ALIASES" => Array(
                            "WEB_FORM_ID" => "WEB_FORM_ID",
                            "RESULT_ID" => "RESULT_ID"
                        ),
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "3600",
                        "LIST_URL" => "",
                        "EDIT_URL" => "",
                        "SUCCESS_URL" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "CHAIN_ITEM_LINK" => "",
                        "AJAX_MODE" => "Y",  // режим AJAX
                    )
                );?>
            </div>
        </div>
        <script src="https://api-maps.yandex.ru/2.1/?lang=en-US&onload=init" type="text/javascript"></script>
        <script>
            // yandex map
            // https://tech.yandex.ru/maps/doc/jsapi/2.1/quick-start/tasks/quick-start-docpage/
            var map, placemark;
            function init(){
                map = new ymaps.Map('yamap',{
                    center: [<?=$GLOBALS['options_props_en']['map']['VALUE']?>],
                    zoom: 17
                });
                placemark = new ymaps.Placemark(map.getCenter(),{},{
                    iconLayout: 'default#image',
                    iconImageHref: '/images/icons-svg/pin56.svg',
                });
                map.geoObjects.add(placemark);
                map.behaviors.disable('scrollZoom');
            }

        </script>
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