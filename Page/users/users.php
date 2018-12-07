<div class="indicators">
    <div>
        <p class="h1">Pengguna</p>
        <p class="h5">Pengguna / <a href="#">semuaPengguna</a></p>
    </div>
    <div>
    	<a href="./?users=addUser" class="btn btn-primary borderrad"><i class="fas fa-plus"></i></a>
    </div>
</div>
<div class="container-admin">
	<div class="row">
		<div class="col-12 table-wrap">
			<table class="table table-striped">
				<thead>
					<tr class="bg-primary" style="color: #fff;">
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Nomor Telepon</th>
						<th>Password</th>
						<th>Tanggal Registrasi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
			<?php 
				$no = 1;
				$q = mysqli_query($conn, "SELECT * FROM users");
				while($res = mysqli_fetch_array($q)) {
			?>
					<tr>
						<th><?php echo $no; ?></th>
						<th><?php echo $res['nama']; ?></th>
						<th><?php echo $res['email']; ?></th>
						<th><?php echo $res['nomor_telp']; ?></th>
						<th><?php echo $res['password']; ?></th>
						<th>
							<?php 
							if (empty($res['tanggal_registrasi'])) {
								echo "<p class='alert alert-primary'><i>NULL</i></p>";
							}
							else{
								echo $res['tanggal_registrasi']; 
							}
							?>
						</th>
						<th>
							<a href="./?users=editUser&token=<?php echo $res['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
							<a onclick="return confirm('Konfirmasi hapus pengguna <?php echo $res['nama']; ?>')" href="./?users=deleteUser&token=<?php echo $res['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
						</th>
					</tr>
			<?php 
				$no++;
				}
			 ?>
				</tbody>
			</table>
		</div>			
	</div>
</div>