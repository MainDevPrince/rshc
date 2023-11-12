<?php
    include "../config/db_config.php";   
    include "../utils/functions.php";   

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $investamount = $_POST["investamount"];
    $investperiod = $_POST["investperiod"];
    $description = $_POST["description"];

    // switch($investamount) {
    //     case 1:
    //         $amount = "0-1000";
    //         break;
    //     case 2:
    //         $amount = "1000-10000";
    //         break;
    //     case 3:
    //         $amount = "10000-100000";
    //         break;
    //     case 4:
    //         $amount = "100000-250000";
    //         break;
    //     case 5:
    //         $amount = "250000-500000";
    //         break;
    //     case 6:
    //         $amount = "1000000 or more";
    //         break;
    //     default:
    //         $amount = "0-1000";
    //         break;
    // }

    // switch($investperiod) {
    //     case 1:
    //         $period = "1~2yrs";
    //         break;
    //     case 2:
    //         $period = "3~4yrs";
    //         break;
    //     case 3:
    //         $period = "4~5yrs";
    //         break;
    //     case 4:
    //         $period = "5~6yrs";
    //         break;
    //     default:
    //         $period = "1~2yrs";
    //         break;
    // }

    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `contacts`
    (`firstname`, `lastname`, `email`, `mobile`, `description`, `investamount`, `investperiod`, `created_at`) 
    VALUES ('$firstName','$lastName','$email','$mobile','$description','$investamount','$investperiod','$timestamp')";
    mysqli_query($con, $sql);

    $to = "support@rshcoin.com";
    $subject = "Investor for RSHC";
    
    $message = "<h1>".$firstName." ".$lastName."</h1>";
    $message .= "<h1>".$description."invest amount: ".$investamount."€"."invest period: ".$investperiod."contact date :".$timestamp."</h1>";   
    
    $header = "From: $email \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    $retval = mail ($to,$subject,$message,$header);

    $response_array['success'] = true;
    echo json_encode($response_array);
?>