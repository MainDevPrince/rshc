<?php
    include "../src/config/db_config.php";   

    $owner = $_POST["owner"];
    $id = $_POST["id"];

    $sql = "UPDATE otps SET owner = '$owner' WHERE id = '$id'";
	$run_query = mysqli_query($con, $sql);
    $response_array['success'] = true;
    echo json_encode($response_array);
?>