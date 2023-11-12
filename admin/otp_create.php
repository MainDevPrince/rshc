<?php
    include "../src/config/db_config.php";   
    include "../src/utils/functions.php";   

    $owner = $_POST["owner"];
    $passcode = generateOTP();
    $timestamp = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `otps`
        (`passcode`, `owner`, `created_at`) 
        VALUES ('$passcode','$owner','$timestamp')";
    mysqli_query($con, $sql);

    $response_array['success'] = true;
    echo json_encode($response_array);
?>