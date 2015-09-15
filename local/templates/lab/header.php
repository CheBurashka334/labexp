<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="favicon.png" type="image/png">
		<link href="http://fonts.googleapis.com/css?family=Roboto:400italic,100,700italic,300,700,100italic,300italic,400&amp;subset=cyrillic,cyrillic-ext,latin" rel="stylesheet" type="text/css">
	
		<?//$APPLICATION->ShowHead()?>
		<?
		$APPLICATION->ShowMeta("robots", false, true);
		$APPLICATION->ShowMeta("keywords", false, true);
		$APPLICATION->ShowMeta("description", false, true);
		$APPLICATION->ShowCSS(true, true);

		$APPLICATION->ShowHeadStrings();
		$APPLICATION->ShowHeadScripts();

        //D7
        //use Asset::getInstance()->addJs($src, $additional)
        //use \Bitrix\Main\Page\Asset;
        //Asset::getInstance()->addJs("http://yastatic.net/jquery/2.1.1/jquery.min.js");
        use \Bitrix\Main\Page\Asset;
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery-1.11.3.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.jcarousel.min.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/iscroll.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/svg-lib.js");
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/script.js");
		//old
        /*
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery-1.11.3.min.js");
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.jcarousel.min.js");
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/iscroll.js");
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/svg-lib.js");
            $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/script.js");
        */
		?>
		
		
		<title><?$APPLICATION->ShowTitle();?></title>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
		<?
		//настройки сайта
		$APPLICATION->IncludeComponent(
                                	"bitrix:main.include",
                                	"",
                                	Array(
                                		"COMPONENT_TEMPLATE" => ".default",
                                		"AREA_FILE_SHOW" => "file",
                                		"AREA_FILE_SUFFIX" => "inc",
                                		"EDIT_TEMPLATE" => "",
                                		"PATH" => "/include/options.php"
                                	)
                                );?>
		<div id="svg-placeholder" class="hide"></div>
		<div class="layout">
		<!-- для главной добавить класс home-page к page, для новостей и благотворительности - news-page,
			для проектов - projects-page -->
		<div class="page news-page scroll-box">
			<!-- если не 404 -->
			<div class="header">
				<div class="container clearfix">
					<div class="logo-box left">
						<a href="/" class="logo-link">
							<svg class="icon"><use xlink:href="#logo"/></svg>
						</a>
                    </div>
					<div class="content-box right">
						<!--menu-->
								<?
								$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => "/include/menu.php",
									"EDIT_TEMPLATE" => ""
									)
								);
								?>
							<!--endmenu-->
						<div class="phone-box">
							<a class="phone nostyle" href="callto:<?=preg_replace("/[^0-9+]/","",$GLOBALS['options_props']['phone']['~VALUE'])?>">
								<?=$GLOBALS['options_props']['phone']['~VALUE']?>
							</a>
						</div>
						<div class="language-box">
							<!--language-->
								<div class="dropdown-box">
									<div class="dropdown-value"></div>
									<ul class="dropdown-list">
										<li class="dropdown-item active">ru</li>
										<li class="dropdown-item">en</li>
										<li class="dropdown-item">zh</li>
									</ul>
									<i class="dropdown-arrow"><svg class="icon"><use xlink:href="#arr"</svg></i>
								</div>
							<!--endlanguage-->
						</div>
					</div>
				</div>
			</div>
			<!-- /если не 404 -->
			<div class="workarea-wrapper scroll-wrapper" id="scroll-page">
				<div class="workarea">
	
						