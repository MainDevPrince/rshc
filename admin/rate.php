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
    }
</style>
<?php
    $sql = "SELECT * FROM rates ORDER BY update_date DESC";
    $run_query = mysqli_query($con, $sql); 
    if (mysqli_num_rows($run_query) > 0) {
        echo '
        <div class="main">
            <div class="table-responsive">
                <table class="table table-hover table-condensed" style="background-color: white;width: 80%;margin: auto;border-radius: 8px;">
                <thead>
                    <tr>
                        <th style="width:10%">No</th>
                        <th style="width:18%">Coin</th>
                        <th style="width:18%">Currency</th>
                        <th style="width:18%">Update Date</th>
                        <th style="width:18%">Rate</th>
                        <th style="width:18%">Actions</th>
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
                    <td>' . $row["fromcurrency"] . '</td>
                    <td>' . $row["tocurrency"]. '</td>
                    <td>' . $row["update_date"]. '</td>
                    <td><input type="text" class="form-control rate-'. $row["id"] .'" value="'. $row["amount"] .'" ></td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-info btn-sm update" data-id="'. $row["id"] .'"><i class="fa fa-edit"></i></a>                        
                        </div>							
                    </td>                    
                </tr>';
        }            
        echo '</tbody></table></div></div>';
    }
    else {
        echo "<p>Data is not exist!</p>";
    }
?>
    <div class="text-center mt-5">
        <button class="btn btn-primary" style="width: 300px;" data-toggle="modal" data-target="#myModal" id="createbutton">Create Rate</button>
    </div>
    <div class="modal" id="myModal" style="color: black">
        <div class="modal-dialog">
            <div class="modal-content">        
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Updated Rate</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>        
                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Input rate" id="new_rate">
                </div>        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="rateUpdate()">Update</button>
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
        var id = $(this).data('id');
        $.post(
            "./rate_update.php",
            {
                rate : $(".rate-"+id).val(),
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

    function rateUpdate() {
        if (isNaN($("#new_rate").val())) {
            alert("Please input only number for rate!");
            return;
        }
        $.post(
            "./rate_update.php",
            {
                rate : $("#new_rate").val(),
                id : 0
            },
            function(response) {
                var resp = JSON.parse(response);
                if (resp.success == true) {
                    alert("Successfully updated!");
                    location.reload();
                }
                else {
                    alert("Updated is failed!");
                }
            }
        );
    }
</script>
