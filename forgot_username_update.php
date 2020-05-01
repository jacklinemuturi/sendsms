<?php

require_once 'conn.php';
require_once 'functions.php';

if(isset($_REQUEST['username_forgotpassword']))
{
    $username_forgotpassword   = trim(mysqli_real_escape_string($conn, $_REQUEST['username_forgotpassword']));

    if(empty($username_forgotpassword))
    {
       die("Please fill in the field!");
    }

    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `user_name`='$username_forgotpassword'")) < 1)
    {
        die("The username does not exist!");
    }

    $code            = rand(1000,99999);
    $hashedpassword  = md5($code);    

    $sql = "UPDATE `users` SET `password`='hashedpassword' WHERE `user_name`= '$username_forgotpassword'";
    if(mysqli_query($conn, $sql))
    { 
        // fetch the phone
        $phone   = returnValue("users","phonenumber","user_name",$username_forgotpassword);
        $message = "Hello ".$username_forgotpassword.", your new Password is" .$code;
        // sendmessage
       // sendmessage($phone,$message);
        echo "success";
    }else{
        echo "failed".mysqli_error($conn);
    }
}