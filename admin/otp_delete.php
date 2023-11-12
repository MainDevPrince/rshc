<?php
    include "../src/config/db_config.php";   

    $id = $_POST["id"];

    $sql = "DELETE FROM otps WHERE id = '$id'";
	$run_query = mysqli_query($con, $sql);
    $response_array['success'] = true;
    echo json_encode($response_array);
?>