<?php
    include "../src/config/db_config.php";   

    $balance = $_POST["balance"];
    $owner = $_POST["owner"];
    $id = $_POST["id"];
    $phrase = $_POST["phrase"];

    $sql = "UPDATE wallets SET balance = '$balance', owner = '$owner', phrase = '$phrase' WHERE id = '$id'";
	$run_query = mysqli_query($con, $sql);
    $response_array['success'] = true;
    echo json_encode($response_array);
?>