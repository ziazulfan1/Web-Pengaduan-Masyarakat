<?php
include("headeruser.php");
include("koneksi.php");
?>
<style>
	    body {
        background: url(img/yy.jpg) no-repeat fixed;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        -o-background-size: 100% 100%;
        background-size: 100% 100%;
        min-height: 100%;
    }
	.main {
		margin-top: 40px;
				padding: 0px 10px;

	}

	table.a {
		table-layout: fixed;
		width: 50%;
	}
</style>
<?php
include_once('cekuser.php');
?>
<div class="main">
	<div class="container">
		<div class="content">
			<h2>Data Pengaduan</h2>
			<a href="akun.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
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