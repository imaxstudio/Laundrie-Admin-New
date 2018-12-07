<?php
	include_once "conn.php";

	class usr{}

	$nama = $_POST['nama'];
	$email = $_POST["email"];
	$nomor_telp = $_POST['nomor_telp'];
	$password = $_POST["password"];
	$konfirm_password = $_POST["konfirm_password"];

	if ((empty($nama))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Nama tidak boleh kosong";
		die(json_encode($response));
	}
	else if ((empty($email))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Email tidak boleh kosong";
		die(json_encode($response));
	} 
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Email tidak benar!";
		die(json_encode($response));
	}
	else if ((empty($nomor_telp))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Nomor Telepon tidak boleh kosong";
		die(json_encode($response));
	} 
	else if ($nomor_telp > 999999999999) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Nomor teleponnya kebanyakan mas!";
		die(json_encode($response));
	}
	else if ($nomor_telp < 999999999) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Nomor telepon tidak benar!";
		die(json_encode($response));
	}
	else if ((empty($password))) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Password tidak boleh kosong";
		die(json_encode($response));
	} 
	else if ((empty($konfirm_password)) || $password != $konfirm_password) {
		$response = new usr();
		$response->success = 0;
		$response->message = "Konfirmasi password tidak sama";
		die(json_encode($response));
	}
	else {
		if (!empty($email) && $password == $konfirm_password){
			$num_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'"));

			if ($num_rows == 0){
				$query = mysqli_query($conn, "INSERT INTO users (id, nama, email, nomor_telp, password) VALUES(0,'".$nama."','".$email."','".$nomor_telp."','".$password."')");

				if ($query){
					$response = new usr();
					$response->success = 1;
					$response->message = "Berhasil mendaftar ☺, Silahkan masuk";
					die(json_encode($response));

				} 
				else {
					$response = new usr();
					$response->success = 0;
					$response->message = "Email sudah terdaftar!";
					die(json_encode($response));
				}
			} else {
				$response = new usr();
				$response->success = 0;
				$response->message = "Email sudah terdaftar!";
				die(json_encode($response));
			}
		}
	}

	mysqli_close($conn);

?>	