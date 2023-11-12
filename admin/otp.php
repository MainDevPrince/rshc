<?php
    include "../src/config/db_config.php";   
    include "./header.php";   

    if (!isset($_SESSION['userid'])) {
        die("You can't visit this page!");
    }
    include "./nav.php";     
?>
<style>
    td {
        vertical-align: middle!important;
        word-wrap: break-word;
    }
    .empty {
        text-align: center;
        background-color: white;
        width: 80%;
        color: black;
        margin: auto;
        border-radius: 4px;
        font-weight: 700;
        padding: 20px;
    }
</style>
<?php
    $sql = "SELECT * FROM otps";
    $run_query = mysqli_query($con, $sql); 
    if (mysqli_num_rows($run_query) > 0) {
        echo '
        <div class="main">
            <div class="table-responsive">
                <table class="table table-hover table-condensed" style="background-color: white;width: 80%;margin: auto;border-radius: 8px;table-layout: fixed;">
                <thead>
                    <tr>
                        <th style="width:25%">No</th>
                        <th style="width:25%">Passcode</th>
                        <th style="width:25%">Owner</th>
                        <th style="width:25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                ';
        $n=0;
        while ($row=mysqli_fetch_array($run_query)) {
            $n++;            
            echo '                        
                <tr>
                    <td>' . $n . '</td>
                    <td>' . $row["passcode"] . '</td>
                    <td><input type="text" id="owner-'. $row["id"] .'" class="form-control rate" value="'. $row["owner"] .'" ></td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-info btn-sm update" data-id="'. $row["id"] .'"><i class="fa fa-edit"></i></a>                        
                            <a href="#" class="btn btn-danger btn-sm delete" data-id="'. $row["id"] .'"><i class="fa fa-trash"></i></a>                        
                        </div>							
                    </td>                    
                </tr>';
        }            
        echo '</tbody></table></div></div>';
    }
    else {
        echo "<div class='main'><div class='table-responsive'><p class='empty'>Data is not exist!</p></div></div>";
    }
?>
    <div class="text-center mt-5">
        <button class="btn btn-primary" style="width: 300px;" data-toggle="modal" data-target="#myModal" id="createbutton">Create OTP</button>
    </div>
    <div class="modal" id="myModal" style="color: black">
        <div class="modal-dialog">
            <div class="modal-content">        
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Invitation for Customer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>        
                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Input customer name" id="owner">
                </div>        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="otpCreate()">Create</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>        
            </div>
        </div>
    </div>
<?php
    include "./footer.php";   
?>
<script>
    $('.update').click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var owner = $("#owner-" + id).val();
        $.post(
            "./otp_update.php",
            {
                owner : owner,
                id : id
            },
            function(response) {
                var resp = JSON.parse(response);
                if (resp.success == true) {
                    alert("Successfully updated!");
                }
                else {
                    alert("Updated is failed!");
                }
            }
        );
    });
    $('.delete').click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.post(
            "./otp_delete.php",
            {
                id : id
            },
            function(response) {
                var resp = JSON.parse(response);
                if (resp.success == true) {
                    alert("Successfully deleted!");
                    window.location.reload();
                }
                else {
                    alert("Deleted is failed!");
                }
            }
        );
    });
    function otpCreate() {
        $.post(
            "./otp_create.php",
            {
                owner : $('#owner').val()
            },
            function(response) {
                var resp = JSON.parse(response);
                if (resp.success == true) {
                    alert("Successfully created!");
                    window.location.reload();
                }
                else {
                    alert("Created is failed!");
                }
            }
        );
    }
</script>
