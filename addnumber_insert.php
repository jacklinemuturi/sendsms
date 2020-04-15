<?php

session_start();

if(!isset($_SESSION['bulk']))    
{
   die("login");
}

require_once 'conn.php';
require_once 'functions.php';

if(isset($_REQUEST['contactName']) && isset($_REQUEST['contactNumber']))
{
    $contactName     = trim(mysqli_real_escape_string($conn, $_REQUEST['contactName']));
    $contactNumber   = trim(mysqli_real_escape_string($conn, $_REQUEST['contactNumber']));
    $id              = returnValue("users","id","phonenumber",$_SESSION['bulk']);
    $created         = date("d/m/Y");

    if(empty($contactName) || empty($contactNumber))
    {
       die("Please fill all fields!");
    }

    // if(!ctype_digit(str_replace("+","",$contactNumber)))
    // {
    //     die("Phone number should not include letters or special characters.");
    // }

    if($contactNumber[0] !== "+")
    {
        die('Phonenumber must start with +254');
    }

    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `contacts` WHERE `phonenumber`='$contactNumber' && `family`='$id'")) > 0)
    {
        die("The phonenumber <b>".$contactNumber."</b> is already in use!"); 
    }

    $sql = "INSERT INTO `contacts`(`name`,`phonenumber`,`family`,`created`)
            VALUE('$contactName','$contactNumber','$id','$created')";

    if(mysqli_query($conn, $sql))
    {   
        echo "successfully added";
    }else{
        echo "failed".mysqli_error($conn);
    }

}
