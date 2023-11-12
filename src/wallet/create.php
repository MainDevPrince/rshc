<?php
    include "../config/db_config.php";   
    include "../utils/functions.php";   

    $walletAddress = $_GET["walletAddress"];
    $secretPhrase = $_GET["secretPhrase"];
    

    $sql = "SELECT * FROM wallets WHERE address = '$walletAddress'";
	$run_query = mysqli_query($con, $sql);
    $wallet = mysqli_fetch_object($run_query);

    if ($wallet) {
        if ($wallet->phrase == $secretPhrase) {
            $response_array['success'] = true;
            echo json_encode($response_array);
            return;
        }
        else {
            $response_array['success'] = false;
            echo json_encode($response_array);
            return;
        }
    }
    else {
        if (!isset($secretPhrase))
            $secretPhrase = generateSecretPhrase();
        $timestamp = date("Y-m-d H:i:s");
        $owner = $_GET["owner"];
        $sql = "INSERT INTO `wallets`
        (`address`, `phrase`, `balance`, `created_at`, `updated_at`, `owner`) 
        VALUES ('$walletAddress','$secretPhrase',0,'$timestamp','$timestamp','$owner')";
        mysqli_query($con, $sql);
    }
    $response_array['success'] = true;
    echo json_encode($response_array);
?>