<?php
include("headeruser.php");
include("koneksi.php");
?>
<?php
include_once('cekuser.php');
?>
<style>
	.main {
		margin-top: 40px;
		padding: 0px 10px;

	}

	table.a {
		table-layout: fixed;
		width: 50%;
	}

	body {
		background: url(img/yy.jpg) no-repeat fixed;
		-webkit-background-size: 100% 100%;
		-moz-background-size: 100% 100%;
		-o-background-size: 100% 100%;
		background-size: 100% 100%;
		min-height: 100%;
	}
</style>

<div class="main">
	<div class="container">
		<div class="content">
			<h2>Solusi Pengaduan &raquo; Solusi</h2>
			<a href="akun.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<hr />
		</div>
	</div>
</div>
<center>


	<br>
</center>
<?php
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM data_solusi WHERE  id='$id'");
if (mysqli_num_rows($sql) == 0) {
	header("Location: akun.php");
} else {
	$row = mysqli_fetch_assoc($sql);
}

?>
<center>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3>Laporan</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped table-condensed a">

					<tr>
						<th>Judul Pengaduan</th>
						<td><?php echo $row['judul']; ?></td>
					</tr>
					<tr>
						<th>Username</th>
						<td><?php echo $row['username']; ?></td>
					</tr>
					</tr>
					<tr>
						<th>Lampiran</th>
						<td><?php echo $row['lampiran']; ?></td>
					</tr>
				</table>
				<label>Solusi</label>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
						<div class="col-sm-6">
							<textarea name="solusi" rows="10" class="form-control" readonly><?php echo $row['solusi']; ?></textarea>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


</center>


<hr />

<center>


	<br>
</center>