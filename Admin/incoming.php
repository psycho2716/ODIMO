<?php
// Initialize the session
session_start();

error_reporting(0);

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../Admin/login.php");
    exit;
}
// database connection
include('../config.php');

$added = false;


//Add New Document code 

if(isset($_POST['submit'])){
	$reference_id = $_POST['reference_no'];
	$n_add = $_POST['no_add'];
	$n_send = $_POST['no_send'];
	$u_address = $_POST['doc_address'];
	$u_document = $_POST['document_in'];
	$u_dor = $_POST['user_dor'];
	$u_filing = $_POST['filing'];
	$u_sub = $_POST['subject'];
	$u_unit = $_POST['unit'];
	$uploaded = $_POST['uploaded'];
	


	//image upload

	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "../upload_images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

  	$insert_data = "INSERT INTO document_data(reference_id, n_add, n_send, u_address, u_document, u_dor, u_filing, u_sub, u_unit, image, uploaded) VALUES ('$reference_id','$n_add','$n_send','$u_address','$u_document','$u_dor','$u_filing','$u_sub','$n_add','$image',NOW())";
  	$run_data = mysqli_query($con,$insert_data);

  	if($run_data){
		  $added = true;
  	}else{
  		echo "Data not insert";
  	}

}

?>

<!-- Html Style -->
<style>
<?php include 'css/style.css'; ?>
</style>
<!-- Html Style -->


<!doctype html>
<html lang="en">
  <head>
  	<title>ODIMO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/admin-logo.png"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


	</head>
  <body >
		
