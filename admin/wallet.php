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
        vertical-align: middle !important;
        word-wrap: break-word;
    }
</style>
<?php
$sql = "SELECT * FROM wallets";
$run_query = mysqli_query($con, $sql);
if (mysqli_num_rows($run_query) > 0) {
    echo '
        <div class="main">
            <div class="table-responsive">
                <table class="table table-hover table-condensed" style="background-color: white;width: 80%;margin: auto;border-radius: 8px;table-layout: fixed;">
                <thead>
                    <tr>
                        <th style="width:10%">No</th>
                        <th style="width:20%">Address</th>
                        <th style="width:20%">Phrase</th>
                        <th style="width:20%">Balance</th>
                        <th style="width:20%">Owner</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                ';
    $n = 0;
    while ($row = mysqli_fetch_array($run_query)) {
        $n++;
        echo '                        
                <tr>
                    <td>' . $n . '</td>
                    <td>' . $row["address"] . '</td>
                    <td style="padding:1px"><textarea id="phrase-' . $row["id"] . '" class="form-control rate" style="width: 100%;padding:0">' . $row["phrase"] . '</textarea></td>
                    <td style="padding:1px"><textarea id="balance-' . $row["id"] . '" class="form-control rate" style="width: 100%;padding:0">' . $row["balance"] . '</textarea></td>
                    <td><input type="text" id="owner-' . $row["id"] . '" class="form-control rate" value="' . $row["owner"] . '" ></td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-info btn-sm update" data-id="' . $row["id"] . '"><i class="fa fa-edit"></i></a>                        
                        </div>							
                    </td>                    
                </tr>';
    }
    echo '</tbody></table></div></div>';
} else {
    echo "<p>Data is not exist!</p>";
}
include "./footer.php";
?>
<script>
    $('.update').click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var balance = $("#balance-" + id).val();
        var owner = $("#owner-" + id).val();
        var phrase = $("#phrase-" + id).val();
        $.post(
            "./wallet_update.php", {
                balance: balance,
                owner: owner,
                phrase: phrase,
                id: id
            },
            function(response) {
                var resp = JSON.parse(response);
                if (resp.success == true) {
                    alert("Successfully updated!");
                } else {
                    alert("Updated is failed!");
                }
            }
        );
    });
</script>