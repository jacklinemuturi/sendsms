<?php

    $servername = "localhost";
    $username = "root";
    $password = "@Qwerty345@!";
    $databaseName = "sms";
    
    $conn = mysqli_connect($servername, $username, '@Qwerty345@!', $databaseName);

    if(!$conn){
        echo "connection failed";
    }else{
        echo "fully connected";
    }

?>