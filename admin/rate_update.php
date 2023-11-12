<?php
    include "../src/config/db_config.php";   

    $rate = $_POST["rate"];
    $id = $_POST["id"];
    if (isset($id) && ($id > 0)) {
        $sql = "UPDATE rates SET amount = '$rate' WHERE id = '$id'";
	    $run_query = mysqli_query($con, $sql);
    }
    else {
        $date = date("Y-m-d");
        $sql = "SELECT * FROM rates WHERE fromcurrency = 'RSHC' AND tocurrency = 'EURO' AND update_date = '$date'";
        $run_query = mysqli_query($con, $sql);
        $rate_array = mysqli_fetch_array($run_query);
        if ($rate_array) {
            $sql = "UPDATE rates SET amount = '$rate' WHERE id = '" .$rate_array['id'] ."'";
            $run_query = mysqli_query($con, $sql);
        }
        else {
            $sql = "INSERT INTO rates (fromcurrency, tocurrency, amount, update_date) VALUES ('RSHC', 'EURO', '$rate', '$date')";
            $run_query = mysqli_query($con, $sql);
        }
    }    
    
    $response_array['success'] = true;
    echo json_encode($response_array);
?>