<?php

    $connListBasket = new mysqli("localhost","root","","users");
    mysqli_set_charset($connListBasket, 'utf8');
    if(!$connListBasket){
        echo ("Не могу подключиться к серверу базы данных!"); 
    }




    $cookie = $_COOKIE["honeySiteCookie"];

    if(empty($cookie) == 0){
        $que = $connListBasket->query("SELECT * FROM $cookie WHERE amount > 0");
        foreach($que as $in){
            echo'
            <div class="basket__inner pos" id="basket-'.$in["id"].'">
                <div class="basket__img-wrapper"><img src="'.$in["photo"].'" alt="" class="basket__example"></div>
                <p>'.$in["name"].'</p>
                <p>'.$in["price"].' '.$in["unit"].'</p>
                <div class="basket__change">
                    <button class="basket__button" onclick="basketChangeValue(`'.$in["id"].'`, `minus`)">-</button>
                    <p id="basket__amountIn'.$in["id"].'">'.$in["amount"].'</p>
                    <button class="basket__button" onclick="basketChangeValue(`'.$in["id"].'`, `plus`)">+</button>
                </div>
                <p id="total-'.$in["id"].'">'.$in["total"].' рублей</p>            
            </div>
            ';
        }
        if($que->num_rows > 0){
            echo '<button class="basket__checkout" onclick="modalBuyOpen()">Оформить заказ</button>';
        }
    }else{
        echo "";
    }



?>