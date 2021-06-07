<?php
include_once ("../../db/db.php");

$sId = $_POST['sId'];
if (isset($_POST['sId'])) {
    
    $query = "DELETE FROM `onlineappform` WHERE id = '$sId'";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
        
        echo "Successfully..!";
    }
}

?>