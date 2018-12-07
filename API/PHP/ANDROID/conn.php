<?php
	$server		= "localhost";
	$user		= "anonymousr";
	$password	= "a08568777z";
	$database	= "laundrie"; 

	$conn = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	}

?>