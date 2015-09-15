$(document).ready(function(){
	
	$('#svg-placeholder').html(svg);
	
	// scroll
	var pageScroll = new IScroll('#scroll-page', {
		mouseWheel: true,
		scrollbars: true, 
		scrollbars: 'custom'
	});
	var asideScroll = new IScroll('#scroll-aside', {
		mouseWheel: true,
		scrollbars: true, 
		scrollbars: 'custom'
	});
	
	// menu
	$('.js-menu').click(function(){
		var act = $(this).attr('data-action');
		switch(act){
			case 'open':
				$('.page-aside').addClass('open');
				$('.js-menu').attr('data-action', 'close');
			break;
			case 'close':
			default:
				$('.page-aside').removeClass('open');
				$('.js-menu').attr('data-action', 'open');
		}
	});
	
	$('.get-page-content').click(function(e){
		var page = $(this).attr('href');
		var link = $(this);
		$.get(page, function(data){
			$('.page-aside-content').html(data);
			$('.dark-bg, .page-aside').addClass('open');
		});
		return false;
	});
	$('.dark-bg, .close-page-aside').click(function(){
		$('.dark-bg, .page-aside').removeClass('open');
	});
	
	// dropdown init
	$('.dropdown-box').each(function(){
		var value = $(this).find('.dropdown-item.active').text();
		$(this).find('.dropdown-value').text(value);
	});
	// dropdown open
	$('.dropdown-box').click(function(e){
		$('.dropdown-box').not($(this)).removeClass('open');
		$(this).toggleClass('open');
		e.stopPropagation();
	});
	// dropdown close
	$('.page').click(function(){
		$('.dropdown-box').removeClass('open');
	});
	// dropdown change
	$('.dropdown-box .dropdown-item').click(function(e){
		var value = $(this).text();
		var box = $(this).parents('.dropdown-box');
		
		$(this).addClass('active').siblings().removeClass('active');
		box.find('.dropdown-value').text(value);
		
		e.stopPropagation();
		box.removeClass('open');
	});
	
	// accordeon
	$('.accordeon-header').click(function(){
		$(this).parents('.accordeon').toggleClass('open');
		$(this).parents('.accordeon').find('.accordeon-content').slideToggle();
	});
	
	// jcarousel
	// http://sorgalla.com/jcarousel/docs/
	$('.carousel').jcarousel({
		list: '.carousel-inner',
		wrap: 'circular'
	});
	
	$('.carousel-pagination')
		.jcarouselPagination({
			item: function(page){
				return '<li class="nav-item"><a class="nav-link" href="#'+page+'"></a></li>';
			}
		})
		.on('jcarouselpagination:active', 'a', function(){ // - вот эта херня не работает почему-то
			$(this).addClass('active');
		})
		.on('jcarouselpagination:inactive', 'a', function(){ // - и эта (а должна!)
			$(this).removeClass('active');
		});
	
	$('.carousel-controlls .prev')
		.on('jcarouselcontrol:active', function(){
			$(this).addClass('active');
		})
		.on('jcarouselcontrol:inactive', function(){
			$(this).removeClass('active');
		})
		.jcarouselControl({
			target: '-=1'
		});
	$('.carousel-controlls .next')
		.on('jcarouselcontrol:active', function(){
			$(this).addClass('active');
		})
		.on('jcarouselcontrol:inactive', function(){
			$(this).removeClass('active');
		})
		.jcarouselControl({
			target: '+=1'
		});
		
		
});

// yandex map
// https://tech.yandex.ru/maps/doc/jsapi/2.1/quick-start/tasks/quick-start-docpage/
var map, placemark;
function init(){
	map = new ymaps.Map('yamap',{
		center: [55.79878245, 37.40041248],
		zoom: 17
	});
	placemark = new ymaps.Placemark(map.getCenter(),{},{
		iconLayout: 'default#image',
		iconImageHref: 'images/icons-svg/pin56.svg',
	});
	map.geoObjects.add(placemark);
	map.behaviors.disable('scrollZoom');
}

function position(fix) {
	if(fix == 'fix'){
		var pos = $(window).scrollTop();
		$('.page').addClass('page-fix');
		$('.page').css({/*'position': 'fixed', */'top': - pos+'px'});
	} else {
		var pos = parseInt($('.page').css('top'), 10);
		$('.page').removeClass('page-fix');
		$('.page').css({/*'position': 'relative',*/ 'top': '0px'});
		$(window).scrollTop(-pos);
	}
}