<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar" class="active">
		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          	<i class="fa fa-bars"></i>
	          	<span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
		<div class="p-4">
		  	<h1><img class="side-logo" src="images/admin-logo.png"></img><a href="../Admin/index.php" class="logo">ODIMO System</a></h1>
	        <ul class="list-unstyled components mb-5">
	          	<li>
	            	<a href="../Admin/index.php"><span class="fa fa-home mr-3"></span>Dashboard</a>
	          	</li>

	          	<li>
				  <a href="../Admin/create_user.php"><span class="fa fa-user mr-3"></span>Users</a>
	          	</li>
				  
				<li class="active">
					<a href="../Admin/incoming.php"><span class="bi bi-arrow-down-left-circle-fill"></span> Incoming Documents</a>
				</li>

				<li>
					<a href="../Admin/outgoing.php"><span class="bi bi-arrow-up-right-circle-fill"></span> Outgoing Documents</a>
				</li>

				<li>
              		<a href="../Admin/process_owner.php"><span class="bi bi-people-fill"></span> Unit Heads</a>
	          	</li>

	          	<li>
              		<a href="../Admin/logout.php"><span class="fa fa-arrow-left mr-3"></span>Log Out</a>
	          	</li>
	        </ul>

	        <div class="footer">
	        	
	        </div>

	    </div>
    </nav>

        <!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
		<h2 class="mb-4 dashboard">Incoming Documents</h2>
  				<hr>
				  	<?php
							if($added){
							echo "
								<div class='btn-success' style='padding: 15px; text-align:center;'>
								Document Data has been Successfully Added.
								</div><br>
							";
							}

					?>
				
				<table class="table table-striped table-hover table-responsive-md" id="myTable">
					<thead>
						<tr>
			   				<th class="text-center" scope="col">No.</th>
							<th class="text-center" scope="col">Reference No.</th>
							<th class="text-center" scope="col">Addressee</th>
							<th class="text-center" scope="col">Document Type</th>
                            <th class="text-center" scope="col">Filing Type</th>
							<th class="text-center" scope="col">Image</th>
							<th class="text-center" scope="col">Action</th>
							
						</tr>
					</thead>
			
					<?php

        				$get_data = "SELECT * FROM document_data WHERE u_document = 'Incoming'";
        				$run_data = mysqli_query($con,$get_data);
						$i = 0;
        				while($row = mysqli_fetch_array($run_data))
        				{
							$sl = ++$i;
							$id = $row['id'];
							$reference_id = $row['reference_id'];
							$n_add = $row['n_add'];
                            $u_filing = $row['u_filing'];
							$u_document = $row['u_document'];

        					$image = $row['image'];

        					echo "

							<tr>
								<td class='text-center'>$sl</td>
								<td class='text-center'>$reference_id</td>
								<td class='text-center'>$n_add</td>
								<td class='text-center'>$u_document</td>
								<td class='text-center'>$u_filing</td>
                                <td class='text-center'>
								
									<a href='../upload_images/$image'>
										<img src='../upload_images/$image' alt='' style='width: 50px; height: 50px;' >
									</a>
								
									
															
								</td>
								
								<td class='text-center actions' style='display:flex; align-items: center; justify-content: center; '>
									<span>

										<a href='../Download/index.php' class='btn btn-info mr-1 Download' title='Download Image' style='margin-bottom: 5px; display: none; '>
											<i class='fa fa-download' aria-hidden='true'></i>
										</a>

                                        <a href='#' class='btn btn-success mr-1 View' data-toggle='modal' data-target='#view$id' title='View' style='margin-bottom: 5px; '>
											<i class='fa fa-eye' aria-hidden='true'></i>
                                        </a>

										<a href='#' class='btn btn-danger mr-1 Delete' title='Delete' style=' display: none; margin-bottom: 5px; '>
											<i class='bi bi-trash-fill' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
							   			</a>
									</span>
					
								</td>
							</tr>
        				";
        				}
        			?>
				</table>	
    </div>
	
		<!-- Add Modal -->
		
			<!----edit Data--->
			<?php
				$get_data = "SELECT * FROM document_data";
				$run_data = mysqli_query($con,$get_data);
				while($row = mysqli_fetch_array($run_data))
				{
					$id = $row['id'];
					$reference = $row['reference_id'];
					$addressee = $row['n_add'];
					$sender = $row['n_send'];
					$document = $row['u_document'];
					$filing = $row['u_filing'];
					$unit = $row['u_unit'];
					$subject = $row['u_sub'];
					$address = $row['u_address'];
					$dor = $row['u_dor'];
					$image = $row['image'];
					echo "
						<div id='edit$id' class='modal fade' role='dialog'>
							<div class='modal-dialog'>
								<!-- Modal content-->
								<div class='modal-content'>
									<div class='modal-header'>
										<h4 class='modal-title text-center'>Edit Document Data</h4> 
									</div>

									<div class='modal-body'>
										<form action='../Admin/edit.php?id=$id' method='post' enctype='multipart/form-data'>
											
											<div class='form-row' style='margin-bottom: 10px; '>
												<label for='reference'>Reference No.</label>
												<input type='text' class='form-control' name='reference_no' value='$reference'>
											</div>

											<div class='form-row'>	
												<div class='form-group col-md-6'>
													<label for='document'> Filing Type </label><br>
														<select id='document' name='filing' class='form-control'>
															<option selected>$filing</option>
															<option value='MEI'>MEI</option>
															<option value='MEO'>MEO</option>
															<option value='ICC'>ICC</option>
															<option value='OCC'>OCC</option>
															<option value='RAC'>RAC</option>
															<option value='ACR'>ACR</option>
															<option value='ANE'>ANE</option>
														</select>
												</div>
												<div class='form-group col-md-6'>
													<label for='document'> Document Type </label><br>
														<select id='doc_type' name='u_document' class='form-control'>
															<option selected> $document </option>
															<option value='Incoming'>Incoming</option>
															<option value='Outgoing'>Outgoing</option>
														</select>
												</div>
											</div>

											<div class='form-row'>
												<div class='form-group col-md-6'>
													<label for='addresseename'>Addressee Name</label>
													<input type='text' class='form-control' name='no_add' value='$addressee'>
												</div>
												<div class='form-group col-md-6'>
													<label for='sendername'>Sender Name</label>
													<input type='text' class='form-control' name='no_send' value='$sender'>
												</div>
											</div>
									
											<div class='form-row'>
												<div class='form-group col-md-6'>
													<label for='unit'> Office/Unit </label>
													<input type='text' class='form-control' name='unit' value='$unit'>
												</div>
												<div class='form-group col-md-6'>
													<label for='inputaddress'>Address</label>
													<input type='text' class='form-control' name='doc_address' value='$address'>
												</div>
												<div class='form-group col-md-6'>
													<label>Date of Receipt</label>
													<input type='date' name='user_dor' class='form-control' value='$dor'>
												</div>	
											</div>

											<div class='form-row'>
												<div class='form-group col-md-6'>
													<label for='subject'>Subject</label>
													<input type='text' class='form-control' name='subject' value='$subject'>
													<img src = 'upload_images/$image' style='width:50px; height:50px'>
												</div>
												<div class='form-group col-md-6'>
													<label>Upload Image</label>
													<input type='file' name='image' class='form-control' >
												</div>
												
											</div>

											<div class='modal-footer'>
												<input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
												<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
					";
				}
			?>

			<!-- View modal  -->
			<?php 
				$get_data = "SELECT * FROM document_data";
				$run_data = mysqli_query($con,$get_data);

				while($row = mysqli_fetch_array($run_data))
				{
					
					$id = $row['id'];
					$reference = $row['reference_id'];
					$addressee = $row['n_add'];
					$sender = $row['n_send'];
					$filing = $row['u_filing'];
					$unit = $row['u_unit'];
					$document = $row['u_document'];
					$subject = $row['u_sub'];
					$address = $row['u_address'];
					$uploaded = $row['uploaded'];
			
					$image = $row['image'];
					echo "
						<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>

							<div class='modal-dialog'>

								<div class='modal-content'>

									<div class='modal-header'>
										<h1 class='modal-title' id='exampleModalLabel' style='font-family: Smooch Sans; font-weight: bold; margin-left: 40%; '> DETAILS </h1>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>

									<div class='modal-body'>
									
										<div class='container' id='profile'> 
											<div class='row'>
												<div class='col-sm-4 col-md-2' style='padding-top: 2%; '>
													<a href='../upload_images/$image'>
														<img src='../upload_images/$image' alt='' style='width: 150px; height: 150px;' >
													</a>
													<br>
												</div>
												<div class='col-sm-3 col-md-6' style='font-size: 12px; '>
													<h3 class='text-primary'><strong>$addressee</strong></h3>
													<p class='text-secondary'>
													<i class='fa fa-message'></i> <strong> Sender: </strong> $sender <br>
														<i class='fa fa-file-invoice' aria-hidden='true'></i> <strong> Document Type:</strong> $filing<br>
														
														<i class='fa fa-calendar' aria-hidden='true'></i><strong> Date of Receipt: </strong> $uploaded <br>
														
														<i class='fa fa-book' aria-hidden='true'></i> <strong> Subject:</strong> $subject<br>

														<i class='fa fa-asterisk'></i><strong> Reference No:</strong> $reference <br>

														<i class='bi bi-file-earmark-break-fill'></i> Document Type: </strong> $document <br>
														
														<i class='fa fa-image'></i><strong> Filename:</strong> $image <br>
														
														<i class='fa fa-home' aria-hidden='true'></i> <strong> Address:</strong> <br> &nbsp &nbsp $address
														<br />
													</p>
													<!-- Split button -->
												</div>
											</div>

										</div>   
									</div>
									<div class='modal-footer'>
										<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
									</div>
									</form>
								</div>
							</div>
						</div>
				";
				}
			?>

			<!------Delete modal---->
			<?php
				$get_data = "SELECT * FROM document_data";
				$run_data = mysqli_query($con,$get_data);
				while($row = mysqli_fetch_array($run_data))
				{
					$id = $row['id'];
					echo "
						<div id='$id' class='modal fade' role='dialog'>
							<div class='modal-dialog'>

								<!-- Modal content-->
								<div class='modal-content'>
									<div class='modal-header'>
										<h4 class='modal-title text-center' style='text-align: center; '>Are you sure you want to delete?</h4>
									</div>
									<div class='modal-body' style='display: flex; justify-content: center; align-items: center; '>
										<a href='../Admin/delete.php?id=$id' class='btn btn-danger'>Delete</a>
									</div>
			
								</div>

							</div>
						</div>
					";
				}
			?>
</div>

	<script src="js/jquery.min.js"></script>
	<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script>
    	$(document).ready(function () {
      	$('#myTable').DataTable();

    	});
  	</script>
    
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>