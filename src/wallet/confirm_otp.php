<?php
    include "../utils/functions.php";   
    include "../config/db_config.php";  

    $passcode = $_POST["otp"];
    $sql = "SELECT * FROM otps WHERE passcode = '$passcode'";
	$run_query = mysqli_query($con, $sql);
    $otp = mysqli_fetch_object($run_query);

    if ($otp) {
        $response_array['success'] = true;
        $response_array['owner'] = $otp->owner;
        $sql = "DELETE FROM otps WHERE id = '$otp->id'";
		mysqli_query($con, $sql);	
    }
    else {
        $response_array['success'] = false;
    }
    echo json_encode($response_array);
?>