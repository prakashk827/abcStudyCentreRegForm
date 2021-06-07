<?php
include_once ("../db/db.php");
session_start();
if(!isset($_SESSION['adminUName'])){
	header("Location:index.php");
}

?>

<title>Student Details</title>
<?php include_once ("includes/head.php"); ?>


<!-- Navbar starts-->
<?php include_once ("includes/navbar.php"); ?>
<!-- Navbar Ends-->


<!-- Sidebar menu starts-->
<?php include_once ("includes/sidebar.php"); ?>
<!-- Sidebar menu ends-->


<main class="app-content">
<div class="app-title">
	<div>
		<h1>
			<i class="fa fa-users"></i> Student Details
		</h1>
		<!-- <p>Showing all coupons</p> -->
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

		<li class="breadcrumb-item active"><a href="#">dashboard</a></li>
	</ul>
</div>
<button style="display: none" type="button" id="modalBtn"
	data-toggle="modal" data-target="#myModal">Open Modal</button>

<div class="row">
	<div class="col-md-12">
		<a href="export/exportFile.php"><button class="btn btn-success btn-sm ">Export to Excel</button></a> <br><br>
	</div>
	<?php 
	$role =  $_SESSION['role'];
	
	if($role != 'admin'){
	    $action = 'display : none';
	}
	
	?>
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>Reg. Date</th>
								<th>Student Name</th>
								<th>Combintion</th>
								<th>Branch</th>
								<th>View More</th>
								<th style="<?php echo $action?>">Action</th>
								
							</tr>
						</thead>
						<tbody>
<?php

$query = "SELECT * FROM `onlineappform` ORDER BY id DESC";
$exe = mysqli_query($conn, $query);
if (mysqli_num_rows($exe) > 0) {
    
    while ($data = mysqli_fetch_assoc($exe)) {
        ?>
                 <tr>
								<td><?php echo $data['date'] ?></td>
								<td><?php echo $data['studentName']; ?></td>
								<td><?php echo $data['combination']; ?></td>
								<td><?php echo $data['branch']; ?></td>
								<th>
									<button class="btn btn-success btn-sm moreDetails"
										data-sId="<?php echo $data['id']; ?>">Show</button>
								</th>
								<th style="<?php  echo $action?>">
									<button class="btn btn-danger btn-sm deleteBtn"
										data-sId="<?php echo $data['id']; ?>">Delete</button>
								</th>
								
								

							</tr>
<?php
    }
    ?>
        
<?php
} else {
    echo "No records.";
}

?>
                   
                  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</main>
<style type="text/css">
</style>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title">Student Details</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm"
					data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



<!-- Footer Starts-->
<?php include_once ("includes/footer.php"); ?>
<!-- Footer Ends-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript"
	src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

$(document).ready(function(){
 
  

//Payment
  $('.moreDetails').click(function(){

      var sId = $(this).attr("data-sId");

      $.post("display/get-student-detail.php",
                    {
    	  				sId:sId
                    },
                    function(data)
                    {
                     $(".modal-body").html(data);
                     document.getElementById("modalBtn").click();
                    }
        );
                      
      });

  //Delete record starts

  $('.deleteBtn').click(function(){
	  var sId = $(this).attr("data-sId");
      
        swal({
          title: "Are you sure you want to delete this ? ",
          text: "" ,
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {

             $.post("insert/delete-student-record.php",
          {
            	 sId:sId
          },
          function(data)
          {
             swal("Deleted!", data , "success");
               window.location.href="student-list.php";         
          });
             
          } else {
            swal("Cancelled", "", "error");
          }
        });
      });
  
  
  // Delete record ends



      
        
        
});



</script>

</body>
</html>
