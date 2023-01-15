$('Document').ready(function(){

    let bodyHeight = parseInt($("body").css("height"), 10);
    console.log(bodyHeight + "body");
    console.log(document.documentElement.scrollHeight + "screen");

    if(bodyHeight < document.documentElement.scrollHeight){
        console.log("if");
        
        // $('.foot').css('position', 'absolute');
        // $('.foot').css('bottom', '0');

        // let pos = $('.foot').css('margin-top');
        // while(bodyHeight <= document.documentElement.scrollHeight){
        //     $('.foot').css('margin-top', pos);
        //     pos++;
        // }
        $('.foot').css('margin-top', '0');
        let marginTop = document.documentElement.scrollHeight - bodyHeight
        $('.foot').css('margin-top', marginTop);

    }else{
        $('.foot').css('margin-top', '40px');
    }
    // console.log(window.innerHeight);//высота контента
    // console.log(document.documentElement.offsetHeight);//высота экрана
    // console.log(document.documentElement.scrollHeight);
    // console.log(bodyHeight);
});

$(window).resize(function () {
    let bodyHeight = parseInt($("body").css("height"), 10);

    if(bodyHeight < document.documentElement.scrollHeight){
        // $('.foot').css('position', 'absolute');
        // $('.foot').css('bottom', '0');
        $('.foot').css('margin-top', '0');
        let marginTop = document.documentElement.scrollHeight - bodyHeight
        $('.foot').css('margin-top', marginTop);
    }else{
        $('.foot').css('margin-top', '40px');
    }
    console.log(bodyHeight);
    console.log(document.documentElement.scrollHeight);
});