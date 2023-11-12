<?php
    include "../config/db_config.php";   

    $wallet = $_GET["wallet"];

    $sql = "SELECT * FROM wallets WHERE address = $wallet";
	$run_query = mysqli_query($con, $sql);
    $wallet_row = mysqli_fetch_array($run_query);

    if ($wallet_row) {
        $response_array['valid'] = true;
        echo json_encode($response_array);
    }
    else {
        $response_array['valid'] = false;
        echo json_encode($response_array);
    }
?>