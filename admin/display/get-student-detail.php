<?php
include_once ("../../db/db.php");
session_start();
if ($_SESSION["clientUId"] == '') {
    header("Location:../index.php");
}
?>
<!-- Modal -->
<?php
if (isset($_POST['sId'])) {
    $sId = $_POST['sId'];
    $query = "SELECT * FROM `onlineappform` WHERE id= '$sId'";
    $exe = mysqli_query($conn, $query);
    $profile = mysqli_fetch_assoc($exe);
}
?>
<style>
.modalTblHeader {
	color:red;
	width:45%;
}
</style>
<div class="row">
	<div class="col-md-12">

		<div class="table-responsive">
			<table class="table" id="sampleTable">
				<thead>

				</thead>

				<tbody>
					
					<tr>
						<th class="modalTblHeader" >Branch Name :</th>
						<td><?php echo $profile['branch'] == '' ? 'Not Provided' : $profile['branch']; ?></td>
					</tr>
					
					

					
					
					<tr>
						<th class="modalTblHeader" >Student Name :</th>
						<td><?php echo $profile['studentName'] == '' ? 'Not Provided' : $profile['studentName']; ?></td>
					</tr>
					
					<tr>
						<th class="modalTblHeader" >Date of Joining :</th>
						<td><?php echo $profile['doj'] == '' ? 'Not Provided' : $profile['doj']; ?></td>
					</tr>
					
					<tr>
						<th class="modalTblHeader" >Mother Name :</th>
						<td><?php echo $profile['motherName'] == '' ? 'Not Provided' : $profile['motherName']; ?></td>
					</tr>
					
					<tr>
						<th class="modalTblHeader" >Father Name :</th>
						<td><?php echo $profile['fatherName'] == '' ? 'Not Provided' : $profile['fatherName']; ?></td>
					</tr>

					<tr>
						<th class="modalTblHeader" width="45%">Mother  Mobile No. :</th>
						<td><?php echo $profile['motherMobile'] == '' ? 'Not Provided' : $profile['motherMobile'];?></td>
					</tr>
					
					<tr>
						<th class="modalTblHeader" >Father  Mobile No. :</th>
						<td><?php echo $profile['fatherMobile'] == '' ? 'Not Provided' : $profile['fatherMobile'];?></td>
					</tr>
					
					<tr>
						<th class="modalTblHeader" >WhatsApp No. :</th>
						<td><?php echo $profile['whatsApp'] == '' ? 'Not Provided' : $profile['whatsApp'];?></td>
					</tr>
					
					<tr>
						<th class="modalTblHeader" >Combination :</th>
						<td><?php echo $profile['combination'] == '' ? 'Not Provided' : $profile['combination'];?></td>
					</tr>
					
					<tr>
						<th class="modalTblHeader" >Message :</th>
						<td><?php echo $profile['message'] == '' ? 'Not Provided' : $profile['message'];?></td>
					</tr>

					
				</tbody>
			</table>
		</div>

	</div>
</div>

