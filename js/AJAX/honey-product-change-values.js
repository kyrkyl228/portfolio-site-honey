function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

function changeValue(id, value){
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
        console.log(data);
        console.log(JSON.parse(data));
        let resultObject = JSON.parse(data);
        // if(value == "plus"){
        //     if(resultObject = 1){
        //         $(".product_change-value-place-" + id).html(`
                    
        //         `);
        //     }else if(resultObject > 0){
                
        //     }else{
        //         location.reload();
        //     }
        // }else if(value == "minus"){

        // }else{
        //     location.reload();
        // }
        console.log('--------------------------')
        console.log(resultObject.amount);

        console.log(resultObject.total);
        console.log(resultObject.if);


        console.log('--------------------------')


        if(Number(resultObject.amount) == 0){
            $("#product_change-value-place-"+id).html(`
            <button class="product__buy" id='`+id+`' onclick="changeValue('`+id+`', 'plus')">Купить</button>
            `);
        }else if(Number(resultObject.amount) > 0){
            $("#product_change-value-place-"+id).html(`
                <button class="minus product__button product__center" onclick="changeValue('`+id+`', 'minus')">-</button>
                <p class="amount product__center" id="amount__`+id+`">`+ resultObject.amount +`</p>
                <button class="plus product__button product__center" onclick="changeValue('`+id+`', 'plus')">+</button>
            `);
        }
      },
      error: function(){
        console.log('ERROR');
      }
    });
}