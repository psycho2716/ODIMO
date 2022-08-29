<?php
	$conn = new PDO( 'mysql:host=localhost;dbname=odimo', 'root', '');
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>