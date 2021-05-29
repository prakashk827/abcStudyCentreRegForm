<style type="text/css">
  
  .header{
   color:red;
   background:yellow;
   border:1px solid black;
  }

  .body{
   border:1px solid black;
  }
  .title {
    border: 1px solid black;
  }
</style>

<?php
include_once ("../../db/db.php");
// export.php
$output = '';
/*<tr>  
                      <td class="title" ><center><h2>Showing all student list</2></center></td>
                    </tr>
                    <tr>
                      <td class="title" >Downloaded date :'.date("d-m-Y").'</td>
                    </tr>
                    <tr> */
$query = "SELECT * FROM `onlineappform` ORDER BY id DESC";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
   <table class="table">
                     
                         <th class="header" >Student Name</th>  
                         <th class="header">Branch</th>
                         <th class="header">Combination</th>
                         <th class="header">Join Date</th>
                         <th class="header" >Mother Name</th>  
                         <th class="header" >Father Name</th>  
                         <th class="header">Father Mobile Number</th>
                         <th class="header">Mother Mobile Number</th>
                         <th class="header">WhatsApp</th>


                    </tr>
  ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<tr>  
                         <td class="body">' . $row["studentName"] . '</td> 
                         <td class="body">' . $row["branch"] . '</td>  
                         <td class="body">' . $row["combination"] . '</td> 
                         <td class="body">' . $row["doj"] . '</td> 
                         <td class="body">' . $row["motherName"] . '</td> 
                         <td class="body">' . $row["fatherName"] . '</td>
                         <td class="body">' . $row["motherMobile"] . '</td>
                         <td class="body">' . $row["fatherMobile"] . '</td>
                         <td class="body">' . $row["whatsApp"] . '</td>

                        
                            

                         
                    </tr>';
    }
    $output .= '</table>';
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=student_details.xls');
    echo $output;
}

?>