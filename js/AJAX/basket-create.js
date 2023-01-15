function str_rand(){
    var result       = '';
    var words        = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    var max_position = words.length - 1;
    for( i = 0; i < 15; ++i ) {
        position = Math.floor( Math.random() * max_position);
        result = result + words.substring(position, position + 1);
    }
    return result;
}

function readCookie(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function createTable(tableNumber){
    $.ajax({
        url: '../../php/basket-list-create.php',
        type: 'POST',
        async: false,
        data:  {"create" : tableNumber},
        success: function(data){
            console.log(data);
        },
        error: function(){

        }
    });
}

$(document).ready(
    function Cookie(){
        if(readCookie("honeySiteCookie") == null){
            let cook = str_rand();
            console.log(cook);
            $.ajax({
                url: '../../php/cookie-find.php',
                type: 'POST',
                async: false,
                data:  {"let" : cook},
                success: function(data){
                    console.log(data);
                    if(data == "Table does not exist"){
                        createTable(cook);
                        console.log(cook);
                        var date = new Date();
                        date.setTime(date.getTime()+(30*24*60*60*1000));
                        document.cookie = "honeySiteCookie=" + cook + ";expires=" +date.toGMTString();
                        Cookie()
                    }else{
                        console.log(data);
                        Cookie();
                    }
                },
                error: function(){
    
                }
            });
        }else{
            let cook = readCookie("honeySiteCookie");
            console.log(cook)
            $.ajax({
                url: '../../php/cookie-find.php',
                type: 'POST',
                async: false,
                data:  {"let" : cook},
                success: function(data){
                    console.log(data);
                    if(data == "Table does not exist"){
                        document.cookie = "honeySiteCookie=" + readCookie("honeySiteCookie") + "; max-age=" + -1;
                        Cookie();
                    }else{
                        console.log("ok")
                    }
                },
                error: function(){
    
                }
            });
        }
    }
);

function del(){
    alert(readCookie("honeySiteCookie"));
    document.cookie = "honeySiteCookie=" + readCookie("honeySiteCookie") + "; max-age=" + -1;
    alert(readCookie("honeySiteCookie"));
}