<?php
    include "../config/db_config.php";   

    $sql = "SELECT * FROM rates WHERE fromcurrency = 'RSHC' AND tocurrency = 'EURO' ORDER BY update_date";
	$run_query = mysqli_query($con, $sql);

    $dates = [];
    $rates = [];
    
    while ($row=mysqli_fetch_array($run_query)) {
        $dates[] = $row["update_date"];
        $rates[] = $row["amount"];
    }
    
    $ret['dates'] = $dates;
    $ret['rates'] = $rates;

    $response_array['rate'] = $ret;
    echo json_encode($response_array);
?>