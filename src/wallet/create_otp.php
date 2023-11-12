<?php
    include "../utils/functions.php";   
    include "../config/db_config.php";  

    $passcode = generateOTP();
    $timestamp = date("Y-m-d H:i:s");
    $sql = "INSERT INTO `otps`
    (`passcode`, `created_at`) 
    VALUES ('$passcode','$timestamp')";
    mysqli_query($con, $sql);

    $response_array['phrase'] = $passcode;
    echo json_encode($response_array);
?>