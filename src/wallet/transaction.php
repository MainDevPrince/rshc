<?php
    include "../config/db_config.php";   

    $fromaddress = $_GET["fromaddress"];
    $toaddress = $_GET["toaddress"];
    $amount = $_GET["amount"];

    $sql = "SELECT * FROM wallets WHERE address = '$fromaddress'";
	$run_query = mysqli_query($con, $sql);
    $fromwallet = mysqli_fetch_object($run_query);

    $sql = "SELECT * FROM wallets WHERE address = '$toaddress'";
	$run_query = mysqli_query($con, $sql);
    $towallet = mysqli_fetch_object($run_query);

    if ($amount > $fromwallet->balance)
        $response_array['success'] = "Can't send amount more than balance!";
    else {
        if (!$towallet)
            $response_array['success'] = "This address is invalid so you can't send to this address!";
        else if ($fromaddress == $toaddress)
            $response_array['success'] = "You can't send to your own address!";
        else {
            $timestamp = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `transactions`
            (`fromwallet_id`, `towallet_id`, `amount`, `created_at`, `updated_at`) 
            VALUES ('$fromwallet->id','$towallet->id',$amount,'$timestamp','$timestamp')";
            mysqli_query($con, $sql);

            $fromwallet->balance -= $amount;
            $towallet->balance += $amount;
            $sql = "UPDATE wallets SET balance = '$fromwallet->balance' WHERE id='$fromwallet->id'";
            mysqli_query($con, $sql);
            $sql = "UPDATE wallets SET balance = '$towallet->balance' WHERE id='$towallet->id'";
            mysqli_query($con, $sql);
            $response_array['success'] = true;
        }
    }

    echo json_encode($response_array);
?>