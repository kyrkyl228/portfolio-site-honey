function back2(){
    $("#blackout").css('display', 'none');
    $("body").css('overflow', 'auto');
}

function modalBuyOpen(){
    $("#blackout").css('display', 'block');
    $("body").css('overflow', 'hidden');
};

$("#modal-buy__back-id").click(function(){
    back2();
});

$("#blockout__center").click(function(){
    back2();
}).children().click(function(e){
    e.stopPropagation();
});