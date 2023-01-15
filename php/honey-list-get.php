<?php
    $conn = new mysqli("localhost","root","","honey_list");
    mysqli_set_charset($conn, 'utf8');

    if(!$conn){
        echo ("Не могу подключиться к серверу базы данных!"); 
    }

    $connBasket = new mysqli("localhost","root","","users");
    mysqli_set_charset($connBasket, 'utf8');

    if(!$connBasket){
        echo ("Не могу подключиться к серверу базы данных!"); 
    }

    $res = array();

    // $cookie = $_COOKIE["honeySiteCookie"];
    // $id = $in["id"];
    // $getAmount= $connBasket->query("SELECT * FROM $cookie WHERE id=1");
    // while ($am = $getAmount->fetch_assoc()) {
    //     $amount =  $am['amount'];
    // }

    
    $que = $conn->query("SELECT * FROM honey_list");

    if($que->num_rows > 0){
        foreach($que as $in){
            $cookie = $_COOKIE["honeySiteCookie"];
            $id = $in["id"];
            $getAmount= $connBasket->query("SELECT amount FROM $cookie WHERE id=$id");
            $amount = 0;
            while ($am = $getAmount->fetch_assoc()) {
                $amount =  $am['amount'];
            }
            echo '
                <div class="product__example">
                    <div class="product__img-wrapper">
                        <img src="'.$in["image"].'" alt="" class="product__example-img">
                    </div>
                    <div class="product__description">
                        <div class="product__info">
                            <p class="product__name">'.$in["name"].'</p>
                            <p class="product__price">'.$in["price"].' '.$in["unit"].'</p>
                        </div>
                        <div class="product_change-value-place" id="product_change-value-place-'.$in["id"].'">
                            ';
                            if($amount == 0 || empty($amount) == 1){
                                echo'<button class="product__buy" id="'.$in["id"].'" onclick="changeValue(`'.$in["id"].'`, `plus`)">Купить</button>';

                            }else if($amount > 0){
                                echo '
                                    <button class="minus product__button product__center" onclick="changeValue(`'.$in["id"].'`, `minus`)">-</button>
                                    <p class="amount product__center" id="amount__id">'.$amount.'</p>
                                    <button class="plus product__button product__center" onclick="changeValue(`'.$in["id"].'`, `plus`)">+</button>
                                    
                                ';

                            }else{
                                echo "При загрузке произошла ошибка";
                            }
                            echo'
                        </div>
                    </div>
                </div>
            ';
        }        
    }else{
        echo "В данном разделе пока ничего нет!";
    }




?>