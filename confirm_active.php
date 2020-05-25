<?php
session_start();

require_once "conn.php";  
require_once 'functions.php';

if(isset($_REQUEST['activate']))
{
    $code   = trim(mysqli_real_escape_string($conn, $_REQUEST['activate']));


    if(empty($code))
    {
        die("Please fill in the field!");
    }

    $bulk       = "+254".substr($_SESSION['bulk'],-9);
    $message    = "Welcome,your account is now active.";
    $savedcode  = returnValue("users","code","phonenumber",$_SESSION['bulk']); 

    if($code == $savedcode)
    {
        $sql = "UPDATE `users` SET `status`='active' WHERE `phonenumber`= '{$_SESSION['bulk']}'";

        if(mysqli_query($conn, $sql))
        {
         
            sendmessage($bulk,$message);
            echo "successful";
        }else{
            echo mysqli_error($conn);
        }
    }else{
        die("The code is incorrect.");
    }
}