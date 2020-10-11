function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}


$(document).ready(function() {
$.get('api/getform?id='+getQueryVariable('id'), function (data) {
        let Str = data.data[0].html;
        console.log(data);
        $('#dropArea').empty();
        $('#dropArea').append(Str);

    });

});

/**
 * 提交信息
 */
function submitInfo() {
    $.ajax({
        async: false,
        type: "POST",
        url:'/api/insertinfo',
        data:{
            form_id:getQueryVariable('id'),
            info:decodeURIComponent(jQuery("#dropArea").serialize())
        },
        contentType : "application/x-www-form-urlencoded; charset=utf-8",
        dataType: "json",
        success: function (data) {
            alert('提交成功');
            console.log(data.data[0].id);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('提交失败');
            console.log(XMLHttpRequest.status);
            console.log(XMLHttpRequest.readyState);
            console.log(textStatus);
        }
    });
    return false;
}
