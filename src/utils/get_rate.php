<?php
    include "../config/db_config.php";   

    $sql = "SELECT * FROM rates WHERE fromcurrency = 'RSHC' AND tocurrency = 'EURO' ORDER BY update_date DESC";
	$run_query = mysqli_query($con, $sql);
    $rate = mysqli_fetch_array($run_query);

    if ($rate) {
        $response_array['rate'] = $rate;
        echo json_encode($response_array);
    }
    else {
        $response_array['rate'] = "";
        echo json_encode($response_array);
    }
?>