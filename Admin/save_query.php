<?php
	require_once 'config.php';
 
	if(ISSET($_POST['save'])){
		$n_add = $_POST['n_add'];
		$n_send = $_POST['n_send'];
		$reference_id = $_POST['reference_id'];
        $u_address = $_POST['u_address'];
        $u_document = $_POST['u_document'];
        $u_filing = $_POST['u_filing'];
        $u_sub = $_POST['u_sub'];
        $u_unit = $_POST['u_unit'];
		$uploaded = date("Y-m-d", strtotime("+6 HOURS"));
 
		$con->query("INSERT INTO `document_data` VALUES('', '$n_add', '$n_send', '$reference_id', '$u_address', '$u_document', '$u_filing', '$u_sub', '$u_unit', '$uploaded')") or die(mysqli_errno());
 
		header('location: index.php');
	}
?>