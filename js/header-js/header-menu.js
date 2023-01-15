function back(){
    console.log('2222');
    $("#menu__content").css("left", -$("#menu__content").outerWidth());
    $("#menu").css('display', 'none');
    $("body").css('overflow', 'auto');
}

$("#head__menu").click(function(){
    console.log('1111');
    // $("#menu__content").css("left", -menuContentLet);
    $("#menu").css('display', 'block');
    $("#menu__content").css("left", -$("#menu__content").outerWidth());
    setTimeout(function(){$("#menu__content").css("left", 0);}, 0);
    $("body").css('overflow', 'hidden');
});

$("#menu__close").click(function(){
    console.log('22221');
    back();
});

$("#menu__back").click(function(){
    console.log('22223');
    back();
}).children().click(function(e){
    e.stopPropagation();
});