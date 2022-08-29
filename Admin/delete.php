<?php

include('../config.php');
$id = $_GET['id'];
$delete = "DELETE FROM document_data WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:../Admin/index.php');
}else{
	echo "Do not Delete";
}


?>