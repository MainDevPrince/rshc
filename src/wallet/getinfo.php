<?php
    include "../config/db_config.php";   

    $walletAddress = $_GET["walletAddress"];

    $sql = "SELECT * FROM wallets WHERE address = '$walletAddress'";
	$run_query = mysqli_query($con, $sql);
    $wallet = mysqli_fetch_array($run_query);

    $sql = "SELECT * FROM rates WHERE fromcurrency = 'RSHC' AND tocurrency = 'EURO' ORDER BY update_date DESC";
	$run_query = mysqli_query($con, $sql);
    $rate = mysqli_fetch_array($run_query);

    if ($wallet) {
        $response_array['wallet'] = $wallet;
        $response_array['rate'] = $rate;
        echo json_encode($response_array);
    }
    else {
        $response_array['wallet'] = "";
        echo json_encode($response_array);
    }
?>