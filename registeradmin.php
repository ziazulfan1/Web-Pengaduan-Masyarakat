<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Informasi Pengaduan Masalah</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/tooltip.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <link href="style.css" rel="stylesheet">
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</head>



<?php
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
    font-family: Arial, Helvetica, sans-serif;
    background-color: black;
  }

  * {
    box-sizing: border-box;
  }

  .container {
    padding: 16px;
    background-color: white;
  }

  input[type=text],
  input[type=password],
  input[type=email] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  input[type=text]:focus,
  input[type=password]:focus,
  input[type=email]:focus {
    background-color: #ddd;
    outline: none;
  }

  select {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  select:focus {
    background-color: #ddd;
    outline: none;
  }

  textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  textarea:focus {
    background-color: #ddd;
    outline: none;
  }

  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }

  .loginbtn {
    background-color: #4863A0;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  .loginbtn:hover {
    opacity: 1;
  }

  a {
    color: dodgerblue;
  }

  .login {
    background-color: #f1f1f1;
    text-align: center;
  }
</style>

<div class="main">
  <div class="container">
    <div class="content">
      <?php

      if (isset($_POST['add'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $level = $_POST['level'];

        $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE nama ='$nama'");
        if (mysqli_num_rows($cek) == 0) {
          $insert = mysqli_query($koneksi, "INSERT INTO user ( nama , username,password,alamat,email,level) VALUES('$nama','$username','$password','$alamat','$email','$level')") or die(mysqli_error($koneksi));

          if ($insert) {
            echo '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
          } else {
            echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan! <a href="index.php"><- Kembali</a></div>';
          }
        }
      }

      ?>

      <h2>Register Form</h2>

      <a href="loginadmin.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
      <hr />

      <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">


        <label for="nama"><b>Nama Instansi</b></label>
        <select name="nama" required>
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
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Masukkan Username *" name="username" id="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Masukkan Password *" name="password" id="password" required>

        <label for="alamat"><b>Alamat</b></label>
        <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat *"></textarea>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Masukkan Email *" id="email" name="email" required>

        <label for="level"><b>Pilih Level</b></label>
        <select name="level" required>
          <option value="">----pilih level----</option>
          <option value="Super Admin">Super Admin</option>
          <option value="Admin Instansi">Admin Instansi</option>
        </select>

        <hr>

        <button value="Simpan" name="add" type="submit" class="loginbtn">REGISTRASI</button>
    </div>

  </div>
</div>
</form>
</div>