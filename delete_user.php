<?php

include('config.php');
$id = $_GET['id'];
$delete = "DELETE FROM users WHERE id = $id";
$run_data = mysqli_query($con,$delete);

if($run_data){
	header('location:create_user.php');
}else{
	echo "Do not Delete";
}


?>