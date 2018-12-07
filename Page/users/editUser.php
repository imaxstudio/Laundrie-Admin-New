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
                $id = $_GET['token'];
            	if (isset($_POST['editUser'])) {
            		$nama = $_POST['nama'];
            		$email = $_POST['email'];
            		$nomor_telp = $_POST['nomor_telp'];
            		$password = $_POST['password'];
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
            			$q = mysqli_query($conn, "UPDATE users SET nama='$nama', email='$email', nomor_telp='$nomor_telp', password='$password' WHERE id = '$id'");
            			if ($q) {
            				echo "<p class='alert alert-primary'><i class='fas fa-user-circle'></i> Berhasil memperbarui pengguna</p>";
            				header("Refresh:1; url=./?users", true, 53);
            			}
            			else{
            				echo "<p class='alert alert-danger'><i class='fas fa-user-circle'></i> Gagal memperbarui pengguna</p>";
            			}
            		}
            	}
                $show = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
                $res = mysqli_fetch_array($show);
             ?>

                    <form method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" required name="nama" value="<?php echo $res['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="E-mail" required name="email" value="<?php echo $res['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nomor_telp">Nomor Telepon</label>
                            <input type="number" class="form-control" id="nomor_telp" placeholder="Nomor Telepon" required name="nomor_telp" value="<?php echo $res['nomor_telp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Password" required name="password" value="<?php echo $res['password']; ?>">
                        </div>
                        <div class="action-form">
                            <button type="submit" class="btn btn-primary borderrad" name="editUser">Perbarui</button>
                        </div>
                    </form>
                </div>              
            </div>
		</div>			
	</div>
</div>