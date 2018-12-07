<div class="indicators">
    <div>
        <p class="h1">Pengguna</p>
        <p class="h5">Pengguna / <a href="#">tambahPengguna</a></p>
    </div>
</div>
<div class="container-admin">
	<div class="row">
		<div class="col-12">
			<div class="card">
                <div class="card-body">

            <?php 
            	if (isset($_POST['addUser'])) {
            		$nama = $_POST['nama'];
            		$email = $_POST['email'];
            		$nomor_telp = $_POST['nomor_telp'];
            		$password = $_POST['password'];
            		$tanggal_registrasi = date('Y-m-d');
            		if (empty($nama)) {
            			echo "<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Nama tidak boleh kosong</p>";
            		}
            		elseif (empty($email)) {
            			echo "<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> E-mail tidak boleh kosong</p>";
            		}
            		elseif (empty($nomor_telp)) {
            			echo "<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Nomor Telepon tidak boleh kosong</p>";
            		}
            		elseif (empty($password)) {
            			echo "<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Password tidak boleh kosong</p>";
            		}
            		else{
            			$q = mysqli_query($conn, "INSERT INTO users (nama, email, nomor_telp, password, tanggal_registrasi) VALUES ('$nama','$email','$nomor_telp','$password','$tanggal_registrasi') ");
            			if ($q) {
            				echo "<p class='alert alert-primary'><i class='fas fa-user-circle'></i> Berhasil menambah pengguna</p>";
            				header("Refresh:1; url=./?users", true, 53);
            			}
            			else{
            				echo "<p class='alert alert-danger'><i class='fas fa-user-circle'></i> Gagal menambah pengguna</p>";
            			}
            		}
            	}
             ?>

                    <form method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" required name="nama">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="E-mail" required name="email">
                        </div>
                        <div class="form-group">
                            <label for="nomor_telp">Nomor Telepon</label>
                            <input type="number" class="form-control" id="nomor_telp" placeholder="Nomor Telepon" required name="nomor_telp">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Password" required name="password">
                        </div>
                        <div class="action-form">
                            <button type="submit" class="btn btn-primary borderrad" name="addUser">Tambah</button>
                        </div>
                    </form>
                </div>              
            </div>
		</div>			
	</div>
</div>