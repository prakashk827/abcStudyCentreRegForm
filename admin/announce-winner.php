<?php
session_start();
include_once ("../db/db.php");
/* if (isset($_SESSION["adminUName"])) {
    header("Location:index.php");
}  */ 
?>

<title>Announce Winner</title>
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
			<i class="fa fa-trophy"></i> Announce Winner
		</h1>
		<p>Showing all clients details who bought coupons <i class="fa fa-tags"></i></p> 
	</div>
	<ul class="app-breadcrumb breadcrumb side">
		<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>

		<li class="breadcrumb-item active"><a href="dashboard.php">dashboard</a></li>
	</ul>
</div>
<button style="display: none" type="button" id="modalBtn"
	data-toggle="modal" data-target="#myModal">Open Modal</button>

<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="tile-body">
				<div class="table-responsive">
					<table class="table table-hover table-bordered" id="sampleTable">
						<thead>
							<tr>
								<th>ClientUId</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Announce as</th>

							</tr>
						</thead>
						<tbody>
<?php
$clientUId = $_SESSION['clientUId'];
$query = "SELECT DISTINCT clientUId  FROM `coupons_sold` WHERE paymentStatus='complete'";

$exe = mysqli_query($conn, $query);
if (mysqli_num_rows($exe) > 0) {
    
    while ($data = mysqli_fetch_assoc($exe)) {
        $UId = $data['clientUId'];
        $sel = "SELECT * FROM `client_profile` WHERE clientUId = '$UId'";
        $exe1 = mysqli_query($conn, $sel);
        $profile =  mysqli_fetch_assoc($exe1);
        ?>
        
        
                 <tr>
					<td><?php echo $data['clientUId'] ?></td>
					<td><?php echo $profile['firstName'] ?></td>
					<td><?php echo $profile['lastName'] ?></td>
					<td><button data-clientUId="<?php  echo $profile['lastName']  ?>" class="btn btn-danger btn-sm">Winner</button></td>
				</tr>
<?php
    }
    ?>
        
<?php
} else {
    echo "Error while fetching coupon";
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
					<h4 class="modal-title">Client Info.</h4>
				</center>
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
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
 
  $('.cancel').click(function(){
	 
    $("#myModal").modal('show');
      var id = $(this).attr("data-id");
      
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

             $.post("delete/delete-payment-pending-coupon.php",
          {
            id:id
          },
          function(data)
          {
             swal("Deleted!", data , "success");
               window.location.href="pending-payment.php";         
          });
             
          } else {
            swal("Cancelled", "", "error");
          }
        });
      });

//Payment
  $('.moreDetails').click(function(){

      var clientUId = $(this).attr("data-clientUId");

      $.post("display/get-client-list.php",
                    {
                      
                      clientUId:clientUId
                      
                    },
                    function(data)
                    {
                     $(".modal-body").html(data);
                     document.getElementById("modalBtn").click();
                      
                     
                      
                    });
    

                      
                      
                     
                      
      });



       // window.location.href="cart-page.php?id="+id;
        
        
});



</script>





</body>
</html>
