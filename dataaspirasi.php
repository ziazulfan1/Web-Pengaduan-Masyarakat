<?php
include("header.php");
include("koneksi.php");
?>

<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">

</style>

<div class="container">
	<div class="content">

		<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
		<?php
		if (isset($_POST['add'])) {
			$judulaspirasi	 = $_POST['judulaspirasi'];
			$nama_instansi	 = $_POST['nama_instansi'];
			$laporan		 = $_POST['laporan'];
			$email		 = $_POST['email'];
			$alamatpelapor		 = $_POST['alamatpelapor'];
			$lampiran		 = $_FILES['file']['name'];
			$lokasi_file = $_FILES['file']['tmp_name'];
			$folder = "files/$lampiran";

			if (move_uploaded_file($lokasi_file, "$folder"));

			$cek = mysqli_query($koneksi, "SELECT * FROM data_aspirasi WHERE nama_instansi='$nama_instansi'");
			if (mysqli_num_rows($cek) == 0) {
				$insert = mysqli_query($koneksi, "INSERT INTO data_aspirasi ( judulaspirasi ,nama_instansi , laporan,email,alamatpelapor, lampiran) VALUES('$judulaspirasi','$nama_instansi','$laporan','$email','$alamatpelapor','$lampiran')") or die(mysqli_error($koneksi));

				if ($insert) {
					echo '<div class="alert alert-success alert-dismissable fade in""><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
				} else {
					echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan! <a href="data.php"><- Kembali</a></div>';
				}
			}
		}



		?>
		<div class="panel panel-primary">
			<div class="panel-heading">Ayo berikan aspirasi anda</div>
			<div class="panel-body">
				<div class="col-sm-10">
					<br>
					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label class="col-sm-4 control-label">JUDUL LAPORAN ANDA</label>
							<div class="col-sm-7">
								<input type="text" name="judulaspirasi" class="form-control" placeholder="Ketik judul laporan anda*" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">LAPORAN</label>
							<div class="col-sm-7">
								<textarea name="laporan" rows="10" class="form-control" placeholder="Ketik isi laporan anda*"></textarea>

							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label">NAMA INSTANSI</label>
							<div class="col-sm-7">
								<select name="nama_instansi" class="form-control" required>
									<option value="">-----PILIH INSTANSI-----</option>
                  <option value="Dinas Pekerjaan Umum dan Penataan Ruang">Dinas Pekerjaan Umum dan Penataan Ruang</option>
                  <option value="Dinas Kependudukan dan Pencatatan Sipil">Dinas Kependudukan dan Pencatatan Sipil</option>
                  <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                  <option value="Dinas Komunikasi dan Informatika">Dinas Komunikasi dan Informatika</option>
                  <option value="Dinas Lingkungan Hidup">Dinas Lingkungan Hidup</option>
                  <option value="Dinas Pendidikan dan Kebudayaan">Dinas Pendidikan dan Kebudayaan</option>
                  <option value="Dinas Pendidikan Dayah">Dinas Pendidikan Dayah</option>
                  <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                  <option value="Dinas Perindustrian dan Perdagangan">Dinas Perindustrian dan Perdagangan</option>
                  <option value="Dinas Bina Marga">Dinas Bina Marga</option>
                  <option value="Dinas Bina Marga">Dinas Syariat Islam</option>
                  <option value="Dinas Pemberdayaan Perempuan dan Perlindungan Anak">Dinas Pemberdayaan Perempuan dan Perlindungan Anak</option>
                  <option value="Sekretariat Daerah">Sekretariat Daerah</option>
                  <option value="Badan Pusat Statistik">Badan Pusat Statistik</option>
                  <option value="Dinas Pertanian Tanaman Pangan">Dinas Pertanian Tanaman Pangan</option>
                  <option value="Dinas Perpustakaan dan Kearsipan">Dinas Perpustakaan dan Kearsipan</option>
									<option value="Kecamatan Baktiya">Kecamatan Baktiya</option>
									<option value="Kecamatan Baktiya Barat">Kecamatan Baktiya Barat</option>
									<option value="Kecamatan Banda Baro">Kecamatan Banda Baro</option>
									<option value="Kecamatan Cot Girek">Kecamatan Cot Girek</option>
									<option value="Kecamatan Dewantara">Kecamatan Dewantara</option>
									<option value="Kecamatan Geureudong Pase">Kecamatan Geureudong Pase</option>
									<option value="Kecamatan Kuta Makmur">Kecamatan Kuta Makmur</option>
									<option value="Kecamatan Langkahan">Kecamatan Langkahan</option>
									<option value="Kecamatan Lapang">Kecamatan Lapang</option>
									<option value="Kecamatan Lhoksukon">Kecamatan Lhoksukon</option>
									<option value="Kecamatan Matangkuli">Kecamatan Matangkuli</option>
									<option value="Kecamatan Meurah Mulia">Kecamatan Meurah Mulia</option>
									<option value="Kecamatan Muara Batu">Kecamatan Muara Batu</option>
									<option value="Kecamatan Nibong">Kecamatan Nibong</option>
									<option value="Kecamatan Nisam">Kecamatan Nisam</option>
									<option value="Kecamatan Nisam Antara">Kecamatan Nisam Antara</option>
									<option value="Kecamatan Paya Bakong">Kecamatan Paya Bakong</option>
									<option value="Kecamatan Pirak Timu">Kecamatan Pirak Timu</option>
									<option value="Kecamatan Samudera">Kecamatan Samudera</option>
									<option value="Kecamatan Sawang">Kecamatan Sawang</option>
									<option value="Kecamatan Seunuddon">Kecamatan Seunuddon</option>
									<option value="Kecamatan Simpang Keramat">Kecamatan Simpang Keramat</option>
									<option value="Kecamatan Syamtalira Aron">Kecamatan Syamtalira Aron</option>
									<option value="Kecamatan Syamtalira Bayu">Kecamatan Syamtalira Bayu</option>
									<option value="Kecamatan Tanah Jambo Aye">Kecamatan Tanah Jambo Aye</option>
									<option value="Kecamatan Tanah Luas">Kecamatan Tanah Luas</option>
									<option value="Kecamatan Tanah Pasir">Kecamatan Tanah Pasir</option>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">ALAMAT PELAPOR</label>
							<div class="col-sm-7">
								<textarea type="text" name="alamatpelapor" rows="5" class="form-control" placeholder="Ketik alamat anda*" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">EMAIL</label>
							<div class="col-sm-7">
								<input type="text" name="email" class="form-control" placeholder="Ketik alamat email anda*" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">UPLOAD LAMPIRAN</label>
							<div class="col-sm-7">
								<input type="file" name="file" class="form-control" id="file" readonly />
								<p>*jika diperlukan</p>
							</div>
						</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">&nbsp;</label>
					<div class="col-sm-7">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data">

					</div>
				</div>

				</form>
			</div>
		</div>
	</div>
</div>
</div>


<?php
include("footer.php");
?>
</div>
</div>