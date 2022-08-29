<?php
	require_once 'conn.php';
	
	if(ISSET($_REQUEST['id'])){
		$file = $_REQUEST['id'];
		$query = $conn->prepare("SELECT * FROM `document_data` WHERE `id`='$file'");
		$query->execute();
		$fetch = $query->fetch();
	
		header("Content-Disposition: attachment; filename=".$fetch['image']);
		header("Content-Type: application/octet-stream;");
		readfile("../upload_images/".$fetch['image']);
	}
?>