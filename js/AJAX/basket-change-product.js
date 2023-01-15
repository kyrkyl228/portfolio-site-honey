function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

function basketChangeValue(id, value){
    console.log(id);
    console.log(value);
    $.ajax({
      url: '../../php/honey-product-put.php',
      type: 'POST',
      async: false,
      data: 
      {
        "id": id,
        "value": value,
        "cookie": getCookie("honeySiteCookie")
      },
      success: function(data){
        if(data == "mistake"){
            location.reload();
        }
        let resultObject = JSON.parse(data);
        if(Number(resultObject.amount) == 0){
            $("#basket-" + id).css("display", "none");
        }else if(Number(resultObject.amount) > 0){
            $("#basket__amountIn" + id).html(resultObject.amount);
            $("#total-" + id).html(resultObject.total + " рублей");
        }
      },
      error: function(){
        console.log('ERROR');
      }
    });
}