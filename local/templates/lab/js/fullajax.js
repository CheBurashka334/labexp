/**
 * Created by - on 16.09.2015.
 */
function ajlink(str)
{
    //alert(str);
    $.ajax({
        url: "http://"+document.domain+""+str,
        type: "POST",
        dataType: "html",
        success: function(data){
           return data;
        }
    });
}
function ajcontent(str,start,end){

    $('.page-aside-content').html('<div class="preloader_wrp"><div class="preloader_it"><img src="/images/reload.png"/></div></div>');
    $.ajax({
        url: "http://"+document.domain+""+str,
        type: "GET",
        dataType: "html",
        success: function(data){
           //content
            var res_1 = data.split(start);
            var result = res_1[1];
            result = result.split(end);
            //end content
            //title
            var title = data.split('<title>');
            title = title[1];
            title = title.split('</title>');
            title = title[0];
            //end title
            $('.page-aside-content').html(result[0]);
            $('title').text(title);
            str = str.split('?');
            window.history.pushState(null, title, str[0]);
            onCompliteAjax();
            //});
        }
    });
}