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

    $('.page-aside-content').html('<img src="/images/reload.png"/>');
    $.ajax({
        url: "http://"+document.domain+""+str,
        type: "POST",
        dataType: "html",
        success: function(data){
           // var resultat =  data;
            var res_1 = data.split(start);
            var result = res_1[1];
            result = result.split(end);
            //$('.page-aside-content').html('<img src="/images/reload.png"/>');
            $('.page-aside-content').html(result[0]);
            //return result[0];
        }
    });
}