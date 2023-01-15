<?php
    $conn = new mysqli("localhost","root","","users");
    mysqli_set_charset($conn, 'utf8');

    if(!$conn){
        echo ("Не могу подключиться к серверу базы данных!"); 
    }

    $checkCookie = $_POST['let'];

    if ($result = $conn->query("SHOW TABLES LIKE '$checkCookie'")) {
        if($result->num_rows == 1) {
            echo "Table exists";
        } else {
        echo "Table does not exist";
        }
    }

    $result = $query;


    echo $result;

    $conn->close();
?>