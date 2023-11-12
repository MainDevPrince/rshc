<?php
    include "../config/db_config.php";   
    include "../utils/functions.php";   

    $email = $_POST["email"];

    $timestamp = date("Y-m-d H:i:s");

    $to = "support@rshcoin.com";
    $subject = "Subscribe request for RSHC";
    
    $message = "<h1>Subscribe information</h1>";
    $message .= "<h1>From Email: ".$email."subscribe date :".$timestamp."</h1>";   
    
    $header = "From: $email \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    $retval = mail ($to,$subject,$message,$header);

    $response_array['success'] = true;
    echo json_encode($response_array);
?>