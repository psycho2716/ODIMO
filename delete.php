<?php

include('config.php');
$id = $_GET['id'];
$delete = "DELETE FROM uheads_data WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:index.php');
}else{
	echo "Do not Delete";
}
?>