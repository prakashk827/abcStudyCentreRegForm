<?php
include_once ('../db/db.php');
if(isset($_POST['sName'])){
    
        $sName = $_POST['sName'];
        $mName = $_POST['mName'];
        $fName = $_POST['fName'];
        $fMobile = $_POST['fMobile'];
        $mMobile = $_POST['mMobile'];
        $wMobile = $_POST['wMobile'];
        $branch = $_POST['branch'];
        $combination = $_POST['combination'];
        $doj = $_POST['date'];
        $message = $_POST['message'];
        $date = date('d-m-Y');
        $time = date("h:i:sa");
        
        $query = "INSERT INTO `onlineappform`( `date`, `time`, `studentName`,`motherName`,`fatherName`, `fatherMobile`,`motherMobile`, `whatsApp`,`branch`, `combination`,`message`,`status`,`doj`)
        VALUES('$date','$time','$sName','$mName','$fName','$fMobile','$mMobile','$wMobile','$branch','$combination','$message','active','$doj')";
        $exe = mysqli_query($conn, $query);
        if($exe){
            echo "Inserted";
        }else {
            echo "Error";
            echo mysqli_connect_error($conn);   
        }
} else {
        header("Location:../index.html");
}