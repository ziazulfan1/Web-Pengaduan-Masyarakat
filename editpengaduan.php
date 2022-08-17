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

	table.a {
		table-layout: fixed;
		width: 50%;
	}
</style>
<?php
include_once('cekadmin.php');
?>
<div class="main">
	<div class="container">
		<div class="content">
			<h2>Data Pengaduan &raquo; Kirim Solusi</h2>
			<a href="data_pengaduan.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<br>
			<center>


				<br>
			</center>
			<?php
			$id = $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM data_pengaduan WHERE id='$id'");
			if (mysqli_num_rows($sql) == 0) {
				header("Location: adminindex.php");
			} else {
				$row = mysqli_fetch_assoc($sql);
			}

			?>
			<center>
				<div class="panel panel-primary">
					<div class="panel-heading" style="height: 50px">
						<h4>Laporan</h4>
					</div>
					<div class="panel-body">
						<table class="table table-bordered table-striped table-condensed a">

							<tr>
								<th>Nama</th>
								<td><?php echo $row['username']; ?></td>
							</tr>
							<tr>
								<th>Judul Pengaduan</th>
								<td><?php echo $row['judulpengaduan']; ?></td>
							</tr>
							<tr>
								<th>Nama Instansi</th>
								<td><?php echo $row['nama_instansi']; ?></td>
							</tr>
							<tr>
								<th>Lokasi Kejadian</th>
								<td><?php echo $row['lokasi']; ?></td>
							</tr>
							<tr>
								<th>Tanggal</th>
								<td><?php echo $row['tanggal']; ?></td>
							</tr>
							<tr>
								<th>Lampiran</th>
								<td><?php echo $row['lampiran']; ?></td>
							</tr>
						</table>
						<label>Pengaduan</label>
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-sm-3 control-label"></label>
								<div class="col-sm-6">
									<textarea name="solusi" rows="10" class="form-control" readonly><?php echo $row['laporan']; ?></textarea>

								</div>
							</div>
						</form>

			</center>


			<hr />

			<center>


				<br>
			</center>


			<?php
			if ($_SESSION['level'] == "Admin Instansi") { ?>

				<?php
				$id = $_GET['id'];
				if (isset($_POST['add'])) {
					$username	=	$_POST['username'];
					$judul	 = $_POST['judul'];
					$nama_instansi = $_POST['nama_instansi'];
					$solusi		 = $_POST['solusi'];
					$lampiran		 = $_FILES['file']['name'];
					$lokasi_file = $_FILES['file']['tmp_name'];
					$folder = "files/$lampiran";

					if (move_uploaded_file($lokasi_file, "$folder"));

					$cek = mysqli_query($koneksi, "SELECT * FROM data_solusi WHERE id='$id'");
					if (mysqli_num_rows($cek) == 0) {
						$insert = mysqli_query($koneksi, "INSERT INTO data_solusi ( username, judul, nama_instansi, solusi, lampiran) VALUES('$username','$judul','$nama_instansi','$solusi','$lampiran')") or die(mysqli_error($koneksi));

						if ($insert) {
							echo '<div class="alert alert-success alert-dismissable fade in""><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						} else {
							echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan! <a href="data.php"><- Kembali</a></div>';
						}
					}
				}
				?>
				<center>
					<div class="panel panel-primary">
						<div class="panel-heading" style="height: 50px">
							<h4>Kirim Solusi</h4>
						</div>
						<div class="panel-body">

							<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

								<div class="form-group">
									<label class="col-sm-4 control-label">NAMA</label>
									<div class="col-sm-6">
										<input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">JUDUL LAPORAN </label>
									<div class="col-sm-6">
										<input type="text" name="judul" id="judul" value="<?php echo $row['judulpengaduan']; ?>" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Nama Instansi </label>
									<div class="col-sm-6">
										<input type="text" name="nama_instansi" id="nama_instansi" value="<?php echo $row['nama_instansi']; ?>" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">PENYELESAIAN</label>
									<div class="col-sm-6">
										<textarea name="solusi" rows="10" class="form-control" reacquired></textarea>

									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label">UPLOAD LAMPIRAN</label>
									<div class="col-sm-6">
										<input type="file" name="file" class="form-control" id="file" readonly />
										<p>*jika diperlukan</p>
									</div>


								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">&nbsp;</label>
									<div class="col-sm-6">
										<input type="submit" name="add" class="btn btn-sm btn-primary" value="Kirim Solusi" data-toggle="tooltip" title="Simpan Data">
									</div>

									<br>
									<br>
								</div>
						</div>
						</form>
				</center>
			<?php
			}
			?>
		</div>
	</div>
</div>
</div>
</center>
</div>
</div>
</div>