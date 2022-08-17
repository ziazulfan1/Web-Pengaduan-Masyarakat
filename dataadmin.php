<?php
include("adminheader.php");
include("koneksi.php");
include("sidenav.php");
?>
<style>
	.main {
		margin-top: 40px;
		margin-left: 120px;
		padding: 0px 10px;
	}
</style>

<?php
include_once('cekadmin.php');
?>
<div class="main">
	<div class="container">
		<div class="content">
			<h2>Data Admin</h2>

			<a href="registeradmin.php" class="btn btn-danger" data-toggle="tooltip" title="register">Tambah Admin</a>
			<br>
			<br>
			<input class="form-control" id="myInput" type="text" placeholder="Search..">

			<br />
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>NO</th>
						<th>Nama User</th>
						<th>Level Akses</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Tools</th>
					</tr>
					<?php
					if (isset($_GET['aksi']) == 'delete') {
						$id = $_GET['id'];
						$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
						if (mysqli_num_rows($cek) == 0) {
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
						} else {
							$delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
							if ($delete) {
								echo '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Hapus.</div>';
							} else {
								echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
							}
						}
					}
					?>
					<?php
					$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 'Admin Instansi'");
					if (mysqli_num_rows($cek) == 0) {
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>';
					} else {
						$no = 1;
						while ($row = mysqli_fetch_assoc($cek)) {
							echo '
							<tbody id="myTable">
							<tr>
								<td>' . $no . '</td>
								<td>' . $row['username'] . '</a></td>
								<td>' . $row['level'] . '</a></td>
								<td>' . $row['alamat'] . '</td>
								<td>' . $row['email'] . '</td>
								<td>
							<a href="dataadmin.php?aksi=delete&id=' . $row['id'] . '" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data ' . $row['id'] . '?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>
							</tr>
							';
							$no++;
						}
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>