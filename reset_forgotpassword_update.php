<?php

session_start();
require_once 'conn.php';
require_once 'functions.php';

if(isset($_REQUEST['old_password']) && isset($_REQUEST['new_password']) && isset($_REQUEST['confirm_password']))
{
    $old_password      = trim(mysqli_real_escape_string($conn, $_REQUEST['old_password']));
    $new_password      = trim(mysqli_real_escape_string($conn, $_REQUEST['new_password']));
    $confirm_password  = trim(mysqli_real_escape_string($conn, $_REQUEST['confirm_password']));

    if(empty($old_password) || empty($new_password) || empty($confirm_password))
    {
       die("Please fill all fields!");
    }

    $encript = md5($new_password);

    $sql = "UPDATE `users` SET `password`='$encript' WHERE `phonenumber`= '{$_SESSION['bulk']}'";

    if(mysqli_query($conn, $sql))
    { 
        echo "success";
    }else{
        echo "failed".mysqli_error($conn);
    }
}