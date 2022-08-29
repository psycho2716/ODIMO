<?php
include('config.php');

$id = $_GET['id'];

if(isset($_POST['submit']))
{
	
	
	
	$image = $_FILES['image']['name'];
	$target = "upload_images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	$update = "UPDATE uheads_data SET reference_id='$reference_id', n_add = '$n_add', n_send = '$n_send', u_address = '$u_address', u_document = '$u_document', u_dor = '$u_dor', u_filing = '$u_filing', u_sub = '$u_sub', u_unit = '$u_unit', process_owner = '$process_owner', image = '$image' WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:index.php');
	}else{
		echo "Data not update";
	}
}
?>