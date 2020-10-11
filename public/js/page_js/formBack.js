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
    var par = getQueryVariable('id');
    console.log(par);
    $.get('api/getforminfo?id='+par, function (data) {
        let thead = `<th></th>`;
        let tbody = ``;
        var keys = [];
        var infos = data.data;
        var count = data.data.length;
        $('#count').empty();
        $('#count').append(count)
        for(var key in infos[0]){
            keys.push(key)
            thead += `
            <th>${key}</th>
            `;
          }
          console.log(keys);
        $('#thead').empty();
        $('#thead').append(thead)
        for(i = 0;i<count;i++){
            tbody += `<tr><td></td>`;
            for(var key in infos[i]){
                tbody += `
                <th>${infos[i][key]}</th>
                `;
              }
              tbody += `</tr>`;
        }
        $('#tbody').empty();
        $('#tbody').append(tbody)
    });
});
