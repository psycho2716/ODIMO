<?php
include('../config.php');

$id = $_GET['id'];

if(isset($_POST['submit']))
{
	$reference_id = $_POST['reference_no'];
	$n_add = $_POST['no_add'];
	$n_send = $_POST['no_send'];
	$u_address = $_POST['doc_address'];
	$u_document = $_POST['u_document'];
	$u_dor = $_POST['user_dor'];
	$u_filing = $_POST['filing'];
	$u_sub = $_POST['subject'];
	$u_unit = $_POST['unit'];
	
	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "../upload_images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	$update = "UPDATE uheads_data SET reference_id='$reference_id', n_add = '$n_add', n_send = '$n_send', u_address = '$u_address', u_document = '$u_document', u_dor = '$u_dor', u_filing = '$u_filing', u_sub = '$u_sub', u_unit = '$u_unit', image = '$image' WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:../Admin/process_owner.php');
	}else{
		echo "Data not update";
	}
}

?>