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
	<link rel="icon" type="image/png" href="../images/admin-logo.png"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="https://kit.fontawesome.com/8eda353e2c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8eda353e2c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dosis&family=Smooch+Sans:wght@100&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
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
		  	<h1><img class="side-logo" src="../images/admin-logo.png"></img><a href="index.php" class="logo">ODIMO System</a></h1>
	        <ul class="list-unstyled components mb-5">
	          	<li>
	            	<a href="../index.php"><span class="fa fa-home mr-3"></span>Dashboard</a>
	          	</li>

	          	<li>
				  <a href="../create_user.php"><span class="fa fa-user mr-3"></span>Users</a>
	          	</li>

	          	<li>
					<a href="../incoming.php"><span class="bi bi-arrow-down-left-circle-fill"></span> Incoming Documents</a>
				</li>

				<li>
					<a href="../outgoing.php"><span class="bi bi-arrow-up-right-circle-fill"></span> Outgoing Documents</a>
				</li>

				<li class="active">
              		<a href="index.php"><span class="fa fa-download mr-3"></span>Download Images</a>
	          	</li>

	          	<li>
              		<a href="../logout.php"><span class="fa fa-arrow-left mr-3"></span>Log Out</a>
	          	</li>
	        </ul>

	        <div class="footer">
	        	
	        </div>

	    </div>
    </nav>

        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
		<h2 class="mb-4 dashboard">Download Image Files</h2>
		
		<div class="col-md-3"></div>	
			<div class="col-md-6 well">
				<h3 class="text-primary">Image Files</h3>
				<hr style="border-top:1px dotted #ccc;"/>
				
				<div class="col-md-15" >
					<table class="table table-bordered table-responsive-md" >
						<thead class="alert-info">
							<tr>
								<th class="text-center">File Name</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								require 'conn.php';
								$query = $conn->prepare("SELECT * FROM `document_data`");
								$query->execute();

								while($fetch = $query->fetch()){
							?>
							<tr>
								<td class="text-center"><?php echo $fetch['image']?></td>
								<td class="text-center"><a href="download.php?id=<?php echo $fetch['id']?>" class="btn btn-primary">Download</a></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>




			
    </div>				



</div>
	<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  	<script>
    	$(document).ready(function () {
      	$('#myTable').DataTable();

    	});
  	</script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>