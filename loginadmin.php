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

  * {
    box-sizing: border-box;
  }

  .container {
    padding: 16px;
    background-color: white;
  }

  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  input[type=text]:focus,
  input[type=password]:focus {
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
<?php
session_start();
if ($_SESSION) {
  if ($_SESSION['level'] == "Super Admin" || $_SESSION['level'] == "Admin Instansi") {
    header("Location: adminindex.php");
  }
}

include_once('login.php');

?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  <div class="container">
    <h1>LOGIN</h1>
    <p>Login admin aplikasi web SIAP.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Masukkan Username *" name="username" id="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password *" name="password" id="password" required>

    <label for="level"><b>Pilih Level</b></label>
    <select name="level" required>
      <option value="">-----PILIH LEVEL-----</option>
      <option value="0">Super Admin</option>
      <option value="1">Admin Instansi</option>
    </select>

    <hr>

    <button name="submit" type="submit" class="loginbtn">MASUK</button>
  </div>

</form>

</body>

</html>