<?php

require_once "functions.php";

$phonenumber = "+254712988705";
$message     = "hello there";

$sendsms = sendmessage($phonenumber,$message);
$i = json_decode($sendsms);
echo $i->status;

