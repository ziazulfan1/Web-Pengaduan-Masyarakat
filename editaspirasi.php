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
			<h2>Data Aspirasi &raquo; Aspirasi</h2>
			<a href="data_aspirasi.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<center>


				<br>
			</center>
			<?php
			$id = $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM data_aspirasi WHERE id='$id'");
			if (mysqli_num_rows($sql) == 0) {
				header("Location: adminindex.php");
			} else {
				$row = mysqli_fetch_assoc($sql);
			}

			?>
			<center>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3>Laporan</h3>
					</div>
					<div class="panel-body">
						<table class="table table-bordered table-striped table-condensed a">

							<tr>
								<th>Judul Pengaduan</th>
								<td><?php echo $row['judulaspirasi']; ?></td>
							</tr>
							<tr>
								<th>Nama Instansi</th>
								<td><?php echo $row['nama_instansi']; ?></td>
							</tr>
							<tr>
								<th>Alamat Pelapor</th>
								<td><?php echo $row['alamatpelapor']; ?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $row['email']; ?></td>
							</tr>
							<tr>
								<th>Lampiran</th>
								<td><?php echo $row['lampiran']; ?></td>
							</tr>
						</table>
						<label>Aspirasi</label>
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
		</div>
	</div>
</div>
</div>
</center>
</div>
</div>
</div>