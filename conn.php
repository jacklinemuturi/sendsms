<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "Bulksms";
    
    $conn = mysqli_connect($servername, $username, '', $databaseName);

    if(!$conn){
        echo "connection failed";
    }else{
        // echo "fully connected";
    }

?>