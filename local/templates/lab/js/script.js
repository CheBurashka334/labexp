var pageScroll;
var asideScroll;
$(document).ready(function(){


	$('#svg-placeholder').html(svg);
    // scroll
    pageScroll = new IScroll('#scroll-page', {
        mouseWheel: true,
        scrollbars: true,
        scrollbars: 'custom'
    });
    asideScroll = new IScroll('#scroll-aside', {
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
		var page = $(this).attr('data-href');
		//var link = $(this);
       // var result = ajlink(page);
        var res = ajcontent(page,'<!--ajax-->','<!--endajax-->');
        $('.dark-bg, .page-aside').addClass('open');
		/*$.get(page, function(data){*/
			//$('.page-aside-content').html(res);
		return false;
	});
	$('.dark-bg, .close-page-aside').click(function(){
		$('.dark-bg, .page-aside').removeClass('open');
        window.history.back();
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

function onCompliteAjax()
{
    setTimeout(function () {
        asideScroll.refresh();
    }, 0);
    setTimeout(function () {
        pageScroll.refresh();
    }, 0);
}