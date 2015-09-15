<!DOCTYPE html>
<html>
<head>
	<title>Laboratory Expert</title>
	<!--meta name="viewport" content="width=device-width, initial-scale=1"-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="favicon.png" type="image/png">
	<link href="http://fonts.googleapis.com/css?family=Roboto:400italic,100,700italic,300,700,100italic,300italic,400&amp;subset=cyrillic,cyrillic-ext,latin" rel="stylesheet" type="text/css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.jcarousel.min.js"></script>
	<script src="js/iscroll.js"></script>
	<script src="js/svg-lib.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="template_styles.css" />
</head>
<body>
<div id="svg-placeholder" class="hide"></div>
<div class="layout">
<!-- для главной добавить класс home-page к page, для новостей и благотворительности - news-page,
	для проектов - projects-page -->
<div class="page news-page scroll-box">
	<!-- если не 404 -->
	<div class="header">
		<div class="container clearfix">
			<div class="logo-box left">
				<a href="home.php" class="logo-link">
					<svg class="icon"><use xlink:href="#logo"/></svg>
				</a>
			</div>
			<div class="content-box right">
				<div class="main-menu-box">
					<ul class="main-menu nostyle">
						<li class="menu-item"><a href="about.php" class="menu-link active">О компании</a></li>
						<li class="menu-item"><a href="projects.php" class="menu-link">Проекты</a></li>
						<li class="menu-item"><a href="news.php" class="menu-link">Новости</a></li>
						<li class="menu-item"><a href="charity.php" class="menu-link">Благотворительность</a></li>
						<li class="menu-item"><a href="contacts.php" class="menu-link get-page-content get-map">Контакты</a></li>
					</ul>
				</div>
				<div class="phone-box">
					<a class="phone nostyle" href="callto:+74951112232">+7&nbsp;(495)&nbsp;111&#8209;22&#8209;32</a>
				</div>
				<div class="language-box">
					<div class="dropdown-box">
						<div class="dropdown-value"></div>
						<ul class="dropdown-list">
							<li class="dropdown-item active">ru</li>
							<li class="dropdown-item">en</li>
							<li class="dropdown-item">zh</li>
						</ul>
						<i class="dropdown-arrow"><svg class="icon"><use xlink:href="#arr"</svg></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /если не 404 -->
	<div class="workarea-wrapper scroll-wrapper" id="scroll-page">
		<div class="workarea">