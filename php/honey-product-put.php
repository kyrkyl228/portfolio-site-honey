<?php
    $connProducts= new mysqli("localhost","root","","honey_list");
    $connBasket = new mysqli("localhost","root","","users");

    mysqli_set_charset($connProducts, 'utf8');
    mysqli_set_charset($connBasket, 'utf8');


    if(!$connProducts || !$connBasket){
        echo ("Не могу подключиться к серверу базы данных!"); 
    }


    $id = $_POST['id'];
    $value = $_POST['value'];
    $cookie = $_POST['cookie'];

    $findRow = $connProducts->query("SELECT * FROM honey_list WHERE id='$id'");
    $getPrice = $connProducts->query("SELECT price FROM honey_list WHERE id='$id'");
    $getAmount= $connBasket->query("SELECT amount FROM $cookie WHERE id=$id");


    if($value == "plus"){
        
        $que = $connBasket->query("SELECT * FROM $cookie WHERE id=$id");
        while ($am = $getAmount->fetch_assoc()) {
            $amount =  $am['amount'];
        }

        while ($pr = $getPrice->fetch_assoc()) {
            $price =  $pr['price'];
        }

        if($que->num_rows > 0){
            if(empty($amount) == 1){
                $connBasket->query("UPDATE $cookie SET amount = 1 WHERE id=$id");
                $connBasket->query("UPDATE $cookie SET total = $price WHERE id=$id");
                // $res[0] = 1;
                // $res[1] = $price;
                // echo $res[1,$price];
                $res = array(
                    "amount"=>"1",
                    "total"=>"$price",
                    "if"=>"1",
                );
                echo json_encode($res);
            }else{

                $amountNewValue = $amount + 1;
                $totalNewValue = $price * $amountNewValue;
                $connBasket->query("UPDATE $cookie SET amount = $amountNewValue WHERE id=$id");
                $connBasket->query("UPDATE $cookie SET total = $totalNewValue WHERE id=$id");
                // echo "".$amountNewValue."--------".$totalNewValue."";
                // echo $res[$amountNewValue,$totalNewValue];
                // $res[0] = $amountNewValue;
                // $res[1] = $totalNewValue;
                $res = array(
                    "amount"=>"$amountNewValue",
                    "total"=>"$totalNewValue",
                    "if"=>"2",
                );
                echo json_encode($res);


            }
        }else if($que->num_rows == 0){
            while ($row = $findRow->fetch_assoc()) {
                $connBasket->query("INSERT INTO $cookie (`id`, `photo`, `name`, `price`, `unit`, `amount`, `total`) VALUES ('".$row['id']."', '".$row['image']."', '".$row['name']."', '".$row['price']."', '".$row['unit']."', '1', '$price')");
                $amount = 1;
                $total = $price;
            }
            $res = array(
                "amount"=>"$amount",
                "total"=>"total",
                "if"=>"1",
            );
            echo json_encode($res);
        }else{
            echo "mistake";
        }
    }else if($value == "minus"){
        $que = $connBasket->query("SELECT * FROM $cookie WHERE id=$id");
        while ($am = $getAmount->fetch_assoc()) {
            $amount =  $am['amount'];
        }

        while ($pr = $getPrice->fetch_assoc()) {
            $price =  $pr['price'];
        }

        if($que->num_rows > 0){
            if(empty($amount) == 1){
                $connBasket->query("UPDATE $cookie SET amount = 0 WHERE id=$id");
                $connBasket->query("UPDATE $cookie SET total = $price WHERE id=$id");
                // $res[0] = 1;
                // $res[1] = $price;
                // echo $res[1,$price];
                $res = array(
                    "amount"=>"0",
                    "total"=>"0",
                );
                echo json_encode($res);
            }else{

                $amountNewValue = $amount - 1;
                $totalNewValue = $price * $amountNewValue;
                $connBasket->query("UPDATE $cookie SET amount = $amountNewValue WHERE id=$id");
                $connBasket->query("UPDATE $cookie SET total = $totalNewValue WHERE id=$id");
                // echo "".$amountNewValue."--------".$totalNewValue."";
                // echo $res[$amountNewValue,$totalNewValue];
                // $res[0] = $amountNewValue;
                // $res[1] = $totalNewValue;
                $res = array(
                    "amount"=>"$amountNewValue",
                    "total"=>"$totalNewValue",
                );
                echo json_encode($res);


            }
        }else if($que->num_rows == 0){
            while ($row = $findRow->fetch_assoc()) {
                $connBasket->query("INSERT INTO $cookie (`id`, `photo`, `name`, `price`, `unit`, `amount`, `total`) VALUES ('".$row['id']."', '".$row['image']."', '".$row['name']."', '".$row['price']."', '".$row['unit']."', '1', '$price')");
            }
        }else{
            echo "mistake";
        }
    }

?>