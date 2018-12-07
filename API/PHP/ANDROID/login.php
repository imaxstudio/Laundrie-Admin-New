<?php
	include_once "conn.php";

	class usr{}
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	if ((empty($email)) || (empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Lampiran tidak boleh kosong"; 
		die(json_encode($response));
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Email tidak benar!";
		die(json_encode($response));
	}
	
	$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['nama'];
		$response->id = $row['id'];
		$response->email = $row['email'];
		$response->nama = $row['nama'];
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Email atau password salah";
		die(json_encode($response));
	}
	
	mysqli_close($conn);

?>