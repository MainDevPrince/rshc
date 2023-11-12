<?php
    include "../src/config/db_config.php";   
    include "./header.php";   

    if (isset($_POST['userid'])) {
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        if (isset($userid) && ($userid != '')) {
            $sql = "SELECT * FROM users WHERE userid = '$userid' AND password = md5('$password')";
            $run_query = mysqli_query($con, $sql);
            $user = mysqli_fetch_object($run_query);

            if ($user) {
                $_SESSION['userid'] = $user->id;
                $_SESSION['username'] = $user->userid;
                echo "<script>window.location.href = './rate.php';</script>";
                exit;
            }
            else {
                echo "
                    <p class='error' style='color:red'>Incorrect userid and password</p>
                ";
            }
        }
    }    
?>
<style>
    .main-container {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 400px;
        color: black;
        top: 50%;
        position: absolute;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<div class="main-container">
    <div class="row">
        <h1 class="mx-auto">Login</h1>
    </div>
    <form method="post" action="">
    <div class="row mt-3 align-items-center">
        <div class="col-4">
            <label for="userid">UserID : </label>
        </div>
        <div class="col-8">
            <input type="text" id="userid" name="userid" class="w-100 form-control" required>
        </div>
    </div>
    <div class="row mt-3 align-items-center">
        <div class="col-4">
            <label for="password">Password : </label>
        </div>
        <div class="col-8">
            <input type="password" id="password" name="password" class="w-100 form-control" required>
        </div>
    </div>
    <div class="row mt-4">
        <button type="submit" class="mx-auto btn btn-primary" style="border-radius:8px">Login</button>
    </div>
    <p id="errorMessage" class="error" style="display: none;"></p>
    </form>
</div>
<?php
    include "./footer.php";   
?>
