<?php
include_once('cekadmin.php');
?>
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
<style>
  .navbar {
    margin-bottom: 0;
    background-color: #4863A0;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 0px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }

  .navbar li a,
  .navbar .navbar-brand {
    color: #fff !important;
  }

  .navbar-nav li a:hover,
  .navbar-nav li.active a {
    color: #4863A0 !important;
    background-color: #fff !important;
  }

  .navbar-inverse .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }

  .dropdown .dropdown-menu {
    color: #fff !important;
    background-color: #4863A0 !important;
  }

  .dropdown .dropdown-toggle {
    color: #fff !important;
    background-color: #4863A0 !important;
  }
</style>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>

        </button>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-left">
          <a class="navbar-brand">SIAP (Sistem Informasi Aspirasi dan Pengaduan)</a>

        </ul>
        <ul class="nav navbar-nav navbar-right">

          <li><a href="adminindex.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']; ?>
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            </ul>
          </li>
      </div>
    </div>
  </nav>
</body>

</html>