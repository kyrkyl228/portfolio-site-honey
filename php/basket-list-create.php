<?php
    $conn = new mysqli("localhost","root","","users");
    mysqli_set_charset($conn, 'utf8');

    if(!$conn){
        echo ("Не могу подключиться к серверу базы данных!"); 
    }

    $sql = "CREATE TABLE ". $_POST['create'] ." (
        `id` int(11) AUTO_INCREMENT PRIMARY KEY,
        `photo` text NOT NULL,
        `name` text NOT NULL,
        `price` text NOT NULL,
        `unit` text NOT NULL,
        `amount` text NOT NULL,
        `total` text NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
?>

