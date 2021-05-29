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
        $institute = $_POST['institute'];
        $message = $_POST['message'];
        $date = date('d-m-Y');
        $time = date("h:i:sa");
        
        $query = "INSERT INTO `onlineappform`( `date`, `time`, `studentName`,`motherName`,`fatherName`, `fatherMobile`,`motherMobile`, `whatsApp`,`branch`, `combination`,`message`,`status`,`doj`,`institute`)
        VALUES('$date','$time','$sName','$mName','$fName','$fMobile','$mMobile','$wMobile','$branch','$combination','$message','active','$doj','$institute')";
        $exe = mysqli_query($conn, $query);
        if($exe){
             header("Location:../status.php");
        }else {
            echo "Error. Please contact us..";
            
        }
} else {
        header("Location:../index.html");
}