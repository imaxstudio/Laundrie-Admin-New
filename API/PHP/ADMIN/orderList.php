<?php 
	session_start();
	include '../../DATABASE/connectionDb.php';

	$q = mysqli_query($conn, "SELECT * FROM order")
 ?>