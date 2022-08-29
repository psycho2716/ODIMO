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


//Add  new user code 

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];


  	$insert_data = "INSERT INTO users(username, password) VALUES ('$username','$password',NOW())";
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
<?php include '../css/style.css'; ?>
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
  <body>
		
<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar" class="active">
		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          	<i class="fa fa-bars"></i>
	          	<span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
		<div class="p-4">
		  	<h1><img class="side-logo" src="../images/admin-logo.png"></img><a href="../Admin/index.php" class="logo">ODIMO System</a></h1>
	        <ul class="list-unstyled components mb-5">
	          	<li>
	            	<a href="../Admin/index.php"><span class="fa fa-home mr-3"></span>Dashboard</a>
	          	</li>

	          	<li class="active">
				  <a href="../Admin/create_user.php"><span class="fa fa-user mr-3"></span>Users</a>
	          	</li>

	          	<li>
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
		<h2 class="mb-4 dashboard">Accounts/Users</h2>
  				<hr>
				  <!-- adding alert notification  -->
			<?php
					if($added){
					echo "
						<div class='btn-success' style='padding: 15px; text-align:center;'>
						Document Data has been Successfully Added.
						</div><br>
					";
					}

			?>
	  		<div class="table-wrapper">
				
				<table class="fl-table" id="myTable">
					<thead>
						<tr>
			   				<th class="text-center" scope="col">No.</th>
							<th class="text-center" scope="col">Username</th>
							<th class="text-center" scope="col">Password</th>
							<th class="text-center" scope="col">Actions</th>
						</tr>
					</thead>

					<?php

        				$get_data = "SELECT * FROM users order by 1 desc";
        				$run_data = mysqli_query($con,$get_data);
						$i = 0;
        				while($row = mysqli_fetch_array($run_data))
        				{
							$sl = ++$i;
							$id = $row['id'];
							$username = $row['username'];
							$password = $row['password'];

        					echo "

							<tr>
								<td class='text-center'>$sl</td>
								<td class='text-center'>$username</td>
								<td class='text-center'>$password</td>
								<td class='text-center'>
									<span>
                                        <a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' style='display: none; ' data-target='#edit$id' title='Edit'>
                                            <i class='fa fa-file'></i>
                                        </a>

										<a href='#' class='btn btn-danger deleteuser' title='Delete'>
											<i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
							   			</a>
									</span>
					
								</td>
							</tr>
        				";
        				}
        			?>
				</table>
				
				<!-- Delete Modal -->
				<?php
					$get_data = "SELECT * FROM users";
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
											<h4 class='modal-title text-center' style='text-align: center; '>Are you sure you want to delete the user?</h4>
										</div>
										<div class='modal-body' style='margin-left: -10%; '>
											<a href='../Admin/delete_user.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
										</div>
				
									</div>

								</div>
							</div>
						";
					}
				?>
			</div>
			
	
    	</div>

</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script>
    	$(document).ready(function () {
      	$('#myTable').DataTable();

    	});
  	</script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>