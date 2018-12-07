<?php 
	$id = $_GET['token'];
	$q = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");
	if ($q) {
		header("location: ./?users");
	}
 ?>