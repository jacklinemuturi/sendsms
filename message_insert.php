<?php

session_start();

if(!isset($_SESSION['bulk']))    
{
   die("login");
}

require_once 'conn.php';
require_once 'functions.php';

if(isset($_REQUEST['messagetext']))
{
    $messagephone   = trim(mysqli_real_escape_string($conn, $_REQUEST['messagephone']));
    $messagename    = trim(mysqli_real_escape_string($conn, $_REQUEST['messagename']));
    $messagetext    = trim(mysqli_real_escape_string($conn, $_REQUEST['messagetext']));
    $id             = returnValue("users","id","phonenumber",$_SESSION['bulk']);
    $send           = date("d/m/Y");
    $status         = trim(mysqli_real_escape_string($conn, $_REQUEST['status']));

    if(empty($messagetext))
    {
       die("Please fill the field!");
    }

    $sent = sendmessage($messagephone,$messagetext);

    // fetch balance here

    if($sent == "200"){
        $m_status = "sent";
        // $newbalance = $balance - 1;
        // deduct 1 bob
    }else{
        $m_status = "failed";
        // $newbalance = $balance;
    }

    // update balance
    

    $sql = "INSERT INTO `sent_messages`(`phonenumber`,`name`,`message`,`family`,`created`,`status`)
            VALUE('$messagephone','$messagename','$messagetext','$id','$send','$status')";

    if(mysqli_query($conn, $sql))
    {   
        echo "successfully sent";
    }else{
        echo "message failed".mysqli_error($conn);
    }

}
