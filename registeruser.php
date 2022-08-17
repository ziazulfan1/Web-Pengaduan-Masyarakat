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
<style type="text/css">
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

  .container {
    width: 60%;
    background-color: white;
  }

  input[type=text],
  input[type=password],
  input[type=email],
  input[type=file] {
    width: 100%;
    padding: 12px;
    margin: 5px 0 15px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    background: #f1f1f1;
    box-sizing: border-box;
  }

  input[type=text]:focus,
  input[type=password]:focus,
  input[type=email]:focus,
  input[type=file]:focus {
    background-color: #ffff;
    border-radius: 4px;
  }

  select {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    background: #f1f1f1;
  }

  select:focus {
    background-color: #ffff;
    border-radius: 4px;
  }

  textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    background: #f1f1f1;
  }

  textarea:focus {
    background-color: #ffff;
    border-radius: 4px;
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
    padding: 16px;
    width: 100%;
  }

  #message {
    display: none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
  }

  #message p {
    padding: 10px 35px;
    font-size: 15px;
  }

  .valid {
    color: green;
  }

  .valid:before {
    position: relative;
    left: -35px;
    content: "✔";
  }

  .invalid {
    color: red;
  }

  .invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
  }
</style>
<div class="container">
  <div class="content">
    <h2>Register Form</h2>
    <p>Silahkan Daftarkan Identitas Anda</p>
    <a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali ke Homepage</a>
  </div>
  <hr />

  <?php

  if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $foto    = $_FILES['file']['name'];
    $lokasi_foto = $_FILES['file']['tmp_name'];
    $folder = "fotos/$foto";

    if (move_uploaded_file($lokasi_foto, "$folder"));

    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE nama ='$nama'");
    if (mysqli_num_rows($cek) == 0) {
      $insert = mysqli_query($koneksi, "INSERT INTO user ( nama , username,password,alamat,email,level,foto) VALUES('$nama','$username','$password','$alamat','$email','$level','$foto')") or die(mysqli_error($koneksi));

      if ($insert) {
        echo '<div class="alert alert-success alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan! <a href="index.php"><- Kembali</a></div>';
      }
    }
  }

  ?>

  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Kamu *" required>

    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Masukkan Username *" required>

    <label for="alamat">Alamat</label>
    <textarea name="alamat" placeholder="Masukkan Alamat Kamu *"></textarea required>

      <label for="email">Email</label>
        <input type="text"  id="email" name="email" placeholder="Masukkan Email Kamu *" required>

                    <label for="level">Pilih Level</label>
                                        <select name="level" required>
                                            <option value="2">User</option>
                                        </select>

          <label for="upload">Upload Foto Profil</label>
        <input type="file" name="file"  id="file" required>

              <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan Password *" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      <div id="message">
  <h4>Password must contain the following:</h4>
  <p id="letter" class="invalid">Termasuk <b>Huruf Besar</b></p>
  <p id="capital" class="invalid">Termasuk <b>Huruf Kecil</b></p>
  <p id="number" class="invalid">Termasuk <b>Nomor</b></p>
  <p id="length" class="invalid">Minimum <b>8 Karakter</b></p>
</div>
        <hr>

      <button type="submit" name="add" class="loginbtn" value="Simpan">Register</button>
      
      <div class="container login">
    <p>Kamu sudah punya akun? <a href="index.php">Sign in</a>.</p>
</form>
</div>
</div>


<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myInput.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</html>